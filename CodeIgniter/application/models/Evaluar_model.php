<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluar_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nueva_nota($datos, $prueba){


		$datosBD = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
			'ID_Medicion' => $_SESSION['user_id'],
			'ID_Evaluador' => $_SESSION['user_ev'],                 
			'ID_Usuario' => $this->input->post('ID_Usuario'),
			'ID_Competencia' => $this->input->post('ID_Competencia'),
			'Nota' => $this->input->post('Nota'),

		);
		$this->db->insert('Notas', $datosBD);
	}
}	

?>