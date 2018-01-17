<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reto_Modulo_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_reto_modulo($datos){
		$datosBD = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
			'ID_Modulo' => $this->input->post('ID_Modulo'),									
			'ID_UAdmin' => $this->input->post('ID_Usuario'),
			'IN_Extendido' => $this->input->post('IN_Extendido'),
			'IN_EAbierta' => $this->input->post('IN_EAbierta'),
		);
		$this->db->insert('Reto_Modulo', $datosBD);
	}

	public function obtener_retos_modulos(){
		$query = $this->db->get('Reto_Modulo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	//Obtiene todo los Ciclos, pero con los valores de las claves referenciadas
	public function obtener_retos_modulos_valores(){
		$query = "SELECT ID_Reto_modulo,DESC_Reto, DESC_Modulo, User, IN_Extendido, IN_EAbierta FROM Reto_Modulo, Reto, Modulo, Usuario WHERE Reto_Modulo.ID_Reto=Reto.ID_Reto and Reto_Modulo.ID_Modulo= Modulo.ID_Modulo and Reto_Modulo.ID_UAdmin = Usuario.ID_Usuario";
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function obtener_reto_modulo($id){
		$where = $this->db->where('ID_Reto_modulo',$id);
		$query = $this->db->get('Reto_Modulo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	//Obtiene Ciclo por ID, pero con los valores de las claves referenciadas
	public function obtener_reto_modulo_valores($id){
		$query = "SELECT ID_Reto_modulo, DESC_Reto, DESC_Modulo, User, IN_Extendido, IN_EAbierta FROM Reto_Modulo, Reto, Modulo WHERE Reto_Modulo.ID_Reto=Reto.ID_Reto and Reto_Modulo.ID_UAdmin = Usuario.ID_Usuario and Reto_Modulo.ID_Modulo= Modulo.ID_Modulo and Reto_Modulo.ID_Reto_modulo = ".$id;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function actualizar_reto_modulo($id,$datos){
		$datosBD = array(
			'ID_Reto' => $datos['ID_Reto'],
			'ID_Modulo' => $datos['ID_Modulo'],			
			'ID_UAdmin' => $datos['ID_UAdmin'],
			'IN_Extendido' => $datos['IN_Extendido'],
			'IN_EAbierta' => $datos['IN_EAbierta'],
		);
		$this->db->where('ID_Reto_modulo',$id);
		$this->db->update('Reto_Modulo', $datosBD);
	}	

	public function borrar_reto_modulo($id){
		$this->db->where('ID_Reto_modulo',$id);
		$this->db->delete('Reto_Modulo');
	}

	public function filtrar_reto_modulo_valores($filtro){
		$query = "SELECT ID_Reto_modulo,DESC_Reto, DESC_Modulo, User, IN_Extendido, IN_EAbierta FROM Reto_Modulo, Reto, Modulo, Usuario WHERE Reto_Modulo.ID_Reto=Reto.ID_Reto and Reto_Modulo.ID_Modulo= Modulo.ID_Modulo and Reto_Modulo.ID_UAdmin = Usuario.ID_Usuario";
		if ($filtro['ID_Reto'] != 0){
			$query = $query . " and Reto.ID_Reto = " . $filtro['ID_Reto'];
		}
		if ($filtro['ID_Modulo'] != 0){
			$query = $query . " and Modulo.ID_Modulo = " . $filtro['ID_Modulo'];
		}
		if ($filtro['ID_Usuario'] != 0){
			$query = $query . " and Usuario.ID_Usuario = " . $filtro['ID_Usuario'];
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