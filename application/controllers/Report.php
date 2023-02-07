<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
class Report extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('persona_model');
		$this->load->model('asesor_model');
		$this->load->model('cliente_model');
		$this->load->model('solicitud_prestamo');
		$this->load->model('operaciones_model');
		$this->load->model('usuario_model');
		$this->load->model('caja_model');
		$this->load->model('general_model');
		$this->load->model('ahorro_model');		
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
			case 7:
				$data['header']='principal/headergestorcobranza';
				break;			
		}
		return $data;
	}
	function index(){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['tipo']='CREDITO';
			$data['footer']='principal/footer5';	
			$data['content']='reportes/formbscposcli';
			$data['lista']=$this->opciones('CREDITO');
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function posicionahorro(){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['tipo']='AHORROS';
			$data['footer']='principal/footer5';	
			$data['content']='reportes/formbscposcli';
			$data['lista']=$this->opciones('AHORROS');
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function opciones($tipo) {
		$texto='';
		$lista=$this->cliente_model->lista_clientestipo($tipo);
		foreach($lista as $row){
			$texto .= '"' . $row['apenom'] . '",';
		}
		return $texto;
	}
	function verposicionc(){
		$apenomclie = $this->input->post('apenomclie');
		$dniclie = $this->input->post('dniclie');
		$codclie = $this->input->post('codclie');
		$tipo = $this->input->post('tipo');
		if($apenomclie=='' && $dniclie=='' && $codclie==''){
			echo "<script type='text/javascript'> alert('NO INGRESO NADA'); ";
			echo " location.href='".base_url()."index.php/report'; </script>";			
		}else{
			if($apenomclie == ''){
				$cliente=$this->cliente_model->buscarclientecodordni($dniclie, $codclie);			
			}else{
				$cliente=$this->cliente_model->buscarclienteapenom($apenomclie, $tipo);
			}
			redirect(base_url().'index.php/report/verposisicion/'.$cliente['codcliente'].'/'.$tipo);
		}
	}
	function verposisicion($codcliente, $tipo){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$cliente=$this->cliente_model->obtener_cliente($codcliente);
			$data['cliente']=$cliente;	
			if(count($cliente)==0){
				echo "<script type='text/javascript'> alert('NO EXISTEN REGISTROS DEL CLIENTE'); ";
				echo " location.href='".base_url()."index.php/report'; </script>";					
			}else{
				if($tipo=='CREDITO'){
					$data['solicitudes']=$this->solicitud_prestamo->lista_solicitudesxcliente($cliente['codcliente']);
					$data['content']='reportes/posicioncliente';
				}else{
					$data['solicitudes']=$this->ahorro_model->listacuentasporcliente($cliente['codcliente']);	
					$data['content']='reportes/posicionclienteahorros';			
				}
				$data['footer']='principal/footer';			
				$this->load->view('index',$data);					
			}
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function formreportefinan(){
		if($this->session->userdata('tipouser')==1){//admin
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';
			$data['content']='reportes/formreportefinan';
			$data['asesores']=$this->usuario_model->listaasesores();
			$this->load->view('index',$data);
		}elseif($this->session->userdata('tipouser')==5){//gerente agencia
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';
			$data['content']='reportes/formreportefinanagencia';
			$data['asesores']=$this->usuario_model->listaasesoresxagencia($this->session->userdata('agencia'));
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO TIENE ACCESO'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function formreportegeneral(){
		if($this->validarusuario($this->session->userdata('tipouser'),1, 5)==true){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			if($this->session->userdata('tipouser')==1){
				$data['content']='reportes/formreportegral';
				$data['asesores']=$this->usuario_model->listaasesores();
			}else{
				$data['content']='reportes/formreportegralagencia';
				$data['asesores']=$this->usuario_model->listaasesoresxagencia($this->session->userdata('agencia'));
			}
			$data['footer']='principal/footer';
			$this->load->view('index',$data);			
		}
	}
//REPORTE GENERAL
	function cargarselectasesorxagencia(){
		$agencia = $this->input->post('agencia');
		$asesores = $this->usuario_model->listaasesoresxagencia($agencia);
		echo '<option value="TODOS">TODOS</option>';
		foreach($asesores as $row): 
			echo '<option value="'.$row['codusuario'].'">'.$row['codusuario'].'</option>';
		endforeach;
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
	function cargarreportegeneral(){
		if($this->validarusuario($this->session->userdata('tipouser'),1, 5)==true){
			$estadosolic = $this->input->post('estadosolic');
			$fechainicial = $this->input->post('fechainicial');
			$fechafinal = $this->input->post('fechafinal');
			$asesor = $this->input->post('asesor');
			if($this->session->userdata('tipouser')==1){
				$agencia= $this->input->post('agencia');
			}else{//5 gerente de agencia
				$agencia= $this->session->userdata('agencia');
			}
			$vistareporte= $this->operaciones_model->listareportegeneralagencia($fechainicial, $fechafinal, $estadosolic, $asesor, $agencia);			
			$miarreglo = null;
			foreach($vistareporte as $row){
				$row['diasatrasados'] = $this->calculardiasatrasados($row);
				$row['capitalpagado'] = $row['capitalporcuota']*$row['cantcuotasrealpagados'];
				$row['interespagado'] = $row['interesporcuota']*$row['cantcuotasrealpagados'];
				$row['saldocapital']=$row['capital']-$row['capitalpagado'];
				$row['saldointeres']=$row['interes']-$row['interespagado'];
				$row['mora']+=$this->calcularmoraactual($row, $row['diasatrasados']);
				$miarreglo[]=$row;
			}
			$data['vistareporte'] = $miarreglo;
			$this->load->view('reportes/reportegraltablas', $data);
		}
	}
//FIN REPORTEGENERAL
	function cargarreportefinanciero(){
// $data['vistareporte'] = $this->operaciones_model->reportefinancieroentrefechas('2020-07-01', '2020-07-31', 'TODOS', 'TODOS', 'TINGO MARIA');
		if($this->session->userdata('idusuario')){
			$estado = $this->input->post('estado');
			$asesor = $this->input->post('asesor');
			$fechainipagos = $this->input->post('fechainipagos');
			$fechafinpagos = $this->input->post('fechafinpagos');
			$agencia = $this->input->post('agencia');
			$data['vistareporte'] = $this->operaciones_model->reportefinancieroentrefechas($fechainipagos, $fechafinpagos, $estado, $asesor, $agencia);
			$this->load->view('reportes/reportefinancierotablas', $data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";
		}
	}
	function cargarreportefinancierocastigo(){
		if($this->session->userdata('idusuario')){
			$estado = $this->input->post('estado');
			$asesor = $this->input->post('asesor');
			$fechainipagos = $this->input->post('fechainipagos');
			$fechafinpagos = $this->input->post('fechafinpagos');
			$agencia = $this->input->post('agencia');
			$data['vistareporte'] = $this->operaciones_model->reportefinancieroentrefechascast($fechainipagos, $fechafinpagos, $estado, $asesor, $agencia);
			$this->load->view('reportes/reportefinancierotablas', $data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";
		}
	}

	function formreportinfocorp(){
		if($this->session->userdata('tipouser')==1 || $this->session->userdata('tipouser')==5){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';
			$data['content']='reportes/formreporteinfocorp';
			$data['asesores']=$this->usuario_model->listaasesores();
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO TIENE ACCESO'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}	
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
//FALTA ARRELAGO NO PUEDE SER MAS 1 PORQUE PODRIA CONSIDERAR DOMINGOS TAMBIEN Y EL DOMINGO NO SE CONTARIA COMO UN DIA ATRASADO MIENTRAS NO SE HAYA VENCIDO
				$fdiadespuescronograma = date ( 'Y-m-j' , $fdiadespuescronograma );	
				$moravencido=$this->calcularmorasinferiados($fdiadespuescronograma, date('Y-m-d'));//dias atraso despues del credito
				$diasatrasados =$this->calcularmora($fechadondesequedo, $fdiadespuescronograma);
				$diasatrasados+=$moravencido;
			}else{
				$diasatrasados=$this->calcularmora($fechadondesequedo, date('Y-m-d'));
			}
		}else{
			$diasatrasados=$this->calcularmorasinferiados($fechadondesequedo, date('Y-m-d'));
		}
		return $diasatrasados;
	}
	function calcularmoraactual($desembolso, $diasatrasados){
		if($desembolso['estado']=='FINALIZADO'){
			return 0;
		}
		if($desembolso['unidplazo']=='Semanas'){
			return $diasatrasados;
		}
		if(is_null($desembolso['ultimafechapago'])){//no inicio ningun pago, no pago ninguna cuota
			$mora = $this->calcularmora($desembolso['fechacuotadebe'], date('Y-m-d'));


		}else{
			if(!is_null($desembolso['fechapagadocompleto'])){
				$mora = $this->calcularmora($desembolso['fechapagadocompleto'], date('Y-m-d'))-1;
				$mora = $mora<0 ? 0 : $mora;
			}else{
				return $diasatrasados;				
			}

			
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
	function cargarreporinfocorp(){
		$fechainicial=$this->input->post('fechainicial');
		$fechafinal=$this->input->post('fechafinal');
		$estadosolic = $this->input->post('estadosolic');
		$asesor = $this->input->post('asesor');
		$agencia = $this->input->post('agencia');
		$vistareporte= $this->operaciones_model->listareportegeneralagencia($fechainicial, $fechafinal, $estadosolic, $asesor, $agencia);
		$miarreglo=null;
		foreach($vistareporte as $row){
			$row['diasatrasados']=$this->calculardiasatrasados($row);
			$row['capitalpagado'] = $row['capitalporcuota']*$row['cantcuotasrealpagados'];
			$row['interespagado'] = $row['interesporcuota']*$row['cantcuotasrealpagados'];
			$row['saldocapital']=$row['capital']-$row['capitalpagado'];
			$row['saldointeres']=$row['interes']-$row['interespagado'];
			$row['mora']+=$this->calcularmoraactual($row, $row['diasatrasados']);
			$miarreglo[]=$row;
		}
		$data['vistareporte']=is_null($miarreglo) ? $vistareporte : $miarreglo;
		$this->load->view('reportes/reportegralinfocorp', $data);
	}
	function formreportecliente(){
		if($this->session->userdata('tipouser')==1 || $this->session->userdata('tipouser')==5){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';
			$data['content']='reportes/formreporteclientes';
			$data['asesores']=$this->usuario_model->listaasesores();
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO TIENE ACCESO'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function cargarrepclientes(){
		$fechainireg=$this->input->post('fechainireg');
		$fechafinreg=$this->input->post('fechafinreg');
		$estado = $this->input->post('estado');
		$asesor = $this->input->post('asesor');
		$data['registros']= $this->cliente_model->reporteclientes($fechainireg, $fechafinreg, $estado, $asesor);
		$this->load->view('reportes/tablarepclientes', $data);		
	}
	function detpagosusuario($idusuario){
		if(substr($idusuario, 0, 4)=='JACU'){
			$idusuario='JACUÑA07';
		}
		if($this->session->userdata('idusuario')){
			if($this->session->userdata('idusuario')==$idusuario || $this->session->userdata('tipouser')==3 || $this->session->userdata('tipouser')==4){
				$data=$this->retornarheader($this->session->userdata('tipouser'));
				$data['footer']='principal/footer';	
				$data['content']='reportes/pagosporusuario';
				$data['usuario']=$this->usuario_model->obtenerusuario($idusuario);
				$data['vistakardex']=$this->operaciones_model->vistakardexpagosusuario($idusuario);//hoy
				$data['kardexahorro']=$this->ahorro_model->vistakardexpagosusuario($idusuario, date('Y-m-d'));
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
	function detpagosusuariofech($idusuario){
		$fecha = $this->input->post('fecha');
		$data['vistakardex']=$this->operaciones_model->vistakardexpagosusuariofech($idusuario, $fecha);

		$data['kardexahorro']=$this->ahorro_model->vistakardexpagosusuario($idusuario, $fecha);

		$this->load->view('reportes/kardexuserf',$data);
	}
	function cargreportefinandeasesorporfechap($idasesor){//cargar reporte financiero de asesores por fechas de pago
		$fechainicial=$this->input->post('fechainicial');
		$fechafinal=$this->input->post('fechafinal');
		$data['vistareporte']= $this->operaciones_model->reportefinancieroentrefechas($fechainicial, $fechafinal);//APROBADOS
		$data['fechainicial']=$fechainicial;
		$data['fechafinal']=$fechafinal;
		$this->load->view('reportes/reportegraltablas', $data);
	}
	function imprimirpagosporasesorpdf(){
		if($this->session->userdata('idusuario')){
			$fecha = $this->input->post('fecha');
			$idusuario = $this->input->post('idusuario');
			$data['fecha']=$fecha;
			$data['vistakardex']=$this->operaciones_model->vistakardexpagosusuariofech($idusuario, $fecha);
			$this->load->view('reportes/pagosporusuariopdf',$data);
			// $html = $this->load->view('reportes/pagosporusuariopdf',$data, true);
			// $this->pdf->load_html($html);
			// $this->pdf->set_paper('A4','landscape');
			// $this->pdf->render();
			// $this->pdf->stream("reppagos.pdf", array("Attachment" => false));
		}else{
			echo "<script type='text/javascript'> alert('Usted no accedio al sistema'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function formreportescaja(){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['usuarios']=$this->usuario_model->listaoperacionescobranza();
			$data['footer']='principal/footer';	
			$data['content']='reportes/reportecajaform';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function cargarrepcajafdesc(){
		$fechaini = $this->input->post('fechaini');
		$fechafin = $this->input->post('fechafin');
		$descripcion = $this->input->post('descripcion');
		$idusuario = $this->session->userdata('idusuario');
		$data['registros'] = $this->caja_model->detcajadescripcionyfecha($fechaini, $fechafin, $descripcion, $idusuario);
		$this->load->view('caja/cajadettabla2',$data);
	}
	function cargarrepcajafdesc2(){
		$fechaini = $this->input->post('fechaini');
		$fechafin = $this->input->post('fechafin');
		$tipo=$this->input->post('tipo');
		$idusuario=$this->input->post('usuario');
		$tipocajaespec=$this->input->post('tipocajaespec');	
		if($this->session->userdata('tipouser')==3){
			$agencia=$this->input->post('agencia');				
		}else{
			$agencia=$this->session->userdata('agencia');	
		}
		switch ($tipocajaespec) {
			case 'TODOS':
				$data['registros'] = $this->caja_model->detcajaentrefechytipo($fechaini, $fechafin, $tipo, $idusuario, $agencia);
				break;
			case 'pc':
				$data['registros'] = $this->caja_model->detcajadescripcionfechat($fechaini, $fechafin, 'pago ', $tipo, $idusuario, $agencia);
				break;
			case 'mora':
				$data['registros'] = $this->caja_model->detcajadescripcionfechat($fechaini, $fechafin, 'mora ', $tipo, $idusuario, $agencia);
				break;
			case 'transf':
				$data['registros'] = $this->caja_model->detcajadescripcionfechat($fechaini, $fechafin, 'TRANSFERENCIA ', $tipo, $idusuario, $agencia);
				break;
			case 'des':
				$data['registros'] = $this->caja_model->detcajadescripcionfechat($fechaini, $fechafin, 'DESEMBOLSO', $tipo, $idusuario, $agencia);
				break;
			case 'gasto'://SOLO EGRESO POR
				$data['registros'] = $this->caja_model->detcajadescripcionfechatgasto($fechaini, $fechafin, $idusuario, $agencia);
				break;
			case 'doco': //ahorros
				$data['registros'] = $this->caja_model->detcajadescripcionfechat($fechaini, $fechafin, ' doco', $tipo, $idusuario, $agencia);
				break;
			default :
				$data['registros'] = $this->caja_model->detcajaentrefechytipo($fechaini, $fechafin, $tipo, $idusuario, $agencia);
				break;
		}
		$this->load->view('caja/cajadettabla2',$data);
	}
	function formreportepagos(){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['usuarios']=$this->usuario_model->listausuarios();
			$data['footer']='principal/footer';	
			$data['content']='reportes/reportepagos';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function cargarreppagos(){
		if($this->session->userdata('idusuario')){
			$fechaini = $this->input->post('fechaini');
			$fechafin = $this->input->post('fechafin');
			$tipo = $this->input->post('tipo');
			$usuario = $this->input->post('usuario');
			$data['registros']= $this->operaciones_model->vistakardexentrefechastu($fechaini, $fechafin, $tipo, $usuario);
			$this->load->view('reportes/pagosregtabla', $data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function cargarporapenomrp(){
		if($this->session->userdata('idusuario')){
			$fechaini = $this->input->post('fechaini');
			$fechafin = $this->input->post('fechafin');
			$apenom = $this->input->post('apenom');
			$data['registros']= $this->operaciones_model->vistakardexfapenom($fechaini, $fechafin, $apenom);
			$this->load->view('reportes/pagosregtabla', $data);	
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";			
		}
	}
	function metagerencial(){//inicio
		if($this->session->userdata('tipouser')==1 || $this->session->userdata('tipouser')==5){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';	
			$data['content']='reportes/metagerencial';
			$data['cartera']=$this->operaciones_model->reportecartera('TODOS', 'APROBADO');
			$data['clientes']=$this->operaciones_model->reporteclientes2('TODOS', 'APROBADO');
			$reportesmorareg = $this->operaciones_model->reportmora('TODOS', 'APROBADO');
			$reportesmora = array(
				'reportmora1a8' 	=> 0, 
				'reportmora9a15'	=> 0,
				'reportmora16a30'	=> 0,
				'reportmora31a45'	=> 0,
				'reportmora46amas'	=> 0
				);
			foreach($reportesmorareg as $row){
				$row['mora']=$row['moradias']-$row['pagomora'];
				$diasatrasados=$this->calculardiasatrasados($row);
				$row['mora']+=$diasatrasados;
				if($row['mora']>0 && $row['mora']<=8){
					$reportesmora['reportmora1a8'] += $row['mora']*$row['costomora'];
				}elseif($row['mora']>=9 && $row['mora']<=15){
					$reportesmora['reportmora9a15'] += $row['mora']*$row['costomora'];
				}elseif($row['mora']>=16 && $row['mora']<=30){
					$reportesmora['reportmora16a30'] += $row['mora']*$row['costomora'];
				}elseif($row['mora']>=31 && $row['mora']<=45) {
					$reportesmora['reportmora31a45'] += $row['mora']*$row['costomora'];
				}else{
					$reportesmora['reportmora46amas'] += $row['mora']*$row['costomora'];
				}
			}
			$data['reportesmora'] = $reportesmora;
			$data['asesores']=$this->usuario_model->listaasesores();
			$data['fecha']=date('d-m-Y');
			$this->load->view('index', $data);	
		}else{
			echo "<script type='text/javascript'> alert('USTED NO TIENE ACCESO'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}		
	}
	function cargarmetasrep(){
		$idasesor = $this->input->post('asesor');
		$estado = $this->input->post('estado');
		$data['cartera']=$this->operaciones_model->reportecartera($idasesor, $estado);
		$data['clientes']=$this->operaciones_model->reporteclientes2($idasesor, $estado);
		$data['reportesmora']=$this->operaciones_model->sumreportmetasmora($idasesor, $estado);
		$data['fecha']=date('d-m-Y');
		$this->load->view('reportes/tablarepmetas', $data);
	}
	function desembolsos(){
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['asesores']=$this->usuario_model->listaasesores();
			$data['footer']='principal/footer';	
			$data['content']='reportes/formreportedesembolso';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}	
	}
	function cargardesemb(){
		if($this->session->userdata('idusuario')){
			$fechaini = $this->input->post('fechaini');
			$fechafin = $this->input->post('fechafin');
			$asesor = $this->input->post('asesor');
			$agencia = $this->input->post('agencia');			
			$data['registros']= $this->operaciones_model->vistasolicitdesembolsadosefasesor($fechaini, $fechafin, $asesor, $agencia);
			$this->load->view('reportes/tabladesembolsos', $data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function metaporpagos(){
		if($this->session->userdata('tipouser')==1 || $this->session->userdata('tipouser')==5){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';	
			$data['content']='reportes/metaporpagos';
			$data['cartera']=$this->operaciones_model->reportecartera('TODOS', 'APROBADO');
			$data['asesores']=$this->usuario_model->listaasesores();
			$data['fechainicio']='2018-01-01';
			$data['fecha']=date('d-m-Y');
			$this->load->view('index', $data);	
		}else{
			echo "<script type='text/javascript'> alert('USTED NO TIENE ACCESO'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}			
	}
	function cargarmetapp(){
		$metafechai=$this->input->post('metafechai');
		$metafechaf=$this->input->post('metafechaf');
		$estado=$this->input->post('estado');
		$asesor=$this->input->post('asesor');
		$data['cartera']=$this->operaciones_model->reportecarterafechapago($metafechai, $metafechaf, $estado, $asesor);
		$data['clientes']=$this->operaciones_model->reporteclientes3($metafechai, $metafechaf, $estado, $asesor);
		$data['reportmora1a8']=$this->operaciones_model->reportmora1a8_fp($metafechai, $metafechaf, $estado, $asesor);
		$data['reportmora9a15']=$this->operaciones_model->reportmora9a15_fp($metafechai, $metafechaf, $estado, $asesor);
		$data['reportmora16a30']=$this->operaciones_model->reportmora16a30_fp($metafechai, $metafechaf, $estado, $asesor);
		$data['reportmora31a45']=$this->operaciones_model->reportmora31a45_fp($metafechai, $metafechaf, $estado, $asesor);
		$data['reportmora46amas']=$this->operaciones_model->reportmora46amas_fp($metafechai, $metafechaf, $estado, $asesor);
		$data['fecha']=substr($metafechaf, 8, 2).'-'.substr($metafechaf, 5, 2).'-'.substr($metafechaf, 0, 4);
		$this->load->view('reportes/tablarepmetas', $data);
	}
	function realizarbackuptotal(){
		$db_host = 'localhost'; //Host del Servidor MySQL
		$db_name = 'tuamigo_db'; //Nombre de la Base de datos
		$db_user = 'root'; //Usuario de MySQL
		$db_pass = 'financieraemprender2019'; //Password de Usuario MySQL
		$fecha = date("Ymd-His"); //Obtenemos la fecha y hora para identificar el respaldo
		// Construimos el nombre de archivo SQL Ejemplo: mibase_20170101-081120.sql
		$salida_sql = 'backups/'.$db_name.'_'.$fecha.'.sql'; 
		//Comando para genera respaldo de MySQL, enviamos las variales de conexion y el destino
		$dump = "C:\wamp64\bin\mysql\mysql5.7.14\bin\mysqldump -h $db_host -u $db_user -p$db_pass --opt $db_name > $salida_sql";
		system($dump, $output); //Ejecutamos el comando para respaldo
		echo "<script type='text/javascript'> alert('GUARDADO'); ";
		echo " location.href='".base_url()."index.php'; </script>";	
	}
	function centrocostos(){
		if($this->session->userdata('idusuario') and $this->session->userdata('tipouser')==1){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			//$data['asesores']=$this->usuario_model->listaasesores();
			$data['footer']='principal/footer';	
			$data['ahorropagadototal']=$this->ahorro_model->totalpagado('');
			$data['ahorropagadovigente']=$this->ahorro_model->totalpagado('APROBADO');
			$data['ahorropagadofinalizado']=$this->ahorro_model->totalpagado('FINALIZADO');
			$data['saldocredito']=$this->operaciones_model->saldototalvigentes($this->session->userdata('agencia'), 'PROPIO');
			$data['saldocreditof2']=$this->operaciones_model->saldototalvigentes($this->session->userdata('agencia'), 'RECAUDADO');			
			$data['content']='reportes/centrocostos';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function doco(){
		if($this->session->userdata('tipouser')==1 || $this->session->userdata('tipouser')==3){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footerahorros2';
			$data['content']='reportes/formreportahorros';
			$data['asesores']=$this->usuario_model->listaasesoresxagencia($this->session->userdata('agencia'));//solo hay doco huanuco

			
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO TIENE ACCESO'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function cargarlistdocojs(){
		$fechaini=$this->input->post('fechaini');
		$fechafin=$this->input->post('fechafin');
		$estado=$this->input->post('estadosolic');
		$asesor=$this->input->post('asesor');
		$agenciabsc=$this->input->post('agenciabsc');
		$data['registros'] = $this->ahorro_model->listacuentasfiltros($fechaini, $fechafin, $estado, $asesor, $agenciabsc);
		$this->load->view('reportes/tablaahorros', $data);
	}
	function formrepcastigogeneral(){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		if($this->session->userdata('tipouser')==1){
			$data['content']='reportes/castigo/formreportgral';
			$data['asesores']=$this->usuario_model->listaasesores();
		}else{
			echo 'FALTA';
			// $data['content']='reportes/formreportegralagencia';
			// $data['asesores']=$this->usuario_model->listaasesoresxagencia($this->session->userdata('agencia'));
		}
		$data['footer']='principal/footer';
		$this->load->view('index',$data);
	}
	function formrepcastigofinanciero(){
		if($this->session->userdata('tipouser')==1){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['footer']='principal/footer';
			$data['content']='reportes/castigo/formreportefinan';
			$data['asesores']=$this->usuario_model->listaasesores();
			$this->load->view('index',$data);
		}elseif($this->session->userdata('tipouser')==5){
			// $data=$this->retornarheader($this->session->userdata('tipouser'));
			// $data['footer']='principal/footer';
			// $data['content']='reportes/formreportefinanagencia';
			// $data['asesores']=$this->usuario_model->listaasesoresxagencia($this->session->userdata('agencia'));
			// $this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO TIENE ACCESO'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}	
}
