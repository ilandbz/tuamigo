<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class General_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	public function lista_departamentos(){
		$query=$this->db->get('departamento');
		return $query->result_array();
	}
	public function lista_provdep($iddepartamento){
		$this->db->where('iddepartamento',$iddepartamento);
		$this->db->order_by('nombre', 'asc');
		$query=$this->db->get('provincia');
		return $query->result_array();
	}
	public function lista_distprov($idprovincia){
		$this->db->where('idprovincia',$idprovincia);
		$this->db->order_by('nombre', 'asc');
		$query=$this->db->get('distrito');
		return $query->result_array();
	}
	public function obtenerdistrito($iddistrito){//vista vist_distprovdep
		$this->db->where('iddistrito',$iddistrito);
		$query=$this->db->get('vist_distprovdep', 1);
		return $query->row_array();		
	}
	public function listaactivoscorrientes(){
		$this->db->where('tipo', 'CORRIENTE');
		$query=$this->db->get('activo');
		return $query->result_array();
	}
	public function listaactivosnocorrientes(){
		$this->db->where('tipo', 'NO CORRIENTE');
		$query=$this->db->get('activo');
		return $query->result_array();
	}
	public function listapasivocorrientes(){
		$this->db->where('tipo', 'CORRIENTE');
		$query=$this->db->get('pasivo');
		return $query->result_array();
	}
	public function listapasivonocorrientes(){
		$this->db->where('tipo', 'NO CORRIENTE');
		$query=$this->db->get('pasivo');
		return $query->result_array();
	}
	public function listaferiados(){
		$result = $this->db->get('feriados');
		return $result->result_array();
	}
	public function listaferiadosanho(){
		$this->db->where("descripcion <> 'DOMINGO'");
		$this->db->order_by('fecha', 'desc');
		$this->db->limit(30);
		$result = $this->db->get('feriados');
		return $result->result_array();
	}	
	public function registrarferiado($data){
		$this->db->insert('feriados', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	public function eliminarferiados($id){
		$this->db->where('id', $id);
		$result=$this->db->delete('feriados');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	public function existediaferiado($fecha){
		$this->db->where('fecha', $fecha);
		$result = $this->db->get('feriados');
		if($result->num_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function obtenergastosnegocio($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result=$this->db->get('gastosnegocio');
		return $result->row_array();		
	}
	function actualizargastosnegocio($idsolicitud, $data){
		$this->db->where('idsolicitud', $idsolicitud); 
		$this->db->update('gastosnegocio', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}		
	}
	function gastosfamiliares($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result=$this->db->get('gastosfamiliares');
		return $result->row_array();		
	}
	function registrargastosnegocio($data){
		$this->db->insert('gastosnegocio', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function actualizargastosfamiliares($idsolicitud, $data){
		$this->db->where('idsolicitud', $idsolicitud); 
		$this->db->update('gastosfamiliares', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}		
	}
	function registrargastosfamiliares($data){
		$this->db->insert('gastosfamiliares', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function obtenerip($agencia){
		$this->db->where('agencia', $agencia);
		$this->db->order_by('id', 'desc');
		$result = $this->db->get('ipspublicas');
		$result = $result->row_array();
		return $result['ip'];
	}
	function registrarips($data){
		$this->db->insert('ipspublicas', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
}

/* End of file general_model.php */
/* Location: ./application/models/general_model.php */