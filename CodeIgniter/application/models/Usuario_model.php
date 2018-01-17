<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_usuario($datos){
		$passwordmd5=md5($_POST['Password']);
		$datosBD = array(
			'ID_Centro' => $this->input->post('ID_Centro'),
			'ID_TUsuario' => $this->input->post('ID_TUsuario'),
			'User' => $this->input->post('User'),									
			'Password' =>$passwordmd5,
			'Nombre' => $this->input->post('Nombre'),
			'Apellidos' => $this->input->post('Apellidos'),
			'Email' => $this->input->post('Email'),
			'Dni' => $this->input->post('Dni'),
		);
		$this->db->insert('Usuario', $datosBD);
	}

	public function obtener_usuarios(){
		$query = $this->db->get('Usuario');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	//Obtiene todo los Ciclos, pero con los valores de las claves referenciadas
	public function obtener_usuarios_valores(){
		$query = "SELECT ID_Usuario, DESC_TUsuario, DESC_Centro, User,Password, Nombre, Apellidos, Email, Dni FROM Usuario, TUsuario, Centro WHERE Usuario.ID_Centro = Centro.ID_Centro and Usuario.ID_TUsuario = TUsuario.ID_TUsuario";
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function obtener_usuario($id){
		$where = $this->db->where('ID_Usuario',$id);
		$query = $this->db->get('Usuario');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	//Obtiene Ciclo por ID, pero con los valores de las claves referenciadas
	public function obtener_usuario_valores($id){
		$query = "SELECT ID_Usuario,  DESC_TUsuario, DESC_Centro, User,Password, Nombre, Apellidos, Email, Dni FROM Usuario, Tusuario, Centro WHERE Usuario.ID_Centro = Centro.ID_Centro and Usuario.ID_TUsuario = TUsuario.ID_TUsuario and Usuario.ID_Usuario = ".$id;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function actualizar_usuario($id,$datos){
		$passwordmd5=md5($datos['Password']);
		$datosBD = array(
			'ID_Centro' => $datos['ID_Centro'],
			'ID_TUsuario' => $datos['ID_TUsuario'],			
			'User' => $datos['User'],
			'Password' => $passwordmd5,
			'Nombre' => $datos['Nombre'],
			'Apellidos' => $datos['Apellidos'],
			'Email' => $datos['Email'],
			'Dni' => $datos['Dni'],
		);
		$this->db->where('ID_Usuario',$id);
		$this->db->update('Usuario', $datosBD);
	}	

	public function borrar_usuario($id){
		$this->db->where('ID_Usuario',$id);
		$this->db->delete('Usuario');
	}

	public function filtrar_usuario_valores($filtro){
		$query = "SELECT ID_Usuario,  DESC_TUsuario, DESC_Centro, User,Password, Nombre, Apellidos, Email, Dni FROM Usuario, TUsuario, Centro WHERE Usuario.ID_Centro = Centro.ID_Centro and Usuario.ID_TUsuario = TUsuario.ID_TUsuario";
		if ($filtro['ID_TUsuario'] != 0){
			$query = $query . " and TUsuario.ID_TUsuario = " . $filtro['ID_TUsuario'];
		}
		if ($filtro['ID_Centro'] != 0){
			$query = $query . " and Centro.ID_Centro = " . $filtro['ID_Centro'];
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