<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function clientes_inscritos(){
		$this->db->where('estado','INSCRITO');
		$resultado = $this->db->get('clientes');//vista clientes
		return $resultado->result_array();
	}
	public function lista_clientes(){
		$this->db->order_by('fecha_registro', 'desc');
		$resultado = $this->db->get('clientes');//vista clientes
		return $resultado->result_array();		
	}
	public function lista_clientestipo($tipo){
		$this->db->where('tipo', $tipo);
		$this->db->order_by('fecha_registro', 'desc');
		$resultado = $this->db->get('clientes');//vista clientes
		return $resultado->result_array();		
	}	
	public function lista_clientesahorro($agencia){
		$this->db->where('agencia', $agencia);
		$this->db->where('tipo', 'AHORROS');
		$this->db->order_by('fecha_registro', 'desc');
		$resultado = $this->db->get('clientes');//vista clientes
		return $resultado->result_array();		
	}
	public function lista_clientesahorroasesor($idasesor){
		$this->db->where('idusuario', $idasesor);
		$this->db->where('tipo', 'AHORROS');
		$this->db->order_by('apenom', 'asc');
		$resultado = $this->db->get('clientes');//vista clientes
		return $resultado->result_array();		
	}
	public function lista_clientesagencia($agencia){
		$this->db->where('agencia', $agencia);
		$this->db->where('tipo', 'CREDITO');	
		$this->db->order_by('fecha_registro', 'desc');
		$resultado = $this->db->get('clientes');//vista clientes
		return $resultado->result_array();		
	}
	public function lista_clientesagencialike($agencia){
		$this->db->where('tipo', 'CREDITO');
		$this->db->or_like('agencia', $agencia);
		$this->db->order_by('fecha_registro', 'desc');
		$resultado = $this->db->get('clientes');//vista clientes
		return $resultado->result_array();		
	}	
	public function lista_clientesestado($estado){
		$this->db->where('estado', $estado);
		$this->db->order_by('fecha_registro', 'desc');
		$resultado = $this->db->get('clientes');//vista clientes
		return $resultado->result_array();		
	}		
	public function lista_clientesxasesor($idusuario){
		$this->db->where('idusuario', $idusuario);
		$this->db->where('tipo', 'CREDITO');	
		$this->db->order_by('apenom', 'asc');	
		$resultado = $this->db->get('clientes');//vista clientes
		return $resultado->result_array();		
	}

	public function clientesapenom_agencia($agencia, $apenom){
		$this->db->like('apenom', $apenom);
		$this->db->where('tipo', 'CREDITO');	
		$this->db->where('agencia', $agencia);
		$this->db->order_by('apenom', 'asc');	
		$resultado = $this->db->get('clientes');//vista clientes
		return $resultado->result_array();		
	}	
	public function lista_clientesxasesor_apenom($idusuario, $apenom){
		$this->db->like('apenom', $apenom);
		$this->db->where('tipo', 'CREDITO');	
		$this->db->where('idusuario', $idusuario);
		$this->db->order_by('apenom', 'asc');	
		$resultado = $this->db->get('clientes');//vista clientes
		return $resultado->result_array();		
	}	
	public function lista_clientesxasesoresta($idusuario, $estado){
		$this->db->where('idusuario', $idusuario);
		$this->db->where('estado', $estado);
		$this->db->where('tipo', 'CREDITO');		
		//$this->db->order_by('fecha_registro', 'desc');
		$this->db->order_by('apenom', 'asc');		
		$resultado = $this->db->get('clientes');//vista clientes
		return $resultado->result_array();		
	}	
	public function lista_clientesxasesorinscri($idusuario){
		$this->db->where('idusuario', $idusuario);
		$this->db->where('estado', 'INSCRITO');
		$this->db->order_by('fecha_registro', 'desc');
		$resultado = $this->db->get('clientes');
		return $resultado->result_array();
	}
	function buscarclientecodcliente($codcliente){
		$this->db->where('codcliente', $codcliente);		
		$result = $this->db->get('clientes', 1);
		return $result->row_array();
	}
	function buscarclientedni($dni){
		$this->db->where('dni', $dni);		
		$result = $this->db->get('clientes', 1);
		return $result->row_array();
	}
	function existecliente($dni, $tipo){
		$this->db->where('dni', $dni);
		$this->db->where('tipo', $tipo);		
		$resultado = $this->db->get('clientes');
		if($resultado->num_rows()){
			return true;
		}else{
			return false;
		}
	}
	function existeaval($codcliente, $dniaval){
		$this->db->where('codcliente', $codcliente);
		$this->db->where('dniaval', $dniaval);		
		$resultado = $this->db->get('vistaaval');
		if($resultado->num_rows()){
			return true;
		}else{
			return false;
		}		
	}
	function tieneaval($codcliente){
		$this->db->where('codcliente', $codcliente);
		$resultado = $this->db->get('aval');
		if($resultado->num_rows()){
			return true;
		}else{
			return false;
		}			
	}
	function reporteclientes($fecharegini, $fecharegfin, $estado, $asesor){
		$where = "fecha_registro >= '".$fecharegini." 00:00:00' AND fecha_registro <='".$fecharegfin." 23:59:59'";
		$this->db->where($where);
		if($estado!='TODOS'){
			$this->db->where('estado', $estado);
		}
		if($asesor!='TODOS'){
			$this->db->where('idasesor', $asesor);
		}
		$this->db->order_by('apenom');
		$result=$this->db->get('reporteclientes');
		return $result->result_array();	

	}
	function eliminaraval($codcliente){
		$this->db->where('codcliente', $codcliente);
		$this->db->delete('aval');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function buscarclientecodordni($dni, $codcliente){
		$this->db->where('dni', $dni);		
		$this->db->or_where('codcliente', $codcliente);
		$result = $this->db->get('clientes', 1);
		return $result->row_array();
	}	
	function buscarclienteapenom($apenom, $tipo){
		$this->db->where('tipo', $tipo);
		$this->db->like('apenom', $apenom, 'match');
		$result = $this->db->get('clientes', 1);
		return $result->row_array();
	}	
	public function registrar($data){
		$this->db->insert('cliente', $data);
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	public function obtener_cliente($codcliente){
		$this->db->where('codcliente',$codcliente);
		$resultado = $this->db->get('clientes',1);//vista clientes
		return $resultado->row_array();
	}
	function actualizarestcivilc($dni, $estado){
		$data = array(
				'estadocivil' => $estado  
			); 
		$this->db->where('dni', $dni); 
		$this->db->update('persona', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	public function obtener_clientedni($dni){
		$this->db->where('dni',$dni);
		$resultado = $this->db->get('clientes',1);//vista clientes
		return $resultado->row_array();
	}	
	public function poseeconyugue($dni){
		$this->db->where('dni',$dni);
		$resultado = $this->db->get('conyugue',1);
		if($resultado->num_rows()>0){
			return 'Si Posee';
		}else{
			return 'No Posee';
		}
	}

	function existeconyugue($dni){//si tiene conyugue
		$this->db->where('dni',$dni);
		$resultado = $this->db->get('conyugue',1);
		if($resultado->num_rows()>0){
			return true;
		}else{
			return false;
		}		
	}
	function existeconyugue2($dni, $dniconyugue){
		$this->db->where('dni',$dni);
		$this->db->where('dniconyugue',$dniconyugue);		
		$resultado = $this->db->get('conyugue',1);
		if($resultado->num_rows()>0){
			return true;
		}else{
			return false;
		}		
	}	
	public function getnamenegociocliente($codcliente){
		$this->db->where('codcliente',$codcliente);
		$resultado = $this->db->get('negocio',1);
		if($resultado->num_rows()>0){
			$resultado=$resultado->row_array();
			return $resultado['actividad'].' '.$resultado['actividad_espec'];
		}else{
			return 'No Posee';
		}
	}
	function obtenernegocio($codcliente){
		$this->db->where('codcliente',$codcliente);
		$resultado = $this->db->get('vistanegocio',1);
		return $resultado->row_array();
	}

	function listanegocios($codcliente){
		$this->db->where('codcliente',$codcliente);
		$resultado = $this->db->get('vistanegocio',1);
		return $resultado->result_array();	
	}
	public function maximocodigo(){
		$this->db->select_max('codcliente');
		$query = $this->db->get('cliente');
		$row = $query->row_array();
		$result = $row['codcliente'];
		if(is_null($result)){
			$result=0;
		}
		return $result;
	}
	public function regconyugue($data){
		$this->db->insert('conyugue', $data);
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	public function eliminarconyugue($dni){
		$this->db->where('dni', $dni);
		$this->db->delete('conyugue');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}		
	}
	public function regaval($data){
		$this->db->insert('aval', $data);
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	public function cambiarestadocliente($nuevestado, $codcliente){
		$data = array(
				'estado' => $nuevestado  
			); 
		$this->db->where('codcliente', $codcliente); 
		$this->db->update('cliente', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function actualizacliente($dni, $data){
		$this->db->where('dni', $dni); 
		$this->db->update('cliente', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}		
	}
	function actualizarclientecod($codcliente, $data){
		$this->db->where('codcliente', $codcliente); 
		$this->db->update('cliente', $data); 
		if	($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function obteneraval($codcliente){
		$this->db->where('codcliente', $codcliente);
		$resultado = $this->db->get('vistaaval',1);
		return $resultado->row_array();
	}
	function obteneravaltb($codcliente){
		$this->db->where('codcliente', $codcliente);
		$resultado = $this->db->get('aval',1);
		return $resultado->row_array();
	}	
	function actualizarpersona($dni, $data){
		$this->db->where('dni', $dni); 
		$this->db->update('persona', $data); 
		if($this->db->affected_rows()>=0){
			return true;
		}else{
			return false;
		}			
	}
	function actaulizaraval($codcliente, $data){
		$this->db->where('codcliente', $codcliente); 
		$this->db->update('aval', $data); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}			
	}	
	function eliminarcliente($codcliente){
		$this->db->where('codcliente', $codcliente);
		$this->db->delete('cliente');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function listaclientetabla(){
	$consulta="SELECT persona.dni, apellidos, apellidos2,nombres,fecha_nac,distrito_nac,sexo, celular, email, ruc, estadocivil, 
profesion, nacionalidad, grado_instr, tipotrabajador, ocupacion, institucion_lab, conyugue.dniconyugue
FROM persona LEFT JOIN conyugue ON persona.dni=conyugue.dni";
		$result = $this->db->query($consulta);
		$result = $result->result_array();
		return $result;
	}
	function ejecutarconsultavarios($consulta){
		$result = $this->db->query($consulta);
		$result = $result->result_array();
		return $result;
	}

}

/* End of file cliente_model.php */
/* Location: ./application/models/cliente_model.php */