<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asesor_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	// LUEGO ELIMINAR LA TABLA ASESOR
	function obtenerasesor($idasesor){
		$this->db->where('idasesor',$idasesor);
		$resultado = $this->db->get('vista_asesor',1);//vista asesor
		return $resultado->row_array();	
	}


	/*function listaasesores(){
		$this->db->where('tipo', 2);
		$resultado = $this->db->get('vistausuario');
		return $resultado->result_array();
	}*/
	function existeasesor($idasesor){
		$this->db->where('codusuario', $idasesor);
		$this->db->where('tipo', 2);
		$result = $this->db->get('usuario');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	

}

/* End of file asesor_model.php */
/* Location: ./application/models/asesor_model.php */