<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Caja_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	function registrarcaja($data){
		$this->db->insert('caja', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function registrarbancos($data){
		$this->db->insert('bancos', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function listaregbancos(){
		$this->db->order_by('id', 'desc');		
		$result=$this->db->get('bancos', 25);
		return $result->result_array();
	}
	function historiacaja($fecha){
		$this->db->like('fecha_hora', $fecha, 'after');
		$this->db->order_by('fecha_hora', 'desc');
		$result=$this->db->get('vistahistoriacaja', 300);
		return $result->result_array();
	}
	function obtenersaldo(){
		$this->db->select('saldo');
		$this->db->order_by('idreg', 'desc');
		$result = $this->db->get('caja',1);
		$result = $result->row_array();
		return (is_null($result['saldo']) ? 0 : $result['saldo']);
	}
	function obtenerreginidia($fecha, $agencia){//obtener registro inicial del dia
		$this->db->where('agencia', $agencia);
		$this->db->like('fecha_hora', $fecha, 'after');
		$this->db->order_by('idreg', 'asc');
		$result = $this->db->get('caja', 1);				
		return $result->row_array();
	}
	function obtenersaldoagencia($agencia){
		$this->db->select('saldo');
		$this->db->where('agencia', $agencia);		
		$this->db->order_by('idreg', 'desc');
		$result = $this->db->get('caja',1);
		$result = $result->row_array();
		return (is_null($result['saldo']) ? 0 : $result['saldo']);
	}
	function saldobanco(){
		$this->db->select('saldo');
		$this->db->order_by('id', 'desc');
		$result = $this->db->get('bancos',1);
		$result = $result->row_array();
		return (is_null($result['saldo']) ? 0 : $result['saldo']);
	}
	function saldobancoagencia($agencia){
		$this->db->select('saldo');
		$this->db->where('agencia', $agencia);	
		$this->db->order_by('id', 'desc');
		$result = $this->db->get('bancos',1);
		$result = $result->row_array();
		return (is_null($result['saldo']) ? 0 : $result['saldo']);
	}	
	function maximocod(){
		$this->db->select_max('idreg');
		$result = $this->db->get('caja');
		$result = $result->row_array();
		return (is_null($result['idreg']) ? 0 : $result['idreg']);
	}
	function maximocodbancos(){
		$this->db->select_max('id');
		$result = $this->db->get('bancos');
		$result = $result->row_array();
		return (is_null($result['id']) ? 0 : $result['id']);
	}
	function actualizarregistro($idreg, $data){
		$this->db->where('idreg', $idreg);
		$this->db->update('caja', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function regpagoasesorc($data){
		$this->db->insert('pagoasesorc', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function actualizarsaldoasesor($id, $data){
		$this->db->where('id', $id);
		$this->db->update('pagoasesorc', $data); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function listapagoasesorc($idusuario){
		$this->db->where('codusuario', $idusuario);
		$this->db->order_by('id', 'desc');
		$resultado=$this->db->get('pagoasesorc', 15);
		return $resultado->result_array();
	}	
	function asesorpagopordia($codcaja){//funcion para verificar si el asesor ya pago en el dia de acuerdo al codcaja
		$this->db->where('idcaja', $codcaja);
		$this->db->where('tipo', 'SALIDA');
		$result = $this->db->get('pagoasesorc');
		if($result->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function eliminarregpagoasesorc($id){
		$this->db->where('id', $id);
		$this->db->delete('pagoasesorc');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}	
	function eliminarregbanco($id){
		$this->db->where('id', $id);
		$this->db->delete('bancos');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}			
	function eliminarregcaja($idreg){//SE VA ELIMINAR SINO A CORREGIR creando un nuevo registro
		$this->db->where('idreg', $idreg);
		$this->db->delete('caja');
		if($this->db->affected_rows()>0){
			//$this->cuadrarregcaja($idreg);
			return true;
		}else{
			return false;
		}			
	}
	function saldoasesor($idusuario, $tipo_pago){
		$this->db->where('codusuario', $idusuario);
		$this->db->where('tipo_pagos', $tipo_pago);
		$this->db->order_by('id', 'desc');	
		$result = $this->db->get('pagoasesorc');
		$result = $result->row_array();	
		return (is_null($result) ? 0 : $result['saldo']);	
	}
	function codcajasaldoasesor($idusuario){
		$this->db->where('codusuario', $idusuario);
		$this->db->order_by('id', 'desc');	
		$result = $this->db->get('pagoasesorc');
		$result = $result->row_array();	
		return (is_null($result['idcaja']) ? 0 : $result['idcaja']);
	}
	function ingresosaldoasesorfech($idusuario, $fecha, $tipo_pago){
		$this->db->where('codusuario', $idusuario);
		$this->db->where('tipo_pagos', $tipo_pago);
		$this->db->like('fecha_hora', $fecha, 'after');
		$this->db->order_by('id', 'desc');
		$result = $this->db->get('pagoasesorc', 1);
		return $result->row_array();
	}
	function pagohoy($idusuario, $fecha, $tipo_pago){//si el asesor realizo pagos
		$this->db->where('codusuario', $idusuario);
		$this->db->where('tipo_pagos', $tipo_pago);
		$this->db->where('tipo', 'SALIDA');
		$this->db->like('fecha_hora', $fecha, 'after');
		$this->db->select_sum('cantidad');
		$result = $this->db->get('pagoasesorc', 1);
		$result = $result->row_array();
		return is_null($result['cantidad']) ? 0 : $result['cantidad'];
	}
	function listarregcajaxfech($fecha){
		$this->db->order_by('idreg', 'desc');
		$this->db->like('fecha_hora', $fecha, 'after');
		$result = $this->db->get('caja');
		return $result->result_array();
	}
	//AGRUPADOS POR USUARIO Y TIPO PARA TABLA COLLAPSE
	function listarregagrucajaxfech($fecha){//agrupados por codusuario
		$this->db->select('codusuario, SUM(cantidad) AS cantidad, tipo');
 		$this->db->group_by('codusuario, tipo'); 
		$this->db->like('fecha_hora', $fecha, 'after');
		$result = $this->db->get('caja');
		return $result->result_array();
	}
	function registrosdiaagencia($fecha, $agencia){
		$this->db->like('fecha_hora', $fecha, 'after');
		$this->db->where('agencia', $agencia);
		//$this->db->order_by('fecha_hora', 'asc');
		$this->db->order_by('idreg', 'asc');
		$result = $this->db->get('caja');
		return $result->result_array();
	}
	function listarregcajaxfech2($fecha){
		$this->db->order_by('codusuario asc','tipo asc', 'idreg desc');
		$this->db->like('fecha_hora', $fecha, 'after');
		$result = $this->db->get('caja');
		return $result->result_array();
	}
	//--------------------------------------------------->
	//AGRUPADOS POR USUARIO Y TIPO PARA TABLA COLLAPSE  X AGENCIA
	function regcufeag($fecha, $agencia){//agrupados por codusuario y agencia
		$this->db->select('codusuario, SUM(cantidad) AS cantidad, tipo, max(idreg) as idreg');
		$this->db->where('agencia', $agencia);
 		$this->db->group_by('codusuario, tipo'); 
		$this->db->like('fecha_hora', $fecha, 'after');
		$result = $this->db->get('caja');
		return $result->result_array();
	}
	function regcufeag2($fecha, $agencia){
		$this->db->order_by('codusuario asc','tipo asc', 'idreg desc');
		$this->db->where('agencia', $agencia);
		$this->db->like('fecha_hora', $fecha, 'after');
		$result = $this->db->get('caja');
		return $result->result_array();
	}
	//--------------------------------------------------->
	function cantasesorconsaldo($agencia){//credito
		$this->db->where('saldocredito>', 0);
		$this->db->where('agencia', $agencia);
		$result = $this->db->get('asesorsaldo');
		return $result->num_rows();
	}
	function cerrarcaja($data){
		$this->db->insert('cierrecaja', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function vistapagosporusuariohoy(){
		$result=$this->db->get('vistapagosusuariohoy');
		return $result->result_array();
	}
	function vistapagosporusuariohoy2(){
		$query="SELECT idusuario as codusuario, SUM(montopagado) AS monto FROM kardex
WHERE DATE(fecha_hora_reg) LIKE CURDATE()
GROUP BY idusuario";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	function obtenerregcaja($idcaja){
		$this->db->where('idreg', $idcaja);
		$result = $this->db->get('caja');
		return $result->row_array();
	}
	function ingcajaasesores(){
		$this->db->select_sum('cantidad');
		$this->db->like('fecha_hora', date('Y-m-d'), 'after');
		$this->db->like('descripcion', 'PAGO CUOTAS ASESOR', 'after');
		$result=$this->db->get('caja');
		$result = $result->row_array();
		return $result['cantidad'];
	}
	function transferenciascaja(){
		$this->db->like('descripcion', 'TRANSFERENCIA', 'after');
		$this->db->order_by('idreg', 'desc');
		$this->db->limit(10);
		$result=$this->db->get('caja');		
		return $result->result_array();
	}
	function transferenciasbanco(){
		$this->db->like('descripcion', 'TRANSFERENCIA', 'after');
		$this->db->order_by('id', 'desc');
		$this->db->limit(10);
		$result=$this->db->get('bancos');		
		return $result->result_array();
	}	
	function ingcajaasesoresagencia($agencia){
		$where = "fecha_hora LIKE '".date('Y-m-d')."%' AND pagoasesorc.tipo = 'INGRESO' AND agencia = '".$agencia."'";
  		$this->db->select_sum('cantidad');
  		$this->db->from('pagoasesorc');
 		$this->db->join('usuario', 'pagoasesorc.codusuario = usuario.codusuario');//pago
  		$this->db->where($where);
		$result = $this->db->get();
		$result = $result->row_array();
		return $result['cantidad'];
	}	
	function listaregcierrecaja($fecha){
		$this->db->order_by('id', 'desc');
		$this->db->like('fecha_hora', $fecha, 'after');
		$result = $this->db->get('cierrecaja');
		return $result->result_array();
	}
	function cierrecajaultimo($agencia){
		$this->db->where('agencia', $agencia);		
		$this->db->order_by('fecha_hora', 'desc');
		$result = $this->db->get('cierrecaja',1);
		return $result->result_array();
	}	
	function registroingcajahoy($fecha, $agencia){
		$this->db->where('tipo', 'INGRESO');
		$this->db->where('agencia', $agencia);
		$this->db->like('fecha_hora', $fecha, 'after');		
		$this->db->order_by('idreg', 'asc');
		$result = $this->db->get('caja');
		return $result->result_array();
	}
	function registroegrecajahoy($fecha, $agencia){
		$this->db->where('tipo', 'SALIDA');
		$this->db->where('agencia', $agencia);
		$this->db->like('fecha_hora', $fecha, 'after');		
		$this->db->order_by('idreg', 'asc');
		$result = $this->db->get('caja');
		return $result->result_array();
	}
	function existeregdesembolso($iddesembolso){
		$this->db->like('descripcion', 'DESEMBOLSO ID : '.$iddesembolso, 'after');
		$resultado = $this->db->get('caja', 1);
		if($resultado->num_rows()){
			return true;
		}else{
			return false;
		}
	}
	function obtenerregpordesembolso($iddesembolso){
		$this->db->like('descripcion', 'DESEMBOLSO ID : '.$iddesembolso, 'after');
		$resultado = $this->db->get('caja', 1);
		return $resultado->row_array();
	}
	function obteneregistrosingresds($fecha, $agencia){//diferentes a los pagos y desembolso
		$this->db->where('tipo', 'INGRESO');
		$this->db->where('agencia', $agencia);
		$this->db->like('fecha_hora', $fecha, 'after');
		$result=$this->db->get('vistacajasegresosingresos');
		return $result->result_array();
	}
	function obteneregistrosingresef($fechaini, $fechafin, $agencia){//diferentes a los pagos y desembolso entre fechas
		$where = "fecha_hora BETWEEN '".$fechaini."' AND '".$fechafin."' and agencia = '".$agencia."'";
		$this->db->where($where);
		$this->db->where('tipo', 'INGRESO');
		$result = $this->db->get('vistacajasegresosingresos');
		return $result->result_array();
	}

	function detcajaentrefechas($fechaini, $fechafin){//agrupado
		$this->db->select('codusuario, SUM(cantidad) AS cantidad, tipo, max(idreg) as idreg');
		$where = "fecha_hora >= '".$fechaini." 00:00:00' AND fecha_hora <='".$fechafin." 23:59:59'";
 		$this->db->group_by('codusuario, tipo'); 
		$this->db->where($where);
		$result = $this->db->get('caja');
		return $result->result_array();
	}

	function detcajaentrefechas2($fechaini, $fechafin){
		$where = "fecha_hora >= '".$fechaini." 00:00:00' AND fecha_hora <='".$fechafin." 23:59:59'";
		$this->db->order_by('codusuario asc','tipo asc', 'idreg desc');
		$this->db->where($where);
		$result = $this->db->get('caja');
		return $result->result_array();
	}

	function detcajadescripcionyfecha($fechaini, $fechafin, $descripcion, $idusuario){
		$where = "fecha_hora >= '".$fechaini." 00:00:00' AND fecha_hora <='".$fechafin." 23:59:59'";
		$this->db->where($where);
		if($this->session->userdata('tipouser')!=1){
			$this->db->where('codusuario', $idusuario);
		}
		$this->db->like('descripcion', $descripcion);
		$result=$this->db->get('caja');
		return $result->result_array();
	}
	function detcajadescripcionfechat($fechaini, $fechafin, $descripcion, $tipo, $idusuario, $agencia){
		$where = "fecha_hora >= '".$fechaini." 00:00:00' AND fecha_hora <='".$fechafin." 23:59:59' and agencia='".$agencia."'";
		$this->db->where($where);
		if($idusuario!='TODOS'){
			$this->db->where('codusuario', $idusuario);
		}
		if($tipo!='TODOS'){
			$this->db->where('tipo', $tipo);
		}
		$this->db->like('descripcion', $descripcion);
		$result=$this->db->get('caja');
		return $result->result_array();
	}
	function detcajadescripcionfechatgasto($fechaini, $fechafin, $idusuario, $agencia){
		$where = "fecha_hora >= '".$fechaini." 00:00:00' AND fecha_hora <='".$fechafin." 23:59:59' and agencia='".$agencia."'";
		$this->db->where($where);
		if($idusuario!='TODOS'){
			$this->db->where('codusuario', $idusuario);
		}	
		$this->db->where('tipo', 'SALIDA');
		$this->db->like('descripcion', 'EGRESO POR : ', 'after');
		$this->db->not_like('descripcion', 'doco');
		$result=$this->db->get('caja');
		return $result->result_array();
	}	
	function detcajaentrefechytipo($fechaini, $fechafin, $tipo, $idusuario, $agencia){
		$where = "fecha_hora >= '".$fechaini." 00:00:00' AND fecha_hora <='".$fechafin." 23:59:59' AND agencia='".$agencia."'";
		$this->db->where($where);
		if($idusuario!='TODOS'){
			$this->db->where('codusuario', $idusuario);
		}
		if($tipo!='TODOS'){
			$this->db->where('tipo', $tipo);
		}
		$result=$this->db->get('caja');
		return $result->result_array();				
	}
	function obteneregistrosegrgesods($fecha, $agencia){//diferentes a los pagos, desembolso y doco
		$this->db->where('tipo', 'SALIDA');
		$this->db->where('agencia', $agencia);		
		$this->db->like('fecha_hora', $fecha, 'after');
		$this->db->not_like('descripcion', 'doco');
		$result=$this->db->get('vistacajasegresosingresos');
		return $result->result_array();
	}
	function registrosegresos($fecha, $agencia, $tipocostogasto){
		$this->db->where('agencia', $agencia);	
		$this->db->like('gastocosto', $tipocostogasto, 'after');		
		$this->db->like('fecha_hora', $fecha, 'after');
		$this->db->not_like('descripcion', 'doco');
		$result=$this->db->get('vistacajasegresosingresos');
		return $result->result_array();
	}	


	function obteneregistrosegrgesef($fechaini, $fechafin, $agencia){//diferentes a los pagos y desembolso entre fechas
		$where = "fecha_hora BETWEEN '".$fechaini."' AND '".$fechafin."' and agencia = '".$agencia."'";
		$this->db->where($where);
		$this->db->where('tipo', 'SALIDA');
		$result=$this->db->get('vistacajasegresosingresos');
		return $result->result_array();
	}		
}

/* End of file caja_model.php */
/* Location: ./application/models/caja_model.php */