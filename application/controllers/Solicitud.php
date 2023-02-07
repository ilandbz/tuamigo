<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
class Solicitud extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('solicitud_prestamo');
		$this->load->model('cliente_model');
		$this->load->model('negocio_model');
		$this->load->model('general_model');
		$this->load->model('usuario_model');
		$this->load->model('operaciones_model');
		$this->load->model('persona_model');
		//$this->load->library('pdf');
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
		}
		return $data;
	}
	function index(){
		if($this->session->userdata('idusuario')){//DEBEN INGRESAR SOLO ASESORES
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';	
			$data['content']='cliente/solicitud';
			if($this->session->userdata('tipouser')==2){
				$data['clientes']=$this->cliente_model->lista_clientesxasesor($this->session->userdata('idusuario'));				
			}else{
				$data['clientes']=$this->cliente_model->lista_clientesagencia($this->session->userdata('agencia'));	
			}
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('NO INICIO SESSION CON LA CUENTA DE ASESOR'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function tablaclientesapenom_asesor(){
		$apenom=$this->input->post('apenom');
		if($this->session->userdata('tipouser')==2){
			$data['clientes']=$this->cliente_model->lista_clientesxasesor_apenom($this->session->userdata('idusuario'), $apenom);			
		}else{
			$data['clientes']=$this->cliente_model->clientesapenom_agencia($this->session->userdata('agencia'), $apenom);		
		}
		$this->load->view('cliente/tablaclientescrearsoli', $data);
	}
	function listainscritos(){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';	
			$data['content']='cliente/solicitud';
			$data['clientes']=$this->cliente_model->lista_clientesxasesorinscri($this->session->userdata('idusuario'));			
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}				
	}
	function formsolicitud($codcliente){
		if($this->session->userdata('idusuario')){
			$codigo = $this->solicitud_prestamo->maximocodigo()+1;
			$codigo = str_pad($codigo, 6, '0', STR_PAD_LEFT);
			$cliente = $this->cliente_model->obtener_cliente($codcliente);
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer2';
			$data['cliente']=$cliente;
			$data['conyugue']=$this->persona_model->obtenerpersonavista($cliente['dniconyugue']);	
			$data['negocio']=$this->cliente_model->getnamenegociocliente($codcliente);
			$data['filanegocio']=$this->negocio_model->obtener_negocio($codcliente);		
			$data['codigo']=$codigo;
			if($this->session->userdata('tipouser')==2){
				$codusuario = $this->session->userdata('idusuario');
				$data['content']='solicitud/formsolicitud';				
			}else{ 
				$data['asesores']=$this->usuario_model->listaasesoresxagencia($this->session->userdata('agencia'));
				$codusuario = $cliente['idusuario'];
				$data['content']='solicitud/formsolicitudoperaciones';
			}
			$data['usuario']=$this->usuario_model->obtenerusuario($codusuario);
			$data['solicitudes']=$this->operaciones_model->numerodedesembolsoscliente($codcliente);//total de solicitudes con anterioridad
			if($data['solicitudes']>0){
				$cantsolvigentes=$this->operaciones_model->cantidaddevigentesoconmora($codcliente);//vigentes O CON MORA
				$data['cantsolvigentes']=$cantsolvigentes;
			}

			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function cargarsolvigentes($codcliente){
		$solvigentes=$this->operaciones_model->solvigentesoconmora($codcliente);//vigentes O CON MORA
		if(count($solvigentes)>0){	
			$miarreglo=null;
			foreach($solvigentes as $row){
				$row['diasatrasados']=$this->calculardiasatrasados($row['iddesembolso'], $row['unidplazo']);
				$row['mora']=$row['moradias']+$row['diasatrasados'];
				$miarreglo[]=$row;
			}
		$data['solvigentes']=$miarreglo;				
		}	
		$this->load->view('solicitud/tablasolicitudesvigentes',$data);
	}
	function calculardiasatrasados($iddesembolso, $unidplazo){//por desembolso de la ultima cuota
		$ultimacuotadebida = $this->operaciones_model->ultimacuotadebida($iddesembolso);
		$nrocuotasquedebe = $this->operaciones_model->nrocuotasquedebe($iddesembolso);
		$ultimacuotapagada = $this->operaciones_model->ultimacuotapagadacompleto($iddesembolso);
		if($nrocuotasquedebe>0){
			if(is_null($ultimacuotapagada) || $ultimacuotapagada['fechapagado']<$ultimacuotadebida['fecha_prog']){
				$diasatrasados = $unidplazo=='Dias' ? $this->calcularmora($ultimacuotadebida['fecha_prog'], date('Y-m-d')) : $this->calcularmorasinferiados($ultimacuotadebida['fecha_prog'], date('Y-m-d'));
			}else{
				$diasatrasados = $unidplazo=='Dias' ? $this->calcularmora($ultimacuotapagada['fechapagado'], date('Y-m-d'))-1 : $this->calcularmorasinferiados($ultimacuotapagada['fechapagado'], date('Y-m-d'))-1;
			}
			$diasatrasados = $diasatrasados<0 ? 0 : $diasatrasados;
		}else{
			$diasatrasados = 0;
		}
		return $diasatrasados;
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
	function formmodifisolicitud($idsolicitud){
		if($this->session->userdata('idusuario')){
			$solicitud = $this->solicitud_prestamo->obtenersolicitud2($idsolicitud);
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			if($solicitud['estado']=='APROBADO'){
				$data['footer']='principal/footer2';
				$data['content']='solicitud/mensajeprohibido';
				$data['mensaje']='NO PUEDES MODIFICAR LA SOLICITUD APROBADA';
			}else{
				$data['footer']='principal/footer2';
				$data['solicitud']=$solicitud;
				$cliente=$this->cliente_model->obtener_cliente($solicitud['codcliente']);
				$data['conyugue']=$this->persona_model->obtenerpersonavista($cliente['dni']);
				$data['cliente']=$cliente;
				$data['negocio']=$this->cliente_model->getnamenegociocliente($solicitud['codcliente']);
				$data['filanegocio']=$this->negocio_model->obtener_negocio($solicitud['codcliente']);
				$data['solicitudes']=$this->operaciones_model->vistasolicituddesembolsadoscliente($solicitud['codcliente']);
				$data['content']='solicitud/formmodsolicitud';
				if($solicitud['tipo']=='Recurrente Con Saldo' || $solicitud['tipo']=='Paralelo'){
					$solpagar=$this->operaciones_model->vistalistacreditoscancelar($idsolicitud);
					$miarreglo=null;
					//$solvigentes=$this->operaciones_model->reportegeneraldniyestado($cliente['dni'], 'APROBADO');//vigentes
					$solvigentes=$this->operaciones_model->listcreditosvigentesoconmora($cliente['dni']); // o con mora
					foreach($solpagar as $row){
						$row['diasatrasados']=$this->calculardiasatrasados($row['iddesembolso'], $row['unidplazo']);
						$row['diasmora']+=$row['diasatrasados'];
						$miarreglo[]=$row;
					}
					$data['solpagar']=$miarreglo;
					$miarreglo=null;
					foreach($solvigentes as $row){
						$row['diasatrasados']=$this->calculardiasatrasados($row['iddesembolso'], $row['unidplazo']);
						$row['mora']=$row['moradias']+$row['diasatrasados'];
						$miarreglo[]=$row;
					}
					$data['solvigentes']=$miarreglo;
				}
				$data['asesor']=$this->usuario_model->obtenerusuario($solicitud['idasesor']);				
			}
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function eliminarcuotacancelar($idsolicitud, $idsolicitudreg){
		$result = $this->operaciones_model->eliminarregcuotaapagar($idsolicitud, $idsolicitudreg);
		if($result==true){
			echo "<script type='text/javascript'> alert('SE ELIMINO CON EXITO'); ";
			echo " location.href='".base_url()."index.php/solicitud/formmodifisolicitud/".$idsolicitud."'; </script>";	
		}else{
			echo "<script type='text/javascript'> alert('NO SE PUDO ELIMINAR CONSULTE A SU SOPORTE'); ";
			echo " </script>";
		}
	}
	function guardaranalcual(){
		$codsolicitud = $this->input->post('codsolicitud');
		$tipogarantia = $this->input->post('tipogarantia');
		$cargafamiliar = $this->input->post('cargafamiliar');
		$riesgoedadmax = $this->input->post('riesgoedadmax');
		$antecedentescredit = $this->input->post('antecedentescredit');
		$recordultimopago = $this->input->post('recordultimopago');
		$niveldesarro = $this->input->post('niveldesarro');
		$tiempofuncionamiento = $this->input->post('tiempofuncionamiento');
		$controlasusingegre = $this->input->post('controlasusingegre');
		$lasventastotales = $this->input->post('lasventastotales');
		$comportamientosubsec = $this->input->post('comportamientosubsec');
		$totalunidadfam = $this->input->post('totalunidadfam');
		$totalunidademp = $this->input->post('totalunidademp');
		$puntajetotal = $this->input->post('puntajetotal');
		$tipoenvioac  = $this->input->post('tipoenvioac');
		$data = array(
			'idsolicitud'		=> $codsolicitud,
			'tipogarantia' 		=> $tipogarantia,
			'cargafamiliar' 	=> $cargafamiliar,
			'riesgoedadmax' 	=> $riesgoedadmax,
			'antecedentescred' 	=> $antecedentescredit,
			'recorpagoult' 		=> $recordultimopago,
			'niveldesarr' 		=> $niveldesarro,
			'tiempo_neg' 		=> $tiempofuncionamiento,
			'control_ingegre'	=> $controlasusingegre,
			'vent_totdec' 		=> $lasventastotales,
			'compsubsector' 	=> $comportamientosubsec,
			'totunidfamiliar'	=> $totalunidadfam,
			'totunidempresa'	=> $totalunidademp,
			'total'				=> $puntajetotal
			);
		if($tipoenvioac=='0'){//ES UN NUEVO REGISTRO
			$registro = $this->solicitud_prestamo->reganalcual($data);
			if($registro == true){
				echo 'true';
			}else{
				echo 'false';
			}
		}else{//EL REGISTRO YA EXISTE POR ESO SE DEBE ACTUALIZAR
			$registro = $this->solicitud_prestamo->actualizaranalcual($data, $codsolicitud);
			if($registro == true){
				echo 'true';
			}else{
				echo 'false';
			}
		}
	}
	function guardarsolicitud(){
		if($this->session->userdata('tipouser')){
			$idsolicitud = $this->solicitud_prestamo->maximocodigo()+1;
			$codcliente = $this->input->post('codcliente');
			$fecha=$this->input->post('fecha');
			$idasesor=$this->input->post('idasesor');
			$tiposolicitud = $this->input->post('tiposolicitud');
			$monto=$this->input->post('montosolic');
			$producto=$this->input->post('producto');
			$tipoplazo=$this->input->post('tipoplazo');
			$plazo=$this->input->post('plazo');
			$agencia=$this->input->post('agencia');
			$medioorigen=$this->input->post('medioorigen');
			$lugcobranza=$this->input->post('lugcobranza');
			$fuenterecursos=$this->input->post('fuenterecursos');
			$data= array(
				'idsolicitud' 	 => $idsolicitud, 
				'codcliente'  	 => $codcliente,
				'fecha'  	  	 => $fecha,
				'idasesor'	  	 => $idasesor,
				'tipo'		  	 => $tiposolicitud,
				'monto'		  	 => $monto,
				'producto'	  	 => $producto,
				'tipoplazo'	  	 => $tipoplazo,
				'cantplazo'	  	 => $plazo,
				'codagencia'  	 => $agencia,
				'medioorigen' 	 => $medioorigen,
				'dondepagara' 	 => $lugcobranza,
				'estado'	  	 => 'PENDIENTE',
				'fuenterecursos' => $fuenterecursos,
				'agencia'	  => $this->session->userdata('agencia')	
				);
			if($tipoplazo=='DIARIO' && $plazo==4){
				echo 'NO PUEDES REGISTRAR 4 DIAS AVISE AL SOPORTE (FORM REGISTRO)';
				echo $tipoplazo.'<br>';
				echo $plazo;
				return false;
			}
			if($tiposolicitud=='Recurrente Con Saldo'){
				$soloopciones = $this->input->post('solopciones');
				$i=0;
				foreach($soloopciones as $row){
					if(isset($row['iddesembolso'])){
						$i++;
						$data2 = array(
						'iddesembolso' 	=> $row['iddesembolso'], 
						'montotot'		=> $row['saldo']+$row['mora'],//puede modificarse antes del desembolso
						'idsolicitudreg'=> $row['idsolicitud'],
						'idsolicitud'	=> $idsolicitud,//solicitud creada
						'estado'		=> 'DEBE'
						);
						$this->operaciones_model->insertregdesemcan($data2);							
					}
				}
				if($i==0){
					echo "<script type='text/javascript'> alert('RECURRENTE CON SALDO SOLICITA PAGAR UNA DEUDA'); ";
					echo " location.href='".base_url()."index.php/solicitud/formsolicitud/".$codcliente."'; </script>";
					return false;
				}
			}
			$registrarsolicitud=$this->solicitud_prestamo->registrarsolicitud($data);
			if($monto<=1000){
				$montopoliza = 1;
			}elseif($monto<=2000){
				$montopoliza = 2;
			}elseif($monto<=3000){
				$montopoliza = 3;
			}elseif($monto<=4000){
				$montopoliza = 4;
			}else{
				$montopoliza = 8;
			}
			$datapoliza=array(
				'idsolicitud' => $idsolicitud,
				'monto'		  => $montopoliza,
				'fecha'		  => $fecha
				);
			$poliza=$this->solicitud_prestamo->registrarpoliza($datapoliza);
			if($registrarsolicitud==true){
				$cliente = $this->cliente_model->obtener_cliente($codcliente);
				$r= $cliente['estado']!='ACTIVO' ? $this->cliente_model->cambiarestadocliente('SOLICITADO', $codcliente) : '';
				redirect(base_url().'index.php/solicitud/registroexitoso/'.$idsolicitud);
			}else{
				echo 'NO SE PUDO REGISTRAR';
			}
		}else{
			echo "<script type='text/javascript'> alert('USTED NO ES ASESOR'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function registroexitoso($idsolicitud){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer2';
			$data['content']='solicitud/solicitud_registrada';	
			$data['solicitud']=$this->solicitud_prestamo->obtenersolicitud($idsolicitud);	
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}			
	}
	function lista_solicitudes(){//pendientes
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer2';
			if($this->session->userdata('tipouser')==1){
				$data['solicitudes']=$this->solicitud_prestamo->lista_solicitudes2();
				$data['content']='solicitud/repsolicitudes';				
			}elseif($this->session->userdata('tipouser')==5){

				$data['solicitudes']=$this->solicitud_prestamo->lista_solicitudesagencia($this->session->userdata('agencia'));

				$data['content']='solicitud/repsolicitudes';
			}elseif($this->session->userdata('tipouser')==2){
				$data['solicitudes']=$this->solicitud_prestamo->lista_solicitudespendiasesor($this->session->userdata('idusuario'));
				$data['content']='solicitud/repsolicitudes';
			}else{
				$data['content']='solicitud/mensajeprohibido';
				$data['mensaje']='NO SE PUDO ENVIAR CONSULTE A SU SOPORTE';
			}
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}		
	}
	function lista_solicitudesgeneral(){//general
		if($this->session->userdata('idusuario')){
			$tipouser=$this->session->userdata('tipouser');
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			if($tipouser==1){
				$solicitudes=$this->solicitud_prestamo->solicitudesporestado('PENDIENTE');
			}elseif($tipouser==5){
				$solicitudes=$this->solicitud_prestamo->solicitudesporestadoagencia('PENDIENTE', $this->session->userdata('agencia'));
			}else{
				$idusuario=$this->session->userdata('idusuario');
				$solicitudes=$this->solicitud_prestamo->solicitudesxasesorapropendestado($idusuario, 'PENDIENTE');
			}
			$data['footer']='principal/footer2';
			$data['content']='solicitud/listasolicitudes';
				$data['solicitudes']=$solicitudes;
				$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}			
	}
	function listasolicitudesgrente_ap(){
		$descripcion = $this->input->post('desc');
		$tipouser=$this->session->userdata('tipouser');
		if($tipouser==1){
			$data['solicitudes']=$this->solicitud_prestamo->listasolicitudes_apenom($descripcion);	
		}elseif($tipouser==5){
			$data['solicitudes']=$this->solicitud_prestamo->listasolicitudes_apenom_agencia($descripcion, $this->session->userdata('agencia'));	
		}else{
			$data['solicitudes']=$this->solicitud_prestamo->listasolicitudes_apenom_asesor($descripcion, $this->session->userdata('idusuario'));
		}
		$this->load->view('solicitud/tablalistasolicitudes',$data);		
	}	
	function cargartablasolicxasesorestado(){
		$estado = $this->input->post('estado');
		$tipouser=$this->session->userdata('tipouser');
		if($tipouser==1){
			$data['solicitudes']=$this->solicitud_prestamo->solicitudesporestado($estado);	
		}elseif($tipouser==5){
			$data['solicitudes']=$this->solicitud_prestamo->solicitudesporestadoagencia($estado, $this->session->userdata('agencia'));			
		}else{
			$idusuario=$this->session->userdata('idusuario');
			$data['solicitudes']=$this->solicitud_prestamo->solicitudesxasesorapropendestado($idusuario, $estado);
		}
		$this->load->view('solicitud/tablalistasolicitudes', $data);		
	}
	function solicitudesevaluacion(){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer2';
			if($this->session->userdata('tipouser')==1){//admin preincipal
				$data['solicitudes']=$this->solicitud_prestamo->listasolicitudesevaluacion();
				$data['content']='solicitud/solicitudesevaluacion';
				$this->load->view('index',$data);
			}elseif($this->session->userdata('tipouser')==5){
				$usuario = $this->usuario_model->obtenerusuario($this->session->userdata('idusuario'));
				$data['solicitudes']=$this->solicitud_prestamo->listasolicitudesevaluacionxagen($usuario['agencia']);
				$data['content']='solicitud/solicitudesevaluacion';
				$this->load->view('index',$data);
			}else{
				echo "<script type='text/javascript'> alert('SOLO EL GERENTE TIENE ACCESO'); ";
				echo " location.href='".base_url()."index.php'; </script>";					
			}
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}			
	}
	function solicitudesevaluaciogz(){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['footer']='principal/footer2';
		$data['solicitudes']=$this->solicitud_prestamo->solicievaluaciongz();
		$data['content']='solicitud/solicitudesevaluacion2';
		$this->load->view('index',$data);		
	}
	function evaluar($idsolicitud){//gerente
		if($this->session->userdata('tipouser')==1 || $this->session->userdata('tipouser')==5){
			$solicitud = $this->solicitud_prestamo->obtenersolicitud2($idsolicitud);
			if($solicitud['estado']=='EVALUACION' || $solicitud['estado']=='EVALUACION2'){
				$data=$this->retornarheader($this->session->userdata('tipouser'));
				$data['footer']='principal/footer4';
				$data['content']='solicitud/form_evaluacion2';	
				$data['activosc']=$this->general_model->listaactivoscorrientes();
				$data['activosn']=$this->general_model->listaactivosnocorrientes();
				$data['pasivosc']=$this->general_model->listapasivocorrientes();
				$data['pasivosn']=$this->general_model->listapasivonocorrientes();
				$asesor = $this->usuario_model->obtenerusuario($solicitud['idasesor']);		
				$data['asesor']=$asesor;
				$data['solicitud']=$solicitud;
				if($solicitud['tipo']=='Recurrente Con Saldo'){
					$solpagar=$this->operaciones_model->vistalistacreditoscancelar($idsolicitud);
					$totalapagar=0;
					foreach($solpagar as $row){
						$row['diasmora']+=$this->calculardiasatrasados($row['iddesembolso'], $row['unidplazo']);
						$row['diasmora']-=$row['pagomora'];
						$totalapagar+=$row['saldo']+($row['diasmora']*$row['costomora']);
					}
					$data['totalapagar']=$totalapagar;
				}
				$data['sumasaldcreditos']=$this->operaciones_model->sumdeudacredvigente($solicitud['codcliente']);
				$data['negocio']= $this->negocio_model->obtener_negocio($solicitud['codcliente']);
				$data['muebles']= $this->solicitud_prestamo->obtenermuebles($idsolicitud);
				$cliente = $this->cliente_model->obtener_cliente($solicitud['codcliente']);
				$data['propuestacred']=$this->solicitud_prestamo->obtenerpropuestas($idsolicitud);
				$data['cliente']=$cliente;		
				$balance=$this->solicitud_prestamo->obtenerbalance($idsolicitud);
				$detbalance=$this->solicitud_prestamo->obtener_detbalance($idsolicitud);
				$data['balance']=$balance;
				$data['detbalance']=$detbalance;
				$analisiscualitativo = $this->solicitud_prestamo->obteneranalisis($idsolicitud);
				$perdidasganancias = $this->solicitud_prestamo->obtenerperdganan($idsolicitud);
				$data['perdidasganancias']=$perdidasganancias;
				$data['analisiscualitativo']=$analisiscualitativo;
				$detperdidasganancias = $this->solicitud_prestamo->detperdidasganancias_pg($idsolicitud);
				$data['entidadesf']=$this->solicitud_prestamo->list_deudaentidades($idsolicitud);
				$data['detperdidasganancias']=$detperdidasganancias;
				$perdidasgananciasgral = $this->solicitud_prestamo->obtenerperdganan_gral($idsolicitud);
				$data['perdidasgananciasgral']=$perdidasgananciasgral;
				$data['poseeconyugue'] = $this->cliente_model->poseeconyugue($cliente['dni']);
				$data['conyugue']=$this->persona_model->obtenerpersonavista($cliente['dni']);
				$data['observacion'] = $this->solicitud_prestamo->obtenerobservacionesnr($idsolicitud);
				$data['cantobaservaciones']=$this->solicitud_prestamo->cantidadobservacionesnr($idsolicitud);
				$data['gastosnegocios']=$this->general_model->obtenergastosnegocio($idsolicitud);
				$data['gastosfamilliares']=$this->general_model->gastosfamiliares($idsolicitud);
				$data['detinventariobg'] = $this->solicitud_prestamo->detinventariobg($idsolicitud);
				$this->load->view('index',$data);
			}else{
				echo "<script type='text/javascript'> alert('LA SOLICITUD NO FUE ENVIADO POR EL ASESOR'); ";
				echo " location.href='".base_url()."index.php'; </script>";					
			}
		}else{
			echo "<script type='text/javascript'> alert('SOLO EL GERENTE TIENE ACCESO'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}				
	}
	function form_evaluacion($idsolicitud){//evaluacion por asesor
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer2';
			$data['content']='solicitud/form_evaluacion';	
			$data['activosc']=$this->general_model->listaactivoscorrientes();
			$data['activosn']=$this->general_model->listaactivosnocorrientes();
			$data['pasivosc']=$this->general_model->listapasivocorrientes();
			$data['pasivosn']=$this->general_model->listapasivonocorrientes();			
			$solicitud = $this->solicitud_prestamo->obtenersolicitud2($idsolicitud);
			$asesor = $this->usuario_model->obtenerusuario($solicitud['idasesor']);
			$data['asesor']=$asesor;
			$data['solicitud']=$solicitud;
			$poliza=$this->solicitud_prestamo->obtenerpoliza($idsolicitud);
			$data['poliza']=is_null($poliza) ? '' : $poliza; //borrar la condicional luego es por los que quedaron anterior sin registrar poliza
			$cliente = $this->cliente_model->obtener_cliente($solicitud['codcliente']);
			$data['existeultimasol'] = $this->solicitud_prestamo->existeultimasol($solicitud['codcliente']);
			$muebles=$this->solicitud_prestamo->obtenermuebles($idsolicitud);
			$data['muebles']= $muebles;	
			$data['negocio']= $this->negocio_model->obtener_negocio($solicitud['codcliente']);
			$data['propuestacred']=$this->solicitud_prestamo->obtenerpropuestas($idsolicitud);
			$data['cliente']=$cliente;
			$data['detinventariobg'] = $this->solicitud_prestamo->detinventariobg($idsolicitud);
			if($solicitud['tipo']=='Recurrente Con Saldo'){
				$solpagar=$this->operaciones_model->vistalistacreditoscancelar($idsolicitud);
				$miarreglo=null;
				foreach($solpagar as $row){
					$row['diasatrasados']=$this->calculardiasatrasados($row['iddesembolso'], $row['unidplazo']);
					$row['diasmora']+=$row['diasatrasados'];
					$miarreglo[]=$row;
				}
				$data['solpagar']=$miarreglo;
			}
			$balance=$this->solicitud_prestamo->obtenerbalance($idsolicitud);
			$detbalance=$this->solicitud_prestamo->obtener_detbalance($idsolicitud);
			if(is_null($balance)){
				$balance = array(
					'total_activo' 	=> 0,
					'total_pasivo'	=> 0,
					'patrimonio'	=> 0,
					'fecha'			=> date('Y-m-d')
				);
			}
			$data['balance']=$balance;
			if(is_null($detbalance)){
				$detbalance = array(
					'activocaja' => 0,
					'activobancos' => 0,
					'activoctascobrar' => 0,
					'activoinventarios' => 0,
					'pasivodeudaprove' => 0,
					'pasivodeudaent' => 0,
					'pasivodeudaemprender' => 0,
					'activomueble' => 0,
					'activootrosact' => 0,
					'activodepre' => 0,
					'pasivolargop' => 0,
					'otrascuentaspagar' => 0,
					'totalacorriente' => 0,
					'totalpcorriente' => 0,
					'totalancorriente' => 0,
					'totalpncorriente' => 0	
				);
			}
			$data['detbalance']=$detbalance;
			$analisiscualitativo = $this->solicitud_prestamo->obteneranalisis($idsolicitud);
			if(is_null($analisiscualitativo)){
				$analisiscualitativo=array(
						'tipogarantia' 		=> '-1',
						'cargafamiliar' 	=> '-1',
						'riesgoedadmax' 	=> '-1',
						'antecedentescred' 	=> '-1',
						'recorpagoult' 		=> '-1',
						'niveldesarr' 		=> '-1',
						'tiempo_neg' 		=> '-1',
						'control_ingegre'	=> '-1',
						'vent_totdec' 		=> '-1',
						'compsubsector' 	=> '-1',
						'totunidfamiliar'	=> '0',
						'totunidempresa'	=> '0',
						'total'				=> '0'
					);
			}
			$perdidasganancias = $this->solicitud_prestamo->obtenerperdganan($idsolicitud);
			if(is_null($perdidasganancias)){
				$perdidasganancias=array(
					'tot_ing_mensual' => 0,
					'tot_cosprimo_m' => 0,
					'margen_tot' => 0,				
					'ventas_cred' => 0,
					'irrecuperable' => 0,
					'cantproductos' => 1
				);
			}
			$data['perdidasganancias']=$perdidasganancias;
			$data['analisiscualitativo']=$analisiscualitativo;
			$detperdidasganancias = $this->solicitud_prestamo->detperdidasganancias_pg($idsolicitud);
			$data['entidadesf']=$this->solicitud_prestamo->list_deudaentidades($idsolicitud);
			$data['detperdidasganancias']=$detperdidasganancias;
			$perdidasgananciasgral = $this->solicitud_prestamo->obtenerperdganan_gral($idsolicitud);
			if(is_null($perdidasgananciasgral)){
				$perdidasgananciasgral=array(
					'ventas' => '',
					'costo' => '',
					'utilidad' => '',
					'costonegocio' => '',
					'utiloperativa' => '',
					'otrosing' => '',
					'otrosegr' => '',
					'gast_fam' => '',
					'utilidadneta' => '',
					'utilnetdiaria' => ''
				);
			}
			$data['perdidasgananciasgral']=$perdidasgananciasgral;
			$data['poseeconyugue'] = $this->cliente_model->poseeconyugue($cliente['dni']);
			$data['conyugue']=$this->persona_model->obtenerpersonavista($cliente['dni']);
			$data['observacion'] = $this->solicitud_prestamo->obtenerobservacionesnr($idsolicitud);
			$data['gastosnegocios']=$this->general_model->obtenergastosnegocio($idsolicitud);
			$data['gastosfamilliares']=$this->general_model->gastosfamiliares($idsolicitud);
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function cargaranalcualsolant($idsolicitud){
		$solicitud=$this->solicitud_prestamo->obtenersolicitud($idsolicitud);
		$solicitudanterior = $this->solicitud_prestamo->ultima_solicitud($solicitud['codcliente']);
		$resultado = $this->solicitud_prestamo->cargaranalcual_solant($solicitudanterior['idsolicitud'], $solicitud['idsolicitud']);
		if($resultado==true){
			redirect(base_url().'index.php/solicitud/form_evaluacion/'.$idsolicitud);
		}else{
			echo "<script type='text/javascript'> alert('NO SE PUDO CARGAR'); ";
			echo " location.href='".base_url()."index.php/solicitud/form_evaluacion/'".$idsolicitud."; </script>";		
		}
	}
	function cargarbalancegral($idsolicitud){
		$solicitud=$this->solicitud_prestamo->obtenersolicitud($idsolicitud);
		$solicitudanterior = $this->solicitud_prestamo->ultima_solicitud($solicitud['codcliente']);	
		$resultado = $this->solicitud_prestamo->cargarbalance_solant($solicitudanterior['idsolicitud'], $solicitud['idsolicitud']);
		if($resultado==true){
			redirect(base_url().'index.php/solicitud/form_evaluacion/'.$idsolicitud);
		}else{
			echo "<script type='text/javascript'> alert('NO SE PUDO CARGAR'); ";
			echo " location.href='".base_url()."index.php/solicitud/form_evaluacion/'".$idsolicitud."; </script>";				
		}		
	}
	function cargarperdidasgansola($idsolicitud){
		$solicitud=$this->solicitud_prestamo->obtenersolicitud($idsolicitud);
		$solicitudanterior = $this->solicitud_prestamo->ultima_solicitud($solicitud['codcliente']);	
		$resultado = $this->solicitud_prestamo->cargarperdgan_solant($solicitudanterior['idsolicitud'], $solicitud['idsolicitud']);
		if($resultado==true){
			redirect(base_url().'index.php/solicitud/form_evaluacion/'.$idsolicitud);
		}else{
			echo "<script type='text/javascript'> alert('NO SE PUDO CARGAR'); ";
			echo " location.href='".base_url()."index.php/solicitud/form_evaluacion/'".$idsolicitud."; </script>";				
		}		
	}	
	function cargarpropuessola($idsolicitud){
		$solicitud=$this->solicitud_prestamo->obtenersolicitud($idsolicitud);
		$solicitudanterior = $this->solicitud_prestamo->ultima_solicitud($solicitud['codcliente']);	
		$resultado = $this->solicitud_prestamo->cargarpropuesta_solant($solicitudanterior['idsolicitud'], $solicitud['idsolicitud']);
		if($resultado==true){
			redirect(base_url().'index.php/solicitud/form_evaluacion/'.$idsolicitud);
		}else{
			echo "<script type='text/javascript'> alert('NO SE PUDO CARGAR'); ";
			echo " location.href='".base_url()."index.php/solicitud/form_evaluacion/'".$idsolicitud."; </script>";				
		}		
	}	
	function guardarmueble(){
		$idsolicitud=$this->input->post('idsolicitud');
		$descripcionmueb=$this->input->post('descripcion');
		$cantidad=$this->input->post('valor');
		$data = array(
			'idsolicitud' => $idsolicitud,
			'descripcion' => $descripcionmueb,
			'cantidad'	  => $cantidad
			);
		$result = $this->solicitud_prestamo->ingresarmuebles($data);
		if($result==true){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function guardardef(){
		$codsolicitud=$this->input->post('codsolicitud');
		$descripcionmueb=$this->input->post('descripcion');
		$cantidad=$this->input->post('valor');
		$data = array(
			'idsolicitud' => $codsolicitud,
			'desc_entidad' => $descripcionmueb,
			'cantidad'	  => $cantidad
			);
		$result = $this->solicitud_prestamo->ingresardenfinanc($data);
		if($result==true){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function guardardetinventariobg(){
		$idsolicitud = $this->input->post('idsolicitud');
		$inventariomateriales = $this->input->post('inventariomateriales');
		$inventarioproductosproc = $this->input->post('inventarioproductosproc');
		$inventarioproductoster = $this->input->post('inventarioproductoster');
		$data = array(
			'idsolicitud' 		=> $idsolicitud, 
			'inv_materiales'	=> $inventariomateriales,
			'inv_prodproc'		=> $inventarioproductosproc,
			'inv_prodtermi'		=> $inventarioproductoster
			);
		if($this->solicitud_prestamo->existedetinvbg($idsolicitud)==true){
			$actualizardetinbg = $this->solicitud_prestamo->actualizardetinvbg($idsolicitud, $data);
			if($actualizardetinbg==true){
				echo 'true';
			}else{
				echo 'false';
			}
		}else{
			$ingresdtibg=$this->solicitud_prestamo->registrardetinventario($data);
			if($ingresdtibg==true){
				echo 'true';
			}else{
				echo 'false';
			}
		}
	}
	function reportecobranza($iddesembolso, $totaldescaja){
		if($this->session->userdata('idusuario')){
			$desembolso = $this->solicitud_prestamo->obtenerdesembolso($iddesembolso);
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['desembolso']=$desembolso;
			$data['footer']='principal/footer2';	
			$data['content']='pagos/reportecobranza';
			$solicitud = $this->solicitud_prestamo->obtenersolicitud2($desembolso['idsolicitud']);
			$data['totaldescaja']=$totaldescaja;
			$data['solicitud']=$solicitud;
			$data['cliente']=$this->cliente_model->obtener_cliente($solicitud['codcliente']);
			$data['negocio']=$this->negocio_model->obtener_negocio($solicitud['codcliente']);
			$data['cuotapagos']=$this->solicitud_prestamo->listapagoscuotas($iddesembolso);
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}			
	}
	function reportecobranzapdf($iddesembolso){
		if($this->session->userdata('idusuario')){	
			$desembolso = $this->solicitud_prestamo->obtenerdesembolso($iddesembolso);
			$data['desembolso']=$desembolso;

			$data['cuotapagos']=$this->solicitud_prestamo->listapagoscuotas($iddesembolso);
			$solicitud= $this->solicitud_prestamo->obtenersolicitud2($desembolso['idsolicitud']);
			$data['solicitud'] = $solicitud;
			$data['cliente']=$this->cliente_model->obtener_cliente($solicitud['codcliente']);
			$negocio=$this->negocio_model->obtener_negocio($solicitud['codcliente']);
			$data['negocio']=$negocio;
			$data['asesor']=$this->usuario_model->obtenerusuario($solicitud['idasesor']);
			if($solicitud['cantplazo']>=20){
				if($solicitud['dondepagara']=='Oficina'){
					$this->load->view('pagos/vista_calendariopagospdfunoso', $data);
				}else{
					$this->load->view('pagos/vista_calendariopagospdf', $data);				
				}			
			}else{
				$this->load->view('pagos/vista_calendariopagospdfvert', $data);
				// $html= $this->load->view('pagos/vista_calendariopagospdfvert', $data, true);
				// $this->pdf->load_html($html);
				// $this->pdf->set_paper('A4','portrait');				
			}
			// $this->pdf->render();
			// $this->pdf->stream("repcobranza.pdf", array("Attachment" => false));
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function reportecobranzapdfxcodsolic($idsolicitud){
		if($this->session->userdata('idusuario')){	
			$solicitud= $this->solicitud_prestamo->obtenersolicitud2($idsolicitud);			
			$desembolso = $this->solicitud_prestamo->obtenerdesembolsosol($idsolicitud);
			$data['desembolso']=$desembolso;
			$data['cuotapagos']=$this->solicitud_prestamo->listapagoscuotas($desembolso['iddesembolso']);
			$data['solicitud'] = $solicitud;
			$data['cliente']=$this->cliente_model->obtener_cliente($solicitud['codcliente']);
			$negocio=$this->negocio_model->obtener_negocio($solicitud['codcliente']);
			$data['negocio']=$negocio;
			$data['asesor']=$this->usuario_model->obtenerusuario($solicitud['idasesor']);
			if($solicitud['cantplazo']>=20){
				if($solicitud['dondepagara']=='Oficina'){
					$this->load->view('pagos/vista_calendariopagospdfunoso', $data);
				}else{
					$this->load->view('pagos/vista_calendariopagospdf', $data);				
				}
			}else{//semanal
				$this->load->view('pagos/vista_calendariopagospdfvert', $data);
				// $html= $this->load->view('pagos/vista_calendariopagospdfvert', $data, true);
				// $this->pdf->load_html($html);
				// $this->pdf->set_paper('A4','portrait');
			}
			// $this->pdf->render();
			// $this->pdf->stream("repcobranza.pdf", array("Attachment" => false));
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}	
	}	
	function eliminarmueblecliente($id){
		$result = $this->solicitud_prestamo->eliminarmueble($id);
		if($result==true){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function eliminardef($id){
		$result = $this->solicitud_prestamo->eliminardef($id);
		if($result==true){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function cargar_mueblescliente($idsolicitud){
		$data['muebles']= $this->solicitud_prestamo->obtenermuebles($idsolicitud);
		$this->load->view('solicitud/muebles_cliente',$data);		
	}
	function cargar_entidadfinan($idsolicitud){
		$data['entidadesf']= $this->solicitud_prestamo->list_deudaentidades($idsolicitud);
		$this->load->view('solicitud/entidadfinan',$data);		
	}	
	function sumacantmuebles($idsolicitud){
		echo $this->solicitud_prestamo->totalsummuebles($idsolicitud);
	}
	function totalsumentidadfinan($idsolicitud){
		echo $this->solicitud_prestamo->totalsumentidadfinan($idsolicitud);
	}	
	function aceptar_evaluacion(){
		$nrosolicitud = $this->input->post('nrosolicitud');
		$codcliente = $this->input->post('codcliente_s');		
		$montosolic = $this->input->post('montosolic');
		$solicitud = $this->solicitud_prestamo->obtenersolicitud2($nrosolicitud);
		$fechahora_evaluacion = $this->input->post('fecha_evaluacion');	
		$interes = $this->input->post('tasainteres');
		$totalpago = $this->input->post('totalpago');
		if($this->session->userdata('tipouser')==1){
			$estadosol='APROBADO';
		}else{
			$totalsaldvigente = $this->input->post('totalsaldvigente');
			$estadosol = ($montosolic+$totalsaldvigente) <1500 ? 'APROBADO' : 'EVALUACION2';			
		}
		$data2=array(
				'idsolicitud' => $nrosolicitud,
				'codusuario'  => $this->session->userdata('idusuario'),
				'estado'	  => $estadosol,
				'fechahora'	  => $fechahora_evaluacion,
				'comentario'  => $this->solicitud_prestamo->cantidadobservacionesnr($nrosolicitud).' observaciones',
				'tasainteres' => $interes
			);
		$result = $this->solicitud_prestamo->actualizarsolic(array('estado'		=> $estadosol), $nrosolicitud);
		$registrarevaluacion = $this->solicitud_prestamo->registrarevaluacion($data2);
		if ($result == true) {
			$clientees = $this->cliente_model->cambiarestadocliente('ACTIVO', $codcliente);
			redirect(base_url().'index.php/solicitud/solicitud_aprobada/'.$nrosolicitud);
		}else{
			echo 'NO SE PUDO GUARDAR';
		}
	}
	function validarusuario($tipoactual, $tipopermitido, $tipopermitido2){//validar si son dos tipos permitidos
		if(!$this->session->userdata('idusuario')){
			echo "<script type='text/javascript'> alert('USTED NO UNICIO SESSION'); </script>";

			return false;
		}
		if($tipoactual==$tipopermitido || $tipoactual==$tipopermitido2 || $tipoactual==$tipopermitido3){
			return true;
		}else{
			echo "<script type='text/javascript'> alert('SU TIPO DE USUARIO NO ES PERMITIDO'); </script>";			
			return false;			
		}	
		return true;
	}
	function solicitud_aprobada($nrosolicitud){
		if($this->session->userdata('idusuario') && ($this->session->userdata('tipouser')==1 || $this->session->userdata('tipouser')==5)){		
			$solicitud = $this->solicitud_prestamo->obtenersolicitud2($nrosolicitud);
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer4';
			$data['content']='solicitud/solicitudaprobado';	
			$data['solicitud']=$solicitud;
			$this->load->view('index',$data);						
		}else{
			echo "<script type='text/javascript'> alert('SOLO EL GERENTE TIENE ACCESO'); ";
			echo " location.href='".base_url()."index.php'; </script>";			
		}
	}
	function rechazar_evalsolicitud(){
		$codsolicitud = $this->input->post('codsolicitud');
		$mensaje = $this->input->post('mensaje');
		$solicitud=$this->solicitud_prestamo->obtenersolicitud2($codsolicitud);
		if($this->session->userdata('tipouser')==1){//GERENTE
			$mensaje = 'GERENTE : '.$mensaje;
		}
		if($this->session->userdata('tipouser')==3){//OPERACIONES
			$mensaje = 'ASESOR : '.$mensaje;
		}
		$data = array(
			'idsolicitud' => $codsolicitud, 
			'codusuario'  => $this->session->userdata('idusuario'),
			'estado'	  => 'RECHAZADO',
			'comentario'  => $mensaje,
			'fechahora'	  => date('Y-m-d h:i:s')
			);
		$registrarevaluacion = $this->solicitud_prestamo->registrarevaluacion($data);
		$data2 = array(
			'estado' 		=> 'RECHAZADO'
		);
		$actualizarsolic = $this->solicitud_prestamo->actualizarsolic($data2, $codsolicitud);
		if ($registrarevaluacion==true && $actualizarsolic==true) {
			$this->cliente_model->cambiarestadocliente('RECHAZADO', $solicitud['codcliente']);
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function versolicitud($idsolicitud){
		if($this->session->userdata('idusuario')){
			$solicitud=$this->solicitud_prestamo->obtenersolicitud2($idsolicitud);
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer4';		
			$data['content']='solicitud/versolicitud';
			$data['observacion'] = $this->solicitud_prestamo->obtenerobservacionesnr($idsolicitud);
			$data['solicitud']=$solicitud;
			$data['asesores']=$this->usuario_model->listaasesores();
			if($this->operaciones_model->existedesembolso($idsolicitud)==true){
				$pagodesembolso = $this->operaciones_model->pagodesembolsosol($idsolicitud);
				$data['pagodesembolso']=$pagodesembolso;
			}
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function validarevaluacion($idsolicitud){
		$analisiscualitativo = $this->solicitud_prestamo->obteneranalisis($idsolicitud);
		$balancegeneral = $this->solicitud_prestamo->obtenerbalance($idsolicitud);
		$perdidasganancias = $this->solicitud_prestamo->obtenerperdganan_gral($idsolicitud);
		$propuestacred = $this->solicitud_prestamo->obtenerpropuestas($idsolicitud);
		if(is_null($analisiscualitativo)){
			$resultado=1;
		}elseif(is_null($balancegeneral)){
			$resultado=2;
		}elseif(is_null($perdidasganancias)){
			$resultado=3;
		}elseif(is_null($propuestacred)){
			$resultado = 4;			
		}else{
			$resultado=0;
		}
		echo $resultado;
	}
	function regbalance(){
		$codsolicitud = $this->input->post('codsolicitud');
		$totalactivo = $this->input->post('totalactivo');
		$totalpasivo = $this->input->post('totalpasivo');
		$totpatrimonio = $this->input->post('totpatrimonio');
		$fecha_balance = $this->input->post('fecha_balance');
		//det balance
		$activocaja = $this->input->post('activocaja');
		$activobancos = $this->input->post('activobancos');
		$activoctascobrar = $this->input->post('activoctascobrar');
		$activoinventarios = $this->input->post('activoinventarios');
		$pasivodeudaprove = $this->input->post('pasivodeudaprove');
		$pasivodeudaent = $this->input->post('pasivodeudaent');
		$pasivodeudaemprender = $this->input->post('pasivodeudaemprender');
		$activomueble = $this->input->post('activomueble');
		$activootrosact = $this->input->post('activootrosact');
		$activodepre = $this->input->post('activodepre');
		$pasivolargop = $this->input->post('pasivolargop');
		$otrascuentaspagar = $this->input->post('otrascuentaspagar');
		$totalacorriente = $this->input->post('totalacorriente');
		$totalpcorriente = $this->input->post('totalpcorriente');
		$totalancorriente = $this->input->post('totalancorriente');
		$totalpncorriente = $this->input->post('totalpncorriente');
		$data = array(
			'idsolicitud' 	=> $codsolicitud,
			'total_activo' 	=> $totalactivo,
			'total_pasivo'	=> $totalpasivo,
			'patrimonio'	=> $totpatrimonio,
			'fecha'			=> $fecha_balance
			);
		$data2 = array(
			'idsolicitud' 	=> $codsolicitud,
			'activocaja' => $activocaja,
			'activobancos' => $activobancos,
			'activoctascobrar' => $activoctascobrar,
			'activoinventarios' => $activoinventarios,
			'pasivodeudaprove' => $pasivodeudaprove,
			'pasivodeudaent' => $pasivodeudaent,
			'pasivodeudaemprender' => $pasivodeudaemprender,
			'activomueble' => $activomueble,
			'activootrosact' => $activootrosact,
			'activodepre' => $activodepre,
			'pasivolargop' => $pasivolargop,
			'otrascuentaspagar' => $otrascuentaspagar,
			'totalacorriente' => $totalacorriente,
			'totalpcorriente' => $totalpcorriente,
			'totalancorriente' => $totalancorriente,
			'totalpncorriente' => $totalpncorriente
			);
		if($this->solicitud_prestamo->existebalance($codsolicitud)==true){
			$actbalance = $this->solicitud_prestamo->actualizarbalance($data, $codsolicitud);
			if($actbalance==true){
				$actualizardetbalance = $this->solicitud_prestamo->actualizardetbalance($data2, $codsolicitud);
				echo 'true';
			}else{
				echo 'false';
			}			
		}else{
			$regbalance = $this->solicitud_prestamo->registrarbalance($data);
			if($regbalance==true){
				$regdetbalance = $this->solicitud_prestamo->regdetbalance($data2); 
				echo 'true';
			}else{
				echo 'false';
			}		
		}
	}
	function reg_perdidasganancias(){
		$codsolicitud = $this->input->post('codsolicitud');
		$totingmensual = $this->input->post('totingmensual');
		$margtontal = $this->input->post('margtontal');		
		$totcostoprimo = $this->input->post('totcostoprimo');
		$ventcredito = $this->input->post('ventcredito');
		$irrecuperabilidad = $this->input->post('irrecuperabilidad');
		$cant = $this->input->post('cant');
		//det perdidas ganancias
		$descproducto1 = $this->input->post('descproducto1');
		$descproducto2 = $this->input->post('descproducto2');
		$descproducto3 = $this->input->post('descproducto3');
		$unidmedida1 = $this->input->post('unidmedida1');
		$unidmedida2 = $this->input->post('unidmedida2');
		$unidmedida3 = $this->input->post('unidmedida3');
		$precioventaunit1 = $this->input->post('precioventaunit1');
		$precioventaunit2 = $this->input->post('precioventaunit2');
		$precioventaunit3 = $this->input->post('precioventaunit3');
		$materiaprimapri1 = $this->input->post('materiaprimapri1');
		$materiaprimapri2 = $this->input->post('materiaprimapri2');
		$materiaprimapri3 = $this->input->post('materiaprimapri3');
		$materiaprimasec1 = $this->input->post('materiaprimasec1');
		$materiaprimasec2 = $this->input->post('materiaprimasec2');
		$materiaprimasec3 = $this->input->post('materiaprimasec3');
		$materiaprimacomp1 = $this->input->post('materiaprimacomp1');
		$materiaprimacomp2 = $this->input->post('materiaprimacomp2');
		$materiaprimacomp3 = $this->input->post('materiaprimacomp3');
		$materiaprima1 = $this->input->post('materiaprima1');
		$materiaprima2 = $this->input->post('materiaprima2');
		$materiaprima3 = $this->input->post('materiaprima3');
		$manoobraun1 = $this->input->post('manoobraun1');
		$manoobraun2 = $this->input->post('manoobraun2');
		$manoobraun3 = $this->input->post('manoobraun3');
		$manoobrados1 = $this->input->post('manoobrados1');
		$manoobrados2 = $this->input->post('manoobrados2');
		$manoobrados3 = $this->input->post('manoobrados3');
		$manoobra1 = $this->input->post('manoobra1');
		$manoobra2 = $this->input->post('manoobra2');
		$manoobra3 = $this->input->post('manoobra3');
		$costoprimounit1 = $this->input->post('costoprimounit1');
		$costoprimounit2 = $this->input->post('costoprimounit2');
		$costoprimounit3 = $this->input->post('costoprimounit3');
		$produccionmensprod1 = $this->input->post('produccionmensprod1');
		$produccionmensprod2 = $this->input->post('produccionmensprod2');
		$produccionmensprod3 = $this->input->post('produccionmensprod3');
		$ventastotprod1 = $this->input->post('ventastotprod1');
		$ventastotprod2 = $this->input->post('ventastotprod2');
		$ventastotprod3 = $this->input->post('ventastotprod3');
		$costoprimprod1 = $this->input->post('costoprimprod1');
		$costoprimprod2 = $this->input->post('costoprimprod2');
		$costoprimprod3 = $this->input->post('costoprimprod3');
		$margenventasprod1 = $this->input->post('margenventasprod1');
		$margenventasprod2 = $this->input->post('margenventasprod2');
		$margenventasprod3 = $this->input->post('margenventasprod3');
		$data=array(
				'idsolicitud' => $codsolicitud,
				'tot_ing_mensual' => $totingmensual,
				'tot_cosprimo_m' => $totcostoprimo,
				'margen_tot' => $margtontal,				
				'ventas_cred' => $ventcredito,
				'irrecuperable' => $irrecuperabilidad,
				'cantproductos' => $cant
			);
		if($this->solicitud_prestamo->existeperdidasganancias($codsolicitud)==true){
			$reg=$this->solicitud_prestamo->actualizarperdidasganancias($data, $codsolicitud);
		}else{
			$reg = $this->solicitud_prestamo->regperdidasganan($data);
		}
		if($reg==true){
			$producto1 = array(
				'idsolicitud' => $codsolicitud,
				'nroproducto' => 1,
				'descripcion' => $descproducto1,
				'unidadmedida' => $unidmedida1,
				'preciounit' => $precioventaunit1,
				'primaprincipal' => $materiaprimapri1,
				'primasecundaria' => $materiaprimasec1,
				'primacomplement' => $materiaprimacomp1,
				'matprima' => $materiaprima1,
				'manoobra1' => $manoobraun1,
				'manoobra2' => $manoobrados1,
				'manoobra' => $manoobra1,
				'costoprimounit' => $costoprimounit1,
				'prodmensual' => $produccionmensprod1,
				'ventastotales' => $ventastotprod1,
				'totcostoprimo' => $costoprimprod1,
				'margenventas' => $margenventasprod1
			);
			if($this->solicitud_prestamo->existedetpg($codsolicitud, 1)){
				$this->solicitud_prestamo->actualizardetperdidasgan($producto1, $codsolicitud, 1);
			}else{
				$this->solicitud_prestamo->regdetperdidasganan($producto1);
			}
			if($ventastotprod2>0){
				$producto2 = array(
					'idsolicitud' => $codsolicitud,
					'nroproducto' => 2,			
					'descripcion' => $descproducto2,
					'unidadmedida' => $unidmedida2,
					'preciounit' => $precioventaunit2,
					'primaprincipal' => $materiaprimapri2,
					'primasecundaria' => $materiaprimasec2,
					'primacomplement' => $materiaprimacomp2,
					'matprima' => $materiaprima2,
					'manoobra1' => $manoobraun2,
					'manoobra2' => $manoobrados2,
					'manoobra' => $manoobra2,
					'costoprimounit' => $costoprimounit2,
					'prodmensual' => $produccionmensprod2,
					'ventastotales' => $ventastotprod2,
					'totcostoprimo' => $costoprimprod2,
					'margenventas' => $margenventasprod2
				);
				if($this->solicitud_prestamo->existedetpg($codsolicitud, 2)){
					$this->solicitud_prestamo->actualizardetperdidasgan($producto2, $codsolicitud, 2);
				}else{
					$this->solicitud_prestamo->regdetperdidasganan($producto2);
				}
			}
			if($ventastotprod3>0){
				$producto3 = array(
					'idsolicitud' => $codsolicitud,
					'nroproducto' => 3,
					'descripcion' => $descproducto3,
					'unidadmedida' => $unidmedida3,
					'preciounit' => $precioventaunit3,
					'primaprincipal' => $materiaprimapri3,
					'primasecundaria' => $materiaprimasec3,
					'primacomplement' => $materiaprimacomp3,
					'matprima' => $materiaprima3,
					'manoobra1' => $manoobraun3,
					'manoobra2' => $manoobrados3,
					'manoobra' => $manoobra3,
					'costoprimounit' => $costoprimounit3,
					'prodmensual' => $produccionmensprod3,
					'ventastotales' => $ventastotprod3,
					'totcostoprimo' => $costoprimprod3,
					'margenventas' => $margenventasprod3
				);
				if($this->solicitud_prestamo->existedetpg($codsolicitud, 3)){
					$this->solicitud_prestamo->actualizardetperdidasgan($producto3, $codsolicitud, 3);
				}else{
					$this->solicitud_prestamo->regdetperdidasganan($producto3);
				}				
			}
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function eliminarproductdetpg($idsolicitud, $nro){//eliminar producto de perdidas y ganancias
		if($this->solicitud_prestamo->existedetpg($idsolicitud, $nro)==true){
			$this->solicitud_prestamo->eliminarproductodpg($idsolicitud, $nro);
		}
	}
	function regperdidasganan_gral(){
		$codsolicitud = $this->input->post('codsolicitud');
		$ventaspg = $this->input->post('ventaspg');
		$costopg = $this->input->post('costopg');
		$utilidadbpg = $this->input->post('utilidadbpg');
		$gastoneg = $this->input->post('gastoneg');
		$utilidopera = $this->input->post('utilidopera');
		$otrosing = $this->input->post('otrosing');
		$otrosegre = $this->input->post('otrosegre');
		$gastfamiliares = $this->input->post('gastfamiliares');
		$utilneta = $this->input->post('utilneta');
		$utilnetadiaria = $this->input->post('utilnetadiaria');	
		$data=array(
			'idsolicitud' => $codsolicitud,
			'ventas' => $ventaspg,
			'costo' => $costopg,
			'utilidad' => $utilidadbpg,
			'costonegocio' => $gastoneg,
			'utiloperativa' => $utilidopera,
			'otrosing' => $otrosing,
			'otrosegr' => $otrosegre,
			'gast_fam' => $gastfamiliares,
			'utilidadneta' => $utilneta,
			'utilnetdiaria' => $utilnetadiaria
		);
		if($this->solicitud_prestamo->existeperdidasgangral($codsolicitud)==true){
			$actpdgral = $this->solicitud_prestamo->actualizar_perdganan_gral($data, $codsolicitud);
			if($actpdgral==true){
				echo 'true';
			}else{
				echo 'false';
			}
		}else{
			$regpggral = $this->solicitud_prestamo->registrar_perdidasgangral($data);
			if($regpggral==true){
				echo 'true';
			}else{
				echo 'false';
			}
		}
	}
	function regpropuestacred(){
		$codsolicitud = $this->input->post('codsolicitud');
		$unidfam = $this->input->post('unidfam');
		$expcred = $this->input->post('expcred');
		$destprest = $this->input->post('destprest');
		$refper = $this->input->post('refper');
		$data = array(
			'idsolicitud' => $codsolicitud, 
			'unidad_familiar' => $unidfam,
			'experiencia_cred' => $expcred,
			'destino_prest'  => $destprest,
			'referencias'	=> $refper
			);
		if($this->solicitud_prestamo->existepropuesta($codsolicitud)==true){
			$actpc = $this->solicitud_prestamo->actualizarpropuestacred($data, $codsolicitud);
			if($actpc==true){
				echo 'true';
			}else{
				echo 'false';
			}		
		}else{
			$regpropuesta = $this->solicitud_prestamo->registrarpropuestac($data);
			if($regpropuesta==true){
				echo 'true';
			}else{
				echo 'false';
			}			
		}
	}
	function actualizarsolicitud(){
		$idsolicitud = $this->input->post('nrosolicitud');
		$fecha=$this->input->post('fecha');
		$tiposolicitud = $this->input->post('tiposolicitud');
		$monto=$this->input->post('montosolic');
		$producto=$this->input->post('producto');
		$tipoplazo=$this->input->post('tipoplazo');
		$plazo=$this->input->post('plazo');
		$medioorigen=$this->input->post('medioorigen');
		$fuenterecursos=$this->input->post('fuenterecursos');		
		$data= array(
			'fecha'  	  => $fecha,
			'tipo'		  => $tiposolicitud,
			'monto'		  => $monto,
			'producto'	  => $producto,
			'tipoplazo'	  => $tipoplazo,
			'cantplazo'	  => $plazo,
			'medioorigen' => $medioorigen,
			'fuenterecursos' => $fuenterecursos			
			);


		if($tipoplazo=='DIARIO' && $plazo==4){
			echo 'NO PUEDES REGISTRAR 4 DIAS AVISE AL SOPORTE (FORM ACTUALIZACION)';
			return false;
		}
		$estad = $this->input->post('estadocuotasapagar');//si existen solicitudes a pagar es 0 y si no hay registros es 1
		$r=false;
		if($tiposolicitud=='Recurrente Con Saldo' && $estad==1){
			$soloopciones = $this->input->post('solopciones');
			$i=0;	
			foreach($soloopciones as $row){
				if(isset($row['iddesembolso'])){
					$i++;
					$data2 = array(
					'iddesembolso' 	=> $row['iddesembolso'], 
					'montotot'		=> $row['saldo']+$row['mora'],
					'idsolicitudreg'=> $row['idsolicitud'],
					'idsolicitud'	=> $idsolicitud,
					'estado'		=> 'DEBE'
					);
					$r = $this->operaciones_model->insertregdesemcan($data2);							
				}
			}
			if($i==0){
				echo "<script type='text/javascript'> alert('RECURRENTE CON SALDO SOLICITA PAGAR UNA DEUDA'); ";
				echo " location.href='".base_url()."index.php/solicitud/formmodifisolicitud/".$idsolicitud."'; </script>";
				return false;
			}
		}
		$actsolicitud=$this->solicitud_prestamo->actualizarsolic($data,$idsolicitud);
			if($monto<=1000){
				$montopoliza = 1;
			}elseif($monto<=2000){
				$montopoliza = 2;
			}elseif($monto<=3000){
				$montopoliza = 3;
			}elseif($monto<=4000){
				$montopoliza = 4;
			}else{
				$montopoliza = 8;
			}
			$datapoliza=array('monto' => $montopoliza);
			$poliza=$this->solicitud_prestamo->actualizarpoliza($datapoliza, $idsolicitud);
		if($actsolicitud==true or $r==true){
			echo "<script type='text/javascript'> alert('ACTUALIZADO'); ";
			echo " location.href='".base_url()."index.php/solicitud/form_evaluacion/".$idsolicitud."'; </script>";		
		}else{
			echo "<script type='text/javascript'> alert('NO SE PUDO REGISTRAR'); ";
			echo " location.href='".base_url()."index.php/solicitud/formmodifisolicitud/".$idsolicitud."'; </script>";
		}
	}
	function actualizarmontosolic(){//monto y fecha
		if($this->session->userdata('idusuario')){
			$nrosolicitud = $this->input->post('nrosolicitud');
			$montosolic = $this->input->post('montosolic');
			$fecha_solicitud = $this->input->post('fecha_solicitud');

			$data=array(
				'monto' => $montosolic,
				'fecha' => $fecha_solicitud
				);
			$resultado = $this->solicitud_prestamo->actualizarsolic($data, $nrosolicitud);
			if($resultado==true){
				echo 'ACTUALIZADO';
			}else{
				echo 'NO SE PUDO ACTUALIZAR';
			}
		}else{
			echo 'NO INICIO SESSION';
		}	
	}
	function tiempoTranscurridoFechas($fechaInicio,$fechaFin){
	    $fecha1 = new DateTime('2010-10-05');
	    $fecha2 = new DateTime('2017-01-04');
	    $fecha = $fecha1->diff($fecha2);
	    $tiempo = "";
	    //años
	    if($fecha->y > 0){
	        $tiempo .= $fecha->y;
	        if($fecha->y == 1)
	            $tiempo .= " año, ";
	        else
	            $tiempo .= " años, ";
	    }
	    //meses
	    if($fecha->m > 0){
	        $tiempo .= $fecha->m;
	        if($fecha->m == 1)
	            $tiempo .= " mes, ";
	        else
	            $tiempo .= " meses";
	    }     
	    return $tiempo;
	}
	function solicitudpdf($idsolicitud){
		if($this->session->userdata('idusuario')){
			$solicitud= $this->solicitud_prestamo->obtenersolicitud2($idsolicitud);
			$data['SOLICITUD'] = $solicitud;
			$cliente = $this->cliente_model->obtener_cliente($solicitud['codcliente']);
			$data['cliente']=$cliente;
			$data['asesor']=$this->usuario_model->obtenerusuario($solicitud['idasesor']);
			$data['distritodomic'] = $this->general_model->obtenerdistrito($cliente['distrito_domic']);
		    $cumpleanos = new DateTime($cliente['fecha_nac']);
		    $hoy = new DateTime();
		    $annos = $hoy->diff($cumpleanos);
			$negocio= $this->negocio_model->obtener_negocio($cliente['codcliente']);		    
			$data['negocio']= $negocio;
			$data['tiemponegocio']=$this->tiempoTranscurridoFechas($negocio['inicio_actividad'],date('Y-m-d'));
			$data['distritoneg']=$this->general_model->obtenerdistrito($negocio['distrito_neg']);
			$data['edad']=$annos->y;
			$conyugue=$this->persona_model->obtenerpersonavista($cliente['dniconyugue']);
			$data['conyugue']=$conyugue;
			$fnac_conyugue = new DateTime($conyugue['fecha_nac']);



		    $hoy = new DateTime();
		    $annos = $hoy->diff($fnac_conyugue);
			$data['edadconyugue']=$annos->y;
			$aval=$this->cliente_model->obteneraval($solicitud['codcliente']);
			$data['aval']=$aval;
			$fnac_aval = new DateTime($aval['fecha_nac']);
		    $hoy = new DateTime();
		    $annos = $hoy->diff($fnac_aval);
			$data['edadaval']=$annos->y;
			$data['distritoaval']=$this->general_model->obtenerdistrito($aval['distrito_domic']);
			$html= $this->load->view('solicitud/solicitudpdf', $data);
			// $html= $this->load->view('solicitud/solicitudpdf', $data, true);
			// $this->pdf->load_html($html);
			// $this->pdf->set_paper('A4','portrait');
			// $this->pdf->render();
			// $this->pdf->stream("repcobranza.pdf", array("Attachment" => false));			
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}	
	}
	function registrargastosnegocio(){
		$codsolicitud=$this->input->post('codsolicitud');
		$alquilerpg=$this->input->post('alquilerpg');
		$serviciospg=$this->input->post('serviciospg');
		$personalpg=$this->input->post('personalpg');
		$sunatpg=$this->input->post('sunatpg');
		$gastosfinan=$this->input->post('gastosfinan');
		$transportepg=$this->input->post('transportepg');
		$otrospg=$this->input->post('otrospg');
		$data = array(
			'idsolicitud' 		=> $codsolicitud,
			'alquiler'			=> $alquilerpg,
			'servicios'			=> $serviciospg,
			'personal'			=> $personalpg,
			'sunat'				=> $sunatpg,
			'transporte'		=> $transportepg,
			'gastosfinancieros'	=> $gastosfinan,
			'otros'				=> $otrospg
			);
		$gastosnegocio=$this->general_model->obtenergastosnegocio($codsolicitud);
		if(count($gastosnegocio)>0){
			$actualizargn = $this->general_model->actualizargastosnegocio($codsolicitud, $data);
			if($actualizargn==true){
				echo 'true';
			}else{
				echo 'false';
			}					
		}else{
			$result = $this->general_model->registrargastosnegocio($data);
			if($result==true){
				echo 'true';
			}else{
				echo 'false';
			}			
		}
	}
	function registrargastosfamiliares(){
		$codsolicitud=$this->input->post('codsolicitud');
		$alimentac=$this->input->post('alimentac');
		$alquil=$this->input->post('alquil');
		$educac=$this->input->post('educac');
		$servic=$this->input->post('servic');
		$transport=$this->input->post('transport');
		$salud=$this->input->post('salud');
		$otros_gf=$this->input->post('otros_gf');
		$total=$this->input->post('total');		
		$perdidasgananciasgral = $this->solicitud_prestamo->obtenerperdganan_gral($codsolicitud);
		$data = array(
			'idsolicitud' 		=> $codsolicitud,
			'alimentacion'		=> $alimentac,
			'alquileres'		=> $alquil,
			'educacion'			=> $educac,
			'servicios'			=> $servic,
			'transporte'		=> $transport,
			'salud'				=> $salud,
			'otros'				=> $otros_gf
			);
		$gastosfamiliares = $this->general_model->gastosfamiliares($codsolicitud);
		if(count($gastosfamiliares)>0){
			$actualizargf = $this->general_model->actualizargastosfamiliares($codsolicitud, $data);
			if($actualizargf==true){		
				echo 'true';
			}else{
				echo 'false';
			}
		}else{
			$result = $this->general_model->registrargastosfamiliares($data, $codsolicitud);
			if($result==true){
				echo 'true';
			}else{
				echo 'false';
			}
		}
	}	
	function estadosfinancieros($idsolicitud){
		$analisiscualitativo = $this->solicitud_prestamo->obteneranalisis($idsolicitud);
		$balancegeneral = $this->solicitud_prestamo->obtenerbalance($idsolicitud);
		$perdidasganancias = $this->solicitud_prestamo->obtenerperdganan_gral($idsolicitud);
		$propuestacred = $this->solicitud_prestamo->obtenerpropuestas($idsolicitud);
		if(count($analisiscualitativo)<=0){
			echo "<script type='text/javascript'> alert('NO REGISTRO ANALISIS CUALITATIVO'); ";
			echo " location.href='".base_url()."index.php/solicitud/form_evaluacion/".$idsolicitud."'; </script>";	
		}elseif(count($balancegeneral)<=0){
			echo "<script type='text/javascript'> alert('NO REGISTRO BALANCE GENERAL'); ";
			echo " location.href='".base_url()."index.php/solicitud/form_evaluacion/".$idsolicitud."'; </script>";				
		}elseif(count($perdidasganancias)<=0){
			echo "<script type='text/javascript'> alert('NO REGISTRO PERDIDAS GANANCIAS'); ";
			echo " location.href='".base_url()."index.php/solicitud/form_evaluacion/".$idsolicitud."'; </script>";					
		}elseif(count($propuestacred)<=0){
			echo "<script type='text/javascript'> alert('NO REGISTRO PROPUESTA DE CREDITO'); ";
			echo " location.href='".base_url()."index.php/solicitud/form_evaluacion/".$idsolicitud."'; </script>";		
		}else{
			redirect(base_url().'index.php/solicitud/estadosfinancierospdf__/'.$idsolicitud);
		}	
	}
	function estadosfinancierospdf__($idsolicitud){



		
		$solicitud=$this->solicitud_prestamo->obtenersolicitud2($idsolicitud);


		$solicitudanterior = $this->solicitud_prestamo->anteriorultima_solicitud($solicitud['codcliente'], $idsolicitud);



		$perdidasgananciasgralanterior = $this->solicitud_prestamo->obtenerperdganan_gral($solicitudanterior['idsolicitud']);
		$data['solicitud']=$solicitud;
		$data['cliente']=$this->cliente_model->obtener_cliente($solicitud['codcliente']);
		$balance=$this->solicitud_prestamo->obtenerbalance($idsolicitud);
		$detbalance=$this->solicitud_prestamo->obtener_detbalance($idsolicitud);
		$data['balance']=$balance;
		$data['detbalance']=$detbalance;
		$perdidasganancias = $this->solicitud_prestamo->obtenerperdganan($idsolicitud);
		$perdidasgananciasgral = $this->solicitud_prestamo->obtenerperdganan_gral($idsolicitud);
		$data['perdidasganancias']=$perdidasganancias;
		$data['perdidasgananciasgral']=$perdidasgananciasgral;
		$detperdidasganancias = $this->solicitud_prestamo->detperdidasganancias_pg($idsolicitud);
		$data['perdidasgananciasgralanterior']=$perdidasgananciasgralanterior;
		$data['detperdidasganancias'] = $detperdidasganancias;
		$data['gastosnegocios']=$this->general_model->obtenergastosnegocio($idsolicitud);
		$data['gastosfamilliares']=$this->general_model->gastosfamiliares($idsolicitud);



$this->load->view('solicitud/estadosfinancpdf', $data);

		// $html= $this->load->view('solicitud/estadosfinancpdf', $data, true);
		// $this->pdf->load_html($html);
		// $this->pdf->set_paper('A4','portrait');
		// $this->pdf->render();
		// $this->pdf->stream("repcobranza.pdf", array("Attachment" => false));







	}
	function versegurodesgravamen($idsolicitud){
		$poliza=$this->solicitud_prestamo->obtenerpoliza($idsolicitud);
		if(is_null($poliza)){
			$data = array(
				'codigo' 		=> '00001',
				'idsolicitud'	=> $idsolicitud,
				'monto'			=> 2
			 );
			$poliza=$data;
		}
		$data['poliza']= $poliza;
		$data['solicitud']=$this->solicitud_prestamo->obtenersolicitud2($idsolicitud);
		$this->load->view('solicitud/segurodesgravampdf', $data);
		// $html= $this->load->view('solicitud/segurodesgravampdf', $data, true);
		// $this->pdf->load_html($html);
		// $this->pdf->set_paper('A4','portrait');
		// $this->pdf->render();
		// $this->pdf->stream("segurodesgravamen.pdf", array("Attachment" => false));



	}
	function enviarsolicitud($idsolicitud){
		if($this->session->userdata('idusuario')){
			$idsolicitud = $this->input->post('nrosolicitud');
			$data = array('estado' => 'EVALUACION');
			$resultado=$this->solicitud_prestamo->actualizarsolic($data, $idsolicitud);
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			if($resultado==true){
				$data['footer']='principal/footer2';
				$data['content']='solicitud/solicitudenviado';
				$data['solicitud']=$this->solicitud_prestamo->obtenersolicitud2($idsolicitud);
			}else{
				$data['footer']='principal/footer2';
				$data['content']='principal/mensajeprohibido';
				$data['mensaje']='NO SE PUDO ENVIAR CONSULTE A SU SOPORTE';
			}
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";
		}	
	}
	function observarsolicitud(){
		$observacionsol = $this->input->post('observacionsol');
		$codsolicitud = $this->input->post('codsolicitud');
		$data=array(
			'estado'	  => 'PENDIENTE'
		);
		$resultado = $this->solicitud_prestamo->actualizarsolic($data, $codsolicitud);
		$data2 = array(
			'idsolicitud' => $codsolicitud,
			'descripcion' => $observacionsol,
			'fecha_reg'	  => date('Y-m-d'),
			'idusuario'	  => $this->session->userdata('idusuario'),
			'estado'	  => 'OBSERVADO'
			 );
		$regobservacion = $this->solicitud_prestamo->registrarobservacion($data2);
		$eliminarevaluacion = $this->solicitud_prestamo->eliminarevaluacion($codsolicitud);		
		if($resultado==true && $regobservacion==true){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function resolverobservacion($idobservacion){
		$data = array('estado' => 'RESUELTO');
		$result = $this->solicitud_prestamo->cambiareobservacion($idobservacion, $data);
		if($result==true){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function tieneobservaciones($idsolicitud){
		$cantidad = $this->solicitud_prestamo->cantidadobservacionesnr($idsolicitud);
		if($cantidad>0){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function tieneanalisicualitativo($idsolicitud){
		$analisiscualitativo = $this->solicitud_prestamo->obteneranalisis($idsolicitud);	
		if(count($analisiscualitativo)>0){	
			echo 'true';	
		}else{
			echo 'false';		
		}
	}
	function analisiscualitativopdf($idsolicitud){
		$analisiscualitativo = $this->solicitud_prestamo->obteneranalisis($idsolicitud);
		if(count($analisiscualitativo)>0){
			$data['analisiscualitativo'] = 	$analisiscualitativo;
			$html= $this->load->view('solicitud/analisiscualitativopdf', $data, true);
			$this->pdf->load_html($html);
			$this->pdf->set_paper('A4','portrait');
			$this->pdf->render();
			$this->pdf->stream("repcobranza.pdf", array("Attachment" => false));
		}else{
			echo "<script type='text/javascript'> alert('NO EXISTEN REGISTROS DE ANALISIS CUALITATIVO'); ";
			echo " location.href='".base_url()."index.php'; </script>";
		}
	}
	function propuestacreditopdf($idsolicitud){
		$propuestacred = $this->solicitud_prestamo->obtenerpropuestas($idsolicitud);
		if(count($propuestacred)>0){
			$data['solicitud']= $this->solicitud_prestamo->obtenersolicitud2($idsolicitud);
			$data['propuestacred'] = $propuestacred;
			$this->load->view('solicitud/propuestacredito', $data);
			// $html= $this->load->view('solicitud/propuestacredito', $data, true);
			// $this->pdf->load_html($html);
			// $this->pdf->set_paper('A4','portrait');
			// $this->pdf->render();
			// $this->pdf->stream("repcobranza.pdf", array("Attachment" => false));
		}else{
			echo "<script type='text/javascript'> alert('NO EXISTEN REGISTROS DE PROPUESTA DE CREDITO'); ";
			echo " location.href='".base_url()."index.php/solicitud/form_evaluacion/".$idsolicitud."'; </script>";
		}
	}
	function eliminar($idsolicitud){
		$solicitud = $this->solicitud_prestamo->obtenersolicitud($idsolicitud);
		if($this->session->userdata('idusuario')){
			if($solicitud['idasesor']==$this->session->userdata('idusuario') && $solicitud['estado']=='PENDIENTE'){
				$eliminarsolic=$this->solicitud_prestamo->eliminarsolicitud($idsolicitud);
				
				if($eliminarsolic==true){
					redirect(base_url().'index.php/solicitud/lista_solicitudesgeneral');
				}else{
					echo "<script type='text/javascript'> alert('NO SE PUDO ELIMINAR'); ";
					echo " location.href='".base_url()."index.php'; </script>";						
				}
			}else{
				echo "<script type='text/javascript'> alert('USTED NO TIENE ACCESO A ESA FUNCION O EL ESTADO NO ES PENDIENTE'); ";
				echo " location.href='".base_url()."index.php'; </script>";				
			}
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";
		}
	}
	function cambiarmora($iddesembolso, $nrocuota, $mora){
		if($this->session->userdata('tipouser')==1 || $this->session->userdata('tipouser')==3 || $this->session->userdata('tipouser')==4){
			$result=$this->operaciones_model->actualizarmora($iddesembolso, $nrocuota, $mora);
			if($result==true){
				echo 'true';
			}else{
				echo 'false';
			}
		}else{
			echo 'false cambiar de usuario';
		}
	}
	function cambiarasesorsol(){
		$idasesor=$this->input->post('idasesor');
		$idsolicitud=$this->input->post('idsolicitud');
		$result = $this->solicitud_prestamo->actualizarsolic(array('idasesor' => $idasesor), $idsolicitud);
		if($result==true){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function vercodigodebarras(){
		$this->load->view('solicitud/generarcodigobarras');
	}
}
