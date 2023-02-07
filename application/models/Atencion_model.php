<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Atencion_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	function registraratencion($data){
		$this->db->insert('atencion', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function listasolicitudesatencion(){//ultimos solicitados
		$this->db->where('estado', 'SOLICITADO');
		$result = $this->db->get('atencion');
		return $result->result_array();
	}


}

/* End of file caja_model.php */
/* Location: ./application/models/caja_model.php */