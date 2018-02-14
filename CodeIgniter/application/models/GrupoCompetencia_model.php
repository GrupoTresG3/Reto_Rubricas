<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrupoCompetencia_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	//Inserta nuevo grupocompetencia en al base de datos
	public function nuevo_grupocompetencia($datos){
		$datosBD = array(
			'DESC_Grupo_Competencia' => $datos['DESC_Grupo_Competencia'],
		);
		$this->db->insert('GrupoCompetencia', $datosBD);
	}
	//Obtener gruposcompetencias
	public function obtener_gruposcompetencias(){
		$query = $this->db->get('GrupoCompetencia');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}
	//Obtiene el grupocompetencia segun el id
	public function obtener_grupocompetencia($id){
		$where = $this->db->where('ID_Grupo_Competencia',$id);
		$query = $this->db->get('GrupoCompetencia');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	
	//Actualiza el grupocompetencia segun el id
	public function actualizar_grupocompetencia($id,$datos){
		$datosBD = array(
			'DESC_Grupo_Competencia' => $datos['DESC_Grupo_Competencia'],
		);
		$this->db->where('ID_Grupo_Competencia',$id);
		$this->db->update('GrupoCompetencia', $datosBD);
	}	
		//Borra el grupocompetencia segun el id
		public function borrar_grupocompetencia($id){
		$this->db->where('ID_Grupo_Competencia',$id);
		$this->db->delete('GrupoCompetencia');
	}	
}


?>