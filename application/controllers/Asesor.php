<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
class Asesor extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('asesor_model');
		$this->load->model('operaciones_model');
		$this->load->model('usuario_model');
		$this->load->model('persona_model');
		$this->load->model('general_model');				
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
	public function index(){
		if($this->session->userdata('idusuario')){
			$data['content']='asesor/inicio';
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('USTED NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";	
		}
	}
	function existeasesor(){
		$idasesor=$this->input->post('idasesor');
		if($this->asesor_model->existeasesor($idasesor)==true){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	function logroasesor($codasesor){
 		if(substr($codasesor, 0, 4)=='JACU'){
 			$codasesor='JACUÑA07';
  		}
		if($this->session->userdata('idusuario')){
			$usuario=$this->usuario_model->obtenerusuario($codasesor);
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$data['asesor']=$this->persona_model->obtenerpersonavista($usuario['dni']);
			$logrosmesanterior=$this->operaciones_model->metaasesor('LOGRO', $codasesor);
			if(is_null($logrosmesanterior)){
				$logrosmesanterior['fecharegistro']=date('Y-m-d');
				$logrosmesanterior['cartera']=0;
				$logrosmesanterior['clientes']=0;
				$logrosmesanterior['clientenuevos']=0;
				$logrosmesanterior['desembolsados']=0;
				$logrosmesanterior['saldomora']=0;
			}
			$data['logrosmesanterior']=$logrosmesanterior;
			$data['meta']=$this->operaciones_model->metaasesor('META', $codasesor);

			$solicitudes=$this->operaciones_model->logroporasesor($codasesor);


			$registro['saldocapital']=0;
			$registro['solicitudes']=0;
			$registro['mora']=0;
			$registro['saldoxmora']=0;


			
			foreach($solicitudes as $row){
				$registro['saldocapital']+=$row['saldocapital'];
				$registro['solicitudes']+=1;
				$row['diasatrasados'] = $this->calculardiasatrasados($row);	
				if($row['diasatrasados']>=8){
					$registro['mora']+=1;
					//$registro['saldoxmora']+=$row['saldo'];
					$registro['saldoxmora']+=$row['saldocapital'];
				}
			}
			$data['registro']=$registro;
			$data['desembolsados']=$this->operaciones_model->desembolsosporasesoref($codasesor);		
			$data['content']='asesor/metaasesor';	
			$data['footer']='principal/footer';	
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
	}
	function logroasesorgral(){//todos los asesores
		if($this->session->userdata('idusuario')){
			$data=$this->retornarheader($this->session->userdata('tipouser'));
			$asesores = $this->usuario_model->listaasesoresxagencia($this->session->userdata('agencia'));
			$lista=null;		
			$i=1;	

			foreach ($asesores as $asesor) {
				$registros=null;
				$solicitudes=$this->operaciones_model->logroporasesor($asesor['codusuario']);
				$registro['saldocapital']=0;
				$registro['solicitudes']=0;
				$registro['mora']=0;
				$registro['saldoxmora']=0;
				$registro['idasesor']=$asesor['codusuario'];
				foreach($solicitudes as $row){
					$registro['saldocapital']+=$row['saldocapital'];
					$registro['solicitudes']+=1;
					$row['diasatrasados'] = $this->calculardiasatrasados($row);	
					if($row['diasatrasados']>=8){
						$registro['mora']+=1;
						$registro['saldoxmora']+=$row['saldocapital'];
						//$registro['saldoxmora']+=$row['saldo'];
					}			
				}
				$desembolsados=$this->operaciones_model->desembolsosporasesoref($asesor['codusuario']);
				$registro['montod']=$desembolsados['monto'];
				$registro['nuevos']=$desembolsados['nuevos'];					
				$lista[]=$registro;
			}
			$data['asesores']=$asesores;
			$data['registros']=$lista;
			$data['content']='reportes/metas';	
			$data['footer']='principal/footer';	
			$this->load->view('index',$data);
		}else{
			echo "<script type='text/javascript'> alert('NO INICIO SESSION'); ";
			echo " location.href='".base_url()."index.php'; </script>";				
		}
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
	function registrarmeta(){
		$asesor=$this->input->post('asesor');
		$cartera=$this->input->post('cartera');
		$clientes=$this->input->post('clientes');
		$desembolso=$this->input->post('desembolso');		
		$saldoxmora=$this->input->post('saldoxmora');
		$clientesnuevos=$this->input->post('clientesnuevos');
		//$fecha=$this->input->post('fecha');
		$data = array(
			'codasesor' => $asesor,
			'cartera'	=> $cartera,
			'clientes'	=> $clientes,
			'desembolsados'	=> $desembolso,
			'saldomora'		=> $saldoxmora,
			'clientenuevos'=> $clientesnuevos,
			'tipo'			=> 'META',
			'fecharegistro'=> date('Y-m-d')
			);
		$result = $this->operaciones_model->registrarmeta($data);
		if($result==true){
			echo "<script type='text/javascript'> alert('REGISTRADO'); ";
			echo " location.href='".base_url()."index.php/asesor/logroasesorgral'; </script>";	
		}else{
			echo 'NO SE PUDO REGISTRAR';
		}
	}
	function guardarlogros(){
		$logros=$this->input->post('logros');
		$fecha=$this->input->post('fecha');
		foreach ($logros as $row) {
			$row['fecharegistro']=$fecha;
			$this->operaciones_model->registrarmeta($row);
		}
		echo "<script type='text/javascript'> alert('REGISTRADO'); ";
		echo " location.href='".base_url()."index.php/asesor/logroasesorgral'; </script>";			
	}





}
/* End of file asesor.php */
/* Location: ./application/controllers/asesor.php */