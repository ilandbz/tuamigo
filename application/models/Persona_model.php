<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Persona_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function registrar_persona($data){
		$this->db->insert('persona', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	public function obtenerpersona($dni){
		$this->db->where('dni', $dni);
		$resultado = $this->db->get('persona');
		return $resultado->row_array();
	}
	public function obtenerpersonavista($dni){//vista
		$this->db->where('dni', $dni);
		$resultado = $this->db->get('vistapersona');
		return $resultado->row_array();
	}	
	public function existepersona($dni){
		$this->db->where('dni', $dni);
		$resultado = $this->db->get('persona');
		if($resultado->num_rows()){
			return true;
		}else{
			return false;
		}
	}
	public function listapersonas(){
		$resultado = $this->db->get('persona');
		return $resultado->result_array();
	}
	function vistapersonas(){
		$resultado = $this->db->get('vistapersona');
		return $resultado->result_array();	
	}
	function actualizarpersona($dni, $data){
		$this->db->where('dni', $dni); 
		$this->db->update('persona', $data); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}			
	}	

}

/* End of file persona_model.php */
/* Location: ./application/models/persona_model.php */