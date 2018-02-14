<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reto_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	//Inserta nuevo reto en la base de datos
	public function nuevo_reto($datos){
		$datosBD = array(
			'COD_Reto' => $datos['COD_Reto'],
			'DESC_Reto' => $datos['DESC_Reto'],
		);
		$this->db->insert('Reto', $datosBD);
	}
	// Obtiene todos los retos
	public function obtener_retos(){
		$query = $this->db->get('Reto');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}
	//Obtiene el reto segun el id
	public function obtener_reto($id){
		$where = $this->db->where('ID_Reto',$id);
		$query = $this->db->get('Reto');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	
	//Obtiene el reto dependiendo del usuario logeado
	public function obtener_reto_evaluar($dato){
		$query = "SELECT * FROM Reto WHERE ID_Reto IN (SELECT ID_Reto FROM Equipo WHERE ID_Equipo IN (SELECT ID_Equipo FROM Equipo_Usuario WHERE (ID_Usuario=".$dato.")))";
		//echo $query;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}		
	//Actualiza el reto segun el id
	public function actualizar_reto($id,$datos){
		$datosBD = array(
			'COD_Reto' => $datos['COD_Reto'],
			'DESC_Reto' => $datos['DESC_Reto'],
		);
		$this->db->where('ID_Reto',$id);
		$this->db->update('Reto', $datosBD);
	}	
		//Borra el reto segun el id
		public function borrar_reto($id){
		$this->db->where('ID_Reto',$id);
		$this->db->delete('Reto');
	}	
}


?>
