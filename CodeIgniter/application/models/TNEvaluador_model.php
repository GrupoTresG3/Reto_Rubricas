<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TNEvaluador_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	//Inserta nuevo tnevaluador a la abse de datos
	public function nuevo_tnevaluador($datos){
		$datosBD = array(
			'DESC_TNEvaluador' => $datos['DESC_TNEvaluador'],
		);
		$this->db->insert('TNEvaluador', $datosBD);
	}
	//Obtiene todos los tnevaluadores
	public function obtener_tnevaluadores(){
		$query = $this->db->get('TNEvaluador');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}
	//Obtiene tnevaluadro segun el id
	public function obtener_tnevaluador($id){
		$where = $this->db->where('ID_TNEvaluador',$id);
		$query = $this->db->get('TNEvaluador');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	
	//Actualiza tnevaluadro segun el id
	public function actualizar_tnevaluador($id,$datos){
		$datosBD = array(
			'DESC_TNEvaluador' => $datos['DESC_TNEvaluador'],
		);
		$this->db->where('ID_TNEvaluador',$id);
		$this->db->update('TNEvaluador', $datosBD);
	}	
		//Borra tnevaluadro segun el id
		public function borrar_tnevaluador($id){
		$this->db->where('ID_TNEvaluador',$id);
		$this->db->delete('TNEvaluador');
	}	
}


?>