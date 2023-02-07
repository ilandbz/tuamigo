<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
class Atencion extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('atencion_model');
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
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['registros']= $this->atencion_model->listasolicitudesatencion();
		$data['footer']='principal/footer4';
		$data['content']='atencion/ticketatencionform';
		$this->load->view('index',$data);		
	}
	public function registrarsolicitud(){
		$id = $this->input->post('id');
		$fecha = $this->input->post('fecha');	
		$idusuario = $this->input->post('idusuario');
		$modulo = $this->input->post('modulo');
		$tipo = $this->input->post('tipo');	
		$prioridad = $this->input->post('prioridad');
		$descripcion = $this->input->post('descripcion');
		$data = array(
			'id' => $id,
			'idusuario' => $idusuario,
			'fechahora' => date('Y-m-d h:i:s'),
			'modulo'	=> $modulo,
			'descripcion' => $descripcion,
			'estado' => 'SOLICITADO',
			'tipo' => $tipo,
			'prioridad' => $prioridad );
		if($this->atencion_model->registraratencion($data)==true){
			redirect(base_url()."index.php/atencion");
		}else{
			echo "<script type='text/javascript'> alert('NO SE PUDO REGISTRAR'); ";
			echo " location.href='".base_url()."index.php'; </script>";		
		}
	}


}

/* End of file caja.php */
/* Location: ./application/controllers/caja.php */