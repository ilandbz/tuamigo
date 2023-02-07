<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rrhh_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	function obtenertodopersonal(){
		$this->db->order_by('apenom');
		$result = $this->db->get('vistapersonalhhhh');
		return $result->result_array();
	}

	function obtenertodopersonal2(){//agrupadopor dni
		$this->db->select('dni, apenom');
		$this->db->group_by('dni');
		$this->db->order_by('apenom');
		$result = $this->db->get('vistapersonalhhhh');
		return $result->result_array();
	}	
	function obtenerpersonalagencia($agencia){
		$this->db->where('estado', 'ACTIVO');
		$this->db->where('agencia', $agencia);
		$this->db->order_by('apenom');
		$result = $this->db->get('vistapersonalhhhh');
		return $result->result_array();
	}	
	function personalagencia($agencia){
		$this->db->where('agencia', $agencia);
		$result = $this->db->get('vistapersonalhhhh');
		return $result->result_array();
	}	
	function obtenerpersonal($dni){
		$this->db->where('dni', $dni);
		$result = $this->db->get('vistapersonalhhhh');
		return $result->row_array();
	}
	function vistaresumenmovimientos($dni, $mes){//por mes
		$select = "dni, cargo, apenom, agencia, sueldobasico, (SELECT IFNULL(SUM(cantidad),0) FROM cuentarrhh WHERE tiporegistro='MOVILIDAD' AND dni=vp.dni and mes = ".$mes.") AS movilidad,(SELECT IFNULL(SUM(cantidad),0) FROM cuentarrhh WHERE (tiporegistro = 'BONO POR META' OR tiporegistro = 'OTRAS BONIFICACIONES') AND dni=vp.dni and mes = ".$mes.") AS bono,(SELECT IFNULL(SUM(cantidad),0) FROM cuentarrhh WHERE tiporegistro = 'ALIMENTACION' AND dni=vp.dni and mes = ".$mes.") AS alimentacion,(SELECT IFNULL(SUM(cantidad),0) FROM cuentarrhh WHERE tiporegistro = 'ASIGNACION FAMILIAR' AND dni=vp.dni and mes = ".$mes.") AS asignacion,(SELECT IFNULL(SUM(cantidad),0) FROM cuentarrhh WHERE tiporegistro='AFP' AND dni=vp.dni and mes = ".$mes.") AS afp,(SELECT IFNULL(SUM(cantidad),0) FROM cuentarrhh WHERE tiporegistro='ADELANTO DE SUELDO' AND dni=vp.dni and mes = ".$mes.") AS adelantos,(SELECT IFNULL(SUM(cantidad),0) FROM cuentarrhh WHERE tiporegistro = 'INCUMPLIMIENTO DE DESEMPEÑO' AND dni=vp.dni and mes = ".$mes.") AS dscto"; 
		$where="vp.dni='".$dni."'";
  		$this->db->select($select);
  		$this->db->from('vistapersonalhhhh vp');
  		$this->db->where($where);
		$result = $this->db->get();
		return $result->row_array();
	}
	function operacionesxpersonal($dni, $mes){
		$where = "dni = '".$dni."' and mes = ".$mes;
		$this->db->where($where);
		$result = $this->db->get('cuentarrhh');
		return $result->result_array();
	}
	function registrarpersonal($datos){
		$this->db->insert('personal', $datos);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function ultimoregistro($dni, $mes){
		$this->db->where('dni', $dni);
		$this->db->where('mes', $mes);
		$this->db->order_by('nro', 'desc');
		$result = $this->db->get('cuentarrhh');
		$result = $result->row_array();
		return $result;
	}
	function obtenerregistro($dni, $nro, $mes){
		$this->db->where('dni', $dni);
		$this->db->where('nro', $nro);
		$this->db->where('mes', $mes);		
		$result = $this->db->get('cuentarrhh');
		return $result->row_array();
	}	
	function registraroperacionpersonal($datos){
		$this->db->insert('cuentarrhh', $datos);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function registrarpagosueldo($datos){
		$this->db->insert('pagosueldo', $datos);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}			
	}
	function obtenerregpagsueldo($dni, $mes){
		$this->db->where('dni', $dni);
		$this->db->where('mes', $mes);
		$result = $this->db->get('pagosueldo');
		return $result->row_array();
	}
	function existepagosueldo($dni, $mes){
		$this->db->where('dni', $dni);
		$this->db->where('mes', $mes);
		$result = $this->db->get('pagosueldo');
		if($result->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	function ultimoregpagosueldo($dni){
		$this->db->where('dni', $dni);
		$this->db->order_by('fechareg', 'desc');
		$result = $this->db->get('pagosueldo');
		return $result->row_array();		
	}
	function listaregistroscuentarrhh($dni){
		$this->db->where('dni', $dni);
		$this->db->order_by('fechareg', 'desc');
		$result = $this->db->get('cuentarrhh');
		return $result->result_array();	
	}
	function listapagossueldo($where){
		$this->db->where($where);
		$this->db->order_by('fechareg', 'desc');
		$result = $this->db->get('pagosueldo');
		return $result->result_array();
	}


}

/* End of file caja_model.php */
/* Location: ./application/models/caja_model.php */