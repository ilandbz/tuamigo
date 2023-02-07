<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
class Pagos extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('solicitud_prestamo');
		$this->load->model('cliente_model');
		$this->load->model('usuario_model');
		$this->load->model('general_model');
		$this->load->model('negocio_model');
		$this->load->model('operaciones_model');
		$this->load->model('caja_model');
		$this->load->model('ahorro_model');		
		//$this->load->library('Pdf');
	}
	function retornarheader($tipouser){
		switch($tipouser){
			case 1: 
				$data['header']='principal/headeradmin';
				$data['fechalogros']=$this->operaciones_model->ultimafechalogros($this->session->userdata('agencia'));
				break;
			case 2:
				$data['header']='principal/header';
				break;
			case 3://operaciones
				$this->load->model('caja_model');
				$data['saldo']=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
				$data['header']='principal/headeroperaciones';
				break;
			case 4://cobranza
				$this->load->model('caja_model');
				$data['saldo']=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
				$data['header']='principal/headercobranza';
				break;
			case 5:
				$data['header']='principal/headeradmin';
				$data['fechalogros']=$this->operaciones_model->ultimafechalogros($this->session->userdata('agencia'));
				break;				
			case 6:
				$this->load->model('caja_model');
				$data['saldo']=$this->caja_model->obtenersaldo();
				$data['header']='principal/headeroperaciones';
				break;
			case 7:
				$data['header']='principal/headergestorcobranza';
				break;						
		}
		return $data;
	}
	function index(){
		if($this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer5';
			$data['lista']=$this->opciones();
			if($this->session->userdata('tipouser')==3){//operaciones
				$data['content']='pagos/listasolicitudesaceptados';
			}else{
				$data['content']='pagos/formbusquedapagos';//cobranza
			}
			$data['asesores']=$this->usuario_model->listaasesoresxagencia($this->session->userdata('agencia'));
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('SOLO OPERACIONES TIENE ACCESO A ESTE MODULO'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function opciones(){//LISTA DE CLIENTES POR APELLIDOS Y NOMBRES
		$texto='';
		if($this->session->userdata('tipouser')==3){
			$lista=$this->cliente_model->lista_clientestipo('CREDITO');
		}else{
			// $lista=$this->cliente_model->lista_clientesagencia($this->session->userdata('agencia'));
			$lista=$this->cliente_model->lista_clientesagencialike($this->session->userdata('agencia'));
		}
		foreach($lista as $row){
			$texto .= '"' . $row['apenom'] . '",';
		}
		return $texto;
	}
	/*BUSQUEDA DE SOLICITUDES DESEMBOLSADOS VIGENTES*/
	function cargartablasoldesapro($solicitudes){
		$miarreglo=null;
		foreach($solicitudes as $row){
			$row['diasatrasados'] = $this->calculardiasatrasados($row);			
			$row['moraactual'] = $this->calcularmoraactual($row, $row['diasatrasados']);			
			$row['moradias']+=$row['moraactual'];
			$miarreglo[]=$row;
		}
		$data['solicitudes']=is_null($miarreglo) ? $solicitudes : $miarreglo;
		$this->load->view('pagos/tablasoldesapro', $data);
	}
	function solicitudesdeseaprobidsol($idsolicitud){
		$solicitudes=$this->operaciones_model->vistasolicitdesembolsadosidsol2($idsolicitud);
		$this->cargartablasoldesapro($solicitudes);
	}
	function solicitudesdeseaprobases($idasesor){
 		if(substr($idasesor, 0, 4)=='JACU'){
 			$idasesor='JACUÑA07';
  		}
		$solicitudes=$this->operaciones_model->vistasolicitdesembolsadosidasesor($idasesor);
		$this->cargartablasoldesapro($solicitudes);
	}
	function solicitudesdeseaprobcc($codcliente){//codigo de cliente
		$solicitudes=$this->operaciones_model->vistasolicitdesembolsadoscc($codcliente);
		$this->cargartablasoldesapro($solicitudes);
	}
	function solicitudesdeseaprobdni($dni){
		$solicitudes=$this->operaciones_model->listcreditosvigentesoconmora($dni);
		$this->cargartablasoldesapro($solicitudes);
	}
	function solicitudesdeseaprobapenom(){
		$apenom = $this->input->post('apenom');
		$solicitudes = $this->operaciones_model->vistasolicitdesembolsadosapenom($apenom);		
		$this->cargartablasoldesapro($solicitudes);
	}
	function solicitudesdeseaprobtipoplazo(){
		$tipoplazo = $this->input->post('tipoplazo');
		$asesor = $this->input->post('asesor');
		if($asesor == ''){
			$solicitudes = $this->operaciones_model->vistasolicitdesembolsadostpag($tipoplazo, $this->session->userdata('agencia'));
		}else{
			$solicitudes = $this->operaciones_model->vistasolicitudestpasesor($tipoplazo, $asesor);			
		}
		$this->cargartablasoldesapro($solicitudes);
	}
	function solicitudesporestado(){
		$estado = $this->input->post('estado');
		$solicitudes = $this->operaciones_model->vistasolicitudesxestado($estado);
		$this->cargartablasoldesapro($solicitudes);
	}
	function solicitudesdeseaprobfecha(){
		$fecha = $this->input->post('fecha');
		$solicitudes=$this->operaciones_model->vistasolicitdesembolsadosfecha($fecha);	
		$this->cargartablasoldesapro($solicitudes);
	}
	/*-----------------*/
	/*FORMULARIO PARA PAGOS*/
	function formpago($idsolicitud){//PAGOS POR CUOTAS
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';	
			$data['content']='pagos/formpago';
			$desembolso=$this->operaciones_model->vistasolicitdesembolsadosidsol2($idsolicitud);
			$cuotaspago = $this->operaciones_model->vistapagos($desembolso['iddesembolso']);//vistapagos se cambio antes era vistacuotaspago
			$data['desembolso']=$desembolso;
			$ultimacuota=$this->operaciones_model->ultimacuotadebida($desembolso['iddesembolso']);//cuota debe
			$data['ultimacuota']=$ultimacuota;
			$data['diasatrasadosc']=$this->calculardiasatrasados($desembolso);
			$data['moraactual']=$this->calcularmoraactual($desembolso, $data['diasatrasadosc']);
			$data['moravencido'] = $this->calcularmoravencida($desembolso['ultimafechadecuota'], $desembolso['fechacuotadebe']);//si vencio su ultima cuota
			$data['cuotaspago']=$cuotaspago;
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function calcularmoraactual($desembolso, $diasatrasados){
		if($desembolso['estado']=='FINALIZADO'){
			return 0;
		}
		if($desembolso['unidplazo']!='Dias'){
			return $diasatrasados;
		}
		if(is_null($desembolso['ultimafechapago']) || $desembolso['fechapagadocompleto']<$desembolso['fechacuotadebe']){//no inicio ningun pago, no pago ninguna cuota, pago adelantado y el mayor es fechacuotadebe
			$mora = $this->calcularmora($desembolso['fechacuotadebe'], date('Y-m-d'));
		}else{
			$mora = $this->calcularmora($desembolso['fechapagadocompleto'], date('Y-m-d'))-1;
			$mora = $mora<0 ? 0 : $mora;	
		}
		return $mora;
	}
	function calcularmoravencida($fechaultimacuota, $fechadondesequedo){
		if(is_null($fechadondesequedo)){//si ya pago todas las cuotas osea estado finalizado
			return 0;
		}
		if(date('Y-m-d')>$fechaultimacuota){//si se vencio todo el credito y no cancelo el credito
			$fdiadespuescronograma = substr($fechaultimacuota, 1,10); // fecha calculada un dia despues del cronograma
			$fdiadespuescronograma = strtotime ( '+1 day' , strtotime ( $fdiadespuescronograma ) ) ;
			$fdiadespuescronograma = date ( 'Y-m-j' , $fdiadespuescronograma );	
			$moravencido=$this->calcularmorasinferiados($fdiadespuescronograma, date('Y-m-d'));//dias atraso despues del credito
		}else{//si no se vencio el credito
			$moravencido=0;
		}
		return $moravencido;
	}
	function obtenercuotasconmora($cuotaspago, $unidplazo){//establecer las moras de los dias que no pagaron o pagaron menor a la cuota
		$aux=0;
		foreach($cuotaspago as $row) : 
			if($aux==0 && ($row['estado']==0 || ($row['estado']==1 && $row['montopagado']<$row['cuota']))){// si pago pero no completo la cuota
				if($unidplazo=='Dias'){
					$row['mora']=$this->calcularmora($row['fecha_prog'], date('Y-m-d'));
				}else{
					$row['mora']=$this->calcularmorasinferiados($row['fecha_prog'], date('Y-m-d'));
				}		
				$aux=1;
			}else{// si pago toda la cuota

			}
			$arreglo[]=$row;
			$rowanterior=$row;
		endforeach;
		return $arreglo;
	}
	function guardarpagos(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$pagos = $this->input->post('pagos');
			$iddesembolso = $this->input->post('iddesembolso');	
			$diasatrasadosc = $this->input->post('moraactual');
			$idsolicitud = $this->input->post('idsolicitud');
			$codcliente = $this->input->post('codcliente');
			$idcaja=$this->caja_model->maximocod()+1;
				$arreglo = array(
					'iddesembolso' => $iddesembolso,
					'idsolicitud' => $idsolicitud,
					'codcliente' => $codcliente
				);
			$monto=0;
			$nrocuotas=0;
			foreach($pagos as $row){
				if(isset($row['si'])){
					$monto = $monto+$row['montopagado'];
				}
			}
			$nrocuotas += $this->registrarkardexpagoscuotas($arreglo, $monto, $row['fecha'], $diasatrasadosc);
			if($monto>0){
				$desembolso=$this->operaciones_model->vistasolicitdesembolsadosid($iddesembolso);
				$fechareg= date('Y-m-d H:i:s');
				$descripcion='Pago de '.$nrocuotas.' cuota(s) por un monto de S/.'.number_format($monto,2).', ID SOL : '.$desembolso['idsolicitud'].', CLIENTE : '.$desembolso['apenom'];
				$this->formpagocuotascaja($monto, $descripcion, $fechareg, $iddesembolso);
			}else{
				echo "<script type='text/javascript'> alert('NO HAY PAGOS'); ";
				echo " location.href='".base_url()."index.php/pagos/formpago/".$idsolicitud."'; </script>";				
			}
		}else{
			echo "<script type='text/javascript'> alert('NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php/pagos/formpago/".$idsolicitud."'; </script>";				
		}
	}
	function pago($iddesembolso){ //PAGO POR MONTO, USUARIO OPERACIONES
		if($this->session->userdata('idusuario')){
			if($this->session->userdata('tipouser')>2){
				$desembolso=$this->operaciones_model->vistasolicitdesembolsadosid($iddesembolso);
				$data=$this->retornarheader($this->session->userdata('tipouser'));
				$data['desembolso']=$desembolso;
				$data['footer']='principal/footer4';
				$data['ahorrosvigentes']=$this->ahorro_model->listavigentesdnicliente($desembolso['dni']);
				$data['content']='pagos/pagounid';
				$data['diasretraso']=$this->calculardiasatrasados($desembolso);				
				$data['moraactual']=$this->calcularmoraactual($desembolso, $data['diasretraso']);
				$data['nrocuotasdebe']=$this->operaciones_model->nrocuotasquedebe($iddesembolso);
				$ultimacuota=$this->operaciones_model->ultimacuotadebida($desembolso['iddesembolso']);
				$data['ultimacuota']=$ultimacuota;
				$this->load->view('index',$data);	
			}elseif($this->session->userdata('tipouser')==2){
				echo 'ELIMINADO';
			}else{
				echo "<script type='text/javascript'> alert('NO TIENE ACCESO'); ";
				echo " location.href='".base_url()."index.php'; </script>";		
			}
		}else{
			echo "<script type='text/javascript'> alert('No inicio session'); ";
			echo " location.href='".base_url()."index.php'; </script>";			
		}
	}
	function pagoporidsolicitud($idsolicitud){ //PAGO POR MONTO, USUARIO OPERACIONES
		if($this->session->userdata('idusuario')){
			if($this->session->userdata('tipouser')>2){
				$desembolso=$this->operaciones_model->vistasolicitdesembolsadosidsol2($idsolicitud);
				$data=$this->retornarheader($this->session->userdata('tipouser'));
				$data['desembolso']=$desembolso;
				$data['footer']='principal/footer4';
				$data['ahorrosvigentes']=$this->ahorro_model->listavigentesdnicliente($desembolso['dni']);
				$data['content']='pagos/pagounid';
				$data['diasretraso']=$this->calculardiasatrasados($desembolso);				
				$data['moraactual']=$this->calcularmoraactual($desembolso, $data['diasretraso']);
				$data['nrocuotasdebe']=$this->operaciones_model->nrocuotasquedebe($desembolso['iddesembolso']);
				$ultimacuota=$this->operaciones_model->ultimacuotadebida($desembolso['iddesembolso']);
				$data['ultimacuota']=$ultimacuota;
				$this->load->view('index',$data);	
			}elseif($this->session->userdata('tipouser')==2){
				echo 'ELIMINADO';
			}else{
				echo "<script type='text/javascript'> alert('NO TIENE ACCESO'); ";
				echo " location.href='".base_url()."index.php'; </script>";		
			}
		}else{
			echo "<script type='text/javascript'> alert('No inicio session'); ";
			echo " location.href='".base_url()."index.php'; </script>";			
		}
	}
	function formpagodeudatotal($iddesembolso){//incluido deudas de mora por desembolso
		if($this->session->userdata('idusuario')){
			$desembolso=$this->operaciones_model->vistasolicitdesembolsadosid($iddesembolso);
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['desembolso']=$desembolso;
			$data['footer']='principal/footer4';		
			$data['content']='pagos/formfinalizardesem';
			$data['diasretraso']=$this->calculardiasatrasados($desembolso);				
			$data['moraactual']=$this->calcularmoraactual($desembolso, $data['diasretraso']);
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('No inicio session'); ";
			echo " location.href='".base_url()."index.php'; </script>";			
		}
	}
	function realizapago(){
		$cuotascheck = $this->input->post('cuotascheck');//check
		$moracheck = $this->input->post('moracheck');//check
		$iddesembolso=$this->input->post('iddesembolso');
		$fecha_reg=$this->input->post('fechapago');
		$diasatrasados=$this->input->post('moraactual');
		$montopagar=0;
		$montomora=0;
		$descripcion='';
		$nrocuotas=0;
		$idpagomora = 0;
		$desembolso=$this->operaciones_model->vistasolicitdesembolsadosid($iddesembolso);
		if($cuotascheck==1 && is_numeric($this->input->post('montopagar')) && $this->input->post('montopagar')>0){
			$montopagar=$this->input->post('montopagar');
			$nrocuotas = $this->registrarkardexpagoscuotas($desembolso, $montopagar, $fecha_reg, $diasatrasados);
			$descripcion.='Pago de '.$nrocuotas.' cuota(s) por un monto de S/.'.number_format($montopagar,2);
		}
		if($moracheck==1){
			$descripcion.= ($descripcion=='') ? '' : ', ';
			$montomora=$this->input->post('montomora');
			$diasmora=$this->input->post('diasmora');
			$datamora=array(
				'iddesembolso' 	=> $iddesembolso,
				'diasmora' 		=> $diasmora,
				'total'			=> $montomora,
				'fechahora_reg'	=> $fecha_reg,
				'estado'		=> 'SI') ;
			$this->operaciones_model->registrarpagomora($datamora);
			$descripcion .= 'TOTAL DE MORA S/.'.number_format($montomora,2);
		}
		$descripcion .= ', Cliente : '.$desembolso['apenom'];
		$total=$montopagar+$montomora;
		if($this->session->userdata('tipouser')==3){//si es operaciones
			$this->formpagocuotascaja($total, $descripcion, $fecha_reg, $iddesembolso);
		}else{
			$idreg=$this->caja_model->maximocod();
			$ultimreg =$this->caja_model->obtenerregcaja($idreg);
			$saldo=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
			$data=array(
					'idreg'			=> $idreg+1,
					'fecha_hora'	=> $fecha_reg,
					'codusuario'	=> $this->session->userdata('idusuario'),
					'agencia'		=> $this->session->userdata('agencia'),
					'cantidad'		=> $total,
					'tipo'			=> 'INGRESO',
					'saldo'			=> $saldo+$total,
					'descripcion'	=> $descripcion
				);
			if($fecha_reg==$ultimreg['fecha_hora']){
				echo 'SE IBA A DUPLICAR AVICE A SOPORTE TECNICO';
				var_dump($data);
				return false;
			}
			$regcaja=$this->caja_model->registrarcaja($data);
			if($regcaja==true){
				$this->pagorealizado($total, $descripcion, $fecha_reg, $iddesembolso);
			}else{
				echo 'NO SE REGISTRO CORRECTAMENTE CONSULTE A SOPORTE';			
			}
		}
	}
	function realizapagoprueba(){
		$desembolso=$this->operaciones_model->vistasolicitdesembolsadosid('Th010265');
		$iddesembolso = $desembolso['iddesembolso'];
		$idsolicitud = $desembolso['idsolicitud'];
		$codcliente = $desembolso['codcliente'];
		$monto=313;
		$fechahorareg = date('Y-m-d');
		$diasatrasados =0;
		$montototal=$monto;
		$idusuario='KESPIRITU';
		$nrocuotas=0;
		$aux=0;
		$listacuotapago=$this->operaciones_model->vistapagosnull('Th010265');//cuotaspago que no pagaron o el monto es menor a la cuota
		foreach($listacuotapago as $row){
			if(!is_null($row['montopagado']) && $row['montopagado']<$row['cuota']){//si tenia deudas de cuotas arrastrado y no es exacto
				$diferencia = $row['cuota']-$row['montopagado'];
				if($monto>=$diferencia){//si cubre lo faltante para la cuota
					$montopagado=$row['cuota'];//variable para actualizar el pago en el registro
					$monto=$monto-$diferencia;
					$mora = $diasatrasados;
				}else{//si no cubre lo faltante para la mora
					$montopagado=$monto+$row['montopagado'];//variable para actualizar el pago en el registro
					$monto=0;
					$mora=0;
				}
				$data2=array(
						'montopagado'	=>$montopagado,
						'fecha_reg'		=>$fechahorareg,
						'moradias'		=>$mora,
						'codusuario'	=>$idusuario
					);
				$act=$this->operaciones_model->actualizarmontopago($iddesembolso, $row['nrocuota'], $data2);
				$aux=1;//PARA VER QUE SE REGISTRO LA MORA (SE REGISTRO LA MORA)
				$nrocuotas++;
			}else{
				if($monto<$row['cuota']){
					$montopagado=$monto;
					$monto=0;
					$mora=0;
					$aux=1;
				}else{
					$montopagado=$row['cuota'];
					$monto=$monto-$row['cuota'];
					$mora = $diasatrasados;
				}
				if($aux==0){
					$aux=1;//PARA VER QUE SE REGISTRO LA MORA
				}else{
					$mora=0;
				}
				$data=array(
						'iddesembolso'	=> $iddesembolso,
						'nrocuota'		=> $row['nrocuota'],
						'fecha_reg'		=> $fechahorareg,
						'codusuario'	=> $idusuario,
						'moradias'		=> $mora,
						'montopagado'	=> $montopagado
					);
				$this->operaciones_model->registrarpagos($data);
				$nrocuotas++;
			}
			if($monto<=0){
				break;
			}
		}
	}
	/* ------------------------ */
	//LISTA DE SOLICITUDES APROBADAS A SER DESEMBOLSADOS
	function listpdesembolso(){
		if($this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';	
			$data['content']='pagos/desembolso';
			if($this->session->userdata('tipouser')==3){
				$data['desembolsos']=$this->operaciones_model->vistadesembolsossinpagos();
				$data['solicitudes']=$this->operaciones_model->solicitudesadesembolsar();				
			}else{
				$data['desembolsos']=$this->operaciones_model->vistadesembolsossinpagosagencia($this->session->userdata('agencia'));
				$data['solicitudes']=$this->operaciones_model->solicitudesadesembolsarxagencia($this->session->userdata('agencia'));					
			}
			$this->load->view('index',$data);			
		}else{
			echo "<script type='text/javascript'> alert('SOLO OPERACIONES TIENE ACCESO A ESTE MODULO'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	//--------------------------------
	function formdesembolso($idsolicitud){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer4';		
			$data['content']='pagos/formdesembolso';
			$data['saldocaja']=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
			$solicitud = $this->operaciones_model->solicitudaprobado($idsolicitud);
			$data['solicitud']=$solicitud;
			$cliente=$this->cliente_model->obtener_cliente($solicitud['codcliente']);
			if($solicitud['tipo']=='Recurrente Con Saldo'){
				$solpagar=$this->operaciones_model->vistalistacreditoscancelar($idsolicitud);
				$totalapagar=0;
				//optimizar
				foreach($solpagar as $row){
					$diasatrasados = $this->calculardiasatrasados($row);
					//$row['diasmora']+=$diasatrasados;
					//$totalapagar+=$row['saldo']+($row['diasmora']*$row['costomora']);
					$totalapagar+=$row['saldo']+(($row['diasmora']-$row['pagomora'])*$row['costomora']);
				}
				$data['totalapagardeuda'] = $totalapagar;
				$data['totaldeudapagada'] = $totalapagar==0 ? $this->operaciones_model->sumacredpagado($idsolicitud) : 0;
				$solvigentes=$this->operaciones_model->listcreditosvigentesoconmora($cliente['dni']);//vigentes
				$miarreglo=null;
				foreach($solvigentes as $row){
					$row['diasatrasados']=$this->calculardiasatrasados($row);
					$row['mora']=$row['moradias'];
					// $row['mora']=$row['moradias']+$row['diasatrasados'];
					$miarreglo[]=$row;
				}
				//optimizar
				$data['solvigentes']=$miarreglo;
			}
			$data['cliente']=$cliente;
			$poliza=$this->solicitud_prestamo->obtenerpoliza($idsolicitud);
			$data['montoseguro'] = is_null($poliza) ? 0 : $poliza['monto'];
			$data['negocio']=$this->negocio_model->obtener_negocio($solicitud['codcliente']);
			$interes=$this->operaciones_model->obtenerregevaluacion($idsolicitud);
			$data['interes']=$interes['tasainteres'];
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";
		}		
	}
	function generarbarcode($text){
		$filepath = (isset($_GET["filepath"])?$_GET["filepath"]:"");
		$size = (isset($_GET["size"])?$_GET["size"]:"20");
		$orientation = (isset($_GET["orientation"])?$_GET["orientation"]:"horizontal");
		$code_type = (isset($_GET["codetype"])?$_GET["codetype"]:"Code39");
		$print = true;
		$sizefactor = (isset($_GET["sizefactor"])?$_GET["sizefactor"]:"2");
		// This function call can be copied into your project and can be made from anywhere in your code
		$this->barcode( $filepath, $text, $size, $orientation, $code_type, $print, $sizefactor );
	}
	function verbarracodigo(){
		echo '<img src="'.base_url().'index.php/pagos/generarbarcode/342" />';
	}
	function barcode( $filepath="", $text="0", $size="20", $orientation="horizontal", $code_type="code128", $print=false, $SizeFactor=1 ) {
		$code_string = "";
		// Translate the $text into barcode the correct $code_type
		if ( in_array(strtolower($code_type), array("code128", "code128b")) ) {
			$chksum = 104;
			// Must not change order of array elements as the checksum depends on the array's key to validate final code
			$code_array = array(" "=>"212222","!"=>"222122","\""=>"222221","#"=>"121223","$"=>"121322","%"=>"131222","&"=>"122213","'"=>"122312","("=>"132212",")"=>"221213","*"=>"221312","+"=>"231212",","=>"112232","-"=>"122132","."=>"122231","/"=>"113222","0"=>"123122","1"=>"123221","2"=>"223211","3"=>"221132","4"=>"221231","5"=>"213212","6"=>"223112","7"=>"312131","8"=>"311222","9"=>"321122",":"=>"321221",";"=>"312212","<"=>"322112","="=>"322211",">"=>"212123","?"=>"212321","@"=>"232121","A"=>"111323","B"=>"131123","C"=>"131321","D"=>"112313","E"=>"132113","F"=>"132311","G"=>"211313","H"=>"231113","I"=>"231311","J"=>"112133","K"=>"112331","L"=>"132131","M"=>"113123","N"=>"113321","O"=>"133121","P"=>"313121","Q"=>"211331","R"=>"231131","S"=>"213113","T"=>"213311","U"=>"213131","V"=>"311123","W"=>"311321","X"=>"331121","Y"=>"312113","Z"=>"312311","["=>"332111","\\"=>"314111","]"=>"221411","^"=>"431111","_"=>"111224","\`"=>"111422","a"=>"121124","b"=>"121421","c"=>"141122","d"=>"141221","e"=>"112214","f"=>"112412","g"=>"122114","h"=>"122411","i"=>"142112","j"=>"142211","k"=>"241211","l"=>"221114","m"=>"413111","n"=>"241112","o"=>"134111","p"=>"111242","q"=>"121142","r"=>"121241","s"=>"114212","t"=>"124112","u"=>"124211","v"=>"411212","w"=>"421112","x"=>"421211","y"=>"212141","z"=>"214121","{"=>"412121","|"=>"111143","}"=>"111341","~"=>"131141","DEL"=>"114113","FNC 3"=>"114311","FNC 2"=>"411113","SHIFT"=>"411311","CODE C"=>"113141","FNC 4"=>"114131","CODE A"=>"311141","FNC 1"=>"411131","Start A"=>"211412","Start B"=>"211214","Start C"=>"211232","Stop"=>"2331112");
			$code_keys = array_keys($code_array);
			$code_values = array_flip($code_keys);
			for ( $X = 1; $X <= strlen($text); $X++ ) {
				$activeKey = substr( $text, ($X-1), 1);
				$code_string .= $code_array[$activeKey];
				$chksum=($chksum + ($code_values[$activeKey] * $X));
			}
			$code_string .= $code_array[$code_keys[($chksum - (intval($chksum / 103) * 103))]];

			$code_string = "211214" . $code_string . "2331112";
		} elseif ( strtolower($code_type) == "code128a" ) {
			$chksum = 103;
			$text = strtoupper($text); // Code 128A doesn't support lower case
			// Must not change order of array elements as the checksum depends on the array's key to validate final code
			$code_array = array(" "=>"212222","!"=>"222122","\""=>"222221","#"=>"121223","$"=>"121322","%"=>"131222","&"=>"122213","'"=>"122312","("=>"132212",")"=>"221213","*"=>"221312","+"=>"231212",","=>"112232","-"=>"122132","."=>"122231","/"=>"113222","0"=>"123122","1"=>"123221","2"=>"223211","3"=>"221132","4"=>"221231","5"=>"213212","6"=>"223112","7"=>"312131","8"=>"311222","9"=>"321122",":"=>"321221",";"=>"312212","<"=>"322112","="=>"322211",">"=>"212123","?"=>"212321","@"=>"232121","A"=>"111323","B"=>"131123","C"=>"131321","D"=>"112313","E"=>"132113","F"=>"132311","G"=>"211313","H"=>"231113","I"=>"231311","J"=>"112133","K"=>"112331","L"=>"132131","M"=>"113123","N"=>"113321","O"=>"133121","P"=>"313121","Q"=>"211331","R"=>"231131","S"=>"213113","T"=>"213311","U"=>"213131","V"=>"311123","W"=>"311321","X"=>"331121","Y"=>"312113","Z"=>"312311","["=>"332111","\\"=>"314111","]"=>"221411","^"=>"431111","_"=>"111224","NUL"=>"111422","SOH"=>"121124","STX"=>"121421","ETX"=>"141122","EOT"=>"141221","ENQ"=>"112214","ACK"=>"112412","BEL"=>"122114","BS"=>"122411","HT"=>"142112","LF"=>"142211","VT"=>"241211","FF"=>"221114","CR"=>"413111","SO"=>"241112","SI"=>"134111","DLE"=>"111242","DC1"=>"121142","DC2"=>"121241","DC3"=>"114212","DC4"=>"124112","NAK"=>"124211","SYN"=>"411212","ETB"=>"421112","CAN"=>"421211","EM"=>"212141","SUB"=>"214121","ESC"=>"412121","FS"=>"111143","GS"=>"111341","RS"=>"131141","US"=>"114113","FNC 3"=>"114311","FNC 2"=>"411113","SHIFT"=>"411311","CODE C"=>"113141","CODE B"=>"114131","FNC 4"=>"311141","FNC 1"=>"411131","Start A"=>"211412","Start B"=>"211214","Start C"=>"211232","Stop"=>"2331112");
			$code_keys = array_keys($code_array);
			$code_values = array_flip($code_keys);
			for ( $X = 1; $X <= strlen($text); $X++ ) {
				$activeKey = substr( $text, ($X-1), 1);
				$code_string .= $code_array[$activeKey];
				$chksum=($chksum + ($code_values[$activeKey] * $X));
			}
			$code_string .= $code_array[$code_keys[($chksum - (intval($chksum / 103) * 103))]];

			$code_string = "211412" . $code_string . "2331112";
		} elseif ( strtolower($code_type) == "code39" ) {
			$code_array = array("0"=>"111221211","1"=>"211211112","2"=>"112211112","3"=>"212211111","4"=>"111221112","5"=>"211221111","6"=>"112221111","7"=>"111211212","8"=>"211211211","9"=>"112211211","A"=>"211112112","B"=>"112112112","C"=>"212112111","D"=>"111122112","E"=>"211122111","F"=>"112122111","G"=>"111112212","H"=>"211112211","I"=>"112112211","J"=>"111122211","K"=>"211111122","L"=>"112111122","M"=>"212111121","N"=>"111121122","O"=>"211121121","P"=>"112121121","Q"=>"111111222","R"=>"211111221","S"=>"112111221","T"=>"111121221","U"=>"221111112","V"=>"122111112","W"=>"222111111","X"=>"121121112","Y"=>"221121111","Z"=>"122121111","-"=>"121111212","."=>"221111211"," "=>"122111211","$"=>"121212111","/"=>"121211121","+"=>"121112121","%"=>"111212121","*"=>"121121211");

			// Convert to uppercase
			$upper_text = strtoupper($text);

			for ( $X = 1; $X<=strlen($upper_text); $X++ ) {
				$code_string .= $code_array[substr( $upper_text, ($X-1), 1)] . "1";
			}

			$code_string = "1211212111" . $code_string . "121121211";
		} elseif ( strtolower($code_type) == "code25" ) {
			$code_array1 = array("1","2","3","4","5","6","7","8","9","0");
			$code_array2 = array("3-1-1-1-3","1-3-1-1-3","3-3-1-1-1","1-1-3-1-3","3-1-3-1-1","1-3-3-1-1","1-1-1-3-3","3-1-1-3-1","1-3-1-3-1","1-1-3-3-1");

			for ( $X = 1; $X <= strlen($text); $X++ ) {
				for ( $Y = 0; $Y < count($code_array1); $Y++ ) {
					if ( substr($text, ($X-1), 1) == $code_array1[$Y] )
						$temp[$X] = $code_array2[$Y];
				}
			}

			for ( $X=1; $X<=strlen($text); $X+=2 ) {
				if ( isset($temp[$X]) && isset($temp[($X + 1)]) ) {
					$temp1 = explode( "-", $temp[$X] );
					$temp2 = explode( "-", $temp[($X + 1)] );
					for ( $Y = 0; $Y < count($temp1); $Y++ )
						$code_string .= $temp1[$Y] . $temp2[$Y];
				}
			}

			$code_string = "1111" . $code_string . "311";
		} elseif ( strtolower($code_type) == "codabar" ) {
			$code_array1 = array("1","2","3","4","5","6","7","8","9","0","-","$",":","/",".","+","A","B","C","D");
			$code_array2 = array("1111221","1112112","2211111","1121121","2111121","1211112","1211211","1221111","2112111","1111122","1112211","1122111","2111212","2121112","2121211","1121212","1122121","1212112","1112122","1112221");

			// Convert to uppercase
			$upper_text = strtoupper($text);

			for ( $X = 1; $X<=strlen($upper_text); $X++ ) {
				for ( $Y = 0; $Y<count($code_array1); $Y++ ) {
					if ( substr($upper_text, ($X-1), 1) == $code_array1[$Y] )
						$code_string .= $code_array2[$Y] . "1";
				}
			}
			$code_string = "11221211" . $code_string . "1122121";
		}

		// Pad the edges of the barcode
		$code_length = 20;
		if ($print) {
			$text_height = 30;
		} else {
			$text_height = 0;
		}
		
		for ( $i=1; $i <= strlen($code_string); $i++ ){
			$code_length = $code_length + (integer)(substr($code_string,($i-1),1));
	        }

		if ( strtolower($orientation) == "horizontal" ) {
			$img_width = $code_length*$SizeFactor;
			$img_height = $size;
		} else {
			$img_width = $size;
			$img_height = $code_length*$SizeFactor;
		}

		$image = imagecreate($img_width, $img_height + $text_height);
		$black = imagecolorallocate ($image, 0, 0, 0);
		$white = imagecolorallocate ($image, 255, 255, 255);

		imagefill( $image, 0, 0, $white );
		if ( $print ) {
			imagestring($image, 5, 90, $img_height, $text, $black );
		}

		$location = 10;
		for ( $position = 1 ; $position <= strlen($code_string); $position++ ) {
			$cur_size = $location + ( substr($code_string, ($position-1), 1) );
			if ( strtolower($orientation) == "horizontal" )
				imagefilledrectangle( $image, $location*$SizeFactor, 0, $cur_size*$SizeFactor, $img_height, ($position % 2 == 0 ? $white : $black) );
			else
				imagefilledrectangle( $image, 0, $location*$SizeFactor, $img_width, $cur_size*$SizeFactor, ($position % 2 == 0 ? $white : $black) );
			$location = $cur_size;
		}
		
		// Draw barcode to the screen or save in a file
		if ( $filepath=="" ) {
			header ('Content-type: image/png');
			imagepng($image);
			imagedestroy($image);
		} else {
			imagepng($image,$filepath);
			imagedestroy($image);		
		}
	}
	function actsolicconanterior($idsolicitud){
		$actsol=array(
				'tipo'	=> 'Recurrente Sin Saldo'
			);
		$this->solicitud_prestamo->actualizarsolic($actsol, $idsolicitud);
		redirect(base_url().'index.php/pagos/formdesembolso/'.$idsolicitud);
	}
	function deudatotal($iddesembolso){//deuda total de cuotas incluido mora
		$registro = $this->operaciones_model->vistasolicitdesembolsadosid($iddesembolso);
		$costomora = $this->operaciones_model->costomora($registro['monto']);	
		$totaldeudacuotas=($registro['total']-$registro['totalpagado']);
		$totaldiasdemoradeuda=$registro['moradias']-(is_null($registro['pagomora']) ? 0 : $registro['pagomora']);
		$totaldiasdemoradeuda+=$this->calculardiasatrasados($registro);
		$totaldeudamora=$totaldiasdemoradeuda*$costomora;
		$totaldeuda = $totaldeudacuotas + $totaldeudamora;
		return $totaldeuda;
	}
	/* -----MORA---- */
	function calcularmora($fechainicial, $fechafinal){//calcula la mora entre fechas excluyendo los feriados, no cuenta los feriados
		//diario
		$fechafinal = strtotime ($fechafinal);
		$fechafinal = date('Y-m-d',$fechafinal);
		$mora=0;
		$fecha = strtotime($fechainicial);
		$fecha = date('Y-m-d',$fecha);
		while($fecha<$fechafinal){
			$fecha = strtotime('+1 day', strtotime ($fecha));
			$fecha = date('Y-m-d',$fecha);
			while($this->general_model->existediaferiado($fecha)==true){
				$fecha = strtotime('+1 day', strtotime ($fecha));
				$fecha = date('Y-m-d',$fecha);
			}
			$mora++;
		}
		return $mora;
	}
	function calcularmorasinferiados($fechainicial, $fechafinal){//calcula la mora entre fechas incluyendo los feriados
		//semanal
		$fechafinal = strtotime ($fechafinal);
		$fechafinal = date('Y-m-d',$fechafinal);
		$mora=0;
		$fecha = strtotime($fechainicial);
		$fecha = date('Y-m-d',$fecha);
		while($fecha<$fechafinal){
			$fecha = strtotime('+1 day', strtotime ($fecha));
			$fecha = date('Y-m-d',$fecha);
			$mora++;
		}
		return $mora;
	}
	function calculardiasatrasados($registro){//por desembolso de la ultima cuota
		//$fechadondesequedo es la fecha programada del registro de cuota que falta pagar
		//$ultimafechapago es la ultima fecha del registro de cuotas que pago completo
		$unidplazo=$registro['unidplazo'];
		$fechaultimacuota = $registro['ultimafechadecuota'];
		$fechadondesequedo = $registro['fechacuotadebe'];
		if(is_null($fechadondesequedo)){//si ya pago todas las cuotas es decir el credido tiene el estado finalizado
			return 0;
		}
		if($unidplazo=='Dias'){
			if(date('Y-m-d')>$fechaultimacuota){//si se vencio todo el credito y no cancelo el credito
				$fdiadespuescronograma = substr($fechaultimacuota, 1,10); // fecha calculada un dia despues del cronograma
				$fdiadespuescronograma = strtotime ( '+1 day' , strtotime ( $fdiadespuescronograma ) ) ;
				$fdiadespuescronograma = date ( 'Y-m-j' , $fdiadespuescronograma );	

				$moravencido=$this->calcularmorasinferiados($fdiadespuescronograma, date('Y-m-d'));//dias atraso despues del credito
				$diasatrasados =$this->calcularmora($fechadondesequedo, $fdiadespuescronograma);//dias dentro del calendario
				$diasatrasados+=$moravencido;
			}else{
				$diasatrasados=$this->calcularmora($fechadondesequedo, date('Y-m-d'));
			}
		}else{
			$diasatrasados=$this->calcularmorasinferiados($fechadondesequedo, date('Y-m-d'));
		}
		return $diasatrasados;
	}
	function formcalcularmora(){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['footer']='principal/footer';
		$data['content']='pagos/form_calcularmora';
		$this->load->view('index',$data);
	}
	function obtenermora_dform(){
		$fechainicio = $this->input->post('fechainicio');
		$fechafinal = $this->input->post('fechafinal');
		$tipoplazo = $this->input->post('tipoplazo');
		$resultado=0;
		if($tipoplazo =='DIARIO'){
			$resultado=$this->calcularmora($fechainicio, $fechafinal);
		}else{
			$resultado=$this->calcularmorasinferiados($fechainicio, $fechafinal);
		}
		echo $resultado.' dia(s)';
	}
	/* !----MORA --------*/
	function round_up($value, $precision){ //REDONDEAR HACIA ARRIBA
	    $pow = pow ( 10, $precision ); 
	    return ( ceil ( $pow * $value ) + ceil ( $pow * $value - ceil ( $pow * $value ) ) ) / $pow; 
	}
	function finalizarpagosolicitud($iddesembolso, $fechareg, $idusuario){
		$saldo = $this->operaciones_model->saldototal($iddesembolso);
		$vistapagosnull = $this->operaciones_model->vistapagosnull($iddesembolso);
		//evaluar saldos
		$acumulado=0;
		foreach($vistapagosnull as $row){
			$datanuevopago = array(
				'iddesembolso' => $row['iddesembolso'],
				'nrocuota'	   => $row['nrocuota'],
				'fecha_reg'	   => $fechareg,
				'codusuario'   => $idusuario,
				'moradias'	   => 0,
				'montopagado'  => $row['cuota']
				 );			
			if(!is_null($row['montopagado'])){
				$acumulado=$acumulado+($row['cuota']-$row['montopagado']);
				$dataact=array(
						'fecha_reg'	=> $fechareg,
						'moradias'	   => 0,
						'montopagado'  => $row['cuota']						
					);
				$this->operaciones_model->actualizarmontopago($iddesembolso, $row['nrocuota'], $dataact);
			}else{
				$acumulado=$acumulado+$row['cuota'];
				$this->operaciones_model->registrarpagos($datanuevopago);
			}
		}
		$solicitud = $this->operaciones_model->obtenersolicitud($iddesembolso);
		$datas=array(
				'estado'  => 'FINALIZADO'
			);
		$this->solicitud_prestamo->actualizarsolic($datas, $solicitud['idsolicitud']);
		if($this->solicitud_prestamo->poseesolicitudvigente($solicitud['codcliente'])==false){//no tiene solicitudes vigentes o aprobadas
			$this->cliente_model->cambiarestadocliente('INACTIVO', $solicitud['codcliente']);
		}
		$maxcodigopagocuotas = $this->operaciones_model->maxcodigopagocuotas($iddesembolso);
		$datakardex=array(
				'id'				=> $maxcodigopagocuotas+1,
				'iddesembolso'		=> $iddesembolso,
				'fecha_hora_reg'	=> $fechareg,
				'montopagado'		=> $acumulado,
				'idusuario'			=> $idusuario
			);
		$this->operaciones_model->regpagocuotas($datakardex);
	}
	function generarcalendariopagos($total, $plazo, $fecha_hora, $iddesembolso, $unidplazo){
		$fecha = substr($fecha_hora, 1,10);
		switch ($unidplazo) {
			case 'Dias':
				$fecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
				$fecha = date ( 'Y-m-j' , $fecha );
				break;
			case 'Semanas':
				$fecha = strtotime ( '+7 day' , strtotime ( $fecha ) ) ;
				$fecha = date ( 'Y-m-j' , $fecha );					
				break;
			case 'Quincenas':
				$fecha = strtotime ( '+14 day' , strtotime ( $fecha ) ) ;
				$fecha = date ( 'Y-m-j' , $fecha );					
				break;
			case 'Mes':
				$fecha = strtotime ( '+30 day' , strtotime ( $fecha ) ) ;
				$fecha = date ( 'Y-m-j' , $fecha );					
				break;
		}
		$cuota=$total/$plazo;
		$cuota = $this->round_up($cuota,1);
		$saldo = $total;
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		for($i = 1; $i<=$plazo; $i++){
			$saldo = $saldo-$cuota;
			while($this->general_model->existediaferiado($fecha)==true && $unidplazo=='Dias'){
				$fecha = strtotime( '+1 day' , strtotime($fecha)) ;
				$fecha = date ( 'Y-m-d' , $fecha );						
			}
			$data2 = array(
				'iddesembolso' => $iddesembolso,
				'nrocuota'	   => $i,
				'fecha_prog'   => $fecha,
				'nombredia'	   => $dias[date("w", strtotime($fecha))],
				'cuota'		   => ($saldo<0) ? $cuota + $saldo : $cuota,
				'saldo'	       => ($saldo<0) ? 0 : $saldo
				);
			$regcuotapago=$this->solicitud_prestamo->registrarcuotapago($data2);
			switch ($unidplazo) {
				case 'Dias':
					$fecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
					$fecha = date ( 'Y-m-j' , $fecha );
					break;
				case 'Semanas':
					$fecha = strtotime ( '+7 day' , strtotime ( $fecha ) ) ;
					$fecha = date ( 'Y-m-j' , $fecha );					
					break;
				case 'Quincenas':
					$fecha = strtotime ( '+14 day' , strtotime ( $fecha ) ) ;
					$fecha = date ( 'Y-m-j' , $fecha );					
					break;
				case 'Mes':
					$fecha = strtotime ( '+30 day' , strtotime ( $fecha ) ) ;
					$fecha = date ( 'Y-m-j' , $fecha );					
					break;
			}
	 	}
	}
	function regdesembolso(){//operaciones
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$fecha_hora=$this->input->post('fecha_des');
			$idsolicitud=$this->input->post('idsolicitud_des');
			$cliente_des=$this->input->post('cliente_des');
			$codigo = substr(date('D'),0,2).substr($idsolicitud,0,6);
			$monto=$this->input->post('monto_des');
			$interes=$this->input->post('interes_des');
			$plazo=$this->input->post('plazo_des');
			$unidplazo=$this->input->post('unidplazo_des');
			$direccion_dom=$this->input->post('domicilio_direc');
			$direccion_neg=$this->input->post('direc_negocio');
			$tiposolicitud=$this->input->post('tiposolicitud');
			$totalapagardeuda=$this->input->post('totalapagardeuda');
			if($tiposolicitud=='Recurrente Con Saldo' && $totalapagardeuda>0){
				echo "<script type='text/javascript'> alert('Debe cancelar su deuda anterior'); ";
				echo " location.href='".base_url()."index.php/pagos/formdesembolso/".$idsolicitud."'; </script>";
				return false;	
			}else{
				$total=$this->input->post('total_des');
				$totaldescaja=$this->input->post('totaldescaja');
				$total = (float)str_replace(',', '', $total);
				$costomora=$this->operaciones_model->costomora($monto);
				$data = array(
					'iddesembolso'	=> $codigo,
					'fecha_hora' 	=> $fecha_hora,
					'idsolicitud'	=> $idsolicitud,
					'monto'			=> $monto,
					'interes'		=> $interes,
					'plazo'			=> $plazo,
					'unidplazo'		=> $unidplazo,
					'direccion_dom'	=> $direccion_dom,
					'direccion_neg'	=> $direccion_neg,
					'total'			=> $total,
					'costomora'		=> $costomora
					 );	
				$regdesembolso = $this->solicitud_prestamo->registrardesembolso($data);	
				if($regdesembolso==true){
					$this->generarcalendariopagos($total, $plazo, $fecha_hora, $codigo, $unidplazo);
					redirect(base_url().'index.php/solicitud/reportecobranza/'.$codigo.'/'.$totaldescaja);
				}else{
					echo 'NO SE PUDO REGISTRAR EL desembolso';
				}			
			}
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session el Usuario de Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}			
	}
	function desembolsar(){//solo usuario cobranza{
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$fecha_hora=$this->input->post('fecha_des');
			$idsolicitud=$this->input->post('idsolicitud_des');
			$cliente_des=$this->input->post('cliente_des');
			$codigo = substr(date('D'),0,2).substr($idsolicitud,0,6);
			$monto=$this->input->post('monto_des');//monto del desembolso
			$interes=$this->input->post('interes_des');
			$plazo=$this->input->post('plazo_des');
			$unidplazo=$this->input->post('unidplazo_des');
			$direccion_dom=$this->input->post('domicilio_direc');
			$direccion_neg=$this->input->post('direc_negocio');
			$tiposolicitud=$this->input->post('tiposolicitud');
			$totalapagardeuda=$this->input->post('totalapagardeuda');
			$idasesordes=$this->input->post('idasesordes');
			$poliza=$this->input->post('poliza');
			if($tiposolicitud=='Recurrente Con Saldo' && $totalapagardeuda>0){
				echo "<script type='text/javascript'> alert('Debe cancelar su deuda anterior'); ";
				echo " location.href='".base_url()."index.php/pagos/formdesembolso/".$idsolicitud."'; </script>";
				return false;	
			}else{
				$saldocaja = $this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
				$total=$this->input->post('total_des');
				if($saldocaja<=$total){
					echo "<script type='text/javascript'> alert('EL SALDO EN CAJA NO ALCANZA'); ";
					echo " location.href='".base_url()."index.php/pagos/formdesembolso/".$idsolicitud."'; </script>";
					return false;
				}
				$totaldescaja=$this->input->post('totaldescaja');//total a registrar en caja
				$total = (float)str_replace(',', '', $total);
				$costomora=$this->operaciones_model->costomora($monto);
				$data = array(
					'iddesembolso'	=> $codigo,
					'fecha_hora' 	=> $fecha_hora,
					'idsolicitud'	=> $idsolicitud,
					'monto'			=> $monto,
					'interes'		=> $interes,
					'plazo'			=> $plazo,
					'unidplazo'		=> $unidplazo,
					'direccion_dom'	=> $direccion_dom,
					'direccion_neg'	=> $direccion_neg,
					'total'			=> $total,
					'costomora'		=> $costomora
					 );	
				$regdesembolso = $this->solicitud_prestamo->registrardesembolso($data);
				if($regdesembolso==true){
					//registrar en caja
					$saldo=$saldocaja-$totaldescaja;
					$idreg=$this->caja_model->maximocod();
				 	$datacaja=array(
				 			'idreg'			=> $idreg+1,
				 			'fecha_hora' 	=> date('Y-m-d H:i:s'),
				 			'codusuario'	=> $this->session->userdata('idusuario'),
				 			'agencia'		=> $this->session->userdata('agencia'),
				 			'cantidad'		=> $totaldescaja,
				 			'tipo'			=> 'SALIDA',
				 			'saldo'			=> $saldo,
				 			'descripcion'	=> 'DESEMBOLSO ID : '.$codigo.', ID SOLIC : '.$idsolicitud.', CLIENTE : '.$cliente_des.' ASESOR : '.$idasesordes
				 		);
				 	$saldo += $poliza;
					 	$datacaja2=array(
				 			'idreg'			=> $idreg+2,
				 			'fecha_hora' 	=> date('Y-m-d H:i:s'),
				 			'codusuario'	=> $this->session->userdata('idusuario'),
				 			'agencia'		=> $this->session->userdata('agencia'),
				 			'cantidad'		=> $poliza,
				 			'tipo'			=> 'INGRESO',
				 			'saldo'			=> $saldo,
				 			'descripcion'	=> 'SEGURO DESGRAVAMEN DESEMBOLSO ID : '.$codigo.', CLIENTE : '.$cliente_des.' ASESOR : '.$idasesordes				 		
					 	);
				 	$regcaja = $this->caja_model->registrarcaja($datacaja);
				 	$regcaja2 = $this->caja_model->registrarcaja($datacaja2);
					$this->generarcalendariopagos($total, $plazo, $fecha_hora, $codigo, $unidplazo);
					redirect(base_url().'index.php/solicitud/reportecobranza/'.$codigo.'/'.$totaldescaja);

				}else{
					echo 'NO SE PUDO REGISTRAR EL desembolso';
				}			
			}
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session el Usuario de Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function formpagasesor(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['asesores']=$this->usuario_model->listaasesoresxagencia($this->session->userdata('agencia'));
			$data['footer']='principal/footer';		
			$data['content']='pagos/pagoasesor';
			$data['pagoasesor']=$this->operaciones_model->asesorsaldoagencia($this->session->userdata('agencia'));//lista
			$data['ingresocajaasesor']=$this->caja_model->ingcajaasesoresagencia($this->session->userdata('agencia'));	
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session el Usuario de Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";					
		}
	}
	function grdsaldoasesor(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$idasesor = $this->input->post('idasesor');
			$montoasesor = $this->input->post('montoasesor');
			$codigocaja = $this->caja_model->maximocod()+1;
			$saldo = $this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
			$saldoasesor = $this->caja_model->saldoasesor($idasesor, 'CREDITO');
			$datacaja=array(
				'idreg'			=> $codigocaja,
				'fecha_hora'	=> date('Y-m-d H:i:s'),
				'codusuario'	=> $this->session->userdata('idusuario'),
				'agencia'		=> $this->session->userdata('agencia'),
				'cantidad'		=> $montoasesor,
				'tipo'			=> 'INGRESO',
				'saldo'			=> $saldo+$montoasesor,
				'descripcion'	=> 'PAGO CUOTAS ASESOR ID: '.$idasesor
				);
			$result = $this->caja_model->registrarcaja($datacaja);
			if($result==true){
				$datapa=array(
					'idcaja' 	=> $codigocaja,
					'codusuario'=> $idasesor,
					'cantidad'	=> $montoasesor,
					'tipo'		=> 'INGRESO',
					'saldo'		=> $saldoasesor+$montoasesor,
					'fecha_hora'=> date('Y-m-d H:i:s'),
					'estado'	=> 'ENVIADO',
					'tipo_pagos'=> 'CREDITO'
				);
				$this->caja_model->regpagoasesorc($datapa);
				echo "<script type='text/javascript'> alert('Se registro con exito'); ";
				echo " location.href='".base_url()."index.php/pagos/formpagasesor'; </script>";					
			}else{
				echo "<script type='text/javascript'> alert('NO SE PUDO GUARDAR CONSULTE A SU SOPORTE'); ";
				echo " location.href='".base_url()."index.php'; </script>";				
			}
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session el Usuario de Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";			
		}
	}
	function cobranzaasesor(){
		if(is_null($this->session->userdata('idusuario')) || $this->session->userdata('tipouser')!=2){
			echo "<script type='text/javascript'> alert('Debe iniciar session el Asesor Financiero'); ";
			echo " location.href='".base_url()."index.php'; </script>";
			return false;
		}
		$usuario =$this->session->userdata('idusuario');
		$saldoasesorhoy=$this->caja_model->ingresosaldoasesorfech($usuario, date('Y-m-d'), 'CREDITO');
		$pagohoycredito=$this->caja_model->pagohoy($usuario, date('Y-m-d'), 'CREDITO');//si el asesor pago algun credito
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['footer']='principal/footer';
		if(is_null($saldoasesorhoy)){
			$data['content']='principal/pagerror';
			$data['mensaje']='NO TIENE REGISTROS DE SALDO HOY';
		}elseif($saldoasesorhoy['saldo']==0){
			$data['content']='principal/pagerror';
			$data['mensaje']='SU SALDO ES CERO '.$saldoasesorhoy['idcaja'];
		}elseif($pagohoycredito>0){
			$data['content']='principal/pagerror';
			$data['mensaje']='YA REALIZO PAGOS, codcaja: '.$saldoasesorhoy['idcaja'];
		}else{
			$data['registropagoasesorc']=$saldoasesorhoy;
			$data['content']='pagos/cobranzaasesor';
			$solicitudes=$this->operaciones_model->vistasolicitdesemboase($this->session->userdata('idusuario'));
			$miarreglo=null;
			foreach($solicitudes as $row){
				$pagohoy=$this->operaciones_model->pagohoy($row['iddesembolso'], $this->session->userdata('idusuario'));
				$row['pagohoy']=$pagohoy==false ? 'NO' : $pagohoy;//SI SE PAGO HOY ALGUNA CUOTA
				$row['diasatrasados']=$this->calculardiasatrasados($row);
				// $row['diasatrasados']=0;
				$row['moraactual']=$this->calcularmoraactual($row, $row['diasatrasados']);
				$row['moradias']+=$row['moraactual'];
				$miarreglo[]=$row;
			}
			$data['solicitudes']=is_null($miarreglo) ? $solicitudes : $miarreglo;
			$data['saldo']=$this->caja_model->saldoasesor($this->session->userdata('idusuario'), 'CREDITO');
		}
		$this->load->view('index',$data);
	}
	function confirmarpagoasesor($idpagoasesor){
		$data = array('estado' => 'ACEPTADO');
		$result = $this->caja_model->actualizarsaldoasesor($idpagoasesor, $data);
		redirect(base_url().'index.php/pagos/cobranzaasesor');
	}
	function posiciondetallepdf($idsolicitud){
		$solicitud= $this->solicitud_prestamo->obtenersolicitud2($idsolicitud);			
		$desembolso = $this->solicitud_prestamo->obtenerdesembolsosol($idsolicitud);
		$data['desembolso']=$desembolso;
		$data['kardex']=$this->operaciones_model->obtenerpagocuotasdesem($desembolso['iddesembolso']);
		$data['solicitud'] = $solicitud;
		$data['cliente']=$this->cliente_model->obtener_cliente($solicitud['codcliente']);
		$this->load->view('reportes/kardex', $data);
		// $html= $this->load->view('reportes/kardex', $data, true);		
		// $this->pdf->load_html($html);
		// $this->pdf->set_paper('A4','portrait');
		// $this->pdf->render();
		// $this->pdf->stream("repcobranza.pdf", array("Attachment" => false));
	}
	function plandepagosopdf($idsolicitud){
		$desembolso = $this->solicitud_prestamo->obtenerdesembolsosol2($idsolicitud);
		if(!is_null($desembolso)){
			$data['desembolso']=$desembolso;
			$cuotaspago=$this->operaciones_model->vistacuotaspago($desembolso['iddesembolso']);
			$data['cuotaspago'] = $this->obtenercuotasconmora($cuotaspago, $desembolso['unidplazo']);
			$data['totalpagado']=$this->operaciones_model->totalpagado($desembolso['iddesembolso']);
			$data['diasatrasadosc']=$this->calculardiasatrasados($desembolso);
			$data['moraactual']=$this->calcularmoraactual($desembolso, $data['diasatrasadosc']);
			// $html= $this->load->view('reportes/planpagospdf', $data, true);
			// $this->pdf->load_html($html);
			// $this->pdf->set_paper('A4','portrait');
			// $this->pdf->render();
			// $this->pdf->stream("repcobranza.pdf", array("Attachment" => false));			
			$this->load->view('reportes/planpagospdf', $data);
		}else{
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';
			$data['content']='principal/pagerror';
			$data['mensaje']='NO HA SIDO DESEMBOLSADO';
			$this->load->view('index',$data);
		}
	}
	function registrarkardexpagoscuotas($desembolso, $monto, $fechahorareg, $diasatrasados){
		$iddesembolso = $desembolso['iddesembolso'];
		$idsolicitud = $desembolso['idsolicitud'];
		$codcliente = $desembolso['codcliente'];
		if($this->session->userdata('idusuario')){	
			$montototal=$monto;
			$idusuario=$this->session->userdata('idusuario');
			$nrocuotas=0;
			$aux=0;
			$listacuotapago=$this->operaciones_model->vistapagosnull($iddesembolso);//cuotaspago que no pagaron o el monto es menor a la cuota
			foreach($listacuotapago as $row){
				if(!is_null($row['montopagado']) && $row['montopagado']<$row['cuota']){//si tenia deudas de cuotas arrastrado y no es exacto
					$diferencia = $row['cuota']-$row['montopagado'];
					if($monto>=$diferencia){//si cubre lo faltante para la cuota
						$montopagado=$row['cuota'];//variable para actualizar el pago en el registro
						$monto=$monto-$diferencia;
						$mora = $diasatrasados;
					}else{//si no cubre lo faltante para la mora
						$montopagado=$monto+$row['montopagado'];//variable para actualizar el pago en el registro
						$monto=0;
						$mora=0;
					}
					$data2=array(
							'montopagado'	=>$montopagado,
							'fecha_reg'		=>$fechahorareg,
							'moradias'		=>$mora,
							'codusuario'	=>$idusuario
						);
					$act=$this->operaciones_model->actualizarmontopago($iddesembolso, $row['nrocuota'], $data2);
					$aux=1;//PARA VER QUE SE REGISTRO LA MORA (SE REGISTRO LA MORA)
					$nrocuotas++;
				}else{
					if($monto<$row['cuota']){
						$montopagado=$monto;
						$monto=0;
						$mora=0;
						$aux=1;
					}else{
						$montopagado=$row['cuota'];
						$monto=$monto-$row['cuota'];
						$mora = $diasatrasados;
					}
					if($aux==0){
						$aux=1;//PARA VER QUE SE REGISTRO LA MORA
					}else{
						$mora=0;
					}
					$data=array(
							'iddesembolso'	=> $iddesembolso,
							'nrocuota'		=> $row['nrocuota'],
							'fecha_reg'		=> $fechahorareg,
							'codusuario'	=> $idusuario,
							'moradias'		=> $mora,
							'montopagado'	=> $montopagado
						);
					$this->operaciones_model->registrarpagos($data);
					$nrocuotas++;
				}
				if($monto<=0){
					break;
				}
			}
			//kardex
			$codigocp = $this->operaciones_model->maxcodigopagocuotas($iddesembolso);			
			$datapagoc = array(
				'id'				=> $codigocp+1,
				'iddesembolso' 		=> $iddesembolso,
				'fecha_hora_reg'	=> $fechahorareg,
				'montopagado'		=> $montototal,
				'idusuario'			=> $idusuario
			 );
			$this->operaciones_model->regpagocuotas($datapagoc);
			if($this->operaciones_model->saldototal($iddesembolso)<=0){
				$datas=array(
						'estado'  => 'FINALIZADO'
					);
				$this->solicitud_prestamo->actualizarsolic($datas, $idsolicitud);
				$this->actualizarestadocliente($codcliente);
			}
			return $nrocuotas;
		}
		return 0;
	}
	function actualizarestadocliente($codcliente){
		if($this->solicitud_prestamo->poseesolicitudvigente($codcliente)==false){//no tiene solicitudes vigentes o aprobadas
			$this->cliente_model->cambiarestadocliente('INACTIVO', $codcliente);
		}
	}
	function montototalporcantcuotas(){
		$nrocuotas = $this->input->post('nrocuotas');
		$iddesembolso= $this->input->post('iddesembolso');
		$nrocuotamenor= $this->input->post('nrocuotamenor');
		$result=$this->operaciones_model->totaldeudaporcantcuotas($iddesembolso, $nrocuotas, $nrocuotamenor);
		echo is_null($result) ? 0 : $result;
	}
	function cancelardeudasrcs($idsolicitud){//cancelar deudas recurrente con saldo incluidos mora
		$solpagar=$this->operaciones_model->vistalistacreditoscancelar($idsolicitud);
		$fecha_reg=date('Y-m-d H:i:s');
		$arreglo=null;
		$miarreglo=null;
		foreach($solpagar as $row){
			//$diasatrasados=$this->calculardiasatrasados($row);
			$diasatrasados=0;
			//$row['diasmora']+=$diasatrasados;//total dias de mora
			$row['mora']=($row['diasmora']-$row['pagomora'])*$row['costomora'];
			$descripcion='';
			if($row['saldo']>0){
				$arreglo = array(
					'iddesembolso' => $row['iddesembolso'],
					'idsolicitud' => $row['idsolicitudreg'],
					'codcliente' => $row['codcliente']
				);
				$nrocuotas = $this->registrarkardexpagoscuotas($arreglo, $row['saldo'], $fecha_reg, $diasatrasados);
				$descripcion.='Pago de '.$nrocuotas.' cuota(s) idsolicitud : '.$row['idsolicitudreg'].' por un monto de S/.'.number_format($row['saldo'],2);
			}
			if($row['mora']>0){
				$descripcion.= ($descripcion=='') ? '' : ', ';
				$montomora=$row['mora'];
				$diasmora=$row['diasmora']-$row['pagomora'];
				$datamora=array(
					'iddesembolso' 	=> $row['iddesembolso'],
					'diasmora' 		=> $diasmora,
					'total'			=> $montomora,
					'fechahora_reg'	=> $fecha_reg,
					'estado'		=> 'SI') ;
				$this->operaciones_model->registrarpagomora($datamora);
				$descripcion .= 'TOTAL DE MORA S/.'.number_format($montomora,2);
			}
			$descripcion .= ', CLIENTE: '.$row['apenom'];
			$this->operaciones_model->pagarcreddeuda($idsolicitud, $row['iddesembolso'], $row['saldo']+$row['mora']);
			$total=$row['saldo']+$row['mora'];
			$fila=array(
				'total' 		=> $total,
				'descripcion'	=> $descripcion,
				'fecha_reg'		=> $fecha_reg,
				'iddesembolso'  => $row['iddesembolso'],
				'idsolicitud'	=> $row['idsolicitudreg']
			);
			$miarreglo[]=$fila;
		}
		if($this->session->userdata('tipouser')==3){
			$this->formpagocuotascajarcs($miarreglo);
		}else{
			$idreg=$this->caja_model->maximocod();
			$saldo=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
			$data=array(
					'idreg'			=> $idreg+1,
					'fecha_hora'	=> $fecha_reg,
					'codusuario'	=> $this->session->userdata('idusuario'),
					'agencia'		=> $this->session->userdata('agencia'),
					'cantidad'		=> $total,
					'tipo'			=> 'INGRESO',
					'saldo'			=> $saldo+$total,
					'descripcion'	=> $descripcion
				);
			$regcaja=$this->caja_model->registrarcaja($data);
			if($regcaja==true){
				$this->pagorealizado($total, $descripcion, $fecha_reg, $row['iddesembolso']);
			}else{
				echo 'NO SE REGISTRO CORRECTAMENTE CONSULTE A SOPORTE';			
			}
		}
	}
	function formpagocuotascaja($monto, $concepto, $fecha, $iddesembolso){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['regkardex']=$this->operaciones_model->vistakardexpagosiddesembolso2($iddesembolso);
			$data['footer']='principal/footer4';	
			$data['content']='caja/formpagocuotasm';
			$data['monto']=$monto;
			$data['concepto']=$concepto;
			$data['fecha']=$fecha;
			$data['desembolso']=$this->operaciones_model->pagodesembolso($iddesembolso);
			$this->load->view('index',$data);			
		}else{
			echo "<script type='text/javascript'> alert('Solo el Usuario de Operaciones tiene Acceso'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}
	}
	function pagorealizado($monto, $concepto, $fecha, $iddesembolso){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['regkardex']=$this->operaciones_model->vistakardexpagosiddesembolso2($iddesembolso);
			$data['footer']='principal/footer4';	
			$data['content']='pagos/pagorealizado';
			$data['monto']=$monto;
			$data['concepto']=$concepto;
			$data['fecha']=$fecha;
			$data['desembolso']=$this->operaciones_model->pagodesembolso($iddesembolso);
			$this->load->view('index',$data);			
		}else{
			echo "<script type='text/javascript'> alert('Solo el Usuario de Operaciones tiene Acceso'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}
	}	
	function formpagocuotascajarcs($array){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['lista']=$array;
			$data['footer']='principal/footer4';	
			$data['content']='caja/formpagocuotasrcs';
			$this->load->view('index',$data);			
		}else{
			echo "<script type='text/javascript'> alert('Solo el Usuario de Operaciones tiene Acceso'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}
	}
	function vaucher($iddesembolso, $codkardex){//solo pago de plan de pagos
		$data['kardex']=$this->operaciones_model->obtenerkardexvista($iddesembolso, $codkardex);
		$data['ultimacuotapagado']=$this->operaciones_model->ultimacuotapagadacompleto($iddesembolso);
		$data['registrohoypagomora']=$this->operaciones_model->registrohoypagomora($iddesembolso);
		$data['solicitud']=$this->operaciones_model->vistasolicitdesembolsadosid($iddesembolso);		
		$this->load->view('pagos/vaucherpago',$data);	
	}
	function realizapago2(){//COBRANZA ASESOR
		$pagos=$this->input->post('pago');
		$idusuario=$this->session->userdata('idusuario');		
		$saldoasesor = $this->input->post('saldoasesor2');
		if(isset($pagos) && $this->caja_model->pagohoy($idusuario, date('Y-m-d'), 'CREDITO')==0){
			$totalpagado=$this->input->post('totalapagar');
			if($saldoasesor>=$totalpagado){
				$fecha_reg=date('Y-m-d h:i:s');
				$saldoasesor = $this->input->post('saldoasesor2');
				$codcaja = $this->caja_model->codcajasaldoasesor($idusuario);
				$nrocreditos=0;
				$ahora = date('Y-m-d H:i:s');
				foreach($pagos as $row){
					if(isset($row['monto']) && $row['monto']!='' && $row['monto']!=0 && $row['monto']<=$row['saldo']){
						$nrocuotas = $this->registrarkardexpagoscuotas($row, $row['monto'], $fecha_reg, $row['moraactual']);
						$datapa=array(
							'idcaja' 	=> $codcaja,
							'codusuario'=> $idusuario,
							'cantidad'	=> $row['monto'],
							'tipo'		=> 'SALIDA',
							'saldo'		=> $saldoasesor-($row['monto']),
							'fecha_hora'=> $ahora
						);
						$result = $this->caja_model->regpagoasesorc($datapa);
						if($result==true){
							$nrocreditos++;
						}	
						$saldoasesor-=$row['monto'];					
					}
				}
				$data=$this->retornarheader($this->session->userdata('tipouser'));
				$data['nrocuotaspag']=$nrocreditos;
				$data['footer']='principal/footer';	
				$data['content']='pagos/pagohecho';
				$this->load->view('index',$data);				
			}else{
				echo "<script type='text/javascript'> alert('EL ASESOR NO TIENE SALDO SUFICIENTE'); ";
				echo " location.href='".base_url()."index.php/pagos/cobranzaasesor'; </script>";
			}
		}else{
			echo "<script type='text/javascript'> alert('NO REALIZO NINGUN PAGO'); ";
			echo " location.href='".base_url()."index.php/pagos/cobranzaasesor'; </script>";
		}
	}
	function actualizarsaldos(){
		$saldoasesor=$this->input->post('saldoasesor');
		foreach($saldoasesor as $row) {
			$data = array('saldo' => $row['saldo'] );
			$this->operaciones_model->actualizarsaldoasesor2($row['id'], 'CREDITO', $data);
		}
		redirect(base_url().'index.php/pagos/formpagasesor');
	}
	function eliminardesembolso($iddesembolso, $idsolicitud){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$result = $this->operaciones_model->eliminardesembolso($iddesembolso);
			if($result==true){
				if($this->caja_model->existeregdesembolso($iddesembolso)==true){
					$registrocd=$this->caja_model->obtenerregpordesembolso($iddesembolso);
					$idreg=$this->caja_model->maximocod()+1;
					$datacaja=array(
							'idreg'			=> $idreg,
							'fecha_hora'	=> date('Y-m-d H:i:s'),
							'codusuario'	=> $this->session->userdata('idusuario'),
							'agencia'		=> $this->session->userdata('agencia'),
							'cantidad'		=> $registrocd['cantidad'],
							'tipo'			=> 'INGRESO',
							'saldo'			=>  $this->caja_model->obtenersaldo()+$registrocd['cantidad'],
							'descripcion'	=> 'REEMBOLSO ID DESEMBOLSO:'.$iddesembolso.' ELIMINADO'
						);
					$this->caja_model->registrarcaja($datacaja);
				}
				echo "<script type='text/javascript'> alert('ELIMINADO CORRECTAMENTE'); ";
				echo " location.href='".base_url()."index.php/pagos/formdesembolso/".$idsolicitud."'; </script>";		
			}else{
				echo "<script type='text/javascript'> alert('NO SE PUDO ELIMINAR CONSULTE A SU SOPORTE'); ";
				echo " location.href='".base_url()."index.php'; </script>";	
			}
		}
	}
	function existedesembolsocaja($iddesembolso){
		if($this->caja_model->existeregdesembolso($iddesembolso)==true){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function formeliminarpagos($iddesembolso){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';	
			$data['content']='pagos/formeliminarpagos';
			$data['desembolso']=$this->operaciones_model->vistasolicitdesembolsadosid($iddesembolso);
			$data['kardex']=$this->operaciones_model->vistakardexpagosiddesembolso($iddesembolso);
			$data['listapagomora']=$this->operaciones_model->listapagomora($iddesembolso);
			$this->load->view('index',$data);			
		}else{
			echo "<script type='text/javascript'> alert('Solo el Usuario de Operaciones tiene Acceso'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}
	}
	function eliminarpagomora($idpagomora, $iddesembolso){
		$result = $this->operaciones_model->eliminarpagomora($idpagomora);
		if($result==true){
			echo "<script type='text/javascript'> ";
			echo " location.href='".base_url()."index.php/pagos/formeliminarpagos/".$iddesembolso."'; </script>";	
		}else{
			echo 'no se pudo eliminar';
		}
	}
	function eliminarpagokardex($iddesembolso, $idkardex){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$registro=$this->operaciones_model->obtenerkardex($iddesembolso, $idkardex);
			$result=$this->operaciones_model->eliminarpagokardex($iddesembolso, $idkardex);
			if($result==true){
				$resultado = $this->eliminarpagos($iddesembolso, $registro['montopagado']);
				redirect(base_url().'index.php/pagos/formeliminarpagos/'.$iddesembolso);				
			}else{
				echo "<script type='text/javascript'> alert('NO SE ELIMINO NINGUN REGISTRO'); ";
				echo " location.href='".base_url()."index.php/pagos/formeliminarpagos/".$iddesembolso."'; </script>";				
			}	
		}else{
			echo "<script type='text/javascript'> alert('Solo el Usuario de Operaciones tiene Acceso'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}		
	}
	function eliminarpagos($iddesembolso, $monto){
		$pagos = $this->operaciones_model->pagosdescendentes($iddesembolso);
		$contador=$monto;
		foreach($pagos as $row){
			if($row['montopagado']<=$contador){
				$contador=$contador-$row['montopagado'];
				$this->operaciones_model->eliminarpago($iddesembolso, $row['nrocuota']);
			}else{
				$montopagado=$row['montopagado']-$contador;
				$contador=0;
				$this->operaciones_model->actualizarmontopago($iddesembolso, $row['nrocuota'] ,array('montopagado' => $montopagado));
			}
			if($contador==0){
				return true;
			}
		}
	}
	function veroperacionesasesor($codusuario){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';	
			$data['content']='pagos/operacionesasesor';
			$data['operaciones']=$this->caja_model->listapagoasesorc($codusuario);
			$data['asesor']=$this->usuario_model->obtenerusuario($codusuario);
			$this->load->view('index',$data);			
		}else{
			echo "<script type='text/javascript'> alert('Solo el Usuario de Operaciones tiene Acceso'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}
	}
	function eliminaroperacionasesor($id){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$result=$this->caja_model->eliminarregpagoasesorc($id);
			if($result==true){
				echo "<script type='text/javascript'> alert('Eliminado'); ";
				echo " location.href='".base_url()."index.php/pagos/formpagasesor'; </script>";					
			}else{
				echo "<script type='text/javascript'> alert('No se pudo eliminar'); ";
				echo " location.href='".base_url()."index.php/pagos/formpagasesor'; </script>";						
			}
		}else{
			echo "<script type='text/javascript'> alert('Solo el Usuario de Operaciones tiene Acceso'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}		
	}
	function desembolsoshoyccpdf(){
		if($this->session->userdata('tipouser')>2){
			$fecha=date('d-m-Y');
			$data['fecha']=$fecha;
			$data['desembolsos']=$this->operaciones_model->vistasolicitdesembolsadosfecha(date('Y-m-d'));
			$html = $this->load->view('pagos/desembolsospdf.php',$data, true);
			$this->pdf->load_html($html);
			$this->pdf->set_paper('A4','portrait');
			$this->pdf->render();
			$this->pdf->stream("ingresosegresos.pdf", array("Attachment" => false));
		}else{
			echo "<script type='text/javascript'> alert('SOLO EL USUARIO DE OPERACIONES TIENE ACCESO'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function sincronizarpagoscmapo(){
		$idasesor=$this->input->post('idasesor');
		$saldoasesor=$this->input->post('saldoasesor');//asignado
		$totalpagado=$this->input->post('totalpagado');
		$pagos=$this->operaciones_model->listaregistros_pagocampo($idasesor);
		if($saldoasesor == $totalpagado){
			$fecha_reg=date('Y-m-d H:i:s');	
			$codcaja = $this->caja_model->codcajasaldoasesor($idusuario);
			$nrocreditos=0;
			foreach($pagos as $row){
					$nrocuotas = $this->registrarkardexpagoscuotas($row, $row['monto'], $fecha_reg, $row['moraactual']);
					$datapa=array(
						'idcaja' 	=> $codcaja,
						'codusuario'=> $idusuario,
						'cantidad'	=> $row['monto'],
						'tipo'		=> 'SALIDA',
						'saldo'		=> $saldoasesor-($row['monto']),
						'fecha_hora'=> $ahora
					);
					$result = $this->caja_model->regpagoasesorc($datapa);
					if($result==true){
						$nrocreditos++;
					}	
					$saldoasesor-=$row['monto'];
			}
				$data=$this->retornarheader($this->session->userdata('tipouser'));
				$data['nrocuotaspag']=$nrocreditos;
				$data['footer']='principal/footer';	
				$data['content']='pagos/pagohecho';
				$this->load->view('index',$data);
		}else{
			echo 'EL SALDO NO ALCANZA';
		}
	}
}
/* End of file pagos.php */
/* Location: ./application/controllers/pagos.php */