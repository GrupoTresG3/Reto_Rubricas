<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Competencia_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_competencia($datos){
		$datosBD = array(
			'DESC_Competencia' => $datos['DESC_Competencia'],
			'Mal' => $datos['Mal'],
			'Regular' => $datos['Regular'],
			'Bien' => $datos['Bien'],
			'Excelente' => $datos['Excelente'],
		);
		$this->db->insert('Competencia', $datosBD);
	}

	public function obtener_competencias(){
		$query = $this->db->get('Competencia');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	public function obtener_competencia($id){
		$where = $this->db->where('ID_Competencia',$id);
		$query = $this->db->get('Competencia');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function actualizar_competencia($id,$datos){
		$datosBD = array(
			'DESC_Competencia' => $datos['DESC_Competencia'],
			'Mal' => $datos['Mal'],
			'Regular' => $datos['Regular'],
			'Bien' => $datos['Bien'],
			'Excelente' => $datos['Excelente'],
		);
		$this->db->where('ID_Competencia',$id);
		$this->db->update('Competencia', $datosBD);
	}	

		public function borrar_competencia($id){
		$this->db->where('ID_Competencia',$id);
		$this->db->delete('Competencia');
	}	
}


?>