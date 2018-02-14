<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TNEvaluador extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('TNEvaluador_model');
	}

	//Cargamos la pagina principal
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['tnevaluadores'] = $this->TNEvaluador_model->obtener_tnevaluadores();
		}else{
			$datos['tnevaluadores'] = $this->TNEvaluador_model->obtener_tnevaluadores($datos['segmento']);
		}
		
		$this->load->view('header');
		$this->load->view('tnevaluador/listar_tnevaluador',$datos);
		$this->load->view('tnevaluador/nuevo_tnevaluador');
		$this->load->view('footer');
	}

	//Aqui se visualiza el formulario para crear un nuevo TNEvaluador
	public function nuevo(){
		$this->load->view('header');
		$this->load->view('tnevaluador/nuevo_tnevaluador');
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para inserta un nuevo TNEvaluador
	public function nuevo_tnevaluador(){
		$datos = array(
			'DESC_TNEvaluador' => $this->input->post('DESC_TNEvaluador'),
		);
		$this->TNEvaluador_model->nuevo_tnevaluador($datos);
		redirect('TNEvaluador');		
	}

	//Aqui se visualiza el formulario para editar un TNEvaluador
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['tnevaluador']=$this->TNEvaluador_model->obtener_tnevaluador($datos['segmento']);
		$this->load->view('header');
		$this->load->view('tnevaluador/editar_tnevaluador',$datos);
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para editar un TNEvaluador
	public function actualizar(){
		$datos = array(
			'DESC_TNEvaluador' => $this->input->post('DESC_TNEvaluador')
		);
		$id = $this->uri->segment(3);
		$this->TNEvaluador_model->actualizar_tnevaluador($id,$datos);
		redirect('TNEvaluador');
	}

	//Funcion que realiza la SQL para borrar un TNEvaluador
	public function borrar(){
		$id = $this->uri->segment(3);
		$this->TNEvaluador_model->borrar_tnevaluador($id);
		redirect('TNEvaluador');
	}	
}