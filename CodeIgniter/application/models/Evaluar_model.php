<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluar_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nueva_nota($datos){

		$this->db->insert('Notas', $datos);
		
	}

	public function obtener_notas($dato){

		$query2 ="SELECT ID_Equipo FROM Equipo_Usuario WHERE ID_Usuario = $dato";
		$query2 = $this->db->query($query2);
		foreach ($query2->result()as $row) {
						$equipo=$row->ID_Equipo;
						
					}
		$query = "SELECT DISTINCT  c.ID_Competencia, User,  DESC_Competencia, Nota, n.ID_Usuario FROM Equipo_Usuario eu, Equipo e, Usuario u, Competencia c,  Notas n where u.ID_Usuario=n.ID_Usuario and n.ID_Competencia=c.ID_Competencia and u.ID_Usuario=eu.ID_Usuario and eu.ID_Equipo=e.ID_Equipo and e.ID_Equipo=$equipo";
		//echo $query;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}
	public function obtener_nota_filtro($dato){

		$query = "SELECT Nota From Notas, Usuario Where Usuario.ID_Usuario=Notas.ID_Usuario  and USER LIKE '$dato'";
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