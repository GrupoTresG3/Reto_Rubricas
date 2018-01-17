<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matricula_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('Equipo_model');
		$this->load->model('Usuario_model');
	}

	public function nueva_matricula($datos){
		$datos = array(
			'ID_Equipo' => $this->input->post('ID_Equipo'),
			'ID_Usuario' => $this->input->post('ID_Usuario'),
		);
		$this->db->insert('Equipo', $datosBD);
	}

	public function obtener_retos(){
		$query = $this->db->get('Reto');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	public function obtener_equipos(){
		$query = $this->db->get('Equipo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function obtener_usuarios(){
		$query = "SELECT ID_Ciclo, DESC_Centro, COD_Curso, COD_Ciclo, DESC_Ciclo FROM Ciclo, Curso, Centro WHERE Ciclo.ID_Centro=Centro.ID_Centro and Ciclo.ID_Curso= Curso.ID_Curso";
		$query = $this->db->get('Equipo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}		
}


?>