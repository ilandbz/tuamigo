<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {
	public $variable;
	public function __construct(){
		parent::__construct();
	}
	function validar_usuario(){
		$user = $this->input->post('usuario');
		$clave = $this->input->post('clave');
		$where = "codusuario = '".$user."' AND clave=SUBSTRING(SHA1('".$clave."'),1,21) and estado='ACTIVO'";
		$this->db->where($where);
		$query=$this->db->get('usuario');
		if($query->num_rows()>0){
			$fila=$query->row_array();
			$agencia = $this->input->post('agencia');
			if(($fila['tipo']>=5 && $fila['tipo']!=7) || $fila['tipo']==2 || $fila['tipo']==4){//por agencia
				if($fila['agencia']!=$agencia){
					//echo 'NO PERTENECE A LA AGENCIA';
					return FALSE;
				}
			}
			$this->session->set_userdata('agencia',$agencia);
			$this->session->set_userdata('idusuario',$fila['codusuario']);
			$this->session->set_userdata('tipouser',$fila['tipo']);
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function validar_usuario2($user, $clave){
		$where = "codusuario = '".$user."' AND clave=SUBSTRING(SHA1('".$clave."'),1,21)";
		$this->db->where($where);
		$query=$this->db->get('usuario');
		if($query->num_rows()>0){
			$fila=$query->row_array();
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function validarloginasesor(){
		$user = $this->input->post('usuario');
		$clave = $this->input->post('clave');
		$where = "codusuario = '".$user."' AND clave=SUBSTRING(SHA1('".$clave."'),1,21) and estado='ACTIVO' and tipo=2";
		$this->db->where($where);
		$query=$this->db->get('usuario');
		if($query->num_rows()>0){
			$fila=$query->row_array();
			$this->session->set_userdata('idusuarioon',$fila['codusuario']);
			$this->session->set_userdata('tipouser',$fila['tipo']);
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function cambiarclave($usuario, $nuevaclave){
		$query = "UPDATE usuario SET clave = SUBSTR(SHA1('".$nuevaclave."'),1,21) WHERE codusuario='".$usuario."'";
		$result = $this->db->query($query);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	/*MODIFICAR USUARIO DEBE SER UNA SOLA TABLA ENTRE USUARIO ASESOR Y OPERACIONES*/
	function registrarusuario($idusuario, $clave, $tipouser, $dni, $agencia){
		$this->db->query("INSERT INTO usuario VALUES ('".$idusuario."', SUBSTR(SHA1('".$clave."'),1,21), ".$tipouser.",'".$dni."', '".$agencia."', 'ACTIVO')");
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function registrar_asesor($data){
		$this->db->insert('asesor_finan', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function registrar_operaciones($data){
		$this->db->insert('operaciones', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	function listaoperacionescobranza(){
		$this->db->where('tipo', 3);
		$this->db->or_where('tipo', 4);		
		$result = $this->db->get('vistausuario');
		return $result->result_array();		
	}
	function obtenerusuario($codusuario){
		$this->db->where('codusuario', $codusuario);
		$result = $this->db->get('vistausuario');
		return $result->row_array();
	}
	function listausuarios(){
		$this->db->where('tipo !=',1);
		$result = $this->db->get('vistausuario');
		return $result->result_array();
	}
	function listausuariosactivos(){
		$this->db->where('tipo !=',1);
		$this->db->where('estado', 'ACTIVO');
		$result = $this->db->get('vistausuario');
		return $result->result_array();
	}

	function listausuariosagencia($agencia){
		$this->db->where('tipo !=1 and tipo!= 5');
		$this->db->where('agencia',$agencia);
		$this->db->where('estado', 'ACTIVO');
		$result = $this->db->get('vistausuario');
		return $result->result_array();
	}	
	function listaasesoresxagencia($agencia){
		$this->db->where('estado','ACTIVO');
		$this->db->where('tipo',2);
		$this->db->where('agencia',$agencia);		
		$result = $this->db->get('vistausuario');
		return $result->result_array();
	}
	function listaasesores(){
		$this->db->where('estado','ACTIVO');
		$this->db->where('tipo',2);
		$result = $this->db->get('vistausuario');
		return $result->result_array();		
	}
	function listausuariosdb(){
		$result = $this->db->get('usuario');
		return $result->result_array();
	}

}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */