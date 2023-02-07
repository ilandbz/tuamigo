<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
class Ahorros extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('general_model');
		$this->load->model('cliente_model');
		$this->load->model('caja_model');
		$this->load->model('persona_model');
		$this->load->model('ahorro_model');	
		$this->load->model('usuario_model');
		$this->load->model('operaciones_model');
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
				$data['saldo']=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
				$data['header']='principal/headeroperaciones';
				break;
			case 4://cobranza
				$data['saldo']=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
				$data['header']='principal/headercobranza';
				break;
			case 5:
				$data['header']='principal/headeradmin';
				$data['fechalogros']=$this->operaciones_model->ultimafechalogros($this->session->userdata('agencia'));
				break;				
			case 6:
				$data['header']='principal/headeroperaciones';
				break;
		}
		return $data;
	}
	function index(){
		if($this->session->userdata('idusuario')){
			$data['header']='principal/headerahorros';	
			$data['footer']='principal/footerahorros';	
			$data['content']='ahorros/content';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function crearclienteform(){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footerahorros2';	
			$data['content']='ahorros/crearcliente';
			$data['departamentos']=$this->general_model->lista_departamentos();
			$data['provincias']=$this->general_model->lista_provdep(10);
			$data['distritos']=$this->general_model->lista_distprov(186);
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function crearclienteoperaciones(){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footerahorros2';	
			$data['content']='ahorros/crearclienteoperaciones';
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
	function registrarcliente(){
		$dni=$this->input->post('dni');
		$estadociv=$this->input->post('estadociv');
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
		//data persona cliente
		if (is_null($this->input->post('asesor'))){
			$asesor = $this->session->userdata('idusuario');			
		}else{
			$asesor = $this->input->post('asesor');
		}
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
				'idusuario'			=>$asesor,
				'tipo'				=>'AHORROS'
			);
		$regcliente=$this->cliente_model->registrar($data2);
		if($regcliente==true){
			// redirect(base_url().'index.php/ahorros/vercliente/'.$codcliente);
			echo "<script type='text/javascript'> alert('SE REGISTRO CON EXITO'); ";
			echo " location.href='".base_url()."index.php/ahorros/clienteregistrado/".$codcliente."'; </script>";	
		}else{
			echo 'EXISTEN PROBLEMAS DE REGISTRO CONSULTE A SU PROVEEDOR';
		}
	}
	function prueba(){

		$this->generarcalendariopagos(3,182,'2021-05-14','10002502','DIARIO');
	}
	function clienteregistrado($codcliente){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';	
			$data['content']='ahorros/clienteregistrado';
			$data['cliente']=$this->cliente_model->obtener_cliente($codcliente);	
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function listaclientes(){
		if($this->session->userdata('idusuario')){
			$agencia=$this->session->userdata('agencia');
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['clientes']=$this->cliente_model->lista_clientesahorro($agencia);
			$data['footer']='principal/footerahorros';	
			$data['content']='ahorros/listaclientes';
			$this->load->view('index',$data);
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
				$data['usuarios']=$this->usuario_model->listausuariosactivos();
			}
			if($this->session->userdata('tipouser')==5 || $this->session->userdata('tipouser')==3){
				$data['usuarios']=$this->usuario_model->listausuariosagencia($this->session->userdata('agencia'));
			}
			$data['footer']='principal/footerahorros2';	
			$data['content']='ahorros/configurarcliente';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function eliminar($idcliente){//eliminar cliente
		$cliente=$this->cliente_model->obtener_cliente($idcliente);
		$usuarioactual=$this->session->userdata('idusuario');
		$result = $this->cliente_model->eliminarcliente($idcliente);	
		if($result==true){
			echo "<script type='text/javascript'> alert('ELIMINADO'); ";				
		}else{
			echo "<script type='text/javascript'> alert('NO SE PUDO ELIMINAR'); ";
		}		
		echo " location.href='".base_url()."index.php/cliente/lista'; </script>";		
	}
	function eliminarreg($codigo){
		$eliminar=$this->ahorro_model->eliminarreg($codigo);
		if($eliminar==true){
			$funcion = $this->session->userdata('tipouser')==3 ? 'listaapagar' : 'listasolicitudes';
			redirect(base_url().'index.php/ahorros/'.$funcion);		
		}else{
			echo 'NO SE PUDO ELIMINAR COMUNIQUE A SOPORTE';
		}
	}
	function listaclientesasesor(){
		if($this->session->userdata('idusuario')){
			$agencia=$this->session->userdata('agencia');
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['clientes']=$this->cliente_model->lista_clientesahorroasesor($this->session->userdata('idusuario'));
			$data['footer']='principal/footerahorros';	
			$data['content']='ahorros/listaclientes';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function seleccliente(){
		if($this->session->userdata('idusuario')){
			$agencia=$this->session->userdata('agencia');
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			if($this->session->userdata('tipouser')==2){
				$data['clientes']=$this->cliente_model->lista_clientesahorroasesor($this->session->userdata('idusuario'));				
			}else{
				$data['clientes']=$this->cliente_model->lista_clientesahorro($agencia);	
			}
			$data['footer']='principal/footerahorros';	
			$data['content']='ahorros/clientesparaahorro';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function crearcuentaform($codcliente){
		if($this->session->userdata('idusuario')){
			$agencia=$this->session->userdata('agencia');
			$codigo = date('i').$codcliente;
			$data=$this->retornarheader($this->session->userdata('tipouser'));		
			$data['codigo']=$codigo;
			$data['cliente']=$this->cliente_model->obtener_cliente($codcliente);			
			$data['footer']='principal/footerahorros2';
			$data['content']='ahorros/solicitud';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function calcularnrocuotasnavidad($fecha_inicio){
		$fechafinal = strtotime ('2021-12-11');
		$fechafinal = date('Y-m-d',$fechafinal);
		$nrocuotas=0;
		$fecha = strtotime($fecha_inicio);
		$fecha = date('Y-m-d',$fecha);
		while($fecha<$fechafinal){
			$fecha = strtotime('+1 day', strtotime ($fecha));
			$fecha = date('Y-m-d',$fecha);
			$nrocuotas++;
		}
		return $nrocuotas;
	}
	function guardarsolicitud(){
		$codigo = $this->input->post('nrosolicitud');
		$plazo = $this->input->post('plazo');
		$codcliente = $this->input->post('codcliente');
		$tipoplazo='Meses';
		$frecuencia = $this->input->post('frecuencia');
		$sumdias=0;
		//$fecha=strtotime(date('Y-m-d'));
		$fecha_inicio=$this->input->post('fechainicio');
		$descripcion = $this->input->post('descripcion');
		if($descripcion == 'CANASTA NAVIDAD'){
			$nrocuotas = $this->calcularnrocuotasnavidad($fecha_inicio);
		}else{
			$nrocuotas = $this->calcularnrocuotas($fecha_inicio, $frecuencia, $plazo);
		}
		$fecha_registro=$this->input->post('fecha');
		$monto = $this->input->post('montosolic');
		$fecha_inicio=$this->input->post('fechainicio');
		
		$estado='APROBADO';
		$dondepagara = $this->input->post('lugcobranza');
		$data = array(
			'codigo' 	=> $codigo,
			'plazo'		=> $plazo,
			'tipoplazo'	=> $tipoplazo,
			'frecuencia'=> $frecuencia,
			'nrocuotas'	=> $nrocuotas,
			'fecha_registro'=> $fecha_registro,
			'monto'			=> $monto,
			'fechainicio'	=> $fecha_inicio,
			'descripcion'	=> $descripcion,
			'estado'		=> $estado,
			'dondepagara'	=> $dondepagara,
			'codcliente'	=> $codcliente
			 );
		$result = $this->ahorro_model->registrarahorro($data);
		if($result==true){
			$this->generarcalendariopagos($monto,$nrocuotas,$fecha_inicio,$codigo,$frecuencia);
			echo "<script type='text/javascript'> alert('REGISTRADO CON EXITO'); ";
			echo " location.href='".base_url()."index.php/ahorros/verpagos/".$codigo."'; </script>";
		}else{
			echo 'no se pudo registrar';
		}
	}
	function formeliminarpagos($codigo){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';	
			$data['content']='ahorros/formeliminarpagos';
			$data['cuentaahorros']=$this->ahorro_model->obtenercuotaahorrovista($codigo);
			$data['kardex']=$this->ahorro_model->listapagoahorro($codigo);
			$this->load->view('index',$data);			
		}else{
			echo "<script type='text/javascript'> alert('Solo el Usuario de Operaciones tiene Acceso'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}
	}
	function eliminarpagokardex($codigo, $nro){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$registro=$this->ahorro_model->obtenerkardex($codigo, $nro);
			$result=$this->ahorro_model->eliminarregkardex($codigo, $nro);
			if($result==true){
				$resultado = $this->eliminarpagos($codigo, $registro['monto']);
				redirect(base_url().'index.php/ahorros/formeliminarpagos/'.$codigo);				
			}else{
				echo "<script type='text/javascript'> alert('NO SE ELIMINO NINGUN REGISTRO'); ";
				echo " location.href='".base_url()."index.php/ahorros/formeliminarpagos/".$codigo."'; </script>";				
			}	
		}else{
			echo "<script type='text/javascript'> alert('Solo el Usuario de Operaciones tiene Acceso'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}		
	}
	function eliminarpagos($codigo, $monto){
		$pagos = $this->ahorro_model->pagosdescendentes($codigo);
		$contador=$monto;
		foreach($pagos as $row){
			if($row['montopagado']<=$contador){
				$contador=$contador-$row['montopagado'];
				$this->ahorro_model->eliminarregpagoahorro($codigo, $row['nrocuota']);
			}else{
				$montopagado=$row['montopagado']-$contador;
				$contador=0;
				$this->ahorro_model->actualizarmontopago($codigo, $row['nrocuota'] ,array('monto' => $montopagado));
			}
			if($contador==0){
				return true;
			}
		}
	}
	function generarcalendariopagos($monto, $nrocuotas, $fecha_inicio, $idcuenta, $frecuencia){
		$fecha = $fecha_inicio;
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		switch ($frecuencia){
			case 'DIARIO':
				$f = 1;
				break;
			case 'SEMANAL':
				$f = 7;
				break;
			case 'MENSUAL':
				$f = 30;
				break;
			case 'DPF';
				$f = 1;
				break;
		}	
		for($i = 1; $i<=$nrocuotas; $i++){
			$cuota= array(
				'codigocuenta' 	=> $idcuenta, 
				'nrocuota'		=> $i,
				'monto'			=> $monto,
				'fechaprog'		=> $fecha,
				'nombredia'		=> $dias[date("w", strtotime($fecha))]
				);
			$reg = $this->ahorro_model->regcuotaahorro($cuota);
			$fecha = strtotime ( '+'.$f.' day' , strtotime ( $fecha ) ) ;
			$fecha = date ( 'Y-m-d' , $fecha );	
	 	}
	}
	function reportecobranzapdf($codigoahorros){
		if($this->session->userdata('idusuario')){	
			$cuentaahorros = $this->ahorro_model->obtenercuotaahorro($codigoahorros);
			$data['cuentaahorros']=$cuentaahorros;
			$data['cuotapagos']=$this->ahorro_model->listacuotas($codigoahorros);
			$cliente=$this->cliente_model->obtener_cliente($cuentaahorros['codcliente']);
			$data['cliente']=$cliente;
			$data['asesor']=$this->usuario_model->obtenerusuario($cliente['idusuario']);
			if($cuentaahorros['plazo']==12){
				$this->load->view('ahorros/vista_calendariopagos12mpdf', $data);
			}elseif($cuentaahorros['plazo']==9){
				$this->load->view('ahorros/vista_calendariopagos9mpdf', $data);
			}elseif($cuentaahorros['plazo']==6){
				$this->load->view('ahorros/vista_calendariopagospdf', $data);				
			}else{
				$this->load->view('ahorros/vista_calendariopagos4pdf', $data);
			}
			// $this->pdf->load_html($html);
			// $this->pdf->set_paper('A4','landscape');
			// $this->pdf->render();
			// $this->pdf->stream("repcobranza.pdf", array("Attachment" => false));
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}		
	}
	function generarcalform(){
		if($this->session->userdata('tipouser')==3 || $this->session->userdata('tipouser')==5){	
			$agencia=$this->session->userdata('agencia');	
			$listasolicitudes = $this->ahorro_model->listadecuentas($agencia, 'SOLICITADO');			
			$data['solicitudes']=$listasolicitudes;	
			$data['header']='principal/headerahorros';
			$data['footer']='principal/footerahorros';
			$data['content']='ahorros/listasolicitudes';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function opciones(){//LISTA DE CLIENTES POR APELLIDOS Y NOMBRES
		$texto='';
		$lista=$this->cliente_model->lista_clientestipo('AHORROS');
		foreach($lista as $row){
			$texto .= '"' . $row['apenom'] . '",';
		}
		return $texto;
	}
	function actualizarsaldos(){
		$saldoasesor=$this->input->post('saldoasesor');
		foreach($saldoasesor as $row) {
			$data = array('saldo' => $row['saldo'] );
			$this->operaciones_model->actualizarsaldoasesor2($row['id'], 'AHORROS', $data);
		}
		redirect(base_url().'index.php/ahorros/formpagasesor');
	}
	function listaapagar(){
		if($this->session->userdata('tipouser')==3 || $this->session->userdata('tipouser')==4){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footerahorros';
			$data['lista']=$this->opciones();
			$data['content']='ahorros/solicitudesapagarform';
			$data['asesores']=$this->usuario_model->listaasesoresxagencia($this->session->userdata('agencia'));
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}		
	}
	function resultbusquedaapagar(){
		if($this->session->userdata('tipouser')>=3){
			$apenom = $this->input->post('apenom');
			$data['solicitudes'] = $this->ahorro_model->cuentasapenomvigenteslike($this->session->userdata('agencia'), $apenom);		
			$this->load->view('ahorros/tablalistaapagar', $data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}		
	}	
	function listasolicitudes(){//asesor
		$asesor=$this->session->userdata('idusuario');
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$listasolicitudes = $this->ahorro_model->listadecuentasasesor($asesor, 'APROBADO');
		$data['solicitudes']=$listasolicitudes;
		$data['footer']='principal/footerahorros';
		$data['content']='ahorros/listaapagar';
		$this->load->view('index',$data);
	}
	function cargarlista(){
		$agencia = $this->session->userdata('agencia');
		$apenomcliente = $this->input->post('apenomclie');
		$listasolicitudes = $this->ahorro_model->listadecuentasapenom($agencia, 'APROBADO', $apenomcliente);
		$data['solicitudes']=$listasolicitudes;
		$this->load->view('ahorros/tablalistasolicitudes',$data);
	}
	function pagoform($codigo){
		if($this->session->userdata('tipouser')>=3){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$agencia=$this->session->userdata('agencia');
			$solicitud=$this->ahorro_model->obtenercuotaahorrovista($codigo);
			$data['ultimoregistropagoahorros']=$this->ahorro_model->ultimoregistropagoahorros($codigo);
			$data['solicitud']=$solicitud;
			$data['footer']='principal/footerahorros';
			$data['content']='ahorros/pagoform';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}		
	}
	function pagar(){
		$codigo = $this->input->post('codigo');
		$fechahora = $this->input->post('fechapago');
		$monto = $this->input->post('montototalpagar');
		$nro = $this->ahorro_model->maximocod($codigo)+1;
		$idusuario = $this->session->userdata('idusuario');
		$apenomcliente=$this->input->post('apenomcliente');
		$data = array(
			'codigo' 		=> $codigo,
			'fecha_hora'	=> $fechahora,
			'nro'			=> $nro,
			'monto'			=> $monto,
			'idusuario'		=> $idusuario
			);
		$result = $this->ahorro_model->registrarpago($data);//kardex
		$descripcion='Pago de doco por el monto de S/.'.$monto.' Cliente : '.$apenomcliente;
		if($result==true){
			$this->registrarcuotaspagados($codigo, $monto, $fechahora, $idusuario);
			if($this->session->userdata('tipouser')==3){
				$this->formpagocuotascaja($monto, $descripcion, $fechahora, $codigo);
			}else{
				$idreg=$this->caja_model->maximocod();
				$saldo=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
				$data=array(
						'idreg'			=> $idreg+1,
						'fecha_hora'	=> $fechahora,
						'codusuario'	=> $this->session->userdata('idusuario'),
						'agencia'		=> $this->session->userdata('agencia'),
						'cantidad'		=> $monto,
						'tipo'			=> 'INGRESO',
						'saldo'			=> $saldo+$monto,
						'descripcion'	=> $descripcion
					);
				$regcaja=$this->caja_model->registrarcaja($data);
				if($regcaja==true){
					$this->pagorealizado($monto, $descripcion, $fechahora, $codigo);
				}else{
					echo 'NO SE REGISTRO CORRECTAMENTE CONSULTE A SOPORTE';			
				}
			}
		}else{
			echo 'NO SE PUDO REGISTRAR';
		}
	}
	function pagorealizado($monto, $concepto, $fecha, $codigo){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer4';	
			$data['content']='ahorros/pagorealizado';
			$data['monto']=$monto;
			$data['concepto']=$concepto;
			$data['fecha']=$fecha;
			$data['cuentaahorros']=$this->ahorro_model->obtenercuotaahorrovista($codigo);
			$this->load->view('index',$data);			
		}else{
			echo "<script type='text/javascript'> alert('Solo el Usuario de Operaciones tiene Acceso'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}
	}
	function formpagocuotascaja($monto, $concepto, $fecha, $codigo){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer4';	
			$data['content']='ahorros/formpagocuotasm';
			$data['monto']=$monto;
			$data['concepto']=$concepto;
			$data['fecha']=$fecha;
			$data['cuentaahorros']=$this->ahorro_model->obtenercuotaahorrovista($codigo);
			$this->load->view('index',$data);			
		}else{
			echo "<script type='text/javascript'> alert('Solo el Usuario de Operaciones tiene Acceso'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}
	}
	function registrarcuotaspagados($codigo, $monto, $fecha, $idusuario){
		$vistapagosnull = $this->ahorro_model->vistapagosnull($codigo);
		$nrocuotas=0;
		foreach($vistapagosnull as $row){
			if(!is_null($row['montopagado']) && $row['montopagado']<$row['cuota']){
				$diferencia = $row['cuota']-$row['montopagado'];
				if($monto>=$diferencia){//si cubre lo faltante para la cuota
					$montopagado=$row['cuota'];//variable para actualizar el pago en el registro
					$monto=$monto-$diferencia;
				}else{//si no cubre lo faltante para la mora
					$montopagado=$monto+$row['montopagado'];//variable para actualizar el pago en el registro
					$monto=0;
				}
				$data2=array(
						'monto'			=>$montopagado,
						'fechareg'		=>$fecha,
						'idusuario'		=>$idusuario
					);
				$act=$this->ahorro_model->actualizarmontopago($codigo, $row['nrocuota'], $data2);
			}else{
				if($monto<$row['cuota']){
					$montopagado=$monto;
					$monto=0;
				}else{
					$montopagado=$row['cuota'];
					$monto=$monto-$row['cuota'];
				}
				$data=array(
						'codigo'		=> $codigo,
						'nro'			=> $row['nrocuota'],
						'fechareg'		=> $fecha,
						'idusuario'		=> $idusuario,
						'monto'			=> $montopagado
					);
				$this->ahorro_model->regpagocuotaahorros($data);
				$nrocuotas++;
			}
			if($monto<=0){
				break;
			}
		}
		return $nrocuotas;
	}
	function verpagos($codigo){
		if($this->session->userdata('tipouser')){
			$agencia=$this->session->userdata('agencia');
			$solicitud=$this->ahorro_model->obtenercuotaahorrovista($codigo);
			$data=$this->retornarheader($this->session->userdata('tipouser'));			
			$data['solicitud']=$solicitud;	
			$data['cuotas']=$this->ahorro_model->listacuotas($codigo);
			$data['totalpagado']=$this->ahorro_model->pagototal($codigo);
			$data['footer']='principal/footerahorros2';
			$data['content']='ahorros/verpagos';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}		
	}
	function plandepagosopdf($codigo){
		$solicitud = $this->ahorro_model->obtenercuotaahorrovista($codigo);
		$data['solicitud']=$solicitud;
		$cuotaspago=$this->ahorro_model->listacuotas($codigo);
		$data['cuotaspago'] = $cuotaspago;

		// $html= $this->load->view('ahorros/planpagospdf', $data, true);
		// $this->pdf->load_html($html);
		// $this->pdf->set_paper('A4','portrait');
		// $this->pdf->render();
		// $this->pdf->stream("repcobranza.pdf", array("Attachment" => false));

		$this->load->view('ahorros/planpagospdf', $data);
	}
	function kardexpdf($codigo){
		$solicitud= $this->ahorro_model->obtenercuotaahorrovista($codigo);			
		$data['kardex']=$this->ahorro_model->listapagoahorro($codigo);
		$data['solicitud'] = $solicitud;
		$this->load->view('ahorros/kardex', $data);	


		// $html= $this->load->view('ahorros/kardex', $data, true);	
		// $this->pdf->load_html($html);
		// $this->pdf->set_paper('A4','portrait');
		// $this->pdf->render();
		// $this->pdf->stream("repcobranza.pdf", array("Attachment" => false));	
	}
	function cobranzaasesor(){
		if(is_null($this->session->userdata('idusuario')) || $this->session->userdata('tipouser')!=2){
			echo "<script type='text/javascript'> alert('Debe iniciar session el Asesor Financiero'); ";
			echo " location.href='".base_url()."index.php'; </script>";
			return false;
		}
		$usuario =$this->session->userdata('idusuario');
		$saldoasesorhoy=$this->caja_model->ingresosaldoasesorfech($usuario, date('Y-m-d'), 'AHORROS');
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['footer']='principal/footerahorros2';	
		if(is_null($saldoasesorhoy)){
			$data['content']='principal/pagerror';
			$data['mensaje']='NO TIENE REGISTROS DE SALDO HOY';
		}elseif($saldoasesorhoy['saldo']==0){
			$data['content']='principal/pagerror';
			$data['mensaje']='SU SALDO ES CERO '.$saldoasesorhoy['idcaja'];
		}elseif($this->caja_model->pagohoy($usuario, date('Y-m-d'), 'AHORROS')){
			$data['content']='principal/pagerror';
			$data['mensaje']='YA REALIZO PAGOS, codcaja: '.$saldoasesorhoy['idcaja'];
		}else{
			$data['registropagoasesorc']=$saldoasesorhoy;
			$data['content']='ahorros/cobranzaasesor';
			$solicitudes=$this->ahorro_model->listadecuentasvigentesasesor($this->session->userdata('idusuario'));
			$data['solicitudes']= $solicitudes;
			$data['saldo']=$this->caja_model->saldoasesor($this->session->userdata('idusuario'), 'AHORROS');
		}
		$this->load->view('index',$data);
	}
	function formpagasesor(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['asesores']=$this->usuario_model->listaasesoresxagencia($this->session->userdata('agencia'));
			$data['footer']='principal/footer';		
			$data['content']='ahorros/pagoasesor';
			$data['pagoasesor']=$this->operaciones_model->asesorsaldoagencia($this->session->userdata('agencia'));
			$data['ingresocajaasesor']=$this->caja_model->ingcajaasesoresagencia($this->session->userdata('agencia'));	
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session el Usuario de Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";					
		}
	}
	function realizapago2(){//COBRANZA ASESOR
		$pagos=$this->input->post('pago');
		if(isset($pagos)){
			$totalpagado=$this->input->post('totalapagar');
			$saldoasesor = $this->input->post('saldoasesor2');			
			if($saldoasesor>=$totalpagado){
				$fecha_reg=date('Y-m-d h:i:s');
				$idusuario=$this->session->userdata('idusuario');
				$codcaja = $this->caja_model->codcajasaldoasesor($idusuario);
				$nrocuentas=0;
				$ahora = date('Y-m-d H:i:s');
				foreach($pagos as $row){
					$nro = $this->ahorro_model->maximocod($row['codigo'])+1;
					$idusuario = $this->session->userdata('idusuario');
					if(isset($row['monto']) && $row['monto']!='' && $row['monto']!=0 && $row['monto']<=$row['saldo']){
						echo $fecha_reg.'<br>';
						$data = array(
							'codigo' 		=> $row['codigo'],
							'fecha_hora'	=> $fecha_reg,
							'nro'			=> $nro,
							'monto'			=> $row['monto'],
							'idusuario'		=> $idusuario
							);
						$result = $this->ahorro_model->registrarpago($data);//kardex
						$nrocuotas = $this->registrarcuotaspagados($row['codigo'], $row['monto'], $fecha_reg, $this->session->userdata('idusuario'));
						$datapa=array(
							'idcaja' 	=> $codcaja,
							'codusuario'=> $idusuario,
							'cantidad'	=> $row['monto'],
							'tipo'		=> 'SALIDA',
							'saldo'		=> $saldoasesor-($row['monto']),
							'fecha_hora'=> $ahora,
							'tipo_pagos'=> 'AHORROS'
						);
						$result = $this->caja_model->regpagoasesorc($datapa);
						if($result==true){
							$nrocuentas++;
						}	
						$saldoasesor-=$row['monto'];					
					}
				}
				$data=$this->retornarheader($this->session->userdata('tipouser'));
				$data['nrocuotaspag']=$nrocuentas;
				$data['footer']='principal/footer';	
				$data['content']='ahorros/pagohecho';
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
	function detpagosusuario($idusuario){
		if($this->session->userdata('idusuario')){
			if($this->session->userdata('idusuario')==$idusuario || $this->session->userdata('tipouser')==3 || $this->session->userdata('tipouser')==4){
				$data=$this->retornarheader($this->session->userdata('tipouser'));
				$data['footer']='principal/footer';	
				$data['content']='ahorros/pagosporusuario';
				$data['usuario']=$this->usuario_model->obtenerusuario($idusuario);
				$data['vistakardex']=$this->ahorro_model->vistakardexpagosusuario($idusuario, date('Y-m-d'));
				$this->load->view('index',$data);				
			}else{
				echo "<script type='text/javascript'> alert('USTED NO TIENE ACCESO'); ";
				echo " location.href='".base_url()."index.php'; </script>";					
			}
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}	
	}
	function grdsaldoasesor(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$idasesor = $this->input->post('idasesor');
			$montoasesor = $this->input->post('montoasesor');
			$codigocaja = $this->caja_model->maximocod()+1;
			$saldo = $this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
			$saldoasesor = $this->caja_model->saldoasesor($idasesor, 'AHORROS');
			$datacaja=array(
				'idreg'			=> $codigocaja,
				'fecha_hora'	=> date('Y-m-d H:i:s'),
				'codusuario'	=> $this->session->userdata('idusuario'),
				'agencia'		=> $this->session->userdata('agencia'),
				'cantidad'		=> $montoasesor,
				'tipo'			=> 'INGRESO',
				'saldo'			=> $saldo+$montoasesor,
				'descripcion'	=> 'PAGO DOCO ASESOR ID: '.$idasesor
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
					'tipo_pagos'=> 'AHORROS'
				);
				$this->caja_model->regpagoasesorc($datapa);
				echo "<script type='text/javascript'> alert('Se registro con exito'); ";
				echo " location.href='".base_url()."index.php/ahorros/formpagasesor'; </script>";					
			}else{
				echo "<script type='text/javascript'> alert('NO SE PUDO GUARDAR CONSULTE A SU SOPORTE'); ";
				echo " location.href='".base_url()."index.php'; </script>";				
			}
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session el Usuario de Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";			
		}
	}
	function confirmarpagoasesor($idpagoasesor){
		$data = array('estado' => 'ACEPTADO');
		$result = $this->caja_model->actualizarsaldoasesor($idpagoasesor, $data);
		redirect(base_url().'index.php/ahorros/cobranzaasesor');
	}
	function vercliente($codcliente){
		$cliente = $this->cliente_model->buscarclientecodcliente($codcliente);
		echo $cliente['apenom'];
	}
	function formbusqdevolucion(){
		if($this->session->userdata('tipouser')>=3){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footerahorros';
			$data['lista']=$this->opciones();
			$data['content']='ahorros/busquedalistadevol';
			$data['asesores']=$this->usuario_model->listaasesoresxagencia($this->session->userdata('agencia'));
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}		
	}
	function bscapenomsdadev(){
		$apenom = $this->input->post('apenom');
		$data['solicitudes'] = $this->ahorro_model->listadecuentasapenom($this->session->userdata('agencia'), 'APROBADO', $apenom);		
		$this->load->view('ahorros/listaadevolver', $data);
	}
	function devolverform($codigo){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$agencia=$this->session->userdata('agencia');
			$solicitud=$this->ahorro_model->obtenercuotaahorrovista($codigo);
			$fechaultimacuota=$this->ahorro_model->fechaultimacuota($codigo);
			switch ($solicitud['plazo']) {
				case 6:
					$tasainteres=0.035;
					break;
				case 9:
					$tasainteres=0.06;
					break;
				case 12:
					$tasainteres=0.09;
					break;
				default:
					$tasainteres=0;
					break;
			}		
			$data['fechaultimacuota']=$fechaultimacuota;
			$data['tasainteres']=$tasainteres;
			$data['solicitud']=$solicitud;
			$data['solvigentes']=$this->operaciones_model->listcreditosvigentesoconmora($solicitud['dni']);
			$data['footer']='principal/footerahorros2';	
			$data['content']='ahorros/devolverform';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function devolver(){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$totaldevolver = $this->input->post('totaldevolver');
			$codigo = $this->input->post('codigo');
			$apenomcliente = $this->input->post('apenomcliente');
			$asesor = $this->input->post('asesor');
			$data = array('estado' => 'FINALIZADO');
			$actualizar=$this->ahorro_model->actualizarahorro($data, $codigo);
			if($actualizar==true){
				if($this->session->userdata('tipouser')==3){//operaciones
					$this->cajadevolahorros($codigo, $totaldevolver);
				}else{
					$saldocaja = $this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
					$descripcion = 'PAGO POR DEVOLUCION DOCO ID : '.$codigo.', DEL CLIENTE : '.$apenomcliente.' ASESOR : '.$asesor;
				 	$datacaja=array(
				 			'idreg'			=> $this->caja_model->maximocod()+1,
				 			'fecha_hora' 	=> date('Y-m-d H:i:s'),
				 			'codusuario'	=> $this->session->userdata('idusuario'),
				 			'agencia'		=> $this->session->userdata('agencia'),
				 			'cantidad'		=> $totaldevolver,
				 			'tipo'			=> 'SALIDA',
				 			'saldo'			=> $saldocaja-$totaldevolver,
				 			'descripcion'	=> $descripcion
				 		);
					$regcaja = $this->caja_model->registrarcaja($datacaja);
					if($regcaja == true){
						echo "<script type='text/javascript'> alert('REGISTRADO CON EXITO'); ";
						echo " location.href='".base_url()."index.php'; </script>";	
					}else{
						echo "<script type='text/javascript'> alert('NO SE PUDO REGISTRAR'); ";
						echo " location.href='".base_url()."index.php/caja/cajadesembolsoform/".$iddesembolso."'; </script>";				
					}
				}
			}else{
				echo 'NO SE ACTUALIZO EL ESTADO DE CUENTA AHORROS';
			}
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session el Usuario de Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function cajadevolahorros($codigo, $total){
		if($this->session->userdata('idusuario') && $this->session->userdata('tipouser')>2){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$cuentaahorros=$this->ahorro_model->obtenercuotaahorrovista($codigo);
			$saldocaja = $this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
			$saldobanco=$this->caja_model->saldobancoagencia($this->session->userdata('agencia'));
			$data['total']=$total;
			$data['cliente']=$cuentaahorros['apenom'];
			$data['asesor']=$cuentaahorros['idusuario'];
			$data['saldocaja']=$saldocaja;
			$data['saldobancos']=$saldobanco;
			$data['codigo']=$codigo;
			$data['footer']='principal/footer4';		
			$data['content']='caja/cajadevolucionahorro';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('Debe iniciar session el Usuario de Operaciones'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}		
	}
	function devolahorros(){//registro en caja
		$total=$this->input->post('total');
		$saldocaja = $this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
		$codigo = $this->input->post('codigo');
		$descripcion = $this->input->post('descripcioncaja');
	 	$datacaja=array(
	 			'idreg'			=> $this->caja_model->maximocod()+1,
	 			'fecha_hora' 	=> date('Y-m-d H:i:s'),
	 			'codusuario'	=> $this->session->userdata('idusuario'),
	 			'agencia'		=> $this->session->userdata('agencia'),
	 			'cantidad'		=> $total,
	 			'tipo'			=> 'SALIDA',
	 			'saldo'			=> $saldocaja-$total,
	 			'descripcion'	=> $descripcion
	 		);
		$regcaja = $this->caja_model->registrarcaja($datacaja);
		if($regcaja == true){
			echo "<script type='text/javascript'> alert('REGISTRADO CON EXITO'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}else{
			echo "<script type='text/javascript'> alert('NO SE PUDO REGISTRAR'); ";
			echo " location.href='".base_url()."index.php/caja/cajadesembolsoform/".$iddesembolso."'; </script>";				
		}	
	}
	function formeditcuentaahorros($codigo){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$agencia=$this->session->userdata('agencia');
			$solicitud=$this->ahorro_model->obtenercuotaahorrovista($codigo);
			$data['solicitud']=$solicitud;
			$data['cliente']=$this->cliente_model->obtener_cliente($solicitud['codcliente']);	
			$data['footer']='principal/footerahorros';
			$data['content']='ahorros/formeditcuentaahorros';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}	
	}
	function calcularnrocuotas($fecha, $frecuencia, $plazo){
		$sumdias=0;
		//$fecha=date('Y-m-d', strtotime($fecha));
		$fecha=strtotime($fecha);
		if($frecuencia=='DIARIO'){
			//si la frecuencia es diario
			$numero = cal_days_in_month(CAL_GREGORIAN, date('m', $fecha), date('Y', $fecha));
			$sumdias+=$numero;
			$fecha=date('Y-m-d', $fecha);
			for($i=2;$i<=$plazo;$i++){
				$fecha = strtotime('+1 month', strtotime($fecha));
				$numero = cal_days_in_month(CAL_GREGORIAN, date('m', $fecha), date('Y', $fecha));
				$sumdias+=$numero;
				$fecha=date('Y-m-d', $fecha);
			}
			$nrocuotas = $sumdias;
		}elseif($frecuencia=='SEMANAL'){
			$nrocuotas = $plazo*2;
			echo 'AUN FALTA EL DESARROLLO DEL SEMANAL';
		}elseif($frecuencia=='DPF'){
			$nrocuotas = 1;
		}else{
			$nrocuotas = $plazo;
			echo 'AUN FALTA EL DESARROLLO DEL MENSUAL';
		}
		return $nrocuotas;
	}
	function actualizarsolicitud(){
		$codigo = $this->input->post('nrosolicitud');
		$plazo = $this->input->post('plazo');
		$codcliente = $this->input->post('codcliente');
		$frecuencia = $this->input->post('frecuencia');
		$fecha_registro=$this->input->post('fecha');
		$monto = $this->input->post('montosolic');
		$fecha_inicio=$this->input->post('fechainicio');
		$descripcion = $this->input->post('descripcion');
		$nrocuotas = $this->calcularnrocuotas($fecha_inicio, $frecuencia, $plazo);
		$dondepagara = $this->input->post('lugcobranza');
		$data = array(
			'codigo' 		=> $codigo,
			'plazo'			=> $plazo,
			'tipoplazo'		=> 'Meses',
			'frecuencia'	=> $frecuencia,
			'nrocuotas'		=> $nrocuotas,
			'fecha_registro'=> $fecha_registro,
			'monto'			=> $monto,
			'fechainicio'	=> $fecha_inicio,
			'descripcion'	=> $descripcion,
			'dondepagara'	=> $dondepagara,
			'codcliente'	=> $codcliente
			 );
		$cuentaahorros = $this->ahorro_model->obtenercuotaahorro($codigo);				
		$result = $this->ahorro_model->actualizarahorro($data, $codigo);
		if($result==true){
			if($monto != $cuentaahorros['monto'] || $nrocuotas!=$cuentaahorros['nrocuotas'] || $fecha_inicio!=$cuentaahorros['fechainicio']){
				$this->ahorro_model->eliminarcuotasahorro($codigo);
				$this->generarcalendariopagos($monto,$nrocuotas,$fecha_inicio,$codigo,$frecuencia);	
			}
			echo "<script type='text/javascript'> alert('REGISTRADO CON EXITO'); ";
			echo " location.href='".base_url()."index.php/ahorros/verpagos/".$codigo."'; </script>";
		}else{
			echo 'no se pudo registrar';
		}
	}
}
/* End of file pagos.php */
/* Location: ./application/controllers/pagos.php */