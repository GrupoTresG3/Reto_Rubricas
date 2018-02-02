<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function obtener_nota($dato){

		$query2 ="SELECT ID_Equipo FROM Equipo_Usuario WHERE ID_Usuario = $dato";
		$query2 = $this->db->query($query2);
		foreach ($query2->result()as $row) {
			$equipo=$row->ID_Equipo;
			
		}
		if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='3')){
		$query = "SELECT DISTINCT  User,  DESC_Competencia, Nota, Porcentaje FROM Medicion_GrupoCompetencia_Competencia mgcc, Equipo_Usuario eu, Equipo e, Usuario u, Competencia c,  Notas n, Medicion m where u.ID_Usuario=n.ID_Usuario and m.ID_Medicion=n.ID_Medicion and n.ID_Competencia=c.ID_Competencia and mgcc.ID_Competencia=c.ID_Competencia and u.ID_Usuario=eu.ID_Usuario and eu.ID_Equipo=e.ID_Equipo and e.ID_Equipo=$equipo and mgcc.ID_Medicion='".$_SESSION['user_md']."' order by User";
	}
	else if ((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='2')) {
		$query = "SELECT DISTINCT  User,  DESC_Competencia, Nota, Porcentaje FROM Medicion_GrupoCompetencia_Competencia mgcc, Equipo_Usuario eu, Equipo e, Usuario u, Competencia c,  Notas n, Medicion m where u.ID_Usuario=n.ID_Usuario and m.ID_Medicion=n.ID_Medicion and n.ID_Competencia=c.ID_Competencia and mgcc.ID_Competencia=c.ID_Competencia and u.ID_Usuario=eu.ID_Usuario and eu.ID_Equipo=e.ID_Equipo  and mgcc.ID_Medicion='".$_SESSION['user_md']."' order by User";
	}
	else{
		
	}
		//echo $query;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
		
		
	}
	public function obtener_nota_filtro($dato){

		$query = "SELECT DESC_Competencia, Nota, Porcentaje From Medicion_GrupoCompetencia_Competencia, Medicion, Competencia, Notas, Usuario Where Medicion_GrupoCompetencia_Competencia.ID_Competencia=Competencia.ID_Competencia and Notas.ID_Competencia=Competencia.ID_Competencia and Medicion.ID_Medicion=Medicion_GrupoCompetencia_Competencia.ID_Medicion and Usuario.ID_Usuario=Notas.ID_Usuario  and USER LIKE '$dato' and ID_Evaluador=".$_SESSION['user_ev']." and Medicion.ID_Medicion=".$_SESSION['user_md']."";
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