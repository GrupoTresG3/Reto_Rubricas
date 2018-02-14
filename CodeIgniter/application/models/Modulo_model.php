<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	//Inserta nuevo modulo a la base de datos
	public function nuevo_modulo($datos){
		$datosBD = array(
			'ID_Ciclo' => $this->input->post('ID_Ciclo'),
			'COD_Modulo' => $this->input->post('COD_Modulo'),									
			'DESC_Modulo' => $this->input->post('DESC_Modulo')
		);
		$this->db->insert('Modulo', $datosBD);
	}
	//Obtiene todos los modulos
	public function obtener_modulos(){
		$query = $this->db->get('Modulo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	//Obtiene todo los modulos, pero con los valores de las claves referenciadas
	public function obtener_modulos_valores(){
		$query = "SELECT ID_Modulo, DESC_Ciclo,DESC_Centro, COD_Curso,  DESC_Modulo, COD_Modulo FROM Ciclo, Modulo, Curso, Centro WHERE Ciclo.ID_Ciclo=Modulo.ID_Ciclo and Ciclo.ID_Centro=Centro.ID_Centro and Ciclo.ID_Curso= Curso.ID_Curso";

			$query = $this->db->query($query);	
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}		
	
	}	
	//Obtiene el modulo segun el id
	public function obtener_modulo($id){
		$where = $this->db->where('ID_Modulo',$id);
		$query = $this->db->get('Modulo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	//Obtiene modulo por ID, pero con los valores de las claves referenciadas
	public function obtener_modulo_valores($id){
		$query = "SELECT ID_Modulo, DESC_Ciclo,DESC_Centro, COD_Curso,  DESC_Modulo, COD_Modulo FROM Ciclo, Modulo, Curso, Centro WHERE Ciclo.ID_Ciclo=Modulo.ID_Ciclo and Ciclo.ID_Centro=Centro.ID_Centro and Ciclo.ID_Curso= Curso.ID_Curso and Modulo.ID_Modulo = ".$id;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	
	//Actualiza modulo segun el id
	public function actualizar_modulo($id,$datos){
		$datosBD = array(
			'ID_Centro' => $datos['ID_Centro'],
			'ID_Curso' => $datos['ID_Curso'],			
			'COD_Modulo' => $datos['COD_Modulo'],
			'DESC_Modulo' => $datos['DESC_Modulo'],
		);
		$this->db->where('ID_Ciclo',$id);
		$this->db->update('Ciclo', $datosBD);
	}	
	//Borra modulo segun el id
	public function borrar_modulo($id){
		$this->db->where('ID_Modulo',$id);
		$this->db->delete('Modulo');
	}
	
	//filtra dependiendo del ciclo, curso y centro seleccionados
	public function filtrar_modulo_valores($filtro){
		$query = "SELECT ID_Modulo, DESC_Ciclo,DESC_Centro, COD_Curso,  DESC_Modulo, COD_Modulo FROM Ciclo, Modulo, Curso, Centro WHERE Ciclo.ID_Ciclo=Modulo.ID_Ciclo and Ciclo.ID_Centro=Centro.ID_Centro and Ciclo.ID_Curso= Curso.ID_Curso";
			if ($filtro['ID_Ciclo'] != 0){
			$query = $query . " and Ciclo.ID_Ciclo = " . $filtro['ID_Ciclo'];
			}
			if ($filtro['ID_Curso'] != 0){
				$query = $query . " and Curso.ID_Curso = " . $filtro['ID_Curso'];
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
	//Obtiene los datos
	public function obtener_datos_ciclo(){
		$query = "SELECT ID_Ciclo, DESC_Centro, COD_Curso, DESC_Ciclo FROM Ciclo, Curso, Centro WHERE Ciclo.ID_Centro=Centro.ID_Centro and Ciclo.ID_Curso= Curso.ID_Curso";

			$query = $this->db->query($query);	
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}		
	}


}


?>