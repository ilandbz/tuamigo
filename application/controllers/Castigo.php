<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
class Castigo extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('operaciones_model');
		$this->load->model('general_model');
		$this->load->model('cliente_model');		
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
			// $data['desembolsos']=$this->operaciones_model->vistasolicitdesembolsadosfecha(date('Y-m-d'));
			$data['footer']='principal/footer';
			$data['content']='castigo/vistacastigo';
			$miarreglo=null;
			$solicitudes = $this->operaciones_model->vistasolicitudescastigo($this->session->userdata('agencia'));
			foreach($solicitudes as $row){
				$row['diasatrasados'] = $this->calculardiasatrasados($row);			
				$row['moraactual'] = $this->calcularmoraactual($row, $row['diasatrasados']);			
				$row['moradias']+=$row['moraactual'];
				$miarreglo[]=$row;
			}
			$data['solicitudes']=is_null($miarreglo) ? $solicitudes : $miarreglo;
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('SOLO OPERACIONES TIENE ACCESO A ESTE MODULO'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}

	function riesgo(){
		$solicitudes = $this->operaciones_model->vistasolicitdesembolsadosdebenm8();
		$miarreglo=null;
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		foreach($solicitudes as $row){
			$row['diasatrasados'] = $this->calculardiasatrasados($row);
			$row['moraactual'] = $this->calcularmoraactual($row, $row['diasatrasados']);			
			if($row['diasatrasados']>=8){
			
				$row['moradias']+=$row['moraactual'];
				$miarreglo[]=$row;				
			}
		}
		$data['solicitudes']=is_null($miarreglo) ? $solicitudes : $miarreglo;

		$data['footer']='principal/footer';	
		$data['content']='castigo/vistacastigo';

		$this->load->view('index',$data);






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
	function formrequerimiento($idsolicitud){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$solicitud=$this->operaciones_model->vistasolicitdesembolsadosidsol2($idsolicitud);	
$data['solicitud']=$solicitud;

		$data['aval']=$this->cliente_model->obteneraval($solicitud['codcliente']);	
		$data['footer']='principal/footer';
		$data['content']='castigo/formsolicitudrequerimiento';
		$this->load->view('index',$data);
	}
}
