<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Negocio_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	function registrar_negocio($data){
		$this->db->insert('negocio', $data);
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function obtener_negocio($codcliente){
		$this->db->where('codcliente', $codcliente);
		$result=$this->db->get('vistanegocio',1);
		return $result->row_array();
	}
	function actualizarnegocio($data, $idnegocio){
		$this->db->where('idnegocio', $idnegocio);
		$this->db->update('negocio', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function negocio($idnegocio){
		$this->db->where('idnegocio',$idnegocio);
		$resultado = $this->db->get('vistanegocio',1);
		return $resultado->row_array();
	}
	function eliminarnegocio($idnegocio){
		$this->db->where('idnegocio',$idnegocio);
		$this->db->delete('negocio');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
}

/* End of file negocio_model.php */
/* Location: ./application/models/negocio_model.php */