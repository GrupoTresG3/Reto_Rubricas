<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Competencia extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Competencia_model');

	}

	//Cargamos la pagina principal
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['competencias'] = $this->Competencia_model->obtener_competencias();
		}else{
			$datos['competencias'] = $this->Competencia_model->obtener_competencia($datos['segmento']);
		}
		
		$this->load->view('header');
		$this->load->view('competencia/listar_competencia',$datos);
		$this->load->view('footer');
	}

	//Aqui se visualiza el formulario para crear una nueva competencia
	public function nuevo(){
		$this->load->view('header');
		$this->load->view('competencia/nuevo_competencia');
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para inserta una nueva competencia
	public function nuevo_competencia(){
		$datos = array(
			'DESC_Competencia' => $this->input->post('DESC_Competencia'),
			'Mal' => $this->input->post('Mal'),
			'Regular' => $this->input->post('Regular'),
			'Bien' => $this->input->post('Bien'),
			'Excelente' => $this->input->post('Excelente')
			);
		$this->Competencia_model->nuevo_competencia($datos);
		redirect('Competencia');		
	}

		//Aqui se visualiza el formulario para editar una competencia
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['competencias']=$this->Competencia_model->obtener_competencia($datos['segmento']);
		$this->load->view('header');
		$this->load->view('competencia/editar_competencia',$datos);
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para editar una competencia
	public function actualizar(){
		$datos = array(
			'DESC_Competencia' => $this->input->post('DESC_Competencia'),
			'Mal' => $this->input->post('Mal'),
			'Regular' => $this->input->post('Regular'),
			'Bien' => $this->input->post('Bien'),
			'Excelente' => $this->input->post('Excelente')
			);
		$id = $this->uri->segment(3);
		$this->Competencia_model->actualizar_competencia($id,$datos);
		redirect('Competencia');
	}

	//Funcion que realiza la SQL para borrar un curso
	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Competencia_model->borrar_competencia($id);
		redirect('Competencia');
	}	
}