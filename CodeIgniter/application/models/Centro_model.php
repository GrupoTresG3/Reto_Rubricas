<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Centro_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	//Inserta en la base de datos un nuevo centro
	public function nuevo_centro($datos){
		$datosBD = array(
			'COD_Centro' => $datos['COD_Centro'],
			'DESC_Centro' => $datos['DESC_Centro'],
		);
		$this->db->insert('Centro', $datosBD);
	}
	//Obtiene todos los centros que hay en la base de datos
	public function obtener_centros(){
		$query = $this->db->get('Centro');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}
	//Obtiene el centro segun el id que a recibido
	public function obtener_centro($id){
		$where = $this->db->where('ID_Centro',$id);
		$query = $this->db->get('Centro');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	
	//Actualiza el centro segun el id recibido
	public function actualizar_centro($id,$datos){
		$datosBD = array(
			'COD_Centro' => $datos['COD_Centro'],
			'DESC_Centro' => $datos['DESC_Centro'],
		);
		$this->db->where('ID_Centro',$id);
		$this->db->update('Centro', $datosBD);
	}	
		//Borra el centro segun el id recibido
		public function borrar_centro($id){
		$this->db->where('ID_Centro',$id);
		$this->db->delete('Centro');
	}	
}


?>