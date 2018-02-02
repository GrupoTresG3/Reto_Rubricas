<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluar_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nueva_nota($datos){

		$query2 ="SELECT * FROM Notas WHERE ID_Evaluador =".$_SESSION['user_ev']." and ID_Usuario= ".$datos['ID_Usuario']." and ID_Competencia= ".$datos['ID_Competencia']."";
		$query2 = $this->db->query($query2);
		if ($query2->num_rows() > 0){
			$this->db->where('ID_Evaluador',$_SESSION['user_ev']);
			$this->db->where('ID_Usuario',$datos['ID_Usuario']);
			$this->db->where('ID_Competencia',$datos['ID_Competencia']);
			$this->db->delete('Notas');
			$this->db->insert('Notas', $datos);
		}else{
			$this->db->insert('Notas', $datos);
		}

		
		
	}



	public function obtener_usuarios_reto_grupo($dato, $dat){

		$query2 ="SELECT ID_Usuario,User FROM Usuario WHERE ID_Usuario in (SELECT ID_Usuario FROM Equipo_Usuario WHERE ID_Equipo in (SELECT ID_Equipo FROM Equipo WHERE ID_Equipo in (SELECT ID_Equipo FROM Equipo_Usuario WHERE ID_Usuario = $dato) and ID_Reto = $dat)) and ID_TUsuario=3";
		$query2 = $this->db->query($query2);
		if ($query2->num_rows() > 0){
			return $query2;
		}else{
			return false;
		}

	}

	public function obtener_competencias($dato){

		$query = "SELECT * FROM Competencia WHERE ID_Competencia in (SELECT ID_Competencia FROM Medicion_GrupoCompetencia_Competencia WHERE ID_Medicion in (SELECT ID_Medicion FROM Medicion WHERE ID_TUsuario = $dato))";
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	public function obtener_nota_filtro($dato){

		$query = "SELECT Nota From Notas, Usuario Where Usuario.ID_Usuario=Notas.ID_Usuario  and USER LIKE '$dato' and ID_Evaluador=".$_SESSION["user_ev"]."";
		//echo $query;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}
}	

?>