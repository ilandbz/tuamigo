<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
class Cliente extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('general_model');
		$this->load->model('persona_model');
		$this->load->model('solicitud_prestamo');
		$this->load->model('cliente_model');
		$this->load->model('negocio_model');
		$this->load->model('asesor_model');	
		$this->load->model('usuario_model');
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
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';	
			$data['content']='cliente/inicio';
			$data['departamentos']=$this->general_model->lista_departamentos();
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function crearcliente(){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';	
			$data['content']='cliente/crearcliente';
			$data['avalview']='cliente/formaval';
			$data['conyugueview']='cliente/formconyugue';
			$data['negocioview']='cliente/formnegocio';
			$data['departamentos']=$this->general_model->lista_departamentos();
			$data['provincias']=$this->general_model->lista_provdep(10);
			$data['distritos']=$this->general_model->lista_distprov(186);
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function formcrearcliente(){//formulario de creacion operaciones
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';	
			$data['content']='cliente/formcrearclienteoperaciones';
			$data['avalview']='cliente/formaval';
			$data['conyugueview']='cliente/formconyugue';
			$data['negocioview']='cliente/formnegocio';
			$data['usuarios']=$this->usuario_model->listausuariosagencia($this->session->userdata('agencia'));
			$data['departamentos']=$this->general_model->lista_departamentos();
			$data['provincias']=$this->general_model->lista_provdep(10);
			$data['distritos']=$this->general_model->lista_distprov(186);
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}		
	}
	function existepersona(){
		$dni=$this->input->post('dni');
		if($this->persona_model->existepersona($dni)==true){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function crearpersonaform(){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';	
			$data['content']='persona/crearpersonaform';
			$data['conyugueview']='cliente/formconyugue';
			$data['departamentos']=$this->general_model->lista_departamentos();
			$data['provincias']=$this->general_model->lista_provdep('10');
			$data['distritos']=$this->general_model->lista_distprov('186');		
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}		
	}
	function registraractpersona(){//registrar o actualizar persona
		$dni=$this->input->post('dni');
		$apellidos=$this->input->post('apellidos');
		$apellidos2=$this->input->post('apellidos2');
		$nombres=$this->input->post('nombres');
		$fecha_nac=$this->input->post('fecha_nac');
		$distrito_nac=$this->input->post('distrito_nac');
		$telefono=$this->input->post('telefono');
		$sexo=$this->input->post('sexo');
		$email=$this->input->post('email');	
		$ruc=$this->input->post('ruc');
		$estadociv=$this->input->post('estadociv');
		$distrito_domic=$this->input->post('distrito_domic');//domicilio
		$grado_inst=$this->input->post('grado_inst');
		$profesion = $this->input->post('profesion');	
		$nacionalidad=$this->input->post('nacionalidad');
		$tipovia=$this->input->post('tipovia');
		$nombrevia=$this->input->post('nombrevia');
		$Nro_dom=$this->input->post('Nro_dom');	
		$interior_dom=$this->input->post('interior_dom');
		$mz_dom=$this->input->post('mz_dom');
		$lote_dom=$this->input->post('lote_dom');
		$tipozona=$this->input->post('tipozona');
		$nombrezona=$this->input->post('nombrezona');
		$referencia=$this->input->post('referencia');
		$tipotrabajador=$this->input->post('tipotrabajador');
		$ocupacion=$this->input->post('ocupacion');		
		$institucion_lab=$this->input->post('institucion_lab');
		$tipovivienda=$this->input->post('tipovivienda');
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
				'profesion'			=>$profesion,
				'nacionalidad'		=>$nacionalidad,
				'tipovia'			=>$tipovia,
				'nombrevia'			=>$nombrevia,
				'Nro'				=>($Nro_dom == '') ? "S/N" : $Nro_dom,
				'interior'			=>($interior_dom == '') ? "S/N" : $interior_dom,
				'mz'				=>($mz_dom == '') ? "S/N" : $mz_dom,
				'lote'				=>($lote_dom == '') ? "S/N" : $lote_dom,
				'tipozona'			=>$tipozona,
				'nombrezona'		=>$nombrezona,
				'referencia'		=>$referencia,
				'tipotrabajador'	=>$tipotrabajador,
				'ocupacion'			=>$ocupacion,
				'institucion_lab'	=>$institucion_lab,
				'tipovivienda'		=>$tipovivienda
			);
		if($this->persona_model->existepersona($dni)){
			$regpersona1 = $this->cliente_model->actualizarpersona($dni, $data);
		}else{
			$regpersona1=$this->persona_model->registrar_persona($data);
		}
		if($regpersona1==true){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function registrarpersona(){
		$dni=$this->input->post('dni');
		$apellidos=$this->input->post('apellidos');
		$apellidos2=$this->input->post('apellidos2');
		$nombres=$this->input->post('nombres');
		$fecha_nac=$this->input->post('fecha_nac');
		$distrito_nac=$this->input->post('distrito_nac');
		$telefono=$this->input->post('telefono');
		$sexo=$this->input->post('sexo');
		$email=$this->input->post('email');	
		$ruc=$this->input->post('ruc');
		$estadociv=$this->input->post('estadociv');
		$distrito_domic=$this->input->post('distrito_domic');//domicilio
		$grado_inst=$this->input->post('grado_inst');
		$profesion = $this->input->post('profesion');	
		$nacionalidad=$this->input->post('nacionalidad');
		$tipovia=$this->input->post('tipovia');
		$nombrevia=$this->input->post('nombrevia');
		$Nro_dom=$this->input->post('Nro_dom');	
		$interior_dom=$this->input->post('interior_dom');
		$mz_dom=$this->input->post('mz_dom');
		$lote_dom=$this->input->post('lote_dom');
		$tipozona=$this->input->post('tipozona');
		$nombrezona=$this->input->post('nombrezona');
		$referencia=$this->input->post('referencia');
		$tipotrabajador=$this->input->post('tipotrabajador');
		$ocupacion=$this->input->post('ocupacion');		
		$institucion_lab=$this->input->post('institucion_lab');
		$tipovivienda=$this->input->post('tipovivienda');
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
				'profesion'			=>$profesion,
				'nacionalidad'		=>$nacionalidad,
				'tipovia'			=>$tipovia,
				'nombrevia'			=>$nombrevia,
				'Nro'				=>($Nro_dom == '') ? "S/N" : $Nro_dom,
				'interior'			=>($interior_dom == '') ? "S/N" : $interior_dom,
				'mz'				=>($mz_dom == '') ? "S/N" : $mz_dom,
				'lote'				=>($lote_dom == '') ? "S/N" : $lote_dom,
				'tipozona'			=>$tipozona,
				'nombrezona'		=>$nombrezona,
				'referencia'		=>$referencia,
				'tipotrabajador'	=>$tipotrabajador,
				'ocupacion'			=>$ocupacion,
				'institucion_lab'	=>$institucion_lab,
				'tipovivienda'		=>$tipovivienda
			);
		$regpersona1=$this->persona_model->registrar_persona($data);
		if($regpersona1==true){
			echo "<script type='text/javascript'> alert('SE REGISTRO EXITOSAMENTE'); ";
			echo " location.href='".base_url()."index.php/cliente/verpersona/".$dni."'; </script>";
		}else{
			echo "<script type='text/javascript'> alert('NO SE PUDO REGISTRAR'); ";
			echo " location.href='".base_url()."index.php/cliente/verpersona/".$dni."'; </script>";
		}		
	}
	function poseeaval($codcliente){
		if($this->cliente_model->tieneaval($codcliente)==true){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function cargarformclientepersona($dni){//no solo clientes sino aval y demas personas
		$persona = $this->persona_model->obtenerpersonavista($dni);
		echo json_encode($persona);
	}
	function guardar_nuevcliente(){
		//PERSONA CLIENTE
		$dni=$this->input->post('dni');
		$estadociv=$this->input->post('estadociv');
		$dni_conyugue=$this->input->post('dni_conyugue2');
		$poseeaval=$this->input->post('poseeaval');
		$dni_aval = $this->input->post('dni_aval2');
		if (is_null($this->input->post('asesor'))){
			$asesor = $this->session->userdata('idusuario');			
		}else{
			$asesor = $this->input->post('asesor');
		}
		if($this->varlidarregistrocliente($dni, $estadociv, $dni_conyugue, $poseeaval, $dni_aval)==true){
			$codcliente = $this->cliente_model->maximocodigo()+1;
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
			//DOMICILIO
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
				$regpersona1 = $this->cliente_model->actualizarpersona($dni, $data);
			}else{
				$regpersona1=$this->persona_model->registrar_persona($data);
			}
			//REGISTRAR CLIENTE TABLA CLIENTE
			$data2=array(
					'codcliente'		=>$codcliente,		
					'dni'				=>$dni,
					'estado'			=>'INSCRITO',
					'fecha_registro'	=>date("Y-m-d h:i:s"),
					'idusuario'			=>$asesor
				);
			$regcliente=$this->cliente_model->registrar($data2);
			if($tipotrabajadorc!='DEPENDIENTE'){//$tipotrabajadorc es independiente
				$instituciontrabajo='NINGUNO';
				//NEGOCIO
				$razon_social=$this->input->post('razon_social');
				$ruc_neg=$this->input->post('ruc_neg');
				$telefono_neg=$this->input->post('telefono_neg');
				$inicio_actividades=$this->input->post('inicio_actividades');
				$actividad_neg=$this->input->post('actividad_neg');	
				$actividad_neg_det=$this->input->post('actividad_neg_det');	
				//DIRECCION DEL NEGOCIO
				$condicionnegv=$this->input->post('condicionnegv');
				$distrito_neg = $this->input->post('distrito_neg');	
				$otrotipovia_neg=$this->input->post('otrotipovia_neg');
				$tipovia_neg=$this->input->post('tipovia_neg');	
				$tipovia_neg=($tipovia_neg == 'Otro') ? $otrotipovia_neg : $tipovia_neg;
				$nombrevia_neg=$this->input->post('nombrevia_neg');
				$Nro_dom_neg=$this->input->post('Nro_dom_neg');
				$interior_dom_neg=$this->input->post('interior_dom_neg');
				$mz_dom_neg=$this->input->post('mz_dom_neg');
				$lote_dom_neg=$this->input->post('lote_dom_neg');
				$otrotipozona_neg=$this->input->post('otrotipozona_neg');
				$tipozona_neg=$this->input->post('tipozona_neg');
				$tipozona_neg=($tipozona_neg == 'Otro') ? $otrotipozona_neg : $tipozona_neg;
				$nombrezona_neg=$this->input->post('nombrezona_neg');
				$referencia_neg=$this->input->post('referencia_neg');
				$datanegocio = array(
					'codcliente'	  => $codcliente,
					'razonsocial' 	  => $razon_social,
					'ruc'			  => $ruc_neg,
					'tel_cel'		  => $telefono_neg,
					'actividad'		  => $actividad_neg,
					'actividad_espec' => $actividad_neg_det,
					'inicio_actividad'=> $inicio_actividades,
					'distrito_neg'	  => $distrito_neg,
					'tipovia'		  => $tipovia_neg,
					'nombrevia'		  => $nombrevia_neg,
					'Nro'			  => ($Nro_dom_neg == '') ? "S/N" : $Nro_dom_neg,
					'interior'		  => ($interior_dom_neg == '') ? "S/N" : $interior_dom_neg,
					'mz'			  => ($mz_dom_neg == '') ? "S/N" : $mz_dom_neg,
					'lote'			  => ($lote_dom_neg == '') ? "S/N" : $lote_dom_neg,
					'tipozona'		  => $tipozona_neg,
					'nombrezona'	  => $nombrezona_neg,
					'referencia'	  => $referencia_neg,
					'condicionvi'	  => $condicionnegv
					);
					$regnegocio=$this->negocio_model->registrar_negocio($datanegocio);
			}
			if($estadociv=='Casado' || $estadociv=='Conviviente'){
				$this->registrarconyugue($dni, $dni_conyugue);
			}
			if($poseeaval=='SI' && $dni_aval!=''){
				$this->registraraval($codcliente, $dni_aval);
			}
			if($regcliente==true){
				redirect(base_url().'index.php/cliente/registro_exitoso/'.$codcliente);
			}else{
				echo 'EXISTEN PROBLEMAS DE REGISTRO CONSULTE A SU PROVEEDOR';
			}
		}
	}
	public function varlidarregistrocliente($dni, $estadocivil, $dni_conyugue, $poseeaval, $dni_aval){
		if($dni=='' || $dni==' '){
			echo "<script type='text/javascript'> alert('DNI NO VALIDO'); ";
			echo " location.href='".base_url()."index.php/cliente/crearcliente'; </script>";			
			return false;
		}
		if($this->cliente_model->existecliente($dni, 'CREDITO')==true){
			echo "<script type='text/javascript'> alert('YA EXISTE EL CLIENTE'); ";
			echo " location.href='".base_url()."index.php/cliente/crearcliente'; </script>";
			return false;
		}
		if($estadocivil=='Casado' || $estadocivil=='Conviviente'){
			if($dni_conyugue==''){
				echo "<script type='text/javascript'> alert('NO INGRESO DNI DE CONYUGUE'); ";
				echo " location.href='".base_url()."index.php/cliente/crearcliente'; </script>";
				return false;
			}
		}
		if($poseeaval=='SI'){
			if($dni_aval=''){
				echo "<script type='text/javascript'> alert('NO INGRESO DNI DE AVAL'); ";
				echo " location.href='".base_url()."index.php/cliente/crearcliente'; </script>";
				return false;				
			}
		}
		return true;
	}
	function registrarconyugue($dni, $dni_conyugue){
		$data4=array(
			'dni'			=>	$dni,
			'dniconyugue'	=>	$dni_conyugue
			);
		$regconyugue=$this->cliente_model->regconyugue($data4);
		$data5=array(
			'dni'			=>	$dni_conyugue,
			'dniconyugue'	=>	$dni
			);
		$regconyugue=$this->cliente_model->regconyugue($data5);
		return true;
	}
	function registraraval($codcliente, $dni_aval){
		$data6=array(
			'codcliente'	=>$codcliente,
			'dniaval'		=>$dni_aval
			);
		$regaval=$this->cliente_model->regaval($data6);
	}
	function existecliente($dni, $tipo){
		if($this->cliente_model->existecliente($dni, $tipo)==true){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function formactualizarpersona($dni){
		if($this->session->userdata('idusuario')){
			$persona=$this->persona_model->obtenerpersonavista($dni);
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['persona'] = $persona;
			//DISTRITO NAC Y DOMIC CLIENTE
			$data['departamentos']=$this->general_model->lista_departamentos();
			$data['provincias']=$this->general_model->lista_provdep('10');//para que carge conyugue u otro
			$data['distritos']=$this->general_model->lista_distprov('186');	
			$data['provincias_nac']=$this->general_model->lista_provdep($persona['iddepartamento_nac']);
			$data['distritos_nac']=$this->general_model->lista_distprov($persona['idprovincia_nac']);
			$data['provincias_domic']=$this->general_model->lista_provdep($persona['iddepartamento_domic']);
			$data['distritos_domic']=$this->general_model->lista_distprov($persona['idprovincia_domic']);
			$data['conyugueview']='cliente/formconyugue';
			if(!is_null($persona['dniconyugue'])){
				$data['conyugue']=$this->persona_model->obtenerpersonavista($persona['dniconyugue']);
			}
			$data['footer']='principal/footer';	
			$data['content']='persona/formactualizarpersona';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}		
	}
	function actualizarpersona(){
		$dniconyugue=$this->input->post('dni_conyugue2');
		$estadocivanterior=$this->input->post('estadocivanterior');
		$dni=$this->input->post('dni');
		$apellidos=$this->input->post('apellidos');
		$apellidos2=$this->input->post('apellidos2');
		$nombres=$this->input->post('nombres');
		$fecha_nac=$this->input->post('fecha_nac');
		$distrito_nac=$this->input->post('distrito_nac');
		$telefono=$this->input->post('telefono');
		$sexo=$this->input->post('sexo');
		$email=$this->input->post('email');	
		$ruc=$this->input->post('ruc');	
		$estadociv=$this->input->post('estadociv');
		$distrito_domic=$this->input->post('distrito');//domicilio
		$grado_inst=$this->input->post('grado_inst');
		$profesion = $this->input->post('profesion');	
		$nacionalidad=$this->input->post('nacionalidad');
		$tipovia=$this->input->post('tipovia');
		$nombrevia=$this->input->post('nombrevia');
		$Nro_dom=$this->input->post('Nro_dom');	
		$interior_dom=$this->input->post('interior_dom');
		$mz_dom=$this->input->post('mz_dom');
		$lote_dom=$this->input->post('lote_dom');
		$tipozona=$this->input->post('tipozona');
		$nombrezona=$this->input->post('nombrezona');
		$referencia=$this->input->post('referencia');
		$tipotrabajador=$this->input->post('tipotrabajador');
		$ocupacion=$this->input->post('ocupacion');		
		$institucion_lab=$this->input->post('institucion_lab');
		$tipovivienda=$this->input->post('tipovivienda');
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
				'profesion'			=>$profesion,
				'nacionalidad'		=>$nacionalidad,
				'tipovia'			=>$tipovia,
				'nombrevia'			=>$nombrevia,
				'Nro'				=>($Nro_dom == '') ? "S/N" : $Nro_dom,
				'interior'			=>($interior_dom == '') ? "S/N" : $interior_dom,
				'mz'				=>($mz_dom == '') ? "S/N" : $mz_dom,
				'lote'				=>($lote_dom == '') ? "S/N" : $lote_dom,
				'tipozona'			=>$tipozona,
				'nombrezona'		=>$nombrezona,
				'referencia'		=>$referencia,
				'tipotrabajador'	=>$tipotrabajador,
				'ocupacion'			=>$ocupacion,
				'institucion_lab'	=>$institucion_lab,
				'tipovivienda'		=>$tipovivienda
			);
		$resultado = $this->cliente_model->actualizarpersona($dni, $data);
		if($resultado==true){
			if($estadocivanterior!=$estadociv){
				if($estadocivanterior!='Casado' && $estadocivanterior!='Conviviente'){//no tiene conyugue y tendra conyugue
					if($estadociv=='Casado' || $estadociv=='Conviviente'){
						$this->registrarconyugue($dni, $dniconyugue);
					}
				}elseif($estadociv=='Casado' || $estadociv=='Conviviente'){//Ya tiene conyugue y se mantiene con conyugue pero se modifica el estado del conyugue
					if($this->cliente_model->existeconyugue($dni)==true){
						$datac = array('estadocivil' => $estadociv);
						$this->persona_model->actualizarpersona($dniconyugue, $datac);	
					}else{
						$this->registrarconyugue($dni, $dniconyugue);
					}
				}else{//tiene  conyugue y se borrara el conyugue
					$this->cliente_model->eliminarconyugue($dni);
					$this->cliente_model->eliminarconyugue($dniconyugue);
				}
			}
			if(($estadociv=='Casado' || $estadociv=='Conviviente') && $this->cliente_model->existeconyugue($dni)==false){
				$this->registrarconyugue($dni, $dniconyugue);
			}
			echo "<script type='text/javascript'> alert('ACTUALIZADO CON EXITO'); ";
			echo " location.href='".base_url()."index.php/cliente/verpersona/".$dni."'; </script>";	
		}else{
			echo "<script type='text/javascript'> alert('NO SE PUDO ACTUALIZAR'); ";
			echo " location.href='".base_url()."index.php/cliente/formactualizarpersona/".$dni."'; </script>";	
		}
	}
	function verpersona($dni=''){
		if($dni==''){
			echo 'PERSONA NO EXISTE';
			return false;
		}		
		if($this->session->userdata('idusuario')){
			$persona=$this->persona_model->obtenerpersonavista($dni);
			$data=$this->retornarheader($this->session->userdata('tipouser'));		
			$data['persona']=$persona;
			$data['cliente']=$this->cliente_model->buscarclientedni($dni);
			$data['footer']='principal/footer';
			$data['content']='persona/verpersona';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}		
	function guardarnegocio(){
		$codcliente=$this->input->post('codcliente');
		$razon_social=$this->input->post('razon_social');
		$ruc_neg=$this->input->post('ruc_neg');
		$telefono_neg=$this->input->post('telefono_neg');
		$inicio_actividades=$this->input->post('inicio_actividades');
		$actividad_neg=$this->input->post('actividad_neg');	
		$actividad_neg_det=$this->input->post('actividad_neg_det');	
		$condicionnegv=$this->input->post('condicionnegv');
		$distrito_neg = $this->input->post('distrito_neg');	
		$otrotipovia_neg=$this->input->post('otrotipovia_neg');
		$tipovia_neg=$this->input->post('tipovia_neg');	
		$tipovia_neg=($tipovia_neg == 'Otro') ? $otrotipovia_neg : $tipovia_neg;
		$nombrevia_neg=$this->input->post('nombrevia_neg');
		$Nro_dom_neg=$this->input->post('Nro_dom_neg');
		$interior_dom_neg=$this->input->post('interior_dom_neg');
		$mz_dom_neg=$this->input->post('mz_dom_neg');
		$lote_dom_neg=$this->input->post('lote_dom_neg');
		$otrotipozona_neg=$this->input->post('otrotipozona_neg');
		$tipozona_neg=$this->input->post('tipozona_neg');
		$tipozona_neg=($tipozona_neg == 'Otro') ? $otrotipozona_neg : $tipozona_neg;
		$nombrezona_neg=$this->input->post('nombrezona_neg');
		$referencia_neg=$this->input->post('referencia_neg');
		$datanegocio = array(
			'codcliente'	  => $codcliente,
			'razonsocial' 	  => $razon_social,
			'ruc'			  => $ruc_neg,
			'tel_cel'		  => $telefono_neg,
			'actividad'		  => $actividad_neg,
			'actividad_espec' => $actividad_neg_det,
			'inicio_actividad'=> $inicio_actividades,
			'distrito_neg'	  => $distrito_neg,
			'tipovia'		  => $tipovia_neg,
			'nombrevia'		  => $nombrevia_neg,
			'Nro'			  => ($Nro_dom_neg == '') ? "S/N" : $Nro_dom_neg,
			'interior'		  => ($interior_dom_neg == '') ? "S/N" : $interior_dom_neg,
			'mz'			  => ($mz_dom_neg == '') ? "S/N" : $mz_dom_neg,
			'lote'			  => ($lote_dom_neg == '') ? "S/N" : $lote_dom_neg,
			'tipozona'		  => $tipozona_neg,
			'nombrezona'	  => $nombrezona_neg,
			'referencia'	  => $referencia_neg,
			'condicionvi'	  => $condicionnegv
			);
		$registrar = $this->negocio_model->registrar_negocio($datanegocio);
		if($registrar==true){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function registro_exitoso($codcliente){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';	
			$data['content']='cliente/nuevocliente';
			$data['cliente']=$this->cliente_model->obtener_cliente($codcliente);
			$data['departamentos']=$this->general_model->lista_departamentos();
			$data['provincias']=$this->general_model->lista_provdep('10');
			$data['distritos']=$this->general_model->lista_distprov('186');		
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function cargar_provincias($iddepartamento){
		$data['provincias']=$this->general_model->lista_provdep($iddepartamento);
		$this->load->view('depprovdist/provincias_select',$data);
	}
	function cargar_distritos($idprovincia){
		$data['distritos']=$this->general_model->lista_distprov($idprovincia);
		$this->load->view('depprovdist/distritos_select',$data);
	}
	function lista(){
		if($this->session->userdata('idusuario')){
			$tipouser=$this->session->userdata('tipouser');
			$idusuario=$this->session->userdata('idusuario');
			if($tipouser==1 || $tipouser==3){
				$clientes=$this->cliente_model->lista_clientestipo('CREDITO');
			}elseif($tipouser==4 || $tipouser==5){
				$clientes=$this->cliente_model->lista_clientesagencia($this->session->userdata('agencia'));
			}else{//asesor
				$clientes=$this->cliente_model->lista_clientesxasesor($idusuario);		
			}
			$data=$this->retornarheader($tipouser);
			$data['clientes']=$clientes;			
			if(count($clientes)==0){
				echo "<script type='text/javascript'> alert('NO EXISTEN REGISTROS'); ";
				echo " location.href='".base_url()."index.php'; </script>";					
			}else{
				$data['footer']='principal/footer';				
				$data['content']='cliente/clientes';
				$this->load->view('index',$data);				
			}
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function cargarlista($estado){
		if($this->session->userdata('idusuario')){
			$tipouser=$this->session->userdata('tipouser');
			$idusuario=$this->session->userdata('idusuario');
			if($tipouser==1){
				$clientes=$this->cliente_model->lista_clientesestado($estado);
			}else{
				$clientes=$this->cliente_model->lista_clientesxasesoresta($idusuario, $estado);
			}
			$data=$this->retornarheader($tipouser);
			$data['clientes']=$clientes;	
			$this->load->view('cliente/clientesestasesor',$data);
		}else{
			echo 'NO INICIO SESSION';
		}		
	}
	function solicitudes(){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['footer']='principal/footer';	
		$data['content']='cliente/repsolicitudes';
		$this->load->view('index',$data);		
	}
	function ver($codcliente){
		$cliente=$this->cliente_model->obtener_cliente($codcliente);
		$data=$this->retornarheader($this->session->userdata('tipouser'));		
		$data['cliente']=$cliente;
		$data['footer']='principal/footer';
		$data['content']='cliente/cliente';
		$this->load->view('index',$data);
	}
	function regnuevaval($codcliente){
		$dnicliente = $this->input->post('dnicliente');
		$dni_aval = $this->input->post('dni_aval');
		$ruc_aval = $this->input->post('ruc_aval');
		$sexoaval = $this->input->post('sexoaval');	
		$nombres_aval = $this->input->post('nombres_aval');	
		$apellidos_aval = $this->input->post('apellidos_aval');	
		$apellidos2 = $this->input->post('apellidos2');	

		$fecha_nac_aval = $this->input->post('fecha_nac_aval');	
		$distrito_aval = $this->input->post('distrito_aval');	
		$estadociv_aval = $this->input->post('estadociv_aval');
		$nacionalidad_aval = $this->input->post('nacionalidad_aval');
		$grado_inst_aval = $this->input->post('grado_inst_aval');
		$profesion_aval = $this->input->post('profesion_aval');
		$profesion_aval = (is_null($profesion_aval)) ? '' : $profesion_aval;
		$telefono_aval = $this->input->post('telefono_aval');
		$email_aval = $this->input->post('email_aval');
		$tipotrabajador_aval=$this->input->post('tipotrabajador_aval');	
		if($tipotrabajador_aval=='DEPENDIENTE'){
			$ocupacion_aval = $this->input->post('ocupacion_aval');	
			$instituciontrabajo_aval = $this->input->post('instituciontrabajo_aval');				
		}else{
			$ocupacion_aval='NINGUNO';
			$instituciontrabajo_aval='NINGUNO';
		}
		//DIRECCION AVAL
		$tipovivienda=$this->input->post('tipovivienda');
		$distrito_dom_aval=$this->input->post('distrito_dom_aval');
		$tipovia_aval=$this->input->post('tipovia_aval');
		$nombrevia_aval=$this->input->post('nombrevia_aval');
		$Nro_dom_aval=$this->input->post('Nro_dom_aval');		
		$interior_dom_aval=$this->input->post('interior_dom_aval');	
		$mz_dom_aval=$this->input->post('mz_dom_aval');	
		$lote_dom_aval=$this->input->post('lote_dom_aval');	
		$tipozona_aval=$this->input->post('tipozona_aval');		
		$nombrezona_aval=$this->input->post('nombrezona_aval');	
		$referencia_aval=$this->input->post('referencia_aval');	
		$data=array(
				'dni'				=>$dni_aval,
				'apellidos'			=>$apellidos_aval,
				'apellidos2'		=>$apellidos2,
				'nombres'			=>$nombres_aval,
				'fecha_nac'			=>$fecha_nac_aval,
				'distrito_nac'		=>$distrito_aval,
				'celular'			=>$telefono_aval,
				'sexo'				=>$sexoaval,
				'email'				=>$email_aval,
				'ruc'				=>$ruc_aval,
				'estadocivil'		=>$estadociv_aval,
				'distrito_domic'	=>$distrito_dom_aval,
				'grado_instr'		=>$grado_inst_aval,
				'profesion'			=>$profesion_aval,
				'nacionalidad'		=>$nacionalidad_aval,
				'tipovia'			=>$tipovia_aval,
				'nombrevia'			=>$nombrevia_aval,
				'Nro'				=>($Nro_dom_aval == '') ? "S/N" : $Nro_dom_aval,
				'interior'			=>($interior_dom_aval == '') ? "S/N" : $interior_dom_aval,
				'mz'				=>($mz_dom_aval == '') ? "S/N" : $mz_dom_aval,
				'lote'				=>($lote_dom_aval == '') ? "S/N" : $lote_dom_aval,
				'tipozona'			=>$tipozona_aval,
				'nombrezona'		=>$nombrezona_aval,
				'referencia'		=>$referencia_aval,
				'ocupacion'			=>$ocupacion_aval,				
				'tipotrabajador'	=>$tipotrabajador_aval,
				'institucion_lab'	=>$instituciontrabajo_aval,
				'tipovivienda'		=>$tipovivienda
			);
		if($this->persona_model->existepersona($dni_aval)==true){
			$actpersona = $this->persona_model->actualizarpersona($dni_aval, $data);
			if($this->cliente_model->existeaval($codcliente, $dni_aval)==false){//si no existe registrar aval
				$dataaval=array(
					'codcliente'	=> $codcliente,
					'dniaval'			=> $dni_aval
					);
				$regaval=$this->cliente_model->regaval($dataaval);
			}else{
				$dataaval = array('dniaval' => $dni_aval);
				$actavalcliente=$this->cliente_model->actaulizaraval($codcliente, $dataaval);
			}
			echo 'true';
		}else{
			$regpersona=$this->persona_model->registrar_persona($data);
			$dataaval=array(
				'codcliente'	=> $codcliente,
				'dniaval'			=> $dni_aval
				);
			$regaval=$this->cliente_model->regaval($dataaval);
			if($regpersona==true && $regaval==true){
				echo 'true';
			}else{
				echo 'false no registro persona o junto aval';
			}
		}
	}
	function guardarconfigurarcliente(){
		if($this->session->userdata('idusuario')){
			$codcliente=$this->input->post('codcliente');
			$usuario=$this->input->post('usuario');
			$idusuarioanterior=$this->input->post('idusuarioanterior');
			if($idusuarioanterior!=$usuario){//SI SE MODIFICO EL USUARIO
				$data = array('idusuario' => $usuario);
				$result = $this->cliente_model->actualizarclientecod($codcliente, $data);
				$data = array('idasesor' => $usuario);
				$sol =	$this->solicitud_prestamo->actualizarsoliccodcli($data, $codcliente);//actualiza las solicitudes vigentes con un nuevo asesor
			}
			if($this->input->post('dni_aval2')!=''){
				$dataaval=array(
					'codcliente' => $codcliente,
					'dniaval'	 => $this->input->post('dni_aval2')
								 );
				$ra = $this->cliente_model->regaval($dataaval);
			}
			echo "<script type='text/javascript'> alert('SE GUARDO CORRECTAMENTE'); ";
			echo " location.href='".base_url()."index.php/cliente/configurarcliente/".$codcliente."'; </script>";	
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function eliminar($idcliente){
		$cliente=$this->cliente_model->obtener_cliente($idcliente);
		$usuarioactual=$this->session->userdata('idusuario');
		if($cliente['estado']=='INSCRITO' && ($cliente['idusuario']==$usuarioactual || $usuarioactual=='Admin')){
			$result = $this->cliente_model->eliminarcliente($idcliente);	
			if($result==true){
				echo "<script type='text/javascript'> alert('ELIMINADO'); ";				
			}else{
				echo "<script type='text/javascript'> alert('NO SE PUDO ELIMINAR'); ";
			}
		}else{
			echo "<script type='text/javascript'> alert('NO SE PUEDE ELIMINAR'); ";	
		}
		
		echo " location.href='".base_url()."index.php/cliente/lista'; </script>";		
	}
	function vernegocios($codcliente){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['cliente']=$this->cliente_model->obtener_cliente($codcliente);
			$data['negocios']=$this->cliente_model->listanegocios($codcliente);
			$data['footer']='principal/footer';	
			$data['content']='cliente/vernegocios';
			$data['cliente']=$this->cliente_model->obtener_cliente($codcliente);	
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function formmodifnegocio($idnegocio){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$negocio = $this->negocio_model->negocio($idnegocio);
			$data['cliente']=$this->cliente_model->obtener_cliente($negocio['codcliente']);
			$data['departamentos']=$this->general_model->lista_departamentos();
			$data['provincias']=$this->general_model->lista_provdep($negocio['iddepartamento']);
			$data['distritos']=$this->general_model->lista_distprov($negocio['idprovincia']);	
			$data['negocio']=$negocio;
			$data['footer']='principal/footer';	
			$data['content']='cliente/negocioformmodifi';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}		
	}
	function actualizarnegocio(){
		$idnegocio=$this->input->post('idnegocio');
		$razon_social=$this->input->post('razon_social');
		$ruc_neg=$this->input->post('ruc_neg');
		$telefono_neg=$this->input->post('telefono_neg');
		$inicio_actividades=$this->input->post('inicio_actividades');
		$actividad_neg=$this->input->post('actividad_neg');	
		$actividad_neg_det=$this->input->post('actividad_neg_det');	
		//DIRECCION DEL NEGOCIO
		$condicionnegv=$this->input->post('condicionnegv');
		$distrito_neg = $this->input->post('distrito_neg');	
		$otrotipovia_neg=$this->input->post('otrotipovia_neg');
		$tipovia_neg=$this->input->post('tipovia_neg');	
		$tipovia_neg=($tipovia_neg == 'Otro') ? $otrotipovia_neg : $tipovia_neg;
		$nombrevia_neg=$this->input->post('nombrevia_neg');
		$Nro_dom_neg=$this->input->post('Nro_dom_neg');
		$interior_dom_neg=$this->input->post('interior_dom_neg');
		$mz_dom_neg=$this->input->post('mz_dom_neg');
		$lote_dom_neg=$this->input->post('lote_dom_neg');
		$otrotipozona_neg=$this->input->post('otrotipozona_neg');
		$tipozona_neg=$this->input->post('tipozona_neg');
		$tipozona_neg=($tipozona_neg == 'Otro') ? $otrotipozona_neg : $tipozona_neg;
		$nombrezona_neg=$this->input->post('nombrezona_neg');
		$referencia_neg=$this->input->post('referencia_neg');
		$codcliente=$this->input->post('codcliente');
		$datanegocio = array(
			'razonsocial' 	  => $razon_social,
			'ruc'			  => $ruc_neg,
			'tel_cel'		  => $telefono_neg,
			'actividad'		  => $actividad_neg,
			'actividad_espec' => $actividad_neg_det,
			'inicio_actividad'=> $inicio_actividades,
			'distrito_neg'	  => $distrito_neg,
			'tipovia'		  => $tipovia_neg,
			'nombrevia'		  => $nombrevia_neg,
			'Nro'			  => ($Nro_dom_neg == '') ? "S/N" : $Nro_dom_neg,
			'interior'		  => ($interior_dom_neg == '') ? "S/N" : $interior_dom_neg,
			'mz'			  => ($mz_dom_neg == '') ? "S/N" : $mz_dom_neg,
			'lote'			  => ($lote_dom_neg == '') ? "S/N" : $lote_dom_neg,
			'tipozona'		  => $tipozona_neg,
			'nombrezona'	  => $nombrezona_neg,
			'referencia'	  => $referencia_neg,
			'condicionvi'	  => $condicionnegv
			);
		$regnegocio=$this->negocio_model->actualizarnegocio($datanegocio, $idnegocio);
		if($regnegocio==true){
			echo "<script type='text/javascript'> alert('ACTUALIZADO CON EXITO'); ";
			echo " location.href='".base_url()."index.php/cliente/vernegocios/".$codcliente."'; </script>";	
		}else{
			echo "<script type='text/javascript'> alert('NO SE PUDO ACTUALIZAR'); ";
			echo " location.href='".base_url()."index.php/cliente/vernegocios/".$codcliente."'; </script>";	
		}
	}
	function eliminarnegocio($idnegocio){
		$negocio = $this->negocio_model->negocio($idnegocio);
		if($this->session->userdata('idusuario')){
			$eliminar=$this->negocio_model->eliminarnegocio($idnegocio);
			if($eliminar==true){
				echo "<script type='text/javascript'> alert('ELIMINADO CON EXITO'); ";
				echo " location.href='".base_url()."index.php/cliente/vernegocios/".$negocio['codcliente']."'; </script>";	
			}else{
				echo "<script type='text/javascript'> alert('NO SE PUEDE ELIMINAR'); ";
				echo " location.href='".base_url()."index.php/cliente/vernegocios/".$negocio['codcliente']."'; </script>";					
			}
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}

	function configurarcliente($codcliente){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$cliente=$this->cliente_model->obtener_cliente($codcliente);
			$data['cliente']=$cliente;
			if($this->session->userdata('tipouser')==1){
				$data['usuarios']=$this->usuario_model->listausuarios();
			}
			if($this->session->userdata('tipouser')==5){
				$data['usuarios']=$this->usuario_model->listausuariosagencia($this->session->userdata('agencia'));
			}
			$data['departamentos']=$this->general_model->lista_departamentos();
			$data['provincias']=$this->general_model->lista_provdep('10');
			$data['distritos']=$this->general_model->lista_distprov('186');	
			$data['avalview']='cliente/formaval';
			$data['negocioview']='cliente/formnegocio';
			$data['footer']='principal/footer';	
			$data['content']='cliente/configurarcliente';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function eliminaraval($codcliente){
		if($this->session->userdata('idusuario')){
			$eliminar=$this->cliente_model->eliminaraval($codcliente);
			if($eliminar==true){
				echo "<script type='text/javascript'> alert('ELIMINADO'); ";
				echo " location.href='".base_url()."index.php/cliente/configurarcliente/".$codcliente."'; </script>";	
			}else{
				echo "<script type='text/javascript'> alert('NO SE PUDO ELIMINAR'); ";
				echo " location.href='".base_url()."index.php/cliente/configurarcliente/".$codcliente."'; </script>";	
			}
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function obtenerconsulta(){
		$i=0;


		// $clientes=$this->cliente_model->ejecutarconsultavarios("SELECT tipovivienda,distrito_domic,tipovia,nombrevia,Nro,interior,mz,lote,tipozona,nombrezona,referencia FROM persona");

		// //ubicacion


		// foreach ($clientes as $row) {
		// 	$i++;
		// 	echo "(".$i.", '".$row['tipovivienda']."', '".$row['distrito_domic']."','".$row['tipovia']."','".$row['nombrevia']."','".$row['Nro']."','".$row['interior']."', '".$row['mz']."', '".$row['lote']."', '".$row['tipozona']."', '".$row['nombrezona']."', '".$row['referencia']."'),<br>";
		// }



		// $consulta="SELECT persona.dni, apellidos, apellidos2,nombres,fecha_nac,distrito_nac,sexo, celular, email, ruc, estadocivil, 
		// profesion, nacionalidad, grado_instr, tipotrabajador, ocupacion, institucion_lab, conyugue.dniconyugue
		// FROM persona LEFT JOIN conyugue ON persona.dni=conyugue.dni";
		// $clientes=$this->cliente_model->ejecutarconsultavarios($consulta);


		// foreach ($clientes as $row) {
		// 	$i++;
		// 	echo "('".$row['dni']."', '".$row['apellidos']."', '".$row['apellidos2']."','".$row['nombres']."','".$row['fecha_nac']."',".$row['distrito_nac'].",'".$row['sexo']."', '".$row['celular']."', '".$row['email']."', '".$row['ruc']."', '".$row['estadocivil']."', '".$row['profesion']."', '".$row['nacionalidad']."', '".$row['grado_instr']."', '".$row['tipotrabajador']."', '".$row['ocupacion']."', '".$row['institucion_lab']."',".$i.",'".$row['dniconyugue']."'),<br>";
		// }


		$consulta="SELECT cliente.codcliente, cliente.dni, cliente.idusuario, dniaval, cliente.estado, cliente.fecha_registro, usuario.agencia 
FROM cliente LEFT JOIN aval ON cliente.codcliente=aval.codcliente left JOIN usuario ON cliente.idusuario=usuario.codusuario";
		$clientes=$this->cliente_model->ejecutarconsultavarios($consulta);

echo "INSERT INTO cliente VALUES ";
		foreach ($clientes as $row) {
			if($row['agencia']=='HUANUCO'){
				$idagencia=1;
			}elseif($row['agencia']=='TINGO MARIA'){
				$idagencia=2;
			}else{
				$idagencia=3;
			}
			$i++;
			echo "(".$row['codcliente'].", '".$row['dni']."', '".$row['idusuario']."','".$row['dniaval']."','".$row['estado']."','".$row['fecha_registro']."','".$idagencia."'),<br>";
		}

	}


	function usuariosexportar(){
		//INSERT INTO usuario VALUES
		// $consulta="SELECT codusuario, clave, dni, estado  FROM usuario";
		// $clientes=$this->cliente_model->ejecutarconsultavarios($consulta);
		// foreach ($clientes as $row) {
		// 	echo "('".$row['codusuario']."', '".$row['clave']."', '".$row['dni']."','".$row['estado']."'),<br>";
		// }

		// $consulta="SELECT codusuario, agencia FROM usuario";
		// $clientes=$this->cliente_model->ejecutarconsultavarios($consulta);

		// echo "INSERT INTO agencia_usuario (idusuario, idagencia) VALUES ";
		// foreach ($clientes as $row) {
		// 	if($row['agencia']=='HUANUCO'){
		// 		$idagencia=1;
		// 	}elseif($row['agencia']=='TINGO MARIA'){
		// 		$idagencia=2;
		// 	}else{
		// 		$idagencia=3;
		// 	}			
		// 	echo "('".$row['codusuario']."', '".$idagencia."'),<br>";
		// }





		$consulta="SELECT codusuario, tipo FROM usuario";
		$clientes=$this->cliente_model->ejecutarconsultavarios($consulta);

		echo "INSERT INTO rolusuario VALUES ";
		foreach ($clientes as $row) {	
			echo "('".$row['codusuario']."', '".$row['tipo']."'),<br>";
		}



	}
	function solicitudesexportar(){
		$consulta="SELECT solicitud.idsolicitud, codcliente, estado, fecha, idasesor, tipo, solicitud.monto, producto, tipoplazo, 
cantplazo, agencia, medioorigen, dondepagara, fuenterecursos, d.interes, d.total, d.costomora FROM solicitud LEFT JOIN 
desembolso d ON solicitud.idsolicitud=d.idsolicitud";
		$solicitudes=$this->cliente_model->ejecutarconsultavarios($consulta);
		$i=0;
		echo "INSERT INTO solicitud VALUES ";
		foreach ($solicitudes as $row) { $i++;
			if($row['agencia']=='HUANUCO'){
				$idagencia=1;
			}elseif($row['agencia']=='TINGO MARIA'){
				$idagencia=2;
			}else{
				$idagencia=3;
			}
			if(is_null($row['interes'])){
				$row['interes']=0;
			}
			if(is_null($row['total'])){
				$row['total']=0;
			}
			if(is_null($row['costomora'])){
				$row['costomora']=0;
			}			
			echo "(".$row['idsolicitud'].", '".$row['codcliente']."', '".$row['estado']."','".$row['fecha']."','".$row['idasesor']."','".$row['tipo']."',".$row['monto'].", '".$row['producto']."', '".$row['tipoplazo']."', ".$row['cantplazo'].", ".$idagencia.", '".$row['medioorigen']."', '".$row['dondepagara']."', '".$row['fuenterecursos']."', '".$row['interes']."', '".$row['total']."', '".$row['costomora']."')";
			if($i % 2000 == 0){
				echo "; <br>INSERT INTO solicitud VALUES ";
			}else{
				echo ",<br>";
			}
		}
	}
	function desembolsosexportar(){
		$consulta="SELECT idsolicitud, fecha_hora, 'KESPIRITU' AS idusuario, 0 AS descontado, monto FROM desembolso";
		$clientes=$this->cliente_model->ejecutarconsultavarios($consulta);

		echo "INSERT INTO desembolso VALUES ";
		foreach ($clientes as $row) {	
			echo "(".$row['idsolicitud'].", '".$row['fecha_hora']."', '".$row['idusuario']."', ".$row['descontado'].", ".$row['monto']."),<br>";
		}
	}
	function detallecalendarioaexportar(){
		$consulta="SELECT desembolso.idsolicitud, cuotapago.nrocuota, fecha_prog, nombredia, cuota, saldo FROM cuotapago JOIN desembolso ON cuotapago.iddesembolso=desembolso.iddesembolso where fecha_prog like '%2018%'";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=0;
		echo "INSERT INTO detcalendariopagos VALUES ";
		foreach ($lista as $row) {	$i++;
			echo "(".$row['idsolicitud'].", ".$row['nrocuota'].", '".$row['fecha_prog']."', '".$row['nombredia']."', ".$row['cuota'].", ".$row['saldo'].")";
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO detcalendariopagos VALUES ";
			}else{
				echo ",<br>";
			}


		}		
	}
	function pagoscuotasexportar(){
		$consulta="SELECT desembolso.idsolicitud, pago.nrocuota, fecha_reg, codusuario, moradias, montopagado FROM pago JOIN desembolso ON pago.iddesembolso=desembolso.iddesembolso WHERE fecha_reg LIKE '%2021%'";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=0;
		echo "INSERT INTO pago VALUES ";
		foreach ($lista as $row) {	$i++;
			echo "(".$row['idsolicitud'].", ".$row['nrocuota'].", '".$row['fecha_reg']."', '".$row['codusuario']."', ".$row['moradias'].", ".$row['montopagado'].")";
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO pago VALUES ";
			}else{
				echo ",<br>";
			}

		}	
	}
	function kardexexportar(){
		$consulta="SELECT desembolso.idsolicitud, id, fecha_hora_reg, montopagado, idusuario FROM kardex JOIN desembolso ON kardex.iddesembolso = desembolso.iddesembolso WHERE fecha_hora_reg LIKE '%2018%' ORDER BY idsolicitud";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=0;
$cont=0;
$idsolicitinicial=2;
		echo "INSERT INTO kardex VALUES ";
		foreach ($lista as $row) {	$i++;
			echo "(".$row['idsolicitud'].", ".$row['id'].", '".$row['fecha_hora_reg']."', ".$row['montopagado'].", '".$row['idusuario']."')";
			$idsolicitinicial=$row['idsolicitud'];
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO kardex VALUES ";
			}else{
				echo ",<br>";
			}
		}			
	}
	function cajaexportar(){
		//$consulta="SELECT agencia, 'CAJA', idreg, fecha_hora, tipo, codusuario, cantidad, saldo, descripcion FROM caja where fecha_hora like '%2021%'";
		$consulta="SELECT agencia, 'BANCO', id, fecha_hora, tipo, codusuario, cantidad, saldo, descripcion FROM bancos WHERE fecha_hora LIKE '%2021%'";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=0;
		echo "INSERT INTO caja_banco VALUES ";
		foreach ($lista as $row) {	$i++;
			if($row['agencia']=='HUANUCO'){
				$idagencia=1;
			}elseif($row['agencia']=='TINGO MARIA'){
				$idagencia=2;
			}else{
				$idagencia=3;
			}
			echo "(".$idagencia.", 'BANCO', ".$row['id'].", '".$row['fecha_hora']."', '".$row['tipo']."', '".$row['codusuario']."', ".$row['cantidad'].", ".$row['saldo'].", '".$row['descripcion']."')";
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO caja_banco VALUES ";
			}else{
				echo ",<br>";
			}
		}
	}
	function cierrecajaexportar(){
		$consulta="SELECT id, fecha_hora, idusuario, cantidad, observacion, 1 AS idbilletaje, agencia FROM cierrecaja where fecha_hora like '%2021%'";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=0;
		echo "INSERT INTO cierrecaja VALUES ";
		foreach ($lista as $row) {	$i++;
			if($row['agencia']=='HUANUCO'){
				$idagencia=1;
			}elseif($row['agencia']=='TINGO MARIA'){
				$idagencia=2;
			}else{
				$idagencia=3;
			}
			echo "(".$row['id'].", '".$row['fecha_hora']."', '".$row['idusuario']."', ".$row['cantidad'].", '".$row['observacion']."', ".$row['idbilletaje'].", ".$idagencia.")";
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO cierrecaja VALUES ";
			}else{
				echo ",<br>";
			}
		}
	}

	function rhhexportar(){
		$consulta="SELECT dni, cargo, sueldobasico, fechainicio, estado, tipo, 1 AS idagencia FROM personal";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=0;
		echo "INSERT INTO empleado VALUES ";
		foreach ($lista as $row) {	$i++;
			echo "('".$row['dni']."', '".$row['cargo']."', ".$row['sueldobasico'].", '".$row['fechainicio']."', '".$row['estado']."', '".$row['tipo']."', ".$row['idagencia'].")";
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO empleado VALUES ";
			}else{
				echo ",<br>";
			}
		}
	}
	function cuentarhportar(){
		$consulta="SELECT dni, mes, nro, cantidad, tipo, saldo, fechareg, descripcion, usuario, tiporegistro FROM cuentarrhh";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=0;
		echo "INSERT INTO cuentarh VALUES ";
		foreach ($lista as $row) {	$i++;
			echo "('".$row['dni']."', ".$row['mes'].", ".$row['nro'].", ".$row['cantidad'].", '".$row['tipo']."', ".$row['saldo'].", '".$row['fechareg']."', '".$row['descripcion']."', '".$row['usuario']."', '".$row['tiporegistro']."')";
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO cuentarh VALUES ";
			}else{
				echo ",<br>";
			}
		}
	}
	function logrosmetasexportar(){
		$consulta="SELECT codasesor, id, tipo, fecharegistro, cartera, clientes, desembolsados, saldomora, clientenuevos FROM metaasesor WHERE fecharegistro LIKE '%2021%'";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=0;
		echo "INSERT INTO metaasesor VALUES ";
		foreach ($lista as $row) {	$i++;
			echo "('".$row['codasesor']."', ".$row['id'].", '".$row['tipo']."', '".$row['fecharegistro']."', ".$row['cartera'].", ".$row['clientes'].", ".$row['desembolsados'].", ".$row['saldomora'].", ".$row['clientenuevos'].")";
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO metaasesor VALUES ";
			}else{
				echo ",<br>";
			}
		}
	}	
	function exportarregistropersona(){
		$consulta="SELECT dni, apellidos, apellidos2, nombres, fecha_nac, distrito_nac, sexo, celular, email, ruc, estadocivil, profesion, nacionalidad, grado_instr, tipotrabajador, ocupacion, institucion_lab, NULL, NULL FROM persona";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=0;
		echo "INSERT INTO persona VALUES ";
		foreach ($lista as $row) {	$i++;
			echo "('".$row['dni']."', '".$row['apellidos']."', '".$row['apellidos2']."', '".$row['nombres']."','".$row['fecha_nac']."', '".$row['distrito_nac']."', '".$row['sexo']."', '".$row['celular']."', '".$row['ruc']."', '".$row['ruc']."', '".$row['estadocivil']."', '".$row['profesion']."', '".$row['nacionalidad']."', '".$row['grado_instr']."', '".$row['tipotrabajador']."', '".$row['ocupacion']."', '".$row['institucion_lab']."',NULL, NULL)";
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO persona VALUES ";
			}else{
				echo ",<br>";
			}
		}			
	}
	function exportarlistajunta(){
		$consulta="SELECT codigo, cuentaahorros.codcliente, tipoplazo, plazo, frecuencia, nrocuotas, cuentaahorros.fecha_registro, monto, fechainicio, descripcion, cuentaahorros.estado, dondepagara, clientes.agencia, nrocuotas*monto AS total, clientes.idusuario FROM cuentaahorros left JOIN clientes ON cuentaahorros.codcliente=clientes.codcliente";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=0;
		echo "INSERT INTO junta VALUES ";
		foreach ($lista as $row) {	$i++;
			if($row['agencia']=='HUANUCO'){
				$idagencia=1;
			}elseif($row['agencia']=='TINGO MARIA'){
				$idagencia=2;
			}else{
				$idagencia=3;
			}
			echo "(".$row['codigo'].", ".$row['codcliente'].", '".$row['tipoplazo']."', ".$row['plazo'].",'".$row['frecuencia']."', ".$row['nrocuotas'].", '".$row['fecha_registro']."', ".$row['monto'].", '".$row['fechainicio']."', '".$row['descripcion']."', '".$row['estado']."', '".$row['dondepagara']."', ".$idagencia.", ".$row['total'].", '".$row['idusuario']."')";
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO persona VALUES ";
			}else{
				echo ",<br>";
			}
		}				
	}
	function detallecalendariojunta(){
		$consulta="SELECT codigocuenta, nrocuota, monto, fechaprog, nombredia FROM cuotaahorros ";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=0;
		echo "INSERT INTO detcalendariojunta VALUES ";
		foreach ($lista as $row) {	$i++;
			echo "(".$row['codigocuenta'].", ".$row['nrocuota'].", ".$row['monto'].", '".$row['fechaprog']."', '".$row['nombredia']."')";
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO detcalendariojunta VALUES ";
			}else{
				echo ",<br>";
			}
		}		
	}
	function pagocuotajunta(){
		$consulta="SELECT codigo, nro, monto, fechareg, idusuario, monto, 0 AS vuelto FROM pagocuotaahorros";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=0;
		echo "INSERT INTO pagokardexjunta VALUES ";
		foreach ($lista as $row) {	$i++;
			echo "(".$row['codigo'].", ".$row['nro'].", ".$row['monto'].", '".$row['fechareg']."', '".$row['idusuario']."', ".$row['monto'].", ".$row['vuelto'].")";
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO pagokardexjunta VALUES ";
			}else{
				echo ",<br>";
			}
		}		
	}
	function pagosueldojunta(){
		$consulta="SELECT dni, mes, fechareg, afp, adelantos, dscto, movilidad, alimentacion, bonificacion, asignacion, sueldobasico, total, 'KESPIRITU' AS codusuario FROM pagosueldo";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=0;
		echo "INSERT INTO pagosueldo VALUES ";
		foreach ($lista as $row) {	$i++;
			echo "('".$row['dni']."', ".$row['mes'].", '".$row['fechareg']."',".$row['afp'].", ".$row['adelantos'].", ".$row['dscto'].", ".$row['movilidad'].", ".$row['alimentacion'].", ".$row['bonificacion'].", ".$row['asignacion'].", ".$row['sueldobasico'].", ".$row['total'].", '".$row['codusuario']."')";
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO pagosueldo VALUES ";
			}else{
				echo ",<br>";
			}
		}		
	}
	function pagomoraexportar(){
		$consulta="SELECT desembolso.idsolicitud, id, diasmora, pagomora.total, fechahora_reg, 'KESPIRITU' AS usuario FROM pagomora JOIN desembolso ON pagomora.iddesembolso=desembolso.iddesembolso";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=0;
		echo "INSERT INTO pagomora VALUES ";
		foreach ($lista as $row) {	$i++;
			echo "(".$row['idsolicitud'].", ".$row['id'].", ".$row['diasmora'].",".$row['total'].", '".$row['fechahora_reg']."', '".$row['usuario']."')";
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO pagomora VALUES ";
			}else{
				echo ",<br>";
			}
		}		
	}
	function segurodesgrexportar(){
		$consulta="SELECT idsolicitud, monto, fecha FROM segurodesgravamen";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=0;
		echo "INSERT INTO segurodesgravamen VALUES ";
		foreach ($lista as $row) {	$i++;
			echo "(".$row['idsolicitud'].", ".$row['monto'].", '".$row['fecha']."')";
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO segurodesgravamen VALUES ";
			}else{
				echo ",<br>";
			}
		}		
	}
	function negocioexportar(){
		$consulta="SELECT idnegocio, codcliente, razonsocial, ruc, tel_cel, actividad, actividad_espec, NULL, inicio_actividad FROM negocio";
		$lista=$this->cliente_model->ejecutarconsultavarios($consulta);
$i=2784;
		echo "INSERT INTO negocio VALUES ";
		foreach ($lista as $row) {	$i++;
			echo "(".$row['idnegocio'].", ".$row['codcliente'].", '".$row['razonsocial']."', '".$row['ruc']."', '".$row['tel_cel']."', '".$row['actividad']."', '".$row['actividad_espec']."', ".$i.", '".$row['inicio_actividad']."')";
			if($i % 3000 == 0){
				echo "; <br>INSERT INTO negocio VALUES ";
			}else{
				echo ",<br>";
			}
		}		
	}
	function registrarubicacionnegocios(){
		$i=2784;
		echo "INSERT INTO ubicacion VALUES ";
		$clientes=$this->cliente_model->ejecutarconsultavarios("SELECT condicionvi,distrito_neg,tipovia,nombrevia,Nro,interior,mz,lote,tipozona,nombrezona,referencia FROM negocio");
		//ubicacion
		foreach ($clientes as $row) {
			$i++;
			echo "(".$i.", '".$row['condicionvi']."', '".$row['distrito_neg']."','".$row['tipovia']."','".$row['nombrevia']."','".$row['Nro']."','".$row['interior']."', '".$row['mz']."', '".$row['lote']."', '".$row['tipozona']."', '".$row['nombrezona']."', '".$row['referencia']."'),<br>";
		}

	}
}

/* End of file cliente.php */
/* Location: ./application/controllers/cliente.php */