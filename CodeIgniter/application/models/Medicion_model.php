<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicion_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_medicion($datos){
		$datosBD = array(
			'ID_TUsuario' => $this->input->post('ID_TUsuario'),
			'COD_Medicion' => $this->input->post('COD_Medicion'),									
			'DESC_Medicion' => $this->input->post('DESC_Medicion')
		);
		$this->db->insert('Medicion', $datosBD);
	}

	public function obtener_mediciones(){
		$query = $this->db->get('Medicion');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	//Obtiene todo los Ciclos, pero con los valores de las claves referenciadas
	public function obtener_mediciones_valores(){
		$query = "SELECT ID_Medicion, DESC_TUsuario, COD_Medicion, DESC_Medicion FROM Medicion, TUsuario WHERE Medicion.ID_TUsuario=TUsuario.ID_TUsuario";
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function obtener_medicion($id){
		$where = $this->db->where('ID_Medicion',$id);
		$query = $this->db->get('Medicion');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	//Obtiene Ciclo por ID, pero con los valores de las claves referenciadas
	public function obtener_medicion_valores($id){
		$query = "SELECT ID_Medicion, DESC_TUsuario, COD_Medicion, DESC_Medicion FROM Medicion, TUsuario WHERE Medicion.ID_TUsuario=TUsuario.ID_TUsuario and Medicion.ID_Meidicion = ".$id;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function actualizar_medicion($id,$datos){
		$datosBD = array(
			'ID_TUsuario' => $datos['ID_TUsuario'],			
			'COD_Medicion' => $datos['COD_Medicion'],
			'DESC_Medicion' => $datos['DESC_Medicion'],
		);
		$this->db->where('ID_Medicion',$id);
		$this->db->update('Medicion', $datosBD);
	}	

	public function borrar_medicion($id){
		$this->db->where('ID_Medicion',$id);
		$this->db->delete('Medicion');
	}

	public function filtrar_medicion_valores($filtro){
		$query = "SELECT ID_Medicion, DESC_TUsuario, COD_Medicion, DESC_Medicion FROM Medicion, TUsuario WHERE Medicion.ID_TUsuario=TUsuario.ID_TUsuario";
		if ($filtro['ID_TUsuario'] != 0){
			$query = $query . " and TUsuario.ID_TUsuario = " . $filtro['ID_TUsuario'];
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