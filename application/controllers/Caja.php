<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
class Caja extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('caja_model');
		$this->load->model('solicitud_prestamo');	
		$this->load->model('operaciones_model');
		$this->load->model('general_model');
		$this->load->model('usuario_model');
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
	public function index()	{
	}
	function cerrarcajaform(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer4';
			$data['content']='caja/cerrarcaja';
			$data['saldo']=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
			$data['registroingcajahoy']=$this->caja_model->registroingcajahoy(date('Y-m-d'), $this->session->userdata('agencia'));
			$data['registroegrecajahoy']=$this->caja_model->registroegrecajahoy(date('Y-m-d'), $this->session->userdata('agencia'));
			$data['usuarios']=$this->usuario_model->listausuariosagencia($this->session->userdata('agencia'));
			$fecha = strtotime ( '-1 day' , strtotime (date('Y-m-d')) ) ;
			$fecha = date ( 'Y-m-j' , $fecha );	
			if($this->general_model->existediaferiado($fecha)==true){
				$fecha = strtotime( '-1 day' , strtotime($fecha)) ;
				$fecha = date ( 'Y-m-d' , $fecha );						
			}
			$data['registroscc']=$this->caja_model->cierrecajaultimo($this->session->userdata('agencia'));
			$data['cantasesorconsaldo']=$this->caja_model->cantasesorconsaldo($this->session->userdata('agencia'));
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function registrosingresossalidapdf(){
		if($this->session->userdata('tipouser')>2){
			$data['registroingcajahoy']=$this->caja_model->registroingcajahoy(date('Y-m-d'), $this->session->userdata('agencia'));
			$data['registroegrecajahoy']=$this->caja_model->registroegrecajahoy(date('Y-m-d'), $this->session->userdata('agencia'));
			$data['registroscc']=$this->caja_model->cierrecajaultimo($this->session->userdata('agencia'));
			$data['saldocaja'] = $this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));

			$this->load->view('caja/ingresosegresoshoypdf.php',$data);

			
			// $this->pdf->load_html($html);
			// $this->pdf->set_paper('A4','portrait');
			// $this->pdf->render();
			// $this->pdf->stream("ingresosegresos.pdf", array("Attachment" => false));

			
		}else{
			echo "<script type='text/javascript'> alert('SOLO EL USUARIO DE OPERACIONES TIENE ACCESO'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function cantasesorconsaldo(){
		if($this->caja_model->cantasesorconsaldo()>0){	
			echo 'true';
		}else{		
			echo 'false';
		}					
	}
	function cerrarcaja(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$fecha_hora = $this->input->post('fecha_hora');
			$saldocaja = $this->input->post('saldocaja');
			$observacion = $this->input->post('observacion');
			$data = array(
				'fecha_hora' 	=> $fecha_hora,
				'idusuario'		=> $this->session->userdata('idusuario'),
				'agencia'		=> $this->session->userdata('agencia'),
				'cantidad'		=> $saldocaja,
				'observacion'	=> $observacion
			);
			$result=$this->caja_model->cerrarcaja($data);
			if($result==true){
				$this->cierrecajaxitoso();
			}else{
				echo 'NO SE PUDO CERRAR CAJA';
			}
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function existenasesorescsaldo(){
		if($this->caja_model->cantasesorconsaldo()>0){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function cierrecajaxitoso(){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['footer']='principal/footer4';		
		$data['content']='pagos/cierrecajaexitoso';
		$this->load->view('index',$data);
	}
	function detalledecaja(){//se utiliza para cerrar caja
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer4';		
			$data['content']='caja/detcaja';
			$data['saldo']=$this->caja_model->obtenersaldo();
			$data['registros']=$this->caja_model->listarregcajaxfech(date('Y-m-d'));
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
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
	function cajabancosoperaciones(){//operaciones general
		if($this->validarusuario($this->session->userdata('tipouser'), 3, 3)==true){//OPERACIONES Y COBRANZA
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer4';		
			$data['content']='caja/cajabancosoperaciones';

			$data['registroshco']=$this->caja_model->regcufeag(date('Y-m-d'), 'HUANUCO');
			$data['registros2hco']=$this->caja_model->regcufeag2(date('Y-m-d'), 'HUANUCO');
			$data['registrostma']=$this->caja_model->regcufeag(date('Y-m-d'), 'TINGO MARIA');
			$data['registros2tma']=$this->caja_model->regcufeag2(date('Y-m-d'), 'TINGO MARIA');
			$data['registroshco2']=$this->caja_model->regcufeag(date('Y-m-d'), 'HUANUCO2');
			$data['registros2hco2']=$this->caja_model->regcufeag2(date('Y-m-d'), 'HUANUCO2');			

			$data['saldohco']=$this->caja_model->obtenersaldoagencia('HUANUCO');
			$data['saldotma']=$this->caja_model->obtenersaldoagencia('TINGO MARIA');
			$data['saldohco2']=$this->caja_model->obtenersaldoagencia('HUANUCO2');

			$data['bancohuanuco']=$this->caja_model->saldobancoagencia('HUANUCO');
			$data['bancotm']=$this->caja_model->saldobancoagencia('TINGO MARIA');
			$data['bancohco2']=$this->caja_model->saldobancoagencia('HUANUCO2');



			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> location.href='".base_url()."index.php'; </script>";	
		}	
	}
	function cajabancosoperaciones_ger(){//operaciones general
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer4';		
			$data['content']='caja/cajabancosoperaciones';

			$data['registroshco']=$this->caja_model->regcufeag(date('Y-m-d'), 'HUANUCO');
			$data['registros2hco']=$this->caja_model->regcufeag2(date('Y-m-d'), 'HUANUCO');
			$data['registrostma']=$this->caja_model->regcufeag(date('Y-m-d'), 'TINGO MARIA');
			$data['registros2tma']=$this->caja_model->regcufeag2(date('Y-m-d'), 'TINGO MARIA');
			$data['registroshco2']=$this->caja_model->regcufeag(date('Y-m-d'), 'HUANUCO2');
			$data['registros2hco2']=$this->caja_model->regcufeag2(date('Y-m-d'), 'HUANUCO2');			

			$data['saldohco']=$this->caja_model->obtenersaldoagencia('HUANUCO');
			$data['saldotma']=$this->caja_model->obtenersaldoagencia('TINGO MARIA');
			$data['saldohco2']=$this->caja_model->obtenersaldoagencia('HUANUCO2');

			$data['bancohuanuco']=$this->caja_model->saldobancoagencia('HUANUCO');
			$data['bancotm']=$this->caja_model->saldobancoagencia('TINGO MARIA');
			$data['bancohco2']=$this->caja_model->saldobancoagencia('HUANUCO2');



			$this->load->view('index',$data);

	}

	function cajabancoscobranza(){//cobranza por agencia
		if($this->validarusuario($this->session->userdata('tipouser'), 4, 4)==true){//OPERACIONES Y COBRANZA
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer4';		
			$data['content']='caja/cajabanco';
			$agencia=$this->session->userdata('agencia');
			$data['registros']=$this->caja_model->regcufeag(date('Y-m-d'), $agencia);
			$data['registros2']=$this->caja_model->regcufeag2(date('Y-m-d'), $agencia);		
			$data['saldo']=$this->caja_model->obtenersaldoagencia($agencia);
			$data['saldobancos']=$this->caja_model->saldobancoagencia($agencia);
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> location.href='".base_url()."index.php'; </script>";	
		}	
	}	
	function transfdebancos(){
		$monto=$this->input->post('montotransferir');
		$saldocaja=$this->input->post('saldocaja');
		$conceptoingreso = 'TRANSFERENCIA DE BANCO PARA DESEMBOLSO';
		$codigocaja=$this->caja_model->maximocod();
		$data=array(
				'idreg'			=> $codigocaja+1,
				'fecha_hora'	=> date('Y-m-d H:i:s'),
				'codusuario'	=> $this->session->userdata('idusuario'),
				'agencia'		=> $this->session->userdata('agencia'),
				'cantidad'		=> $monto,
				'tipo'			=> 'INGRESO',
				'saldo'			=> $saldocaja+$monto,
				'descripcion'	=> 'INGRESO POR : '.$conceptoingreso
			);
		$regcaja = $this->caja_model->registrarcaja($data);
		if($regcaja==true){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function eliminarregcaja($idcaja){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')==3){
			$registro = $this->caja_model->obtenerregcaja($idcaja);
			if($this->caja_model->eliminarregcaja($idcaja)==true){
				$this->cuadrarregcajapordia(date('Y-m-d'), $registro['agencia']);
				redirect(base_url().'index.php/caja/cajabancosoperaciones');
			}else{
				echo "<script type='text/javascript'> alert('NO SE PUDO PROCESAR'); ";
				echo " location.href='".base_url()."index.php'; </script>";	
			}
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function gastosform(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer4';		
			$data['content']='caja/gastosform';
			$data['registros']=$this->caja_model->registrosegresos(date('Y-m-d'), $this->session->userdata('agencia'), 'GST');
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}			
	}
	function costosform(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer4';		
			$data['content']='caja/costosform';
			$data['registros']=$this->caja_model->registrosegresos(date('Y-m-d'), $this->session->userdata('agencia'), 'CST');
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}			
	}	
	function devdocoform(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer4';		
			$data['content']='caja/devdocoform';
			$data['registros']=$this->caja_model->obteneregistrosegrgesods(date('Y-m-d'), $this->session->userdata('agencia'));
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}			
	}	
	function ingresoform(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer4';		
			$data['content']='caja/ingresoform';
			$data['registros']=$this->caja_model->obteneregistrosingresds(date('Y-m-d'), $this->session->userdata('agencia'));
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}
	}
	function ingresodocoform(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer4';		
			$data['content']='caja/ingresodocoform';
			$data['registros']=$this->caja_model->obteneregistrosingresds(date('Y-m-d'), $this->session->userdata('agencia'));
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}
	}
	function regingreso(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$montoingreso = $this->input->post('montoingreso');
			$conceptoingreso = $this->input->post('conceptoingreso');
			$codigocaja=$this->caja_model->maximocod();
			$saldocaja=$this->caja_model->obtenersaldo();
			$data=array(
					'idreg'			=> $codigocaja+1,
					'fecha_hora'	=> date('Y-m-d H:i:s'),
					'codusuario'	=> $this->session->userdata('idusuario'),
					'agencia'		=> $this->session->userdata('agencia'),
					'cantidad'		=> $montoingreso,
					'tipo'			=> 'INGRESO',
					'saldo'			=> $saldocaja+$montoingreso,
					'descripcion'	=> 'INGRESO POR : '.$conceptoingreso
				);
			$regcaja = $this->caja_model->registrarcaja($data);
			if($regcaja==true){
				$this->gastoregistrado($codigocaja+1);
			}
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";
		}		
	}
	function regingresodoco(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$montoingreso = $this->input->post('montoingreso');
			$conceptoingreso = $this->input->post('conceptoingreso');
			$codigocaja=$this->caja_model->maximocod();
			$saldocaja=$this->caja_model->obtenersaldo();
			$data=array(
					'idreg'			=> $codigocaja+1,
					'fecha_hora'	=> date('Y-m-d H:i:s'),
					'codusuario'	=> $this->session->userdata('idusuario'),
					'agencia'		=> $this->session->userdata('agencia'),
					'cantidad'		=> $montoingreso,
					'tipo'			=> 'INGRESO',
					'saldo'			=> $saldocaja+$montoingreso,
					'descripcion'	=> 'ING. DOCO : '.$conceptoingreso
				);
			$regcaja = $this->caja_model->registrarcaja($data);
			if($regcaja==true){
				$this->gastoregistrado($codigocaja+1);
			}
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";
		}		
	}
	function reggastos(){//o costos
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$montogasto = $this->input->post('montogasto');
			$conceptogasto = $this->input->post('conceptogasto');
			$tipocomprobante = $this->input->post('tipocomprobante');
			$tipogasto = $this->input->post('tipogasto');
			$codigocaja=$this->caja_model->maximocod();
			$saldocaja=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
			$estado = $this->input->post('estado');
			if($tipocomprobante!='Ninguno'){
				$ruc = $this->input->post('ruc');
				$rs = $this->input->post('razonsocial');
				$nrocomprobante = $this->input->post('nrocomprobante');							
				$descripcion = 'EGRESO POR : '.$conceptogasto.' RUC : '.$ruc.' RAZON SOCIAL : '.$rs.' NRO : '.$nrocomprobante;
			}else{
				$descripcion = 'EGRESO POR : '.$conceptogasto;
			}
			$data=array(
					'idreg'			=> $codigocaja+1,
					'fecha_hora'	=> date('Y-m-d H:i:s'),
					'codusuario'	=> $this->session->userdata('idusuario'),
					'agencia'		=> $this->session->userdata('agencia'),
					'cantidad'		=> $montogasto,
					'tipo'			=> 'SALIDA',
					'saldo'			=> $saldocaja-$montogasto,
					'descripcion'	=> $descripcion,
					'gastocosto'	=> $estado.'. '.$tipogasto
				);
			$regcaja = $this->caja_model->registrarcaja($data);
			if($regcaja==true){
				//$this->gastoregistrado($codigocaja+1);
				redirect(base_url().'index.php/caja/gastosform');
			}
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}		
	}

	function regegdoco(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$montogasto = $this->input->post('montogasto');
			$conceptogasto = $this->input->post('conceptogasto');
			$codigocaja=$this->caja_model->maximocod();
			$saldocaja=$this->caja_model->obtenersaldo();
			$data=array(
					'idreg'			=> $codigocaja+1,
					'fecha_hora'	=> date('Y-m-d H:i:s'),
					'codusuario'	=> $this->session->userdata('idusuario'),
					'agencia'		=> $this->session->userdata('agencia'),
					'cantidad'		=> $montogasto,
					'tipo'			=> 'SALIDA',
					'saldo'			=> $saldocaja-$montogasto,
					'descripcion'	=> 'EG. DOCO : '.$conceptogasto
				);
			$regcaja = $this->caja_model->registrarcaja($data);
			if($regcaja==true){
				$this->gastoregistrado($codigocaja+1);
			}
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}		
	}
	function cargarvistaingentrefechas($fechainicio, $fechafin){
		$data['registros']=$this->caja_model->obteneregistrosingresef($fechainicio, $fechafin, $this->session->userdata('agencia'));
		$data['tipouser']=$this->session->userdata('tipouser');
		$this->load->view('caja/detallecaja',$data);
	}
	function cargarvistacajaegresoef($fechainicio, $fechafin){//INGRESOS DIFERENTES A LOS PAGOS ENTRE FECHAS
		$data['registros']=$this->caja_model->obteneregistrosegrgesef($fechainicio, $fechafin, $this->session->userdata('agencia'));
		$data['tipouser']=$this->session->userdata('tipouser');
		$this->load->view('caja/detallecaja',$data);
	}		
	function cargarvistadetcajatable(){
		$fecha=$this->input->post('fechadetcaja');
		$data['registros']=$this->caja_model->listarregcajaxfech($fecha);
		$data['tipouser']=$this->session->userdata('tipouser');		
		$this->load->view('caja/cajadettabla',$data);
	}
	function cargardetcajaeft($fechainicio, $fechafin){
		$data['registros']=$this->caja_model->detcajaentrefechas($fechainicio, $fechafin);
		$data['registros2']=$this->caja_model->detcajaentrefechas2($fechainicio, $fechafin);
		$data['tipouser']=$this->session->userdata('tipouser');	
		$this->load->view('caja/cajadettabla',$data);
	}

	function gastoregistrado($idcaja){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['caja']=$this->caja_model->obtenerregcaja($idcaja);
		$data['footer']='principal/footer';
		$data['content']='caja/regcajagastos';
		$this->load->view('index',$data);		
	}

	function cajadesembolsoform($iddesembolso, $totaldescaja){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$desembolso=$this->solicitud_prestamo->obtenerdesembolso($iddesembolso);
		 	$saldocaja= $this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
			$saldobanco=$this->caja_model->saldobancoagencia($this->session->userdata('agencia'));
			$data=$this->retornarheader($this->session->userdata('tipouser'));	
			$data['totaldescaja']=$totaldescaja;
			$data['desembolso']=$desembolso;
			$data['saldocaja']=$saldocaja;
			$data['saldobancos']=$saldobanco;
			$data['polizareg']=$this->solicitud_prestamo->obtenerpoliza($desembolso['idsolicitud']);
			$data['footer']='principal/footer4';		
			$data['content']='caja/cajadesembolsoform';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session el Usuario de Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}

	function regdesembolso(){//registrar desembolso en caja
		$pagocaja = $this->input->post('totalpagardes');
		$iddesembolso = $this->input->post('iddesembolso');
		$montopoliza = $this->input->post('montopoliza');
		$saldocaja = $this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
		$desembolso=$this->operaciones_model->vistasolicitdesembolsadosid($iddesembolso);
		$idreg = $this->caja_model->maximocod();
		$saldo = $saldocaja-$pagocaja;
	 	$datacaja=array(
	 			'idreg'			=> $idreg+1,
	 			'fecha_hora' 	=> date('Y-m-d H:i:s'),
	 			'codusuario'	=> $this->session->userdata('idusuario'),
	 			'agencia'		=> $this->session->userdata('agencia'),
	 			'cantidad'		=> $pagocaja,
	 			'tipo'			=> 'SALIDA',
	 			'saldo'			=> $saldo,
	 			'descripcion'	=> 'DESEMBOLSO ID : '.$iddesembolso.', ID SOLIC : '.$desembolso['idsolicitud'].', CLIENTE : '.$desembolso['apenom'].' ASESOR : '.$desembolso['idasesor']
	 		);
	 	$saldo += $montopoliza;
		 	$datacaja2=array(
	 			'idreg'			=> $idreg+2,
	 			'fecha_hora' 	=> date('Y-m-d H:i:s'),
	 			'codusuario'	=> $this->session->userdata('idusuario'),
	 			'agencia'		=> $this->session->userdata('agencia'),
	 			'cantidad'		=> $montopoliza,
	 			'tipo'			=> 'INGRESO',
	 			'saldo'			=> $saldo,
	 			'descripcion'	=> 'SEGURO DESGRAVAMEN DESEMBOLSO ID : '.$iddesembolso.', CLIENTE : '.$desembolso['apenom'].' ASESOR : '.$desembolso['idasesor']				 		
		 	);

		$regcaja = $this->caja_model->registrarcaja($datacaja);
		$regcaja2 = $this->caja_model->registrarcaja($datacaja2);
		if($regcaja == true){
			echo "<script type='text/javascript'> alert('REGISTRADO CON EXITO'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}else{
			echo "<script type='text/javascript'> alert('NO SE PUDO REGISTRAR'); ";
			echo " location.href='".base_url()."index.php/caja/cajadesembolsoform/".$iddesembolso."'; </script>";				
		}
	}
	function formbancos(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$saldobanco=$this->caja_model->saldobanco();
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['saldobancos']=$saldobanco;
			$data['registrosbancos']=$this->caja_model->listaregbancos();
			$data['footer']='principal/footer';		
			$data['content']='caja/formbancos';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session el Usuario de Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function transferencia(){//F
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')==3){
		 	$saldocajahco= $this->caja_model->obtenersaldoagencia('HUANUCO');
		 	$saldocajahco2= $this->caja_model->obtenersaldoagencia('HUANUCO2');
			$saldocajatm= $this->caja_model->obtenersaldoagencia('TINGO MARIA');			
			$saldobancohco=$this->caja_model->saldobancoagencia('HUANUCO');
			$saldobancohco2=$this->caja_model->saldobancoagencia('HUANUCO2');
			$saldobancotm=$this->caja_model->saldobancoagencia('TINGO MARIA');
		 	$data=$this->retornarheader($this->session->userdata('tipouser'));
		 	$data['registroscajahoy']=$this->caja_model->transferenciascaja();
		 	$data['registrosbancohoy']=$this->caja_model->transferenciasbanco();	 	
			$data['saldobancohco']=$saldobancohco;
			$data['saldobancohco2']=$saldobancohco2;
			$data['saldobancotm']=$saldobancotm;
			$data['saldocajahco']=$saldocajahco;
			$data['saldocajahco2']=$saldocajahco2;
			$data['saldocajatm']=$saldocajatm;
			$data['footer']='principal/footer';		
			$data['content']='caja/transferencia';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session el Usuario de Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}			
	}
	function transferir(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$desde=$this->input->post('transfdesde');
			$hasta=$this->input->post('transfhasta');
			$saldocajahco=$this->input->post('saldocajahco');
			$saldobancohco=$this->input->post('saldobancohco');
			$saldocajahco2=$this->input->post('saldocajahco2');
			$saldobancohco2=$this->input->post('saldobancohco2');			
			$saldocajatm=$this->input->post('saldocajatm');
			$saldobancotm=$this->input->post('saldobancotm');
			if($desde!=$hasta){
				$monto=$this->input->post('montotransferencia');
				switch($desde){
					case 'CAJA HCO': 
						$idreg=$this->caja_model->maximocod();
						$agencia = 'HUANUCO';
						$saldo = $saldocajahco-$monto;
						$tabla = 'caja';
						break;
					case 'CAJA HCO2': 
						$idreg=$this->caja_model->maximocod();
						$agencia = 'HUANUCO2';
						$saldo = $saldocajahco2-$monto;
						$tabla = 'caja';
						break;
					case 'CAJA TINGO':
						$idreg=$this->caja_model->maximocod();
						$agencia = 'TINGO MARIA';
						$saldo = $saldocajatm-$monto;
						$tabla = 'caja';
						break;
					case 'BANCO HCO':
						$idreg=$this->caja_model->maximocodbancos();
						$agencia = 'HUANUCO';
						$saldo = $saldobancohco-$monto;
						$tabla = 'banco';
						break;
					case 'BANCO HCO2':
						$idreg=$this->caja_model->maximocodbancos();
						$agencia = 'HUANUCO2';
						$saldo = $saldobancohco2-$monto;
						$tabla = 'banco';
						break;					
					case 'BANCO TINGO':
						$idreg=$this->caja_model->maximocodbancos();
						$agencia = 'TINGO MARIA';
						$saldo = $saldobancotm-$monto;
						$tabla = 'banco';
						break;

					default:
				}
				$datadesde=array(
					$tabla=='caja' ? 'idreg' : 'id' => $idreg+1,
					'fecha_hora'	=> date('Y-m-d H:i:s'),
					'codusuario'	=> $this->session->userdata('idusuario'),
					'agencia'		=> $agencia,
					'cantidad'		=> $monto,
					'tipo'			=> 'SALIDA',
					'saldo'			=> $saldo,
					'descripcion'	=> 'TRANSFERENCIA DESDE '.$desde.' HASTA '.$hasta
				);
				if($tabla=='caja'){
					$regcaja = $this->caja_model->registrarcaja($datadesde);
				}else{
					$regbancos = $this->caja_model->registrarbancos($datadesde);
				}
				switch($hasta){
					case 'CAJA HCO': 
						$idreg=$this->caja_model->maximocod();
						$agencia = 'HUANUCO';
						$saldo = $saldocajahco+$monto;
						$tabla = 'caja';
						break;
					case 'CAJA HCO2': 
						$idreg=$this->caja_model->maximocod();
						$agencia = 'HUANUCO2';
						$saldo = $saldocajahco2+$monto;
						$tabla = 'caja';
						break;
					case 'CAJA TINGO':
						$idreg=$this->caja_model->maximocod();				
						$agencia = 'TINGO MARIA';
						$saldo = $saldocajatm+$monto;
						$tabla = 'caja';
						break;
					case 'BANCO HCO':
						$idreg=$this->caja_model->maximocodbancos();
						$agencia = 'HUANUCO';
						$saldo = $saldobancohco+$monto;
						$tabla = 'banco';
						break;
					case 'BANCO HCO2':
						$idreg=$this->caja_model->maximocodbancos();
						$agencia = 'HUANUCO2';
						$saldo = $saldobancohco2+$monto;
						$tabla = 'banco';
						break;					
					case 'BANCO TINGO':
						$idreg=$this->caja_model->maximocodbancos();
						$agencia = 'TINGO MARIA';
						$saldo = $saldobancotm+$monto;
						$tabla = 'banco';
						break;
					default:
				}
				$datahasta=array(
					$tabla=='caja' ? 'idreg' : 'id' => $idreg+1,
					'fecha_hora'	=> date('Y-m-d H:i:s'),
					'codusuario'	=> $this->session->userdata('idusuario'),
					'agencia'		=> $agencia,
					'cantidad'		=> $monto,
					'tipo'			=> 'INGRESO',
					'saldo'			=> $saldo,
					'descripcion'	=> 'TRANSFERENCIA DESDE '.$desde.' HASTA '.$hasta
				);
				if($tabla=='caja'){
					$regcaja = $this->caja_model->registrarcaja($datahasta);
				}else{
					$regbancos = $this->caja_model->registrarbancos($datahasta);
				}
				redirect(base_url().'index.php/caja/transferencia');
			}else{
				redirect(base_url().'index.php/caja/transferencia');
			}
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session el Usuario de Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}		
	}
	function ingbancos(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$monto = $this->input->post('ingresobanco');
			$codigobancos = $this->caja_model->maximocodbancos()+1;
			$entidadingresobancos = $this->input->post('entidadingresobancos');
			$comprobanteingbancos = $this->input->post('comprobanteingbancos');
			$fechaingbancos = $this->input->post('fechaingbancos');
			$descingbancos = $this->input->post('descingbancos');
			$saldooriginal = $this->caja_model->saldobanco();
			$data = array(
				'id' => $codigobancos, 
				'fecha_hora' => $fechaingbancos,
				'codusuario' => $this->session->userdata('idusuario'),
				'cantidad'	 => $monto,
				'tipo'		 => 'INGRESO',
				'saldo'		 => $saldooriginal+$monto,
				'codvaucher' => $comprobanteingbancos,
				'entidad'	 => $entidadingresobancos,
				'descripcion'=> $descingbancos);
			$result= $this->caja_model->registrarbancos($data);
			if($result==true){
				echo "<script type='text/javascript'> alert('SE REGISTRO CON EXITO'); ";
				echo " location.href='".base_url()."index.php/caja/formbancos'; </script>";					
			}else{
				echo "<script type='text/javascript'> alert('NO SE PUDO REGISTRAR'); ";
				echo " location.href='".base_url()."index.php/caja/formbancos'; </script>";					
			}
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session el Usuario de Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}		
	}
	function salidabancos(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$monto = $this->input->post('salidabanco');
			$codigobancos = $this->caja_model->maximocodbancos()+1;
			$comprobantesalidabanco = $this->input->post('comprobantesalidabanco');
			$fechasalidabancos = $this->input->post('fechasalidabancos');
			$descripcionsalidabancos = $this->input->post('descripcionsalidabancos');
			$saldooriginal = $this->caja_model->saldobanco();
			$data = array(
				'id' => $codigobancos, 
				'fecha_hora' => $fechasalidabancos,
				'codusuario' => $this->session->userdata('idusuario'),
				'cantidad'	 => $monto,
				'tipo'		 => 'SALIDA',
				'saldo'		 => $saldooriginal-$monto,
				'codvaucher' => $comprobantesalidabanco,
				'descripcion'=> $descripcionsalidabancos);
			$result= $this->caja_model->registrarbancos($data);
			if($result==true){
				echo "<script type='text/javascript'> alert('SE REGISTRO CON EXITO'); ";
				echo " location.href='".base_url()."index.php/caja/formbancos'; </script>";					
			}else{
				echo "<script type='text/javascript'> alert('NO SE PUDO REGISTRAR'); ";
				echo " location.href='".base_url()."index.php/caja/formbancos'; </script>";					
			}
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session el Usuario de Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}		
	}	
	function regpagoscuotas(){
		$fechareg=$this->input->post('fechareg');
		$monto=$this->input->post('monto');
		$descripcion=$this->input->post('descripcion');
		$idreg=$this->caja_model->maximocod();
		$saldo=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
		$data=array(
				'idreg'			=> $idreg+1,
				'fecha_hora'	=> $fechareg,
				'codusuario'	=> $this->session->userdata('idusuario'),
				'agencia'		=> $this->session->userdata('agencia'),
				'cantidad'		=> $monto,
				'tipo'			=> 'INGRESO',
				'saldo'			=> $saldo+$monto,
				'descripcion'	=> $descripcion
			);
		$regcaja=$this->caja_model->registrarcaja($data);
		if($regcaja==true){
			echo $idreg+1;
		}else{
			echo 'false';			
		}
	}
	function regpagoscuotasvarios(){//cuando se cancela en recurrente con saldo los desembolsos
		$lista=$this->input->post('caja');
		$idreg=$this->caja_model->maximocod();
		$saldo=$this->caja_model->obtenersaldo();
		$i=0;
		foreach ($lista as $row) {
			$idreg+=1;
			$saldo+=$row['monto'];
			$data=array(
				'idreg'			=> $idreg,
				'fecha_hora'	=> $row['fechareg'],
				'codusuario'	=> $this->session->userdata('idusuario'),
				'agencia'		=> $this->session->userdata('agencia'),
				'cantidad'		=> $row['monto'],
				'tipo'			=> 'INGRESO',
				'saldo'			=> $saldo,
				'descripcion'	=> $row['descripcion']
			);
			$regcaja=$this->caja_model->registrarcaja($data);
			if($regcaja!=true){
				echo 'error no se pudo guardar';
				return false;
			}
			$i++;
		}
		if($i>0){
			echo "<script type='text/javascript'> alert('Se registro con exito en caja'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}
	}
	function eliminarregbanco($id){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$this->caja_model->eliminarregbanco($id);
			echo "<script type='text/javascript'> ";
			echo " location.href='".base_url()."index.php/caja/formbancos'; </script>";				
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session el Usuario de Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}
	}
	function formcuadrarcajadia(){
		$data=$this->retornarheader($this->session->userdata('tipouser'));		
		$data['footer']='principal/footer4';		
		$data['content']='caja/cuadrarcajaform';		
		if($this->session->userdata('tipouser')==3){
			$data['saldohco']=$this->caja_model->obtenersaldoagencia('HUANUCO');
			$data['saldohco2']=$this->caja_model->obtenersaldoagencia('HUANUCO2');			
			$data['saldotma']=$this->caja_model->obtenersaldoagencia('TINGO MARIA');
			$data['bancohuanuco']=$this->caja_model->saldobancoagencia('HUANUCO');
			$data['bancohuanuco2']=$this->caja_model->saldobancoagencia('HUANUCO2');
			$data['bancotm']=$this->caja_model->saldobancoagencia('TINGO MARIA');
		}else{
			$data['saldo']=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
			//$data['banco']=$this->caja_model->saldobancoagencia($this->session->userdata('agencia'));			
		}
		$this->load->view('index',$data);				
	}
	function cuadrarregcajapordia($fecha, $agencia){//solo por dia y agencia
		$registros = $this->caja_model->registrosdiaagencia($fecha, $agencia);
		$filainicial=$registros[0];		
		// $idanterior=$filainicial['idreg'];
		$idanterior=$filainicial['idreg']-1;
		$registro = $this->caja_model->obtenerregcaja($idanterior);
		while($registro['agencia']!=$agencia || is_null($registro)){//QUE SOLO SEA DE LA AGENCIA
			$idanterior--;
			$registro = $this->caja_model->obtenerregcaja($idanterior);
		}
		$saldo =$registro['saldo'];		
		foreach ($registros as $row) {
			if(!is_null($registro)){
				if($row['tipo']=='SALIDA'){
					$saldo = $saldo - $row['cantidad'];
				}else{
					$saldo = $saldo + $row['cantidad'];
				}
				$this->caja_model->actualizarregistro($row['idreg'], array('saldo' => $saldo));
			}			
		}
		return true;
	}
	function cdcaja(){
		$fecha = $this->input->post('fecha');
		$agencia = $this->input->post('agencia');
		if($this->cuadrarregcajapordia($fecha, $agencia)==true){
			echo "<script type='text/javascript'> alert('ACTUALIZADO CON EXITO'); ";
			echo " location.href='".base_url()."index.php/caja/formcuadrarcajadia'; </script>";	
		}else{
			echo 'NO SE PUDO ACTUALIZAR CONSULTE A SU SOPORTE';
		}
	}
	function cuadrarregcajapordia2($fecha, $ag){//solo por dia y agencia
		if($ag=='tma'){
			$agencia = 'TINGO MARIA';
		}else{
			$agencia = 'HUANUCO';
		}
		$registros = $this->caja_model->registrosdiaagencia($fecha, $agencia);
		$filainicial=$registros[0];		
		$idanterior=$filainicial['idreg']-1;
		$registro = $this->caja_model->obtenerregcaja($idanterior);
		while($registro['agencia']!=$agencia){//QUE SOLO SEA DE LA AGENCIA
			$idanterior--;
			$registro = $this->caja_model->obtenerregcaja($idanterior);
		}
		$saldo =$registro['saldo'];		
		foreach ($registros as $row) {
			if(!is_null($registro)){
				if($row['tipo']=='SALIDA'){
					$saldo = $saldo - $row['cantidad'];
				}else{
					$saldo = $saldo + $row['cantidad'];
				}
				$this->caja_model->actualizarregistro($row['idreg'], array('saldo' => $saldo));
			}			
		}
		echo 'Nuevo Saldo es : '.$saldo;
	}
	function reportcajareal(){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['footer']='principal/footer4';		
		$data['content']='caja/historiacaja';
		$data['registros'] = $this->caja_model->historiacaja(date('Y-m-d'));		
		$this->load->view('index',$data);
	}
	function cargardethistoriacaja(){
		$fecha = $this->input->post('fecha');
		$data['registros'] = $this->caja_model->historiacaja($fecha);
		$this->load->view('caja/tablacaja', $data);	
	}
	function versaldocaja(){
		echo "S/.".$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
	}

}

/* End of file caja.php */
/* Location: ./application/controllers/caja.php */