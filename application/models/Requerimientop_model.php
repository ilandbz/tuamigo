<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Requerimientop_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	function registrarrequerimientos($datos){
		$this->db->insert('requerimientopago', $datos);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function listarequerimientos(){
		$this->db->where('estado', 'ACTIVO');
		$result = $this->db->get('requerimientopago');
		return $result->result_array();
	}





}

/* End of file caja_model.php */
/* Location: ./application/models/caja_model.php */