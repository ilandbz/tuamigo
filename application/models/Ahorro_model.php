<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ahorro_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	function registrarahorro($data){
		$this->db->insert('cuentaahorros', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function actualizarahorro($data, $codigo){
		$this->db->where('codigo', $codigo);
		$this->db->update('cuentaahorros', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function regcuotaahorro($data){
		$this->db->insert('cuotaahorros', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}			
	}
	function eliminarcuotasahorro($codigo){
		$this->db->where('codigocuenta', $codigo);
		$this->db->delete('cuotaahorros'); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}		
	}
	function eliminarreg($codigo){
		$this->db->where('codigo', $codigo);
		$this->db->delete('cuentaahorros'); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function eliminarregpagoahorro($codigo, $nrocuota){
		$this->db->where('codigo', $codigo);
		$this->db->where('nro', $nrocuota);		
		$this->db->delete('pagocuotaahorros'); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function ultimoregistropagoahorros($codigo){
		$this->db->where('codigo', $codigo);
		$this->db->order_by('nro', 'desc');
		$result=$this->db->get('pagocuotaahorros');		
		return $result->row_array();
	}
	function actualizarmontopago($codigo, $nrocuota, $data){
		$this->db->where('codigo', $codigo);
		$this->db->where('nro', $nrocuota);
		$this->db->update('pagocuotaahorros', $data); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function eliminarregkardex($codigo, $nro){
		$this->db->where('codigo', $codigo);
		$this->db->where('nro', $nro);
		$this->db->delete('pagoahorro'); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
//pagoahorro es el kardex
	function registrarpago($data){
		$this->db->insert('pagoahorro', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function pagosdescendentes($codigo){//vistapagos pagaron aunque sea menor que la cuota
		$where="codigocuenta = '".$codigo."' AND NOT (montopagado IS NULL)";
		$this->db->where($where);
		$this->db->order_by('nrocuota', 'desc');
		$result = $this->db->get('vistacuotapagoahorros');
		return $result->result_array();			
	}
	function obtenerkardex($codigo, $nro){
		$this->db->where('codigo', $codigo);
		$this->db->where('nro', $nro);
		$result=$this->db->get('pagoahorro');		
		return $result->row_array();
	}
	function vistapagosnull($codigo){//no pagados o montosmenores a la cuota
		$where = "codigocuenta='".$codigo."' AND (montopagado<cuota OR montopagado IS NULL)"; 
		$this->db->where($where);
		$this->db->order_by('nrocuota','asc');
		$result = $this->db->get('vistacuotapagoahorros');
		return $result->result_array();
	}
	function regpagocuotaahorros($data){
		$this->db->insert('pagocuotaahorros', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function fechaultimacuota($codigo){
		$this->db->where('codigocuenta', $codigo);
		$this->db->select_max('fechaprog');
		$result = $this->db->get('cuotaahorros');
		$result = $result->row_array();	
		return $result['fechaprog'];
	}
	function maximocod($codigo){
		$this->db->where('codigo', $codigo);
		$this->db->select_max('nro');
		$result = $this->db->get('pagoahorro');
		$result = $result->row_array();
		return (is_null($result['nro']) ? 0 : $result['nro']);
	}
	function obtenercuotaahorro($codigo){
		$this->db->where('codigo', $codigo);
		$result = $this->db->get('cuentaahorros', 1);
		return $result->row_array();
	}
	function obtenercuotaahorrovista($codigo){
		$this->db->where('codigo', $codigo);
		$result = $this->db->get('vistacuentaahorros', 1);
		return $result->row_array();
	}	
	function listacuotas($codigo){
		$this->db->where('codigocuenta', $codigo);
		$result = $this->db->get('vistacuotapagoahorros');
		return $result->result_array();
	}	
	function listadecuentas($agencia, $estado){
		$this->db->where('agencia', $agencia);
		$this->db->where('estado', $estado);
		$result = $this->db->get('vistacuentaahorros');
		return $result->result_array();		
	}
	function listacuentasfiltros($fechainicio, $fechafinal, $estado, $asesor, $agencia){
		$estado = $estado=='TODOS' ? '%' : $estado;
		$asesor = $asesor=='TODOS' ? '%' : $asesor;	
		$where = "fecha_registro >= '".$fechainicio." 00:00:00' AND fecha_registro <='".$fechafinal." 23:59:59' AND estado LIKE '".$estado."' AND idusuario LIKE '".$asesor."' and agencia='".$agencia."'";
		$this->db->where($where);
		$this->db->order_by('apenom asc');
		$result = $this->db->get('vistacuentaahorros');
		return $result->result_array();			
	}
	function listadecuentasasesor($asesor, $estado){
		$this->db->where('idusuario', $asesor);
		$this->db->where('estado', $estado);
		$this->db->order_by('apenom asc');
		$result = $this->db->get('vistacuentaahorros');
		return $result->result_array();
	}
	function listadecuentasvigentesasesor($asesor){
		$where = "idusuario = '".$asesor."' and estado = 'APROBADO'";
		// $where = "idusuario = '".$asesor."' and estado = 'APROBADO' and ((nrocuotas*monto)>totalpagado or totalpagado is null)";		
		$this->db->where($where);
		$this->db->order_by('apenom asc');
		$result = $this->db->get('vistacuentaahorros');
		return $result->result_array();
	}
	function listadecuentavigentessasesor($asesor, $estado){
		$this->db->where('idusuario', $asesor);
		$this->db->where('estado', $estado);
		$this->db->order_by('apenom asc');
		$result = $this->db->get('vistacuentaahorros');
		return $result->result_array();
	}	
	function listacuentasporcliente($codcliente){
		$this->db->where('codcliente', $codcliente);
		$result = $this->db->get('vistacuentaahorros');
		return $result->result_array();
	}

	function listadecuentasapenom($agencia, $estado, $apenom){
		$this->db->where('agencia', $agencia);
		$this->db->where('estado', $estado);
		$this->db->like('apenom', $apenom, 'both');
		$result = $this->db->get('vistacuentaahorros');
		return $result->result_array();
	}
	function listavigentesdnicliente($dni){
		$this->db->where('dni', $dni);
		$this->db->where('estado', 'APROBADO');
		$result = $this->db->get('vistacuentaahorros');
		return $result->result_array();
	}
	function cuentasapenomvigentes($agencia, $apenom){
		//$where = "apenom like '".$apenom."' and agencia = '".$agencia."' and (estado = 'APROBADO' or (nrocuotas*monto)>totalpagado)";
		$where = "apenom like '".$apenom."' and agencia = '".$agencia."' and estado = 'APROBADO'";		
		$this->db->where($where);
		$result = $this->db->get('vistacuentaahorros');
		return $result->result_array();
	}
	function cuentasapenomvigenteslike($agencia, $apenom){
		//$where = "apenom like '".$apenom."' and agencia = '".$agencia."' and (estado = 'APROBADO' or (nrocuotas*monto)>totalpagado)";
		$where = "apenom like '".$apenom."' and agencia like '%".$agencia."%' and estado = 'APROBADO'";		
		$this->db->where($where);
		$result = $this->db->get('vistacuentaahorros');
		return $result->result_array();
	}	
	function vistakardexpagosusuario($idusuario, $fecha){
		$this->db->select('pagoahorro.codigo, nro, pagoahorro.monto, fecha_hora, pagoahorro.idusuario, codcliente, agencia, apenom');
		$this->db->from('pagoahorro');
		$this->db->join('vistacuentaahorros', 'pagoahorro.codigo=vistacuentaahorros.codigo');
		$this->db->where('pagoahorro.idusuario', $idusuario);
		$this->db->like('fecha_hora', $fecha, 'after');
		$this->db->order_by('apenom asc');
		$result=$this->db->get();
		return $result->result_array();
	}
	function pagototal($codigo){
		$this->db->where('codigo', $codigo);
		$this->db->select_sum('monto');
		$result = $this->db->get('pagoahorro');
		$result = $result->row_array();
		return (is_null($result['monto']) ? 0 : $result['monto']);		
	}
	function listapagoahorro($codigo){//kardex pago de ahorro
		$this->db->where('codigo', $codigo);
		$result = $this->db->get('pagoahorro');
		return $result->result_array();		
	}

	function totalpagado($estado){
		$this->db->select_sum('totalpagado');
		$this->db->like('estado', $estado);
		$result = $this->db->get('vistacuentaahorros');
		$result = $result->row_array();
		return $result['totalpagado'];
	}

}

/* End of file caja_model.php */
/* Location: ./application/models/caja_model.php */