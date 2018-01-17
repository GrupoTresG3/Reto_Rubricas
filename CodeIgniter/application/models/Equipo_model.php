<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_equipo($datos){
		$datosBD = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
			'COD_Equipo' => $this->input->post('COD_Equipo'),									
			'DESC_Equipo' => $this->input->post('DESC_Equipo')
		);
		$this->db->insert('Equipo', $datosBD);
	}

	public function obtener_equipos(){
		$query = $this->db->get('Equipo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	//Obtiene todo los Ciclos, pero con los valores de las claves referenciadas
	public function obtener_equipos_valores(){
		$query = "SELECT ID_Equipo, DESC_Reto, COD_Equipo, DESC_Equipo FROM Equipo, Reto WHERE Equipo.ID_Reto=Reto.ID_Reto";
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function obtener_equipo($id){
		$where = $this->db->where('ID_Equipo',$id);
		$query = $this->db->get('Equipo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	//Obtiene Ciclo por ID, pero con los valores de las claves referenciadas
	public function obtener_equipo_valores($id){
		$query = "SELECT ID_Equipo, DESC_Reto, COD_Equipo, DESC_Equipo FROM Equipo, Reto WHERE Equipo.ID_Reto=Reto.ID_Reto and Equipo.ID_Equipo = ".$id;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function actualizar_equipo($id,$datos){
		$datosBD = array(
			'ID_Reto' => $datos['ID_Reto'],			
			'COD_Equipo' => $datos['COD_Equipo'],
			'DESC_Equipo' => $datos['DESC_Equipo'],
		);
		$this->db->where('ID_Equipo',$id);
		$this->db->update('Equipo', $datosBD);
	}	

	public function borrar_equipo($id){
		$this->db->where('ID_Equipo',$id);
		$this->db->delete('Equipo');
	}

	public function filtrar_equipo_valores($filtro){
		$query = "SELECT ID_Equipo, DESC_Reto, COD_Equipo, DESC_Equipo FROM Equipo, Reto WHERE Equipo.ID_Reto=Reto.ID_Reto";
		if ($filtro['ID_Reto'] != 0){
			$query = $query . " and Reto.ID_Reto = " . $filtro['ID_Reto'];
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