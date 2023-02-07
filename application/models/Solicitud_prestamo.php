<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Solicitud_prestamo extends CI_Model {
	public $variable;
	public function __construct(){
		parent::__construct();
	}
	function registrar_conyugue($data){
		$this->db->insert('conyugue', $data);
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function maximocodigo(){
		$this->db->select_max('idsolicitud');
		$query = $this->db->get('solicitud');
		$row = $query->row_array();
		$result = $row['idsolicitud'];
		if(is_null($result)){
			$result=0;
		}
		return $result;
	}
	function registrarsolicitud($data){
		$this->db->insert('solicitud', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}			
	}
	function registrardetinventario($data){
		$this->db->insert('detalle_inventariobg', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}			
	}
	function actualizardetinvbg($idsolicitud, $data){
		$this->db->where('idsolicitud', $idsolicitud); 
		$this->db->update('detalle_inventariobg', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function existedetinvbg($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$resultado = $this->db->get('detalle_inventariobg');
		if($resultado->num_rows()){
			return true;
		}else{
			return false;
		}
	}
	function detinventariobg($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$resultado = $this->db->get('detalle_inventariobg');
		return $resultado->row_array();	
	}
	function obtenersolicitud($idsolicitud){
		$this->db->where('idsolicitud',$idsolicitud);
		$result = $this->db->get('solicitud');
		return $result->row_array();
	}
	function obtenersolicitud2($idsolicitud){//vistasolicitud
		$this->db->where('idsolicitud',$idsolicitud);
		$result = $this->db->get('vistasolicitud');
		return $result->row_array();
	}
	function lista_solicitudesxcliente($codcliente){
		$this->db->where('codcliente',$codcliente);
		$result = $this->db->get('solicitud');
		return $result->result_array();		
	}
	function lista_solicitudesxclienteaprob($codcliente){//aprobados
		$this->db->where('codcliente',$codcliente);
		$this->db->where('estado','APROBADO');
		$result = $this->db->get('solicitud');
		return $result->result_array();		
	}
	function lista_solicitudes(){
		$this->db->where('estado','PENDIENTE');
		$this->db->order_by('apenom');
		$result = $this->db->get('solicitud');
		return $result->result_array();		
	}
	function lista_solicitudes2(){
		$this->db->where('estado','PENDIENTE');
		$this->db->order_by('apenom', 'asc');
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();		
	}
	function lista_solicitudesagencia($agencia){
		$this->db->where('estado','PENDIENTE');
		$this->db->where('agencia',$agencia);
		$this->db->order_by('apenom', 'asc');
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();		
	}	
	function lista_solicitudes3(){
		$this->db->order_by('apenom', 'asc');		
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();
	}	

	function listasolicitudes_apenom($apenom){
		$this->db->like('apenom', $apenom, 'both');
		$this->db->order_by('apenom', 'asc');		
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();		
	}
	function listasolicitudes_apenom_agencia($apenom, $agencia){
		$this->db->where('agencia', $agencia);
		$this->db->like('apenom', $apenom, 'both');
		$this->db->order_by('apenom', 'asc');		
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();		
	}	
	function listasolicitudes_apenom_asesor($apenom, $asesor){
		$this->db->where('idasesor', $asesor);
		$this->db->like('apenom', $apenom, 'both');
		$this->db->order_by('apenom', 'asc');		
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();		
	}	
	function lista_solicitudespendiasesor($idasesor){
		$this->db->where('estado','PENDIENTE');
		$this->db->where('idasesor', $idasesor);
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();		
	}		
	function ingresarmuebles($data){
		$this->db->insert('mueble_cliente', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function obtenermuebles($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result = $this->db->get('mueble_cliente');
		return $result->result_array();			
	}
	function eliminarmueble($id){
		$this->db->where('id', $id);
		$result=$this->db->delete('mueble_cliente');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function totalsummuebles($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$this->db->select_sum('cantidad');
		$query = $this->db->get('mueble_cliente');
		$query = $query->row_array();
		return $query['cantidad'];
	}
	function eliminardef($id){
		$this->db->where('id', $id);
		$result=$this->db->delete('deuda_entidadfinan');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function actualizarsolic($data, $codsolicitud){
		$this->db->where('idsolicitud', $codsolicitud); 
		$this->db->update('solicitud', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function actualizarsoliccodcli($data, $codcliente){
		$this->db->where('codcliente', $codcliente); 
		$this->db->update('solicitud', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function actualizarsoliccodclivig($data, $codcliente){//solo vigentes
		$this->db->where('codcliente', $codcliente); 
		$this->db->where('estado', 'APROBADO'); 		
		$this->db->update('solicitud', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}		
	function registrardesembolso($data){
		$this->db->insert('desembolso', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}		
	}
	function obtenerdesembolso($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$result = $this->db->get('vistasolicitdesembolsados',1);
		return $result->row_array();
	}
	function obtenerpoliza($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result = $this->db->get('segurodesgravamen',1);
		return $result->row_array();
	}
	function registrarpoliza($data){
		$this->db->insert('segurodesgravamen', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function actualizarpoliza($data, $codsolicitud){
		$this->db->where('idsolicitud', $codsolicitud); 
		$this->db->update('segurodesgravamen', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function obtenerdesembolsosol($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result = $this->db->get('desembolso',1);
		return $result->row_array();
	}
	function obtenerdesembolsosol2($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result = $this->db->get('vistasolicitdesembolsados',1);
		return $result->row_array();		
	}
	function registrarcuotapago($data){
		$this->db->insert('cuotapago', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}			
	}
	function listapagoscuotas($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$result = $this->db->get('cuotapago');
		return $result->result_array();
	}
	function reganalcual($data){
		$this->db->insert('analisit_cual', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}			
	}
	function actualizaranalcual($data, $codsolicitud){
		$this->db->where('idsolicitud', $codsolicitud); 
		$this->db->update('analisit_cual', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}	
	function obteneranalisis($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result = $this->db->get('analisit_cual');
		return $result->row_array();
	}
	function obtenerbalance($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result = $this->db->get('balance');
		return $result->row_array();		
	}
	function obtenerperdganan($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result = $this->db->get('perdidas_ganancias');
		return $result->row_array();		
	}
	function existeperdidasganancias($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$resultado = $this->db->get('perdidas_ganancias');
		if($resultado->num_rows()){
			return true;
		}else{
			return false;
		}	
	}
	function actualizarperdidasganancias($data, $idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$this->db->update('perdidas_ganancias', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function existedetpg($idsolicitud, $nro){
		$this->db->where('idsolicitud', $idsolicitud);
		$this->db->where('nroproducto', $nro);
		$resultado = $this->db->get('det_perdiganan');
		if($resultado->num_rows()){
			return true;
		}else{
			return false;
		}	
	}
	function actualizardetperdidasgan($data, $idsolicitud, $nro){
		$this->db->where('idsolicitud', $idsolicitud);
		$this->db->where('nroproducto', $nro);		
		$this->db->update('det_perdiganan', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}		
	}
	function eliminarproductodpg($idsolicitud, $nro){
		$this->db->where('idsolicitud', $idsolicitud);
		$this->db->where('nroproducto', $nro);	
		$this->db->delete('det_perdiganan'); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}					
	}
	function obtenerperdganan_gral($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result = $this->db->get('perd_ganangral');
		return $result->row_array();		
	}
	function existeperdidasgangral($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$resultado = $this->db->get('perd_ganangral');
		if($resultado->num_rows()){
			return true;
		}else{
			return false;
		}
	}
	function existebalance($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$resultado = $this->db->get('balance');
		if($resultado->num_rows()){
			return true;
		}else{
			return false;
		}
	}
	function existedetbalance($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$resultado = $this->db->get('det_balance');
		if($resultado->num_rows()){
			return true;
		}else{
			return false;
		}
	}		
	function actualizar_perdganan_gral($data, $codsolicitud){
		$this->db->where('idsolicitud', $codsolicitud); 
		$this->db->update('perd_ganangral', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}	
	function obtenerpropuestas($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result = $this->db->get('propuestacred');
		return $result->row_array();		
	}

	function existepropuesta($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$resultado = $this->db->get('propuestacred');
		if($resultado->num_rows()){
			return true;
		}else{
			return false;
		}
	}	
	function registrarbalance($data){
		$this->db->insert('balance', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function obtener_detbalance($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result = $this->db->get('det_balance');
		return $result->row_array();		
	}
	function regdetbalance($data){
		$this->db->insert('det_balance', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function actualizarbalance($data, $idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud); 
		$this->db->update('balance', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function actualizardetbalance($data, $idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud); 
		$this->db->update('det_balance', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function regperdidasganan($data){
		$this->db->insert('perdidas_ganancias', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function regdetperdidasganan($data){
		$this->db->insert('det_perdiganan', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}		
	}
	function detperdidasganancias_pg($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result = $this->db->get('det_perdiganan');
		return $result->result_array();
	}
	function registrarevaluacion($data){
		$this->db->insert('evaluacion', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}			
	}
	
	function solicitudesxasesor($idasesor){
		$this->db->where('idasesor', $idasesor);
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();
	}
	function solicitudesxasesorapropend($idasesor){
		$this->db->where('idasesor', $idasesor);	
		$this->db->where_in('estado', array('PENDIENTE', 'APROBADO', 'EVALUACION'));
		$this->db->order_by('apenom', 'asc');	
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();		
	}
	function solicitudesxasesorapropendapenom($idasesor, $apenom){
		$this->db->like('apenom', $apenom);
		$this->db->where('idasesor', $idasesor);
		$this->db->where_in('estado', array('PENDIENTE', 'APROBADO', 'EVALUACION'));
		$this->db->order_by('apenom', 'asc');	
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();		
	}
	function solicitudesxasesorapropendestado($idasesor, $estado){
		$this->db->where('idasesor', $idasesor);
		$this->db->where_in('estado', $estado);
		$this->db->order_by('apenom', 'asc');	
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();		
	}
	function solicitudesporestado($estado){
		$this->db->where('estado', $estado);
		$this->db->order_by('apenom', 'asc');	
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();		
	}
	function solicitudesporestadoagencia($estado, $agencia){
		$this->db->where('estado', $estado);
		$this->db->where('agencia', $agencia);
		$this->db->order_by('apenom', 'asc');	
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();		
	}	
	function solicitudesxasesora($idasesor){//APROBADOs
		$this->db->where('idasesor', $idasesor);
		$this->db->where('estado', 'APROBADO');		
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();
	}

	function listasolicitudes(){//aprobados
		$this->db->where('estado', 'APROBADO');		
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();		
	}
	function listasolicitudesevaluacion(){
		$this->db->where('estado', 'EVALUACION');
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();		
	}
	function listasolicitudesevaluacionxagen($agencia){
		$this->db->where('estado', 'EVALUACION');
		$this->db->where('agencia', $agencia);	
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();		
	}
	function solicievaluaciongz(){//lista de solicitudes a evaluacion por gerente de agencia
		$this->db->where('estado', 'EVALUACION2');
		$result = $this->db->get('vistasolicitud');
		return $result->result_array();			
	}
	function registrarpropuestac($data){
		$this->db->insert('propuestacred', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}			
	}
	function actualizarpropuestacred($data, $idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud); 
		$this->db->update('propuestacred', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function registrar_perdidasgangral($data){
		$this->db->insert('perd_ganangral', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}			
	}
	function actualizar_perdidasgangral($data, $idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud); 				
		$this->db->update('perd_ganangral', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}			
	}	
	function ingresardenfinanc($data){
		$this->db->insert('deuda_entidadfinan', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}	
	function list_deudaentidades($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result = $this->db->get('deuda_entidadfinan');
		return $result->result_array();
	}
	function totalsumentidadfinan($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$this->db->select_sum('cantidad');
		$query = $this->db->get('deuda_entidadfinan');
		$query = $query->row_array();
		return $query['cantidad'];
	}
	function obtenerobservaciones($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);		
		$query = $this->db->get('observacion');	
		return $query->result_array();
	}
	function obtenerobservacionesnr($idsolicitud){//NO RESUELTOS
		$this->db->where('idsolicitud', $idsolicitud);		
		$this->db->where('estado', 'OBSERVADO');
		$query = $this->db->get('observacion',1);	
		return $query->row_array();
	}	
	function cantidadobservacionesnr($idsolicitud){//NO RESUELTOS
		$this->db->where('idsolicitud', $idsolicitud);
		$this->db->where('estado', 'OBSERVADO');
		$this->db->from('observacion');
		return $this->db->count_all_results();
	}
	function registrarobservacion($data){
		$this->db->insert('observacion', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}		
	}
	function cambiareobservacion($idobservacion, $data){
		$this->db->where('id', $idobservacion); 
		$this->db->update('observacion', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}		
	}
	/*ELIMINAR*/
	function registrarsolaprobados($data){
		$this->db->insert('sol_aprobados', $data); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function eliminarsolaprobados($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud); 
		$this->db->delete('sol_aprobados');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}			
	}
	/*-----------------*/

	function eliminarevaluacion($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud); 
		$this->db->delete('evaluacion');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}			
	}
	function totalmorascliente($idcliente){
		$this->db->where('codcliente', $idcliente);
		$this->db->select_sum('moras');
		$query = $this->db->get('vistasolicitdesembolsados');
		$query = $query->row_array();
		return $query['moras'];
	}
	function promedioporcmorascliente($idcliente){
		$this->db->where('codcliente', $idcliente);
		$this->db->select_avg('porc');
		$query = $this->db->get('vistasolicitdesembolsados');
		$query = $query->row_array();
		return $query['porc'];
	}
	function eliminarsolicitud($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$this->db->delete('solicitud');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function poseesolicitudvigente($codcliente){
		$this->db->where('codcliente', $codcliente);
		$this->db->where('estado', 'APROBADO');
		$resultado = $this->db->get('solicitud');
		if($resultado->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function existeanalcual($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$resultado = $this->db->get('analisit_cual');
		if($resultado->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function existeultimasol($idcliente){
		$this->db->where('codcliente', $idcliente);
		$this->db->where("idsolicitud<(select max(idsolicitud) from solicitud where codcliente=".$idcliente.")");		
		$this->db->order_by('idsolicitud', 'desc');
		$result=$this->db->get('solicitud', 1);
		if($result->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function ultima_solicitud($idcliente){
		$this->db->where('codcliente', $idcliente);
		$this->db->where("idsolicitud<(select max(idsolicitud) from solicitud where codcliente=".$idcliente.")");		
		$this->db->order_by('idsolicitud', 'desc');
		$result=$this->db->get('solicitud', 1);
		return $result->row_array();
	}
	function anteriorultima_solicitud($idcliente, $idsolicitudactual){
		$this->db->where('codcliente', $idcliente);
		$this->db->where("idsolicitud<".$idsolicitudactual);		
		$this->db->order_by('idsolicitud', 'desc');
		$result=$this->db->get('solicitud', 1);
		return $result->row_array();
	}	
	function cargaranalcual_solant($idsolicitudanterior, $idsolicitudactual){
		$consulta="CALL cargaranalcual_solant(".$idsolicitudanterior.",".$idsolicitudactual.")";
        if($this->db->query($consulta)){
            return true;
        }else{
            return false;
        }
	}
	function cargarbalance_solant($idsolicitudanterior, $idsolicitudactual){
		$consulta="CALL cargarbalance_solant(".$idsolicitudanterior.",".$idsolicitudactual.")";
        if($this->db->query($consulta)){
            return true;
        }else{
            return false;
        }
	}	
	function cargarperdgan_solant($idsolicitudanterior, $idsolicitudactual){
		$consulta="CALL cargarperdgan_solant(".$idsolicitudanterior.",".$idsolicitudactual.")";
        if($this->db->query($consulta)){
            return true;
        }else{
            return false;
        }
	}	
	function cargarpropuesta_solant($idsolicitudanterior, $idsolicitudactual){
		$consulta="CALL cargarpropuesta_solant(".$idsolicitudanterior.",".$idsolicitudactual.")";
        if($this->db->query($consulta)){
            return true;
        }else{
            return false;
        }
	}	
}

/* End of file solicitud_prestamo.php */
/* Location: ./application/models/solicitud_prestamo.php */