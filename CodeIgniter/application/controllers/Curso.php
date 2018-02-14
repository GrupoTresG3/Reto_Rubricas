<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Centro_model');
		$this->load->model('Curso_model');
	}

	//Cargamos la pagina principal
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['cursos'] = $this->Curso_model->obtener_cursos();
		}else{
			$datos['cursos'] = $this->Cursos_model->obtener_cursos($datos['segmento']);
		}
		
		$this->load->view('header');
		$this->load->view('curso/listar_curso',$datos);
		$this->load->view('footer');
	}

	//Aqui se visualiza el formulario para crear un nuevo curso
	public function nuevo(){
		$this->load->view('header');
		$this->load->view('curso/nuevo_curso');
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para inserta un nuevo curso
	public function nuevo_curso(){
		$datos = array(
			'COD_Curso' => $this->input->post('COD_Curso'),
		);
		$this->Curso_model->nuevo_curso($datos);
		redirect('Curso');		
	}

	//Aqui se visualiza el formulario para editar un curso
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['cursos']=$this->Curso_model->obtener_curso($datos['segmento']);
		$this->load->view('header');
		$this->load->view('curso/editar_curso',$datos);
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para editar un curso
	public function actualizar(){
		$datos = array(
			'COD_Curso' => $this->input->post('COD_Curso')
		);
		$id = $this->uri->segment(3);
		$this->Curso_model->actualizar_curso($id,$datos);
		redirect('Curso');
	}

	//Funcion que realiza la SQL para borrar un curso
	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Curso_model->borrar_curso($id);
		redirect('Curso');
	}	
}