<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicion_GrupoCompetencia_Competencia_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_medicion_grupocompetencia_competencia($datos){
		$datosBD = array(
			'ID_Medicion' => $this->input->post('ID_Medicion'),
			'ID_GrupoCompetencia' => $this->input->post('ID_Grupo_Competencia'),									
			'ID_Competencia' => $this->input->post('ID_Competencia'),
			'Porcentaje' => $this->input->post('Porcentaje'),
		);
		$this->db->insert('Medicion_GrupoCompetencia_Competencia', $datosBD);
	}

	public function obtener_mediciones_gruposcompetencias_competencias(){
		$query = $this->db->get('Medicion_GrupoCompetencia_Competencia');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	//Obtiene todo los Ciclos, pero con los valores de las claves referenciadas
	public function obtener_mediciones_gruposcompetencias_competencias_valores(){
		$query = "SELECT ID_GrupoCompetencia_Competencia, DESC_Medicion, DESC_Grupo_Competencia, DESC_Competencia, Porcentaje  FROM Medicion_GrupoCompetencia_Competencia, Medicion, GrupoCompetencia, Competencia WHERE Medicion_GrupoCompetencia_Competencia.ID_Medicion=Medicion.ID_Medicion and Medicion_GrupoCompetencia_Competencia.ID_GrupoCompetencia = GrupoCompetencia.ID_Grupo_Competencia and Medicion_GrupoCompetencia_Competencia.ID_Competencia = Competencia.ID_Competencia";
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function obtener_medicion_grupocompetencia_competencia($id){
		$where = $this->db->where('ID_GrupoCompetencia_Competencia',$id);
		$query = $this->db->get('Medicion_GrupoCompetencia_Competencia');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	//Obtiene Ciclo por ID, pero con los valores de las claves referenciadas
	public function obtener_medicion_grupocompetencia_competencia_valores($id){
		$query = "SELECT ID_GrupoCompetencia_Competencia, DESC_Medicion, DESC_Grupo_Competencia, DESC_Competencia, Porcentaje,  FROM Medicion_GrupoCompetencia_Competencia, Medicion, GrupoCompetencia, Competencia WHERE Medicion_GrupoCompetencia_Competencia.ID_Medicion=Medicion.ID_Medicion and Medicion_GrupoCompetencia_Competencia.ID_GrupoCompetencia = GrupoCompetencia.ID_Grupo_Competencia and Medicion_GrupoCompetencia_Competencia.ID_Competencia = Competencia.ID_Competencia and Medicion_GrupoCompetencia_Competencia.ID_GrupoCompetencia_Competencia = ".$id;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function actualizar_medicion_grupocompetencia_competencia($id,$datos){
		$datosBD = array(
			'ID_Medicion' => $datos['ID_Medicion'],
			'ID_GrupoCompetencia' => $datos['ID_GrupoCompetencia'],			
			'ID_Competencia' => $datos['ID_Competencia'],
			'Porcentaje' => $datos['Porcentaje'],
			
		);
		$this->db->where('ID_GrupoCompetencia_Competencia',$id);
		$this->db->update('Medicion_GrupoCompetencia_Competencia', $datosBD);
	}	

	public function borrar_medicion_grupocompetencia_competencia($id){
		$this->db->where('ID_GrupoCompetencia_Competencia',$id);
		$this->db->delete('Medicion_GrupoCompetencia_Competencia');
	}

	public function filtrar_medicion_grupocompetencia_competencia_valores($filtro){
		$query = "SELECT ID_GrupoCompetencia_Competencia, DESC_Medicion, DESC_Grupo_Competencia, DESC_Competencia, Porcentaje  FROM Medicion_GrupoCompetencia_Competencia, Medicion, GrupoCompetencia, Competencia WHERE Medicion_GrupoCompetencia_Competencia.ID_Medicion=Medicion.ID_Medicion and Medicion_GrupoCompetencia_Competencia.ID_GrupoCompetencia = GrupoCompetencia.ID_Grupo_Competencia and Medicion_GrupoCompetencia_Competencia.ID_Competencia = Competencia.ID_Competencia";
		if ($filtro['ID_Medicion'] != 0){
			$query = $query . " and Medicion.ID_Medicion = " . $filtro['ID_Medicion'];
		}
		if ($filtro['ID_Grupo_Competencia'] != 0){
			$query = $query . " and GrupoCompetencia.ID_Grupo_Competencia = " . $filtro['ID_Grupo_Competencia'];
		}
		if ($filtro['ID_Competencia'] != 0){
			$query = $query . " and Competencia.ID_Competencia = " . $filtro['ID_Competencia'];
		}		
		$query = $this->db->query($query);		
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	
}



?>