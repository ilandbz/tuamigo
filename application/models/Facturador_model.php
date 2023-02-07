<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Facturador_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	function obtenernroboleta($serie){
		$this->db->where('serie', $serie);
		$this->db->select_max('nro');
		$result = $this->db->get('comprobante');
		$result = $result->row_array();
		return (is_null($result['nro']) ? 0 : $result['nro']);
	}

	function registrarcomprobante($data){
		$this->db->insert('comprobante', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function actualizarcomprobante($id, $data){
		$this->db->where('id', $id);
		$this->db->update('comprobante', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}	
	function registrardetcomprobante($data){
		$this->db->insert('detcomprobante', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function maxcodigo(){
		$this->db->select_max('id');
		$result = $this->db->get('comprobante');
		$result = $result->row_array();
		return (is_null($result['id']) ? 0 : $result['id']);
	}
	function listacomprobantes($fecha){
		$this->db->like('fechaemision', $fecha);
		$this->db->order_by('id', 'asc');
		$result = $this->db->get('comprobante');
		return $result->result_array();				
	}
	function eliminarcomprobante($id){
		$this->db->where('id', $id);
		$this->db->delete('comprobante');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function obtenercomprobante($id){
		$this->db->where('id', $id);
		$result = $this->db->get('comprobante');
		return $result->row_array();						
	}
	function obtenerdetcomprobante($id){
		$this->db->where('idcomprobante', $id);
		$result = $this->db->get('detcomprobante');
		return $result->result_array();	
	}
}

/* End of file caja_model.php */
/* Location: ./application/models/caja_model.php */