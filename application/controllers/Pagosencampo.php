<?php if ( ! defined('BASEPATH')) exit('NO ACCESO DIRECTO AL SCRIPT');
date_default_timezone_set('America/Lima');
class Pagosencampo extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('general_model');
		$this->load->model('operaciones_model');
		$this->load->model('caja_model');	
	}
	public function index(){
		if(!$this->session->userdata('idusuarioon')){		
			$this->load->view('pagosencampo/login');
		}else{
			$data['header']='pagosencampo/header';
			$data['content']='pagosencampo/contenidoprincipal';
			$data['footer']='pagosencampo/footer';
			$data['saldoasesorhoy']=$this->caja_model->ingresosaldoasesorfech($this->session->userdata('idusuarioon'), date('Y-m-d'), 'CREDITO');
			$data['registros']=$this->operaciones_model->listaregistros_pagocampo($this->session->userdata('idusuarioon'));
			$this->load->view('index',$data);
		}
	}
	function autenticar_user(){
		$result = $this->usuario_model->validarloginasesor();
		if($result==TRUE){
			echo "<script type='text/javascript'> location.href='".base_url()."index.php/pagosencampo'; </script>";
		}else{
			echo "<script type='text/javascript'> alert('USUARIO INCORRECTO'); ";
			echo " location.href='".base_url()."index.php/pagosencampo'; </script>";	
		}
	}
	function cargardesembolso($iddesembolso){
		$data['registro']=$this->operaciones_model->vistasolicitdesembolsadosid($iddesembolso);
		$this->load->view('pagosencampo/datosdesembolso',$data);
	}
	function guardarmontoencampo(){
		$iddesembolso=$this->input->post('iddesembolso');
		$monto=$this->input->post('monto');		
		$saldo=$this->input->post('saldo');
		if($saldo>$monto){
			$data = array(
				'iddesembolso' 		=> $iddesembolso,
				'fecha_hora_reg'	=> date('Y-m-d H:i:s'),
				'montopagado'		=> $monto,
				'idusuario'			=> $this->session->userdata('idusuarioon')
				 );
			$result=$this->operaciones_model->registrarpagocampo($data);
			redirect(base_url().'index.php/pagosencampo');
		}else{
			echo 'MONTO SUPERA EL SALDO';
		}
	}
	function cerrarsesion(){
		$this->session->sess_destroy();
		redirect(base_url()."index.php/pagosencampo");
	}
	function eliminarpago($id){
		$result=$this->operaciones_model->eliminarpagocampo($id);
		echo "<script type='text/javascript'> alert('ELIMINADO'); ";
		echo " location.href='".base_url()."index.php/pagosencampo'; </script>";	
	}
	function prueba(){
		$data['header']='principal/header';
		$data['content']='pagosencampo/contenidoprincipal';
		$data['footer']='pagosencampo/footer';
		$this->load->view('index',$data);		
	}
}