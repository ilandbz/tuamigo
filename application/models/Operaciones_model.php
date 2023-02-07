<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class operaciones_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	function solicitudesadesembolsar(){
		$result = $this->db->get('vistasolicitudesadesembolsar');
		return $result->result_array();
	}
	function solicitudesadesembolsarxagencia($agencia){
		$this->db->where('agencia', $agencia);
		$result = $this->db->get('vistasolicitudesadesembolsar');
		return $result->result_array();
	}	
	function vistasolicitdesembolsados(){
		$this->db->where('estado', 'APROBADO');
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();
	}
	function vistasolicitdesembolsadosdebenm8(){//deben mas de 8 dias
		$where = "estado='APROBADO'";
		$this->db->where($where);
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();
	}

	function vistasolicitdesembolsadosefasesor($fechaini, $fechafin, $idasesor, $agencia){
		$idasesor = $idasesor=='TODOS' ? '%' : $idasesor;
		$agencia = $agencia=='TODOS' ? '%' : $agencia;
		$where = "agencia like '".$agencia."' and idasesor like '".$idasesor."' and fecha_hora >= '".$fechaini." 00:00:00' AND fecha_hora <='".$fechafin." 23:59:59'";
		$this->db->where($where);
		$this->db->order_by('fecha_hora');
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();
	}	
	function vistasolicitdesembolsadoscondeuda(){
		$this->db->where('estado', 'APROBADO');
		$this->db->or_where('moradias>',0);
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();	
	}
	function vistasolicituddesembolsadoscliente($codcliente){//todas las solicitudes desembolsados tanto vigentes o no
		$this->db->where('codcliente', $codcliente);
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();
	}
	function numerodedesembolsoscliente($codcliente){//todas las solicitudes desembolsados tanto vigentes o no
		$where = "codcliente='".$codcliente."' AND estado <> 'PENDIENTE'";
		$this->db->where($where);
		return $this->db->count_all_results('solicitud'); 
	}	
	function vistasolicituddesembolsadosclientevigent($codcliente){//todas las solicitudes desembolsados 
		$this->db->where('codcliente', $codcliente);
		$this->db->where('estado', 'APROBADO');
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();
	}	
	function vistasolicitdesembolsadosidsol($idsolicitud){//CON SALDO tanto en cuotas o moras
		$where = "idsolicitud='".$idsolicitud."' AND (estado='APROBADO' OR (moradias>0 AND (pagomora=0 OR pagomora IS NULL)))"; 
		$this->db->where($where);		
		$this->db->order_by('apenom', 'asc');
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();		
	}
	function vistasolicitdesembolsadosidsol2($idsolicitud){//en general
		$this->db->where('idsolicitud', $idsolicitud);		
		$result = $this->db->get('vistasolicitdesembolsados', 1);
		return $result->row_array();
	}
	function vistasolicitdesembolsadosidasesor($idasesor){//aprobados o condeuda de mora
		$where = "idasesor='".$idasesor."' AND (estado='APROBADO' OR (moradias>0 AND (pagomora=0 OR pagomora IS NULL)))"; 
		$this->db->where($where);
		$this->db->order_by('apenom', 'asc');
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();	
	}
	function diasdemorapagado($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$result = $this->db->get('vistasolicitdesembolsados',1);
		$result = $result->row_array();
		return is_null($result['pagomora']) ? 0 : $result['pagomora'];
	}
	function obtenersolicituddestipocliente($idcliente, $estado){
		$this->db->where('codcliente', $idcliente);
		$this->db->where('estado', $estado);
		$this->db->order_by('fecha_hora', 'asc'); //de menor a mayor
		$result= $this->db->get('vistasolicitdesembolsados',1);
		return $result->row_array();
	}
	function saldototal($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$result = $this->db->get('vistapagospordesembolso');
		$result = $result->row_array();
		return $result['total']-$result['totalpagado'];
	}
	function totalpagado($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$result = $this->db->get('vistapagospordesembolso');
		$result = $result->row_array();
		return $result['totalpagado'];
	}
	function pagodesembolso($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$result = $this->db->get('vistapagospordesembolso');
		return $result->row_array();	
	}
	function pagodesembolsosol($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result = $this->db->get('vistapagospordesembolso');
		return $result->row_array();	
	}	
	function pagos($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->order_by('nrocuota', 'asc');
		$result = $this->db->get('pago');
		return $result->result_array();		
	}
	function pagosdescendentes($iddesembolso){//vistapagos pagaron aunque sea menor que la cuota
		$where="iddesembolso = '".$iddesembolso."' AND NOT (montopagado IS NULL)";
		$this->db->where($where);
		$this->db->order_by('nrocuota', 'desc');
		$result = $this->db->get('vistapagos');
		return $result->result_array();			
	}
	function existepago($iddesembolso, $nrocuota){//si pago aunque sea 0 soles
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->where('nrocuota', $nrocuota);
		$result = $this->db->get('pago');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function insertregdesemcan($data){//INSERTAR REGISTROS DE DESEMBOLSOS A CANCELAR 
		$this->db->insert('creditosacancelar', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function listacreditoscancelar($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$this->db->where('estado', 'DEBE');
		$result=$this->db->get('creditosacancelar');
		return $result->result_array();
	}
	function vistalistacreditoscancelar($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$this->db->where('estado', 'DEBE');
		$result=$this->db->get('vistacreditosacancelar');
		return $result->result_array();
	}
	function vistasolicitudescastigo($agencia){
		$this->db->where('agencia', $agencia);
		$this->db->where('estado', 'CASTIGO');
		$result=$this->db->get('vistasolicitdesembolsados');
		return $result->result_array();		
	}
	function sumacredapagar($idsolicitud){
		$consulta = "SUM(saldo+mora) AS total";
		$this->db->select($consulta);
		$this->db->where('idsolicitud', $idsolicitud);
		$this->db->where('estado', 'DEBE');
		$result=$this->db->get('creditosacancelar');
		$result = $result->row_array();
		return $result['total'];
	}
	function sumacredapagarvista($idsolicitud){
		$consulta = "IFNULL(SUM(montotot),0) AS total";
		$this->db->select($consulta);
		$this->db->where('idsolicitud', $idsolicitud);
		$this->db->where('estado', 'DEBE');
		$result=$this->db->get('creditosacancelar');
		$result = $result->row_array();
		return $result['total'];
	}
	function sumacredpagado($idsolicitud){
		$consulta = "IFNULL(SUM(montotot),0) AS total";
		$this->db->select($consulta);
		$this->db->where('idsolicitud', $idsolicitud);
		$this->db->where('estado', 'PAGADO');
		$result=$this->db->get('creditosacancelar');
		$result = $result->row_array();
		return $result['total'];
	}
	function pagarcreddeuda($idsolicitud, $iddesembolso, $monto){
		$this->db->where('idsolicitud', $idsolicitud);
		$this->db->where('iddesembolso', $iddesembolso);
		$data = array('estado' => 'pagado', 'montotot' => $monto);
		$this->db->update('creditosacancelar', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function reportegeneraldniyestado($dni, $estado){//solo vigentes
		$this->db->select('idsolicitud, iddesembolso, unidplazo, capital, fecha_hora, interes, totalpagado, mora, pagomora, costomora, (capital+interes)-IFNULL(totalpagado,0) as saldo');
		$this->db->where('dni', $dni);
		$this->db->where('estado', $estado);
		$this->db->order_by('saldo', 'asc');
		$result = $this->db->get('reportegeneral');
		return $result->result_array();
	}
	function existedesembolso($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result = $this->db->get('desembolso');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function existedesembolsoidd($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$result = $this->db->get('desembolso');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}	
	function obtenerpagoreg($iddesembolso, $nrocuota){
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->where('nrocuota', $nrocuota);
		$result = $this->db->get('pago');
		return $result->row_array();
	}	
	function vistapagos($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$result = $this->db->get('vistapagos');
		return $result->result_array();
	}	
	function vistapagosnull($iddesembolso){//no pagados o montosmenores a la cuota
		$where = "iddesembolso='".$iddesembolso."' AND (montopagado<cuota OR montopagado IS NULL)"; 
		$this->db->where($where);
		$this->db->order_by('nrocuota','asc');
		$result = $this->db->get('vistapagos');
		return $result->result_array();
	}
	function vistasolicitdesembolsadoscc($codcliente){
		$where = "codcliente='".$codcliente."' AND (estado='APROBADO' OR (moradias-pagomora)>0)"; 
		$this->db->where($where);
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();
	}
	function listcreditosvigentesoconmora($dni){//lista creditos vigentes o con mora
		$where = "dni='".$dni."' AND (estado='APROBADO' OR (moradias-pagomora)>0)"; 
		$this->db->where($where);
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();
	}
	//NUEVO CREADO 24 DE FEBRERO DEL 2020
	function cantidaddevigentesoconmora($codcliente){//lista creditos vigentes o con mora
		$where = "codcliente='".$codcliente."' AND (estado='APROBADO' OR (mora)>0)"; //mora total restado menos lo que pago
		$this->db->where($where);
		return $this->db->count_all_results('resumendesembolsosypagos'); 
	}
	//hastaaqui
	function solvigentesoconmora($codcliente){//lista creditos vigentes o con mora
		$where = "codcliente='".$codcliente."' AND (estado='APROBADO' OR (moradias-pagomora)>0)"; 
		$this->db->where($where);
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();		
	}
	function sumdeudacredvigente($codcliente){//suma de saldos vigentes totales
			$where = "codcliente='".$codcliente."' AND (estado='APROBADO')"; 		
			$this->db->select_sum('saldo');
			$this->db->where($where);
			$result = $this->db->get('vistasolicitdesembolsados');
			$result = $result->row_array();
			return is_null($result['saldo']) ? 0 : $result['saldo'];
	}
	function sumdeudacredvigentedni($dni){//suma de saldos vigentes totales
			$where = "dni='".$dni."' AND (estado='APROBADO')"; 		
			$this->db->select_sum('saldo');
			$this->db->where($where);
			$result = $this->db->get('vistasolicitdesembolsados');
			$result = $result->row_array();
			return is_null($result['saldo']) ? 0 : $result['saldo'];
	}	
	function vistasolicitdesembolsadosapenom($apenom){
		$where = "apenom like '%".$apenom."%' AND (estado='APROBADO' OR ((moradias-pagomora)>0 and YEAR(fecha_hora)=2021) OR estado='CASTIGO')";
		$this->db->where($where);
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();
	}
	function vistasolicitdesembolsadostipoplazo($tipoplazo){
		$where = "tipoplazo like '%".$tipoplazo."%' AND (estado='APROBADO' OR (moradias-pagomora)>0)";
		$this->db->where($where);
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();
	}
	function vistasolicitdesembolsadostpag($tipoplazo, $agencia){//vistasolicitdesembolsadostipoplazo y agencia
		$where = "tipoplazo like '%".$tipoplazo."%' AND (estado='APROBADO' OR ((moradias-pagomora)>0) and YEAR(fecha_hora)=2021) and agencia = '".$agencia."'";
		$this->db->where($where);
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();
	}
	function vistasolicitudestpasesor($tipoplazo, $asesor){
		$where = "tipoplazo like '%".$tipoplazo."%' AND (estado='APROBADO' OR ((moradias-pagomora)>0 and YEAR(fecha_hora)=2021) and idasesor = '".$asesor."'";
		$this->db->where($where);
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();		
	}
	function vistasolicitudesxestado($estado){
		$where = "estado = '".$estado."' AND (moradias-pagomora)>0";
		$this->db->where($where);
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();		
	}	
	function desembolsosporasesoref($asesor){//desembolsados por asesor mensual
		$where = "idasesor = '".$asesor."'";
		$this->db->where($where);
		$result = $this->db->get('vistadesembolsoasesor');
		return $result->row_array();
	}
	function desembolsosef($fechainicio, $fechafinal){//desembolsados por asesor entrefecha
		$select = "count(idsolicitud) as cantidadsolic";
		$where = "fecha_hora >= '".$fechainicio." 00:00:00' AND fecha_hora <='".$fechafinal." 23:59:59'";
		$this->db->where($where);
		$this->db->group_by('idasesor');
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();
	}	
	function vistadesembolsossinpagos(){
		$this->db->order_by('fecha_hora', 'desc');
		$result = $this->db->get('vistadesembolsossinpagos');
		return $result->result_array();			
	}
	function vistadesembolsossinpagosagencia($agencia){
		$this->db->where('agencia', $agencia);
		$this->db->order_by('fecha_hora', 'desc');
		$result = $this->db->get('vistadesembolsossinpagos');
		return $result->result_array();			
	}	
	function vistasolicitdesembolsadosid($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso); //cambie a where antes era like
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->row_array();		
	}
	function vistasolicitdesembolsadosfecha($fecha){
		$where = "fecha_hora like '".$fecha."%' AND (estado='APROBADO' OR (moradias-pagomora)>0)";
		$this->db->where($where);
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();		
	}	
	function vistasolicitdesemboase($idasesor){
		$this->db->where('idasesor',$idasesor);
		$this->db->where('estado', 'APROBADO');
		$this->db->order_by('apenom asc, iddesembolso asc');
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();		
	}
	function vistasolicitdesemboaseapenom($idasesor, $apenom){
		$this->db->like('apenom', $apenom);
		$this->db->where('idasesor',$idasesor);
		$this->db->where('estado', 'APROBADO');
		$this->db->order_by('apenom');
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();		
	}	
	function vistacuotaspago($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->order_by('nrocuota', 'asc'); 
		$result = $this->db->get('vistacuotaspago');
		return $result->result_array();	
	}
	function montocuota($iddesembolso, $nro){
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->where('nrocuota', $nro);
		$result=$this->db->get('cuotapago');
		$result=$result->row_array();
		return $result['cuota'];
	}
	function getregcuotapago($iddesembolso, $nro){
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->where('nrocuota', $nro);
		$result=$this->db->get('cuotapago');
		return $result->row_array();
	}	
	function listacuotapago($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$result=$this->db->get('cuotapago');
		return $result->result_array();
	}
	function registrarpagos($data){
		$this->db->insert('pago', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function actualizarmontopago($iddesembolso, $nrocuota, $data){
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->where('nrocuota', $nrocuota);
		$this->db->update('pago', $data); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function actualizarmora($iddesembolso, $nrocuota,$mora){
		$data=array(
				'moradias' => $mora
			);		
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->where('nrocuota', $nrocuota);
		$this->db->update('pago', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function listapagomora($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$result = $this->db->get('pagomora');
		return $result->result_array();
	}
	function eliminarpagomora($idpagomora){
		$this->db->where('id', $idpagomora);
		$this->db->delete('pagomora'); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function solicitudaprobado($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result = $this->db->get('vistasolicitudesadesembolsar');
		return $result->row_array();		
	}
	function asesorsaldo(){
		$result= $this->db->get('asesorsaldo');
		return $result->result_array();
	}
	function asesorsaldoagencia($agencia){
		$this->db->where('estado', 'ACTIVO');
		$this->db->where('agencia', $agencia);
		$result= $this->db->get('asesorsaldo');
		return $result->result_array();
	}
	function costomora($monto){
		$this->db->where('montoinicial<=', $monto);
		$this->db->where('montofinal>=', $monto);	
		$result = $this->db->get('mora');
		$result = $result->row_array();
		return $result['costodiario'];
	}



//--------------------REPORTE GENERAL---------------------------
	function reportegeneral($fechainicio, $fechafinal, $estado, $asesor){
		$estado = $estado=='TODOS' ? '%' : $estado;
		$asesor = $asesor=='TODOS' ? '%' : $asesor;			
		$select = "iddesembolso, idsolicitud, fecha_hora, dni, apenom, apellidos, apellidos2, nombres, monto AS capital, (total - monto) AS interes, interes AS tasa, (monto/plazo) AS capitalporcuota, (total - monto)/plazo AS interesporcuota, totalpagado, (totalpagado*plazo)/total AS cantcuotasrealpagados, idasesor, estado, fechapagadocompleto, moradias AS mora, unidplazo, ultimafechadecuota, fechacuotadebe, ultimafechapago, costomora, pagomora";
		$where = "fecha_hora >= '".$fechainicio." 00:00:00' AND fecha_hora <='".$fechafinal." 23:59:59' AND estado LIKE '".$estado."' AND idasesor LIKE '".$asesor."' ";
		$this->db->select($select);
		$this->db->where($where);
		$this->db->order_by('apenom','asc');
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();
	}
	function reportegeneralapnom($apenom, $fechainicio, $fechafinal, $estado, $asesor){
		$select = "iddesembolso, idsolicitud, fecha_hora, dni, apenom, monto AS capital, (total - monto) AS interes, interes AS tasa, (monto/plazo) AS capitalporcuota, (total - monto)/plazo AS interesporcuota, totalpagado, (totalpagado*plazo)/total AS cantcuotasrealpagados, idasesor, estado, fechapagadocompleto, moradias AS mora, unidplazo, ultimafechadecuota, fechacuotadebe, ultimafechapago, costomora, pagomora";
   		$where="apenom like '%".$apenom."%' and fecha_hora >= '".$fechainicio." 00:00:00' AND fecha_hora<='".$fechafinal." 23:59:59' AND estado LIKE '".$estado."' AND idasesor LIKE '".$asesor."'"; 
  		$this->db->select($select);
  		$this->db->from('vistasolicitdesembolsados');
  		$this->db->where($where);
  		$this->db->order_by('apenom asc, idsolicitud asc');
		$result = $this->db->get();
		return $result->result_array();
	}
	function listareportegeneralagencia($fechainicio, $fechafinal, $estado, $asesor, $agencia){
		$estado = $estado=='TODOS' ? '%' : $estado;
		$asesor = $asesor=='TODOS' ? '%' : $asesor;	
		$agencia = $agencia=='TODOS' ? '%' : $agencia;			
		$select = "iddesembolso, idsolicitud, fecha_hora, dni, apenom, apellidos, apellidos2, nombres, monto AS capital, (total - monto) AS interes, interes AS tasa, (monto/plazo) AS capitalporcuota, (total-monto)/plazo AS interesporcuota, totalpagado, (totalpagado*plazo)/total AS cantcuotasrealpagados, idasesor, estado, fechapagadocompleto, moradias AS mora, unidplazo, ultimafechadecuota, fechacuotadebe, ultimafechapago, costomora, pagomora, negocio, celular, tipoplazo";
  		$where="fecha_hora >= '".$fechainicio." 00:00:00' AND fecha_hora <='".$fechafinal." 23:59:59' AND estado LIKE '".$estado."' AND idasesor LIKE '".$asesor."' and agencia like '".$agencia."'";
  		$this->db->select($select);
  		$this->db->from('vistasolicitdesembolsadoscuarentena');
  		$this->db->where($where);
  		$this->db->order_by('apenom asc, idsolicitud asc');
		$result = $this->db->get();
		return $result->result_array();

	}
//--------------------REPORTE FINANCIERO---------------------------
	function reportefinancieroentrefechas($fechainicio, $fechafinal, $estado, $asesor, $agencia){//todos los pagos sin importar fecha de desdembolso REPORTE FINANCIERO
		$estado = $estado=='TODOS' ? '%' : $estado;
		$asesor = $asesor=='TODOS' ? '%' : $asesor;
		$agencia = $agencia=='TODOS' ? '%' : $agencia;		
		$tabla2="(SELECT iddesembolso, 0 AS montopagado FROM desembolso WHERE fecha_hora >= '".$fechainicio." 00:00:00' AND fecha_hora <='".$fechafinal." 23:59:59' UNION SELECT iddesembolso, SUM(montopagado) AS montopagado FROM kardex WHERE fecha_hora_reg >= '".$fechainicio." 00:00:00' AND fecha_hora_reg<='".$fechafinal." 23:59:59'
GROUP BY iddesembolso) reporte";
		$tabla3="(SELECT iddesembolso, SUM(moradias) moradias FROM pago  WHERE pago.fecha_reg >= '".$fechainicio." 00:00:00' AND pago.fecha_reg<='".$fechafinal." 23:59:59' GROUP BY iddesembolso) AS p ";
		$tabla4="(SELECT iddesembolso, SUM(diasmora) AS pagodiasmora FROM pagomora WHERE fechahora_reg >= '".$fechainicio." 00:00:00' AND fechahora_reg<='".$fechafinal." 23:59:59' GROUP BY iddesembolso) AS pm";
		$where="vd.estado LIKE '%".$estado."%' AND vd.estado!='CASTIGO' AND vd.idasesor LIKE '%".$asesor."%' and vd.agencia like '".$agencia."'";
		$select="vd.iddesembolso, vd.idsolicitud, vd.fuenterecursos,vd.fechahoradesem AS fecha_hora, vd.dni, vd.apenom,vd.codcliente, vd.monto AS capital, 
(vd.total-vd.monto) AS interes, vd.interes AS tasa, (vd.monto/vd.plazo) AS capitalporcuota, 
(vd.total-vd.monto)/vd.plazo AS interesporcuota, SUM(reporte.montopagado), (SUM(reporte.montopagado)*vd.plazo)/vd.total AS cantcuotasrealpagados, 
vd.idasesor, vd.estado, p.moradias AS mora, vd.unidplazo, vd.costomora, pm.pagodiasmora AS pagomora, vd.plazo AS cantplazo, vd.total, 
(vd.total / vd.plazo) AS cuotareal, ((vd.monto / vd.plazo) * (SUM(reporte.montopagado) / (vd.total / vd.plazo))) AS capitalpagado, 
(((vd.total - vd.monto) / plazo) * (SUM(reporte.montopagado) / (vd.total / plazo))) AS interespagado, 
(vd.monto - COALESCE(((vd.monto / vd.plazo) * (SUM(reporte.montopagado) / (vd.total / vd.plazo))),0)) AS saldocapital, 
((vd.total - vd.monto) - COALESCE((((vd.total - vd.monto) / vd.plazo) * (SUM(reporte.montopagado) / (vd.total / vd.plazo))),0)) AS saldointeres, 
IF(vd.fechahoradesem< '".$fechainicio."', 0, IFNULL(svd.monto,0)) AS seguro, vd.agencia as agencia";
		$this->db->select($select);
  		$this->db->from('vistadesembolso as vd');
		$this->db->join($tabla2, 'vd.iddesembolso=reporte.iddesembolso');//kardex  		
		$this->db->join($tabla3, 'vd.iddesembolso=p.iddesembolso', 'left');//pago
		$this->db->join($tabla4, 'vd.iddesembolso=pm.iddesembolso', 'left');//pagomora
		$this->db->join('segurodesgravamen svd', 'svd.idsolicitud=vd.idsolicitud', 'LEFT');//segurodesgravamen
		$this->db->where($where);
		$this->db->order_by('apenom');
		$this->db->group_by('reporte.iddesembolso');	
		$result = $this->db->get();
		return $result->result_array();
	}
	function reportefinancieroentrefechascast($fechainicio, $fechafinal, $estado, $asesor, $agencia){//todos los pagos sin importar fecha de desdembolso REPORTE FINANCIERO
		$estado = $estado=='TODOS' ? '%' : $estado;
		$asesor = $asesor=='TODOS' ? '%' : $asesor;
		$agencia = $agencia=='TODOS' ? '%' : $agencia;		
		$tabla2="(SELECT iddesembolso, 0 AS montopagado FROM desembolso WHERE fecha_hora >= '".$fechainicio." 00:00:00' AND fecha_hora <='".$fechafinal." 23:59:59' UNION SELECT iddesembolso, SUM(montopagado) AS montopagado FROM kardex WHERE fecha_hora_reg >= '".$fechainicio." 00:00:00' AND fecha_hora_reg<='".$fechafinal." 23:59:59'
GROUP BY iddesembolso) reporte";
		$tabla3="(SELECT iddesembolso, SUM(moradias) moradias FROM pago  WHERE pago.fecha_reg >= '".$fechainicio." 00:00:00' AND pago.fecha_reg<='".$fechafinal." 23:59:59' GROUP BY iddesembolso) AS p ";
		$tabla4="(SELECT iddesembolso, SUM(diasmora) AS pagodiasmora FROM pagomora WHERE fechahora_reg >= '".$fechainicio." 00:00:00' AND fechahora_reg<='".$fechafinal." 23:59:59' GROUP BY iddesembolso) AS pm";
		$where="vd.estado LIKE '%".$estado."%' AND vd.idasesor LIKE '%".$asesor."%' and vd.agencia like '".$agencia."'";
		$select="vd.iddesembolso, vd.idsolicitud, vd.fuenterecursos,vd.fechahoradesem AS fecha_hora, vd.dni, vd.apenom,vd.codcliente, vd.monto AS capital, 
(vd.total-vd.monto) AS interes, vd.interes AS tasa, (vd.monto/vd.plazo) AS capitalporcuota, 
(vd.total-vd.monto)/vd.plazo AS interesporcuota, SUM(reporte.montopagado), (SUM(reporte.montopagado)*vd.plazo)/vd.total AS cantcuotasrealpagados, 
vd.idasesor, vd.estado, p.moradias AS mora, vd.unidplazo, vd.costomora, pm.pagodiasmora AS pagomora, vd.plazo AS cantplazo, vd.total, 
(vd.total / vd.plazo) AS cuotareal, ((vd.monto / vd.plazo) * (SUM(reporte.montopagado) / (vd.total / vd.plazo))) AS capitalpagado, 
(((vd.total - vd.monto) / plazo) * (SUM(reporte.montopagado) / (vd.total / plazo))) AS interespagado, 
(vd.monto - COALESCE(((vd.monto / vd.plazo) * (SUM(reporte.montopagado) / (vd.total / vd.plazo))),0)) AS saldocapital, 
((vd.total - vd.monto) - COALESCE((((vd.total - vd.monto) / vd.plazo) * (SUM(reporte.montopagado) / (vd.total / vd.plazo))),0)) AS saldointeres, 
IF(vd.fechahoradesem< '".$fechainicio."', 0, IFNULL(svd.monto,0)) AS seguro, vd.agencia as agencia";
		$this->db->select($select);
  		$this->db->from('vistadesembolso as vd');
		$this->db->join($tabla2, 'vd.iddesembolso=reporte.iddesembolso');//kardex  		
		$this->db->join($tabla3, 'vd.iddesembolso=p.iddesembolso', 'left');//pago
		$this->db->join($tabla4, 'vd.iddesembolso=pm.iddesembolso', 'left');//pagomora
		$this->db->join('segurodesgravamen svd', 'svd.idsolicitud=vd.idsolicitud', 'LEFT');//segurodesgravamen
		$this->db->where($where);
		$this->db->order_by('apenom');
		$this->db->group_by('reporte.iddesembolso');	
		$result = $this->db->get();
		return $result->result_array();
	}
	function reportefinancieroentrefechasparacomprobantes($fechainicio, $fechafinal, $estado, $asesor, $agencia){//todos los pagos sin importar fecha de desdembolso REPORTE FINANCIERO
		$estado = $estado=='TODOS' ? '%' : $estado;
		$asesor = $asesor=='TODOS' ? '%' : $asesor;
		$agencia = $agencia=='TODOS' ? '%' : $agencia;		
		$tabla2="(SELECT iddesembolso, 0 AS montopagado FROM desembolso WHERE fecha_hora >= '".$fechainicio." 00:00:00' AND fecha_hora <='".$fechafinal." 23:59:59' UNION SELECT iddesembolso, SUM(montopagado) AS montopagado FROM kardex WHERE fecha_hora_reg >= '".$fechainicio." 00:00:00' AND fecha_hora_reg<='".$fechafinal." 23:59:59'
GROUP BY iddesembolso) reporte";
		$tabla3="(SELECT iddesembolso, SUM(moradias) moradias FROM pago  WHERE pago.fecha_reg >= '".$fechainicio." 00:00:00' AND pago.fecha_reg<='".$fechafinal." 23:59:59' GROUP BY iddesembolso) AS p ";
		$tabla4="(SELECT iddesembolso, SUM(diasmora) AS pagodiasmora FROM pagomora WHERE fechahora_reg >= '".$fechainicio." 00:00:00' AND fechahora_reg<='".$fechafinal." 23:59:59' GROUP BY iddesembolso) AS pm";
		$where="vd.estado LIKE '%".$estado."%' AND vd.idasesor LIKE '%".$asesor."%' and vd.agencia like '".$agencia."'";
		$select="vd.idsolicitud, vd.dni, vd.apenom,vd.codcliente, (((vd.total - vd.monto) / plazo) * (SUM(reporte.montopagado) / (vd.total / plazo))) AS interespagado, vd.agencia as agencia, vp.direccion";
		$this->db->select($select);
  		$this->db->from('vistadesembolso as vd');
		$this->db->join($tabla2, 'vd.iddesembolso=reporte.iddesembolso');//kardex  		
		$this->db->join($tabla3, 'vd.iddesembolso=p.iddesembolso', 'left');//pago
		$this->db->join($tabla4, 'vd.iddesembolso=pm.iddesembolso', 'left');//pagomora
		$this->db->join('segurodesgravamen svd', 'svd.idsolicitud=vd.idsolicitud', 'LEFT');//segurodesgravamen
		$this->db->join('vistapersona vp', 'vp.dni=vd.dni');//vista persona
		$this->db->where($where);
		$this->db->order_by('apenom');
		$this->db->group_by('reporte.iddesembolso');	
		$result = $this->db->get();
		return $result->result_array();
	}



//----------------------------------------------------------------
	function logroporasesor($asesor){
		$select = "idsolicitud, codcliente, fecha, idasesor, agencia, estado, dni, apenom, (monto/plazo) AS capitalporcuota, 
		(monto - COALESCE(((monto / plazo) * (totalpagado / (total / plazo))),0)) AS saldocapital,
		saldo, totalpagado, ultimafechapago, fechapagadocompleto, ultimafechadecuota, moradias, pagomora, fechacuotadebe, unidplazo";
		$this->db->select($select);
		$this->db->where('estado', 'APROBADO');
		$this->db->where('idasesor', $asesor);	
		$result = $this->db->get('vistasolicitdesembolsados');
		return $result->result_array();
	}

	function reportecartera($idasesor, $estado){
		$this->db->select_sum('saldocapital');
		if($idasesor!='TODOS'){
			$this->db->where('idasesor', $idasesor);
		}
		if($estado!='TODOS'){
			$this->db->where('estado', $estado);
		}
		$result = $this->db->get('reportecartera');
		$result = $result->row_array();
		return $result['saldocapital'];
	}
	function reportecarterafechapago($fechainicio, $fechafinal, $estado, $asesor){
		$estado = $estado=='TODOS' ? '%' : $estado;
		$asesor = $asesor=='TODOS' ? '%' : $asesor;
		$consulta="SELECT SUM(vistasolicitdesembolsados.monto) AS capital, SUM(vistasolicitdesembolsados.monto - COALESCE(((vistasolicitdesembolsados.monto / vistasolicitdesembolsados.plazo) * (p.totalpagado / (vistasolicitdesembolsados.total / vistasolicitdesembolsados.plazo))),0)) AS saldocapital FROM vistasolicitdesembolsados LEFT JOIN (SELECT iddesembolso, SUM(montopagado) totalpagado, SUM(moradias) moradias FROM pago WHERE pago.fecha_reg >= '".$fechainicio." 00:00:00' AND pago.fecha_reg<='".$fechafinal." 23:59:59' GROUP BY iddesembolso ) AS p ON vistasolicitdesembolsados.iddesembolso=p.iddesembolso WHERE idasesor like '".$asesor."' and estado like '".$estado."'";
		$result = $this->db->query($consulta);
		$result = $result->row_array();
		return $result['saldocapital'];
	}
	function reportmora1a8_fp($fechainicio, $fechafinal, $estado, $idasesor){
		$estado = $estado=='TODOS' ? '%' : $estado;
		$idasesor = $idasesor=='TODOS' ? '%' : $idasesor;
		$consulta = "SELECT SUM((SELECT mora.costodiario FROM mora WHERE ((mora.montoinicial <= vistasolicitdesembolsados.monto) AND (mora.montofinal >= vistasolicitdesembolsados.monto)) LIMIT 1)*p.moradias) AS totmora FROM vistasolicitdesembolsados JOIN (SELECT iddesembolso, SUM(moradias) moradias FROM pago WHERE pago.fecha_reg >= '".$fechainicio." 00:00:00'	AND pago.fecha_reg<='".$fechafinal." 23:59:59' GROUP BY iddesembolso) AS p ON vistasolicitdesembolsados.iddesembolso = p.iddesembolso WHERE idasesor LIKE '".$idasesor."' AND estado = '".$estado."' AND p.moradias BETWEEN 1 AND 8";
		$result = $this->db->query($consulta);
		$result = $result->row_array();
		return $result['totmora'];
	}
	function sumreportmora9a15($idasesor, $estado){
		if($estado != 'TODOS'){
			$this->db->where('estado', $estado);
		}
		if($idasesor!='TODOS'){
			$this->db->where('idasesor', $idasesor);
		}
		$this->db->where("mora BETWEEN 9 AND 15");
		$this->db->select('sum(costomora*mora) as totalmora');
		$result = $this->db->get('reportegeneral');
		$result = $result->row_array();
		return $result['totalmora'];
	}
	function reportmora9a15_fp($fechainicio, $fechafinal, $estado, $idasesor){
		$estado = $estado=='TODOS' ? '%' : $estado;
		$idasesor = $idasesor=='TODOS' ? '%' : $idasesor;
		$consulta = "SELECT SUM((SELECT mora.costodiario FROM mora WHERE ((mora.montoinicial <= vistasolicitdesembolsados.monto) AND (mora.montofinal >= vistasolicitdesembolsados.monto)) LIMIT 1)*p.moradias) AS totmora FROM vistasolicitdesembolsados JOIN (SELECT iddesembolso, SUM(moradias) moradias FROM pago WHERE pago.fecha_reg >= '".$fechainicio." 00:00:00'	AND pago.fecha_reg<='".$fechafinal." 23:59:59' GROUP BY iddesembolso) AS p ON vistasolicitdesembolsados.iddesembolso = p.iddesembolso WHERE idasesor LIKE '".$idasesor."' AND estado = '".$estado."' AND p.moradias BETWEEN 9 AND 15";
		$result = $this->db->query($consulta);
		$result = $result->row_array();
		return $result['totmora'];
	}
	function sumreportmora16a30($idasesor, $estado){
		if($estado != 'TODOS'){
			$this->db->where('estado', $estado);
		}
		if($idasesor!='TODOS'){
			$this->db->where('idasesor', $idasesor);
		}
		$this->db->where("mora BETWEEN 16 AND 30");
		$this->db->select('sum(costomora*mora) as totalmora');
		$result = $this->db->get('reportegeneral');
		$result = $result->row_array();
		return $result['totalmora'];
	}
	function reportmora16a30_fp($fechainicio, $fechafinal, $estado, $idasesor){
		$estado = $estado=='TODOS' ? '%' : $estado;
		$idasesor = $idasesor=='TODOS' ? '%' : $idasesor;
		$consulta = "SELECT SUM((SELECT mora.costodiario FROM mora WHERE ((mora.montoinicial <= vistasolicitdesembolsados.monto) AND (mora.montofinal >= vistasolicitdesembolsados.monto)) LIMIT 1)*p.moradias) AS totmora FROM vistasolicitdesembolsados JOIN (SELECT iddesembolso, SUM(moradias) moradias FROM pago WHERE pago.fecha_reg >= '".$fechainicio." 00:00:00'	AND pago.fecha_reg<='".$fechafinal." 23:59:59' GROUP BY iddesembolso) AS p ON vistasolicitdesembolsados.iddesembolso = p.iddesembolso WHERE idasesor LIKE '".$idasesor."' AND estado = '".$estado."' AND p.moradias BETWEEN 16 AND 30";
		$result = $this->db->query($consulta);
		$result = $result->row_array();
		return $result['totmora'];
	}	
	function sumreportmora31a45($idasesor, $estado){
		if($estado != 'TODOS'){
			$this->db->where('estado', $estado);
		}
		if($idasesor!='TODOS'){
			$this->db->where('idasesor', $idasesor);
		}
		$this->db->where("mora BETWEEN 31 AND 45");
		$this->db->select('sum(costomora*mora) as totalmora');
		$result = $this->db->get('reportegeneral');
		$result = $result->row_array();
		return $result['totalmora'];
	}
	function reportmora31a45_fp($fechainicio, $fechafinal, $estado, $idasesor){
		$estado = $estado=='TODOS' ? '%' : $estado;
		$idasesor = $idasesor=='TODOS' ? '%' : $idasesor;
		$consulta = "SELECT SUM((SELECT mora.costodiario FROM mora WHERE ((mora.montoinicial <= vistasolicitdesembolsados.monto) AND (mora.montofinal >= vistasolicitdesembolsados.monto)) LIMIT 1)*p.moradias) AS totmora FROM vistasolicitdesembolsados JOIN (SELECT iddesembolso, SUM(moradias) moradias FROM pago WHERE pago.fecha_reg >= '".$fechainicio." 00:00:00'	AND pago.fecha_reg<='".$fechafinal." 23:59:59' GROUP BY iddesembolso) AS p ON vistasolicitdesembolsados.iddesembolso = p.iddesembolso WHERE idasesor LIKE '".$idasesor."' AND estado = '".$estado."' AND p.moradias BETWEEN 31 AND 45";
		$result = $this->db->query($consulta);
		$result = $result->row_array();
		return $result['totmora'];
	}	
	function sumreportmora46amas($idasesor, $estado){
		if($estado != 'TODOS'){
			$this->db->where('estado', $estado);
		}
		if($idasesor!='TODOS'){
			$this->db->where('idasesor', $idasesor);
		}
		$this->db->where("mora >= 46");
		$this->db->select('sum(costomora*mora) as totalmora');
		$result = $this->db->get('reportegeneral');
		$result = $result->row_array();
		return $result['totalmora'];
	}
	function sumreportmetasmora($idasesor, $estado){
		$estado = $estado=='TODOS' ? '%' : $estado;
		$idasesor = $idasesor=='TODOS' ? '%' : $idasesor;
		$query = "SELECT SUM(IF (mora BETWEEN 1 AND 8, costomora*mora, 0)) reportmora1a8, SUM(IF (mora BETWEEN 9 AND 15, costomora*mora, 0)) reportmora9a15, SUM(IF (mora BETWEEN 16 AND 30, costomora*mora, 0)) reportmora16a30, SUM(IF (mora BETWEEN 31 AND 45, costomora*mora, 0)) reportmora31a45, SUM(IF (mora >=46, costomora*mora, 0)) reportmora46amas FROM reportegeneral WHERE estado like '".$estado."' and idasesor LIKE '".$idasesor."'";
		$result = $this->db->query($query);
		return $result->row_array();
	}
	function metaasesor($tipo, $codasesor){//logro o meta
		$this->db->where('tipo', $tipo);
		$this->db->where('codasesor', $codasesor);		
		$this->db->order_by('fecharegistro', 'desc');
		$result = $this->db->get('metaasesor');
		return $result->row_array();
	}
	function reportmora($idasesor, $estado){
		if($estado != 'TODOS'){
			$this->db->where('estado', $estado);
		}
		if($idasesor!='TODOS'){
			$this->db->where('idasesor', $idasesor);
		}
		$result = $this->db->get('vistasolicitdesembolsados');
		// $result = $this->db->get('reportegeneral');		
		return $result->result_array();
	}
	function saldototalvigentes($agencia, $fuenterecursos){
		$this->db->select_sum('saldo');
		$this->db->where('agencia', $agencia);
		$this->db->where('fuenterecursos', $fuenterecursos);
		$result = $this->db->get('vistasolicitdesembolsados');
		$result = $result->row_array();
		return $result['saldo'];
	}



	function reportmora46amas_fp($fechainicio, $fechafinal, $estado, $idasesor){
		$estado = $estado=='TODOS' ? '%' : $estado;
		$idasesor = $idasesor=='TODOS' ? '%' : $idasesor;
		$consulta = "SELECT SUM((SELECT mora.costodiario FROM mora WHERE ((mora.montoinicial <= vistasolicitdesembolsados.monto) AND (mora.montofinal >= vistasolicitdesembolsados.monto)) LIMIT 1)*p.moradias) AS totmora FROM vistasolicitdesembolsados JOIN (SELECT iddesembolso, SUM(moradias) moradias FROM pago WHERE pago.fecha_reg >= '".$fechainicio." 00:00:00'	AND pago.fecha_reg<='".$fechafinal." 23:59:59' GROUP BY iddesembolso) AS p ON vistasolicitdesembolsados.iddesembolso = p.iddesembolso WHERE idasesor LIKE '".$idasesor."' AND estado = '".$estado."' AND p.moradias >= 46";
		$result = $this->db->query($consulta);
		$result = $result->row_array();
		return $result['totmora'];
	}
	function reporteclientes2($idasesor, $estado){
		if($estado != 'TODOS'){
			$this->db->where('estado', $estado);
		}
		if($idasesor!='TODOS'){
			$this->db->where('idasesor', $idasesor);
		}
		return $this->db->count_all_results('reporteclientes2'); 
	}
	function reporteclientes3($fechainicio, $fechafinal, $estado, $asesor){
		$estado = $estado=='TODOS' ? '%' : $estado;
		$asesor = $asesor=='TODOS' ? '%' : $asesor;
		$consulta="SELECT dni, apenom,SUM(vistasolicitdesembolsados.total) AS total, SUM(vistasolicitdesembolsados.totalpagado) AS totalpagado, COUNT(vistasolicitdesembolsados.iddesembolso) AS solicitudvigentes FROM vistasolicitdesembolsados LEFT JOIN (SELECT iddesembolso, SUM(montopagado) totalpagado, SUM(moradias) moradias FROM pago WHERE pago.fecha_reg >= '".$fechainicio." 00:00:00' AND pago.fecha_reg<='".$fechafinal." 23:59:59' GROUP BY iddesembolso ) AS p ON vistasolicitdesembolsados.iddesembolso= p.iddesembolso WHERE idasesor LIKE '".$asesor."' AND estado LIKE '".$estado."' GROUP BY dni";
		$result = $this->db->query($consulta);
		return $result->num_rows();
	}
	function obtenersolicitud($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$result = $this->db->get('desembolso');
		return $result->row_array();
	}
	function regpagocuotas($data){
		$this->db->insert('kardex', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	function registrarpagocampo($data){
		$this->db->insert('kardex_previo', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}		
	}
	function listaregistros_pagocampo($idasesor){
		$select = "kardex_previo.id, kardex_previo.iddesembolso, kardex_previo.montopagado, kardex_previo.idusuario, vistadesembolso.apenom as cliente, kardex_previo.fecha_hora_reg";
		$this->db->select($select);
  		$this->db->from('kardex_previo');
		$this->db->join('vistadesembolso', 'kardex_previo.iddesembolso=vistadesembolso.iddesembolso');	
		$this->db->where('idusuario', $idasesor);
		$this->db->order_by('cliente');
		$result = $this->db->get();
		return $result->result_array();
	}
	function eliminarpagocampo($id){
		$this->db->where('id', $id);
		$this->db->delete('kardex_previo');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}		
	}

	function maxcodigopagocuotas($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->select_max('id');
		$result = $this->db->get('kardex');
		$result = $result->row_array();
		return (is_null($result['id']) ? 0 : $result['id']);
	}
	function obtenerpagocuotas(){
		$result=$this->db->get('kardex');
		return $result->result_array();
	}
	function obtenerpagocuotasdesem($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->order_by('id', 'asc');
		$result = $this->db->get('kardex');
		return $result->result_array();
	}
	function vistakardexpagosusuario($idusuario){//hoy
		$this->db->where('idusuario', $idusuario);
		$this->db->order_by('apenom asc, iddesembolso asc');
		$result=$this->db->get('vistakardexpagos');
		return $result->result_array();
	}
	function vistakardexpagosusuariofech($idusuario, $fecha){
		$this->db->where('idusuario', $idusuario);		
		$this->db->like('fecha_hora_reg', $fecha, 'after');
		$result = $this->db->get('vistapagosdetasesor');//vista lo que pago el asesor segun kardex
		return $result->result_array();
	}
	function vistakardexpagosiddesembolso($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$result = $this->db->get('vistakardexpagos2');
		return $result->result_array();
	}
	function vistakardexpagosiddesembolso2($iddesembolso){//ultimo registro
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->order_by('idkardex', 'desc');
		$result = $this->db->get('vistakardexpagos2');
		return $result->row_array();
	}
	function vistakardexentrefechastu($fechainicio, $fechafinal, $tipoplazo, $usuario){
		$where = "fecha_hora_reg >= '".$fechainicio." 00:00:00' AND fecha_hora_reg <='".$fechafinal." 23:59:59'";
		$this->db->where($where);
		if($tipoplazo!='TODOS'){
			$this->db->where('tipoplazo', $tipoplazo);
		}
		if($usuario!='TODOS'){
			$this->db->where('idusuario', $usuario);
		}
		$this->db->order_by('apenom', 'asc');
		$result = $this->db->get('vistakardexpagos2');
		return $result->result_array();
	}
	function vistakardexfapenom($fechainicio, $fechafinal, $apenom){
		$where = "fecha_hora_reg >= '".$fechainicio." 00:00:00' AND fecha_hora_reg <='".$fechafinal." 23:59:59'";
		$this->db->where($where);
		$this->db->like('apenom', $apenom);
		$this->db->order_by('apenom', 'asc');
		$result = $this->db->get('vistakardexpagos2');
		return $result->result_array();	
	}
	function actualizarsaldoasesor($idusuario, $data){
		$this->db->where('codusuario', $idusuario);
		$this->db->order_by('id', 'DESC');
		$this->db->update('pagoasesorc', $data); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function actualizarsaldoasesor2($idusuario, $tipopago, $data){//por usuario y tipopagos credito o ahorros
		$this->db->where('codusuario', $idusuario);
		$this->db->where('tipo_pagos', $tipopago);		
		$this->db->order_by('id', 'DESC');
		$this->db->update('pagoasesorc', $data); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}	
	function eliminardesembolso($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso); 
		$this->db->delete('desembolso');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}		
	}
	function eliminarregcuotaapagar($idsolicitud, $idsolicitudreg){
		$this->db->where('idsolicitud', $idsolicitud); 
		$this->db->where('idsolicitudreg', $idsolicitudreg); 
		$this->db->delete('creditosacancelar');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}		
	}
	function eliminartodregcuotaapagar($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud); 
		$this->db->delete('creditosacancelar');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}		
	}	
	function obtenerregevaluacion($idsolicitud){
		$this->db->where('idsolicitud', $idsolicitud);
		$result=$this->db->get('evaluacion');
		return $result->row_array();
	}
	function registrarpagomora($data){
		$this->db->insert('pagomora', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function ultimoregistropagomora($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->order_by('id', 'desc');
		$result=$this->db->get('pagomora');
		return $result->row_array();
	}
	function registrohoypagomora($iddesembolso){
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->like('fechahora_reg', date('Y-m-d'));
		$this->db->order_by('id', 'desc');
		$result=$this->db->get('pagomora');
		return $result->row_array();		
	}
	function registrarmeta($data){
		$this->db->insert('metaasesor', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}	
	function diasmora($iddesembolso){//TOTAL DE DIAS DE MORA de las cuotas pagadas
		$this->db->where('iddesembolso', $iddesembolso);
		$result=$this->db->get('vistapagospordesembolso',1);
		$result=$result->row_array();
		return $result['moradias'];
	}
	function ultimacuotadebida($iddesembolso){//ya sea null o menor a la cuota
		$where="(montopagado IS NULL OR montopagado< cuota) AND iddesembolso='".$iddesembolso."'";
		$this->db->where($where);
		$this->db->order_by('nrocuota', 'asc');
		$result=$this->db->get('vistapagos', 1);
		return $result->row_array();
	}	
	function ultimacuotapagadaconmora($iddesembolso){
		$this->db->where('moradias>0');
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->order_by('nrocuota', 'desc');
		$result=$this->db->get('vistapagos', 1);
		return $result->row_array();
	}
	function ultimacuotareg($iddesembolso){//ultimo registro
		$where = "iddesembolso = '".$iddesembolso."'";
		$this->db->where($where);
		$this->db->order_by('nrocuota', 'desc');
		$result=$this->db->get('vistapagos', 1);
		return $result->row_array();

	}

	function ultimacuotapagadacompleto($iddesembolso){
		$this->db->where('montopagado=cuota');
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->order_by('nrocuota', 'desc');
		$result=$this->db->get('vistapagos', 1);
		return $result->row_array();
	}
	function tienedeudasmora($iddesembolso){//hasta la ultima cuota pagada
		$where='moradias=pagomora';
		$this->db->where($where);
		$result=$this->db->get('vistasolicitdesembolsados');
		if($result->num_rows()>0){
			return false; //no tiene deudas
		}else{
			return true; //si tiene deudas
		}
	}
	function nrocuotasquedebe($iddesembolso){//incluye la cuota que se pago un monto menor al que debe ser
		$where="iddesembolso='".$iddesembolso."' AND (montopagado<cuota OR montopagado IS NULL)";
		$this->db->select('count(nrocuota) as nrocuotas');
		$this->db->where($where);
		$result=$this->db->get('vistapagos');
		$result = $result->row_array();
		return $result['nrocuotas'];
	}
	function totaldeudaporcantcuotas($iddesembolso, $nrocuotas, $mincuota){
		$ultimonrocuota=$nrocuotas+$mincuota;
		$where="iddesembolso='".$iddesembolso."' AND nrocuota < ". $ultimonrocuota ." AND (montopagado<cuota OR montopagado IS NULL)";
		$this->db->select_sum('resta');
		$this->db->where($where);
		$result=$this->db->get('vistapagos');
		$result = $result->row_array();
		return $result['resta'];
	}
	function eliminarpagokardex($iddesembolso, $idkardex){
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->where('id', $idkardex);
		$this->db->delete('kardex');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function eliminarpago($iddesembolso, $nrocuota){
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->where('nrocuota', $nrocuota);
		$this->db->delete('pago');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}			
	}
	function obtenerkardex($iddesembolso, $id){
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->where('id', $id);
		$result=$this->db->get('kardex');		
		return $result->row_array();
	}
	function obtenerkardexvista($iddesembolso, $id){
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->where('idkardex', $id);
		$result=$this->db->get('vistakardexpagos2');		
		return $result->row_array();
	}	
	function pagohoy($iddesembolso, $idusuario){//SI SE PAGO HOY ALGUNA CUOTA
		$this->db->where('iddesembolso', $iddesembolso);
		$this->db->like('fecha_hora_reg', date('Y-m-d'));
		$this->db->where('idusuario', $idusuario);
		$result = $this->db->get('kardex');
		$result = $result->row_array();
		if(is_null($result)){
			return false;
		}else{
			return $result['montopagado'];			
		}
	}
	function ultimafechalogros($agencia){
		$this->db->where('agencia', $agencia);
		$this->db->where('tipo', 'LOGRO');
		$this->db->order_by('fecharegistro', 'desc');
		$this->db->limit(1);
		$result = $this->db->get('vistametaasesor');
		$result = $result->row_array();
		return $result['fecharegistro'];
	}
}

/* End of file operaciones_model.php */
/* Location: ./application/models/operaciones_model.php */