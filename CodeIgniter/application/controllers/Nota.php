
<?php

defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Nota extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');   
		$this->load->model('Nota_model');
	}

  	//Cargamos la pagina principal
	public function index()
	{ 
		$this->load->view('header');
		$this->load->view('nota/notaview.php');
		$this->load->view('footer');
	}

	//Funcion para obtener las notas dependiendo del user_evaluador
	public function obtener_nota(){

		$dato=$_SESSION['user_ev'];
		$datos['notas'] = $this->Nota_model->obtener_nota($dato); 
		echo json_encode($datos['notas']->result());
	}

	//Funcion para obtener las notas filtradas
	public function obtener_nota_filtro(){
		$dato=$_GET['nota'];
		$datos['nota'] = $this->Nota_model->obtener_nota_filtro($dato); 
		if ($datos['nota'] == false){
			echo json_encode(false);
		}
		else{
			echo json_encode($datos['nota']->result()); 
		}
	}

}