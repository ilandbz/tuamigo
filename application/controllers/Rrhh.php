<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
class Rrhh extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Rrhh_model');
		$this->load->model('persona_model');
		$this->load->model('caja_model');		
	}
	function retornarheader($tipouser){
		switch($tipouser){
			case 1: 
				$data['header']='principal/headeradmin';
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
				$data['fechalogros']=$this->operaciones_model->ultimafechalogros();
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
			if($this->session->userdata('tipouser')==3){
				$data['registros']=$this->Rrhh_model->obtenertodopersonal2();
				$data['operaciones']=$this->Rrhh_model->ultimasoperaciones();
			}else{
				$data['registros']=$this->Rrhh_model->obtenerpersonalagencia($this->session->userdata('agencia'));
				$data['operaciones']=$this->Rrhh_model->ultimasoperacionesagencia($this->session->userdata('agencia'));
			}
			$data['footer']='principal/footer';
			$data['content']='recursoshumanos/formoperacion';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('SOLO OPERACIONES TIENE ACCESO A ESTE MODULO'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function condicionform(){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['registros']=$this->Rrhh_model->obtenerpersonalagencia($this->session->userdata('agencia'));
		$data['footer']='principal/footer';
		$data['content']='recursoshumanos/formcondicion';
		$this->load->view('index',$data);
	}
	function cargarnombremessueldo($dni){
		$meses = array( 
			1 => "Enero",
			2 => "Febrero",
			3 => "Marzo",
			4 => "Abril",
			5 => "Mayo",
			6 => "Junio",
			7 => "Julio",
			8 => "Agosto",
			9 => "Septiembre",
			10 => "Octubre",
			11 => "Noviembre",
			12 => "Diciembre");
		$ultimoregistro = $this->Rrhh_model->ultimoregpagosueldo($dni);
		if(is_null($ultimoregistro)){
			echo $meses[intval(date('m'))];	
		}else{
			$ultimoregistro['mes']+=1;
			$mes = $ultimoregistro['mes']==13 ? 1 : $ultimoregistro['mes'];
			echo $meses[$mes];			
		}
	}
	function egresosform(){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['registros']=$this->Rrhh_model->obtenerpersonalagencia($this->session->userdata('agencia'));
		$data['footer']='principal/footer';
		$data['content']='recursoshumanos/formegresos';
		$this->load->view('index',$data);
	}	
	function registraroperacion(){
		$dnipersonal = $this->input->post('personal');
		$fecha_hora = $this->input->post('fecha_hora');
		$tipo = $this->input->post('tipo');
		$tiporegistro = $this->input->post('tiporegistro');
		$monto = $this->input->post('monto');
		$deschrr = $this->input->post('descripcion');
		$tipo = $this->input->post('tipo');
		$ultimoregistropago = $this->Rrhh_model->ultimoregpagosueldo($dnipersonal);//ultimo registro de pago
		if(is_null($ultimoregistropago)){
			$mes = intval(date('m'));
		}else{
			$ultimoregistropago['mes']+=1;
			$mes = $ultimoregistropago['mes']==13 ? 1 : $ultimoregistropago['mes'];			
		}
		$persona = $this->persona_model->obtenerpersonavista($dnipersonal);
		$ultimoregistro=$this->Rrhh_model->ultimoregistro($dnipersonal, $mes);
		if(is_null($ultimoregistro)){
			$nro=1;
			$saldoinicial=0;
		}else{
			$nro=$ultimoregistro['nro']+1;
			$saldoinicial=$ultimoregistro['saldo'];
		}
		if($tipo=='INGRESO'){
			$saldo=$saldoinicial+$monto;
		}else{
			$saldo=$saldoinicial-$monto;
		}
		$data = array(
			'dni' => $dnipersonal,
			'nro' => $nro,
			'cantidad' => $monto,
			'tipo' => $tipo,
			'saldo' => $saldo,
			'fechareg' => $fecha_hora,
			'descripcion' => $deschrr,
			'tiporegistro' => $tiporegistro,
			'mes'			=> $mes,
			'usuario'		=> $this->session->userdata('idusuario')
			);
		$this->Rrhh_model->registraroperacionpersonal($data);
		//caja
		$idreg=$this->caja_model->maximocod();
		$saldo=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
		$tipocaja='SALIDA';
		$nuevosaldocaja=$saldo-$monto;	
		$data=array(
				'idreg'			=> $idreg+1,
				'fecha_hora'	=> date('Y-m-d H:i:s'),
				'codusuario'	=> $this->session->userdata('idusuario'),
				'agencia'		=> $this->session->userdata('agencia'),
				'cantidad'		=> $monto,
				'tipo'			=> $tipocaja,
				'saldo'			=> $nuevosaldocaja,
				'descripcion'	=> 'PAGO RRHH TIPO '.$tiporegistro.' EMPLEADO : '.$persona['apenom']
			);
		$regcaja=$this->caja_model->registrarcaja($data);
		redirect(base_url()."index.php/rrhh/rstaoperacionregistrado/".$dnipersonal."/".$nro."/".$mes);
	}
	function rstaoperacionregistrado($dni, $nro, $mes){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['personal']=$this->Rrhh_model->obtenerpersonal($dni);
		$data['registro']=$this->Rrhh_model->obtenerregistro($dni, $nro, $mes);
		$data['footer']='principal/footer';
		$data['content']='recursoshumanos/registradooperacion';
		$this->load->view('index',$data);			
	}
	function vaucherregistrooperacion($dni, $nro, $mes){
		$data['personal']=$this->Rrhh_model->obtenerpersonal($dni);
		$data['registro']=$this->Rrhh_model->obtenerregistro($dni, $nro, $mes);
		$this->load->view('recursoshumanos/vaucher',$data);	
	}
	function verocuentapersonal($dni){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['dni']=$dni;
		$data['operaciones'] = $this->Rrhh_model->operacionesxpersonal($dni, date('m'));
		$data['personal']=$this->Rrhh_model->obtenerpersonal($dni);
		$data['meshoy']=date('m');
		$data['footer']='principal/footer';
		$data['content']='recursoshumanos/veroperacionespersonal';
		$this->load->view('index',$data);		
	}
	function cargartablamovimientosrrhh($mes,$dni){
		$data['operaciones'] = $this->Rrhh_model->operacionesxpersonal($dni, $mes);
		$this->load->view('recursoshumanos/tablamovimientosrrhh',$data);		
	}
	function verocuentapersonalbaucher($dni, $mes){
		$data['operaciones'] = $this->Rrhh_model->operacionesxpersonal($dni, date('m'));
		$data['personal']=$this->Rrhh_model->obtenerpersonal($dni);
		$data['meshoy']=date('m');
		$this->load->view('recursoshumanos/estadopersonal',$data);		
	}	
	function sueldoform($dnipersonal, $mes){
		if($this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['mes']=$mes;
			$data['operaciones'] = $this->Rrhh_model->operacionesxpersonal($dnipersonal, $mes);
			$data['resumenes']=$this->Rrhh_model->vistaresumenmovimientos($dnipersonal, $mes);
			$data['footer']='principal/footer';
			$data['content']='recursoshumanos/formsueldo';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('SOLO OPERACIONES TIENE ACCESO A ESTE MODULO'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function validarformpagosueldo(){
		$dnipersonal = $this->input->post('dni');
		$mes = $this->input->post('mes');
		$registro = $this->Rrhh_model->obtenerregpagsueldo($dnipersonal,$mes);
		if(is_null($registro)){
			redirect(base_url()."index.php/rrhh/sueldoform/".$dnipersonal."/".$mes);
		}else{
			echo "<script type='text/javascript'> alert('YA SE PAGO EL SUELDO'); ";
			echo " location.href='".base_url()."index.php/rrhh/listapersonal'; </script>";	
		}
	}
	function registrarsueldop(){
		$apenom = $this->input->post('apenom');		
		$sueldo = $this->input->post('sueldo');
		$dni = $this->input->post('dni');
		$mes=$this->input->post('mes');
		$fechareg=date('Y-m-d H:i:s');
		$afp=$this->input->post('afp');
		$adelantos=$this->input->post('adelantos');
		$movilidad=$this->input->post('movilidad');		
		$alimentacion=$this->input->post('alimentacion');	
		$bonificacion=$this->input->post('bono');	
		$asignacion = $this->input->post('asignacion');
		$totalsueldo=$this->input->post('sueldototalmensual');
		$montocajasueldo=$this->input->post('montocajasueldo');
		$dscto=$this->input->post('dscto');
		$nombremes=$this->input->post('nombremes');
		$data = array(
			'dni'		   => $dni,
			'mes'		   => $mes,
			'fechareg'     => $fechareg, 
			'afp'		   => $afp,
			'adelantos'	   => $adelantos,
			'dscto'		   => $dscto,
			'movilidad'    => $movilidad,
			'alimentacion' => $alimentacion,
			'bonificacion' => $bonificacion,
			'asignacion'   => $asignacion,
			'sueldobasico' => $sueldo,
			'total'		   => $totalsueldo
		);
		if($this->Rrhh_model->existepagosueldo($dni, $mes)==true){
			echo "<script type='text/javascript'> alert('YA HAY REGISTRO DEL MES CON EL PERSONAL'); ";
			echo " location.href='".base_url()."index.php/rrhh/listapersonal'; </script>";	
		}else{
			if($this->Rrhh_model->registrarpagosueldo($data)==true){
				$idreg=$this->caja_model->maximocod();
				$saldo=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
				$data=array(
						'idreg'			=> $idreg+1,
						'fecha_hora'	=> $fechareg,
						'codusuario'	=> $this->session->userdata('idusuario'),
						'agencia'		=> $this->session->userdata('agencia'),
						'cantidad'		=> $montocajasueldo,
						'tipo'			=> 'SALIDA',
						'saldo'			=> $saldo-$montocajasueldo,
						'descripcion'	=> 'PAGO DE SUELDO MES '.$nombremes.' AÑO de '.date('Y').' TRABAJADOR : '.$apenom
					);
				$regcaja=$this->caja_model->registrarcaja($data);
				if($regcaja==true){
					$this->pagosueldorealizado($dni, $mes);
					// echo "<script type='text/javascript'> alert('REGISTRADO'); ";
					// echo " location.href='".base_url()."index.php/rrhh/pagosueldorealizado'; </script>";		
				}else{
					echo 'NO SE REGISTRO CORRECTAMENTE EN CAJA CONSULTE A SOPORTE';			
				}
			}else{
				echo "<script type='text/javascript'> alert('NO SE PUDO REGISTRAR'); ";
				echo " location.href='".base_url()."index.php'; </script>";				
			}			
		}

	}
	function pagosueldorealizado($dni, $mes){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['regsueldo']=$this->Rrhh_model->obtenerregpagsueldo($dni, $mes);
		$data['operaciones']=$this->Rrhh_model->operacionesxpersonal($dni, $mes);		
		$data['footer']='principal/footer';
		$data['content']='recursoshumanos/registradosueldo';
		$this->load->view('index',$data);
	}
	function pagorealizadobaucher($dni, $mes){
		$data['operaciones'] = $this->Rrhh_model->operacionesxpersonal($dni, date('m'));
		$data['personal']=$this->Rrhh_model->obtenerpersonal($dni);
		$data['regsueldo']=$this->Rrhh_model->obtenerregpagsueldo($dni, $mes);
		$data['meshoy']=date('m');
		$this->load->view('recursoshumanos/baucherpagosueldo',$data);		
	}
	function formregpersonal(){
		if($this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';
			$data['content']='recursoshumanos/formregpersonal';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('SOLO OPERACIONES TIENE ACCESO A ESTE MODULO'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function registrarpersonal(){
		$dni = $this->input->post('dni');
		$cargo = $this->input->post('cargo');	
		$fechainicio = $this->input->post('fechainicio');
		$sueldo = $this->input->post('sueldo');
		$tipo = $this->input->post('tipo');
		$data = array(
			'dni' => $dni,
			'cargo' => $cargo,
			'sueldobasico' => $sueldo,
			'fechainicio' => $fechainicio,
			'tipo'		=> $tipo);
		$resultado = $this->Rrhh_model->registrarpersonal($data);
		if($resultado == true){
			echo "<script type='text/javascript'> alert('SE REGISTRO CON EXITO'); ";
			echo " location.href='".base_url()."index.php/Rrhh/listapersonal'; </script>";				
		}else{
			echo 'NO SE PUDO REGISTRAR';
		}
	}
	function listapersonal(){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['registros']=$this->Rrhh_model->obtenerpersonalagencia($this->session->userdata('agencia'));
		$data['footer']='principal/footer';
		$data['content']='recursoshumanos/listapersonal';
		$this->load->view('index',$data);	
	}
	function reportpagosueldoform(){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['personal']=$this->Rrhh_model->obtenerpersonalagencia($this->session->userdata('agencia'));
		$data['footer']='principal/footer';
		$data['content']='recursoshumanos/formreportpagossueldos';
		$this->load->view('index',$data);	
	}
	function cargartablasueldos(){
		$fechainireg=$this->input->post('fechainireg');
		$fechafinreg=$this->input->post('fechafinreg');		
		$personal=$this->input->post('personal');
		$personal = $personal=='' ? '%' : $personal;
		$where = "dni like '".$personal."' and  fechareg >= '".$fechainireg." 00:00:00' AND fechareg <='".$fechafinreg." 23:59:59'";
		$data['listapagossueldo']=$this->Rrhh_model->listapagossueldo($where);
		$this->load->view('recursoshumanos/tablapagossueldos',$data);
	}
	function prueba(){
		$registro = $this->Rrhh_model->obtenerregpagsueldo('44444444', 3);
		if(is_null($registro)){
			echo 'nulo';
		}else{
			echo 'existe';
		}
	}

}
