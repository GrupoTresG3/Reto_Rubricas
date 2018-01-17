<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo_Usuario_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_equipo_usuario($datos){
		$datosBD = array(
			'ID_Equipo' => $this->input->post('ID_Equipo'),
			'ID_Usuario' => $this->input->post('ID_Usuario'),
			'COD_Rol' => $this->input->post('COD_Rol'),									
		);
		$this->db->insert('Equipo_Usuario', $datosBD);
	}

	public function obtener_equipos_usuarios(){
		$query = $this->db->get('Equipo_Usuario');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	//Obtiene todo los Ciclos, pero con los valores de las claves referenciadas
	public function obtener_equipos_usuarios_valores(){
		$query = "SELECT ID_Equipo_Alumno, DESC_Equipo, User, COD_Rol FROM Equipo, Usuario, Equipo_Usuario WHERE Equipo_Usuario.ID_Equipo = Equipo.ID_Equipo and Equipo_Usuario.ID_Usuario = Usuario.ID_Usuario";
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function obtener_equipo_usuario($id){
		$where = $this->db->where('ID_Equipo_Alumno',$id);
		$query = $this->db->get('Equipo_Usuario');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	//Obtiene Ciclo por ID, pero con los valores de las claves referenciadas
	public function obtener_equipo_usuario_valores($id){
		$query = "SELECT ID_Equipo_Alumno, DESC_Equipo, User, COD_Rol FROM Equipo, Usuario, Equipo_Usuario WHERE Equipo_Usuario.ID_Equipo = Equipo.ID_Equipo and Equipo_Usuario.ID_Usuario = Usuario.ID_Usuario and Equipo_Usuario.ID_Equipo_Alumno = ".$id;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function actualizar_equipo_usuario($id,$datos){
		$datosBD = array(
			'ID_Equipo' => $datos['ID_Equipo'],
			'ID_Usuario' => $datos['ID_Usuario'],			
			'COD_Rol' => $datos['COD_Rol'],
		);
		$this->db->where('ID_Equipo_Alumno',$id);
		$this->db->update('Equipo_Usuario', $datosBD);
	}	

	public function borrar_equipo_usuario($id){
		$this->db->where('ID_Equipo_Alumno',$id);
		$this->db->delete('Equipo_Usuario');
	}

	public function filtrar_equipo_usuario_valores($filtro){
			$query = "SELECT ID_Equipo_Alumno, DESC_Equipo, User, COD_Rol FROM Equipo, Usuario, Equipo_Usuario WHERE Equipo_Usuario.ID_Equipo = Equipo.ID_Equipo and Equipo_Usuario.ID_Usuario = Usuario.ID_Usuario";
		if ($filtro['ID_Equipo'] != 0){
			$query = $query . " and Equipo.ID_Equipo = " . $filtro['ID_Equipo'];
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