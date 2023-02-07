<?php if ( ! defined('BASEPATH')) exit('NO ACCESO DIRECTO AL SCRIPT');
date_default_timezone_set('America/Lima');
class inicio extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('general_model');
		$this->load->model('persona_model');
		$this->load->model('cliente_model');
		$this->load->model('operaciones_model');		
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
		if(!$this->session->userdata('idusuario')){
			// $data['iphuanuco']=$this->general_model->obtenerip('HUANUCO');
			// $data['iptingo']=$this->general_model->obtenerip('TINGO MARIA');
			// $data['iphuanuco2']=$this->general_model->obtenerip('HUANUCO2');
			$this->load->view('principal/indexlogin');
		}else{
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['content']='principal/maincontent';
			$data['footer']='principal/footer';
			$this->load->view('index',$data);
		}
	}
	function admin(){//SOLO GERENTE ZONAL Y OPERACIONES ZONAL leo y katty
		$this->load->view('principal/loginadmin');
	}
	function autenticar_user(){
		$result = $this->usuario_model->validar_usuario();
		if($result==TRUE){
			echo "<script type='text/javascript'> location.href='".base_url()."index.php'; </script>";
		}else{
			echo "<script type='text/javascript'> alert('USUARIO INCORRECTO'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function obteneragencia($codusuario){
		$usuario = $this->usuario_model->obtenerusuario($codusuario);
		echo $usuario['agencia'];
	}
	function perfil(){
		if($this->session->userdata('idusuario')){
			$usuario=$this->usuario_model->obtenerusuario($this->session->userdata('idusuario'));
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['usuario']=$usuario;
			$data['edad']=$this->edad($usuario['fecha_nac']);
			$data['personausuario']=$this->persona_model->obtenerpersonavista($usuario['dni']);
			$data['content']='persona/perfil';	
			$data['footer']='principal/footer';	
			$this->load->view('index',$data);				
		}else{
			echo "<script type='text/javascript'> alert('NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function cambclaveform(){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['content']='persona/cambclaveform';	
			$data['footer']='principal/footer';	
			$this->load->view('index',$data);				
		}else{
			echo "<script type='text/javascript'> alert('NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function edad($fecha_nacimiento) { 
	    $cumpleanos = new DateTime($fecha_nacimiento);
	    $hoy = new DateTime();
	    $annos = $hoy->diff($cumpleanos);
	    return $annos->y;
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url()."index.php");
	}
	function cambiarclave(){
		$usuario=$this->session->userdata('idusuario');
		$claveusuario=$this->input->post('claveusuario');
		$nuevaclave=$this->input->post('nuevaclave');
		if($this->usuario_model->validar_usuario2($usuario, $claveusuario)==true){
			$result=$this->usuario_model->cambiarclave($usuario, $nuevaclave);
			if($result==true){
				echo "<script type='text/javascript'> alert('SE CAMBIO CORRECTAMENTE LA CLAVE'); ";
				echo " location.href='".base_url()."index.php'; </script>";	
			}else{
				echo "<script type='text/javascript'> alert('NO SE PUDO CAMBIAR LA CLAVE'); ";
				echo " location.href='".base_url()."index.php'; </script>";	
			}
		}else{
			echo "<script type='text/javascript'> alert('LA CLAVE NO ES LA CORRECTA'); ";
			echo " location.href='".base_url()."index.php/inicio/cambclaveform'; </script>";	
		}
	}
	function newusuarioform(){
		if($this->session->userdata('tipouser')!=1 && $this->session->userdata('tipouser')!=5){
			echo "<script type='text/javascript'> alert('SOLO EL GERENTE TIENE LOS PROVILEGIOS'); ";
			echo " location.href='".base_url()."index.php'; </script>";
			return false;
		}else{
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['departamentos']=$this->general_model->lista_departamentos();
			$data['provincias']=$this->general_model->lista_provdep('10');
			$data['distritos']=$this->general_model->lista_distprov('186');	
			$data['footer']='principal/footer';			
			$data['content']='persona/regusuarioform';
		}
		$this->load->view('index',$data);		
	}
	function registrar_usuario(){
		$dni=$this->input->post('dni');
		$tipouser=$this->input->post('tipouser');	
		$agencia=$this->input->post('agencia');
		$clave=$this->input->post('clave');
		$estadociv=$this->input->post('estadociv');
		$ruc=$this->input->post('ruc');		
		$sexo=$this->input->post('sexo');
		$nombres=$this->input->post('nombres');
		$apellidos=$this->input->post('apellidos');
		$apellidos2=$this->input->post('apellidos2');
		$fecha_nac=$this->input->post('fecha_nac');
		$distrito_nac=$this->input->post('distrito_nac');
		$nacionalidadc=$this->input->post('nacionalidadc');
		$grado_inst=$this->input->post('grado_inst');
		$profesionc = (is_null($this->input->post('profesionc'))) ? '' : $this->input->post('profesionc');	
		$telefono=$this->input->post('telefono');
		$email=$this->input->post('email');
		$tipovivienda = $this->input->post('tipovivienda');
		$distrito_domic=$this->input->post('distrito_domic');
		$otrotipovia=$this->input->post('otrotipovia');
		$tipovia=$this->input->post('tipovia');
		$tipovia = ($tipovia == 'Otro') ? $otrotipovia : $tipovia;		
		$nombrevia=$this->input->post('nombrevia');
		$Nro_dom=$this->input->post('Nro_dom');	
		$interior_dom=$this->input->post('interior_dom');	
		$mz_dom=$this->input->post('mz_dom');
		$lote_dom=$this->input->post('lote_dom');
		$otrotipozona=$this->input->post('otrotipozona');
		$tipozona=$this->input->post('tipozona');
		$tipozona = ($tipozona == 'Otro') ? $otrotipozona : $tipozona;
		$nombrezona=$this->input->post('nombrezona');
		$referencia=$this->input->post('referencia');
		$tipotrabajadorc=$this->input->post('tipotrabajadorc');
		$ocupacionc=$this->input->post('ocupacionc');
		$instituciontrabajo=$this->input->post('instituciontrabajo');
		//data persona cliente
		$data=array(
				'dni'				=>$dni,
				'apellidos'			=>$apellidos,
				'apellidos2'		=>$apellidos2,
				'nombres'			=>$nombres,
				'fecha_nac'			=>$fecha_nac,
				'distrito_nac'		=>$distrito_nac,
				'celular'			=>$telefono,
				'sexo'				=>$sexo,
				'email'				=>$email,
				'ruc'				=>$ruc,
				'estadocivil'		=>$estadociv,
				'distrito_domic'	=>$distrito_domic,
				'grado_instr'		=>$grado_inst,
				'profesion'			=>$profesionc,
				'nacionalidad'		=>$nacionalidadc,
				'tipovivienda'		=>$tipovivienda,
				'tipovia'			=>$tipovia,
				'nombrevia'			=>$nombrevia,
				'Nro'				=>($Nro_dom == '') ? "S/N" : $Nro_dom,
				'interior'			=>($interior_dom == '') ? "S/N" : $interior_dom,
				'mz'				=>($mz_dom == '') ? "S/N" : $mz_dom,
				'lote'				=>($lote_dom == '') ? "S/N" : $lote_dom,
				'tipozona'			=>$tipozona,
				'nombrezona'		=>$nombrezona,
				'referencia'		=>$referencia,
				'ocupacion'			=>$ocupacionc,				
				'tipotrabajador'	=>$tipotrabajadorc,
				'institucion_lab'	=>$instituciontrabajo
			);
		//REGISTRARPERSONA CLIENTE
		if($this->persona_model->existepersona($dni)){
			//actualizar
			$regpersona = $this->cliente_model->actualizarpersona($dni, $data);
		}else{
			$regpersona=$this->persona_model->registrar_persona($data);
		}
		if($regpersona==true){
			$nuevapellido = str_replace(' ', '', $apellidos);
			$idusuario = trim(substr($nombres, 0,1).substr($nuevapellido, 0,6).date('m'));
			if($tipouser==2){
				$dataasesor = array(
					'idasesor' => $idusuario,
					'dni'		=> $dni
					);
				$rasesor=$this->usuario_model->registrar_asesor($dataasesor);
			}
			$regusuario = $this->usuario_model->registrarusuario($idusuario, $clave, $tipouser,$dni, $agencia);
			echo "<script type='text/javascript'> alert('SE REGISTRO CON EXITO'); ";
			echo " location.href='".base_url()."index.php/inicio/registroexitoso/".$idusuario."'; </script>";	
		}else{
			echo 'NO SE PUDO REGISTRAR';
		}
	}
	function registroexitoso($idusuario){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['usuario']= $this->usuario_model->obtenerusuario($idusuario);
			$data['footer']='principal/footer3';			
			$data['content']='persona/personaregistrado';	
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('NO INICIO SESSION COMO SUPERUSUARIO'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function listausuarios(){
		if($this->session->userdata('tipouser')==1){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['usuarios']=$this->usuario_model->listausuarios();
			$data['footer']='principal/footer';			
			$data['content']='persona/listausuarios';	
			$this->load->view('index',$data);
		}elseif($this->session->userdata('tipouser')==5){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['usuarios']=$this->usuario_model->listaasesoresxagencia($this->session->userdata('agencia'));
			$data['footer']='principal/footer';			
			$data['content']='persona/listausuarios';	
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('NO INICIO SESSION COMO SUPERUSUARIO'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function listapersonas(){
		if($this->session->userdata('tipouser')==1){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['personas']=$this->persona_model->vistapersonas();
			$data['footer']='principal/footer';			
			$data['content']='persona/listapersonas';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('NO INICIO SESSION COMO SUPERUSUARIO'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}	
	function actualizarusuarioform($codusuario){
		$usuario = $this->usuario_model->obtenerusuario($codusuario);
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['usuario']=$usuario;
		$data['persona']=$this->persona_model->obtenerpersonavista($usuario['dni']);
		$data['departamentos']=$this->general_model->lista_departamentos();
		$data['provincias']=$this->general_model->lista_provdep('10');
		$data['distritos']=$this->general_model->lista_distprov('186');	
		$data['footer']='principal/footer';
		$data['content']='persona/actualizarusuarioform';
		$this->load->view('index',$data);
	}
	function actualizarusuario(){
		$dni = $this->input->post('dni');
		$dniinicial = $this->input->post('dni');
		$ruc=$this->input->post('ruc');	
		$nombres=$this->input->post('nombres');
		$apellidos=$this->input->post('apellidos');
		$apellidos2=$this->input->post('apellidos2');
		$fecha_nac=$this->input->post('fecha_nac');
		$distrito_nac=$this->input->post('distrito_nac');
		//$tipouser=$this->input->post('tipouser');	
		$estadociv=$this->input->post('estadociv');
		$nacionalidad=$this->input->post('nacionalidad');
		$grado_inst=$this->input->post('grado_instu');
		$profesion = (is_null($this->input->post('profesion'))) ? '' : $this->input->post('profesion');	
		$sexo=$this->input->post('sexo');//CAMBIAR LUEGO ES SOLO SEXO
		$telefono=$this->input->post('telefono');
		$email=$this->input->post('email');
		$data = array(
				'dni'			=> $dni,
				'sexo'			=> $sexo,
				'nombres'		=> $nombres,
				'apellidos'		=> $apellidos,
				'apellidos2'	=> $apellidos2,
				'ruc'			=> $ruc,
				'fecha_nac'		=> $fecha_nac,
				'distrito_nac'	=> $distrito_nac,
				'estadocivil'	=> $estadociv,
				'nacionalidad'	=> $nacionalidad,
				'grado_instr'	=> $grado_inst,
				'profesion'		=> $profesion,
				'celular'		=> $telefono,
				'email'			=> $email
			);
		$resultado=$this->persona_model->actualizarpersona($dniinicial, $data);
		if($resultado==true){
			echo "<script type='text/javascript'> alert('ACTUALIZADO'); ";
			echo " location.href='".base_url()."index.php'; </script>";
		}else{
			echo 'no se pudo actualizar';
		}
	}
	function regipform(){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['personas']=$this->persona_model->vistapersonas();
		$data['iphuanuco']=$this->general_model->obtenerip('HUANUCO');
		$data['iptingo']=$this->general_model->obtenerip('TINGO MARIA');
		$data['iphuanuco2']=$this->general_model->obtenerip('HUANUCO2');
		$data['footer']='principal/footer';			
		$data['content']='principal/formcambip';
		$this->load->view('index',$data);
	}
	function registrarip(){
		$agencia = $this->input->post('agencia');
		$ip = $this->input->post('ip');
		$data=array(
			'agencia'	=> $agencia,
			'ip'		=> $ip
			);
		$resultado = $this->general_model->registrarips($data);
		if($resultado == true){
			echo "<script type='text/javascript'> alert('SE REGISTRO'); ";
			echo " location.href='".base_url()."index.php/inicio/regipform'; </script>";	
		}else{
			echo "<script type='text/javascript'> alert('NO SE PUDO REGISTRAR'); ";
			echo " location.href='".base_url()."index.php/inicio/regipform'; </script>";				
		}
	}
	function verip(){
		$iphuanuco=$this->general_model->obtenerip('HUANUCO');
		$iptingo=$this->general_model->obtenerip('TINGO MARIA');
		echo 'SU IP :'.$_SERVER['REMOTE_ADDR'].'<br>';
		echo 'TINGO MARIA :'.$iptingo.'<br>';
		echo 'HUANUCO :'.$iphuanuco.'<br>';						
		if ($_SERVER['REMOTE_ADDR']!=$iphuanuco && $_SERVER['REMOTE_ADDR']!=$iptingo && $_SERVER['REMOTE_ADDR']!='190.237.157.235') {
		     echo 'USTED NO TIENE ACCESO';
		}else{
			echo 'SI TIENE ACCESO';
		}
	}
	function formferiado(){
		if($this->session->userdata('tipouser')==1 || $this->session->userdata('tipouser')==3){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['registros']=$this->general_model->listaferiadosanho();
			$data['footer']='principal/footer';			
			$data['content']='principal/formregferiado';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('NO INICIO SESSION COMO SUPERUSUARIO'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function eliminarferiado($id){
		if($this->session->userdata('tipouser')==1 || $this->session->userdata('tipouser')==3){
			$result=$this->general_model->eliminarferiados($id);
			if($result==true){
				echo "<script type='text/javascript'> alert('SE ELIMINO CON EXITO'); ";
				echo " location.href='".base_url()."index.php/inicio/formferiado'; </script>";	
			}else{
				echo "<script type='text/javascript'> alert('NO SE ELIMINO CON EXITO'); ";
				echo " location.href='".base_url()."index.php/inicio/formferiado'; </script>";					
			}
		}else{
			echo "<script type='text/javascript'> alert('NO INICIO SESSION COMO SUPERUSUARIO'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}		
	}
	function guardarferiado(){
		$fecha = $this->input->post('fecha');
		$descripcion = $this->input->post('descripcion');
		$data = array(
			'fecha' => $fecha,
			'descripcion' => $descripcion );
		$result=$this->general_model->registrarferiado($data);
		if($result==true){
			echo "<script type='text/javascript'> alert('SE REGISTRO CON EXITO'); ";
			echo " location.href='".base_url()."index.php/inicio/formferiado'; </script>";	
		}
	}
	function cargarusuariosparadb(){
		$lista = $this->usuario_model->listausuariosdb();
	}

}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */
 ?>
