<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciclo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Centro_model');
		$this->load->model('Curso_model');
		$this->load->model('Ciclo_model');		
	}

	//Cargamos la pagina principal
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['ciclos'] = $this->Ciclo_model->obtener_ciclos_valores();
		}else{
			$datos['ciclos'] = $this->Ciclos_model->obtener_ciclo($datos['segmento']);
		}
		$datos['centros'] = $this->Centro_model->obtener_centros();
		$datos['cursos'] = $this->Curso_model->obtener_cursos();

		$this->load->view('header');
		$this->load->view('ciclo/listar_ciclo',$datos);
		$this->load->view('footer');
	}

	//Aqui se visualiza el formulario para crear un nuevo ciclo
	public function nuevo(){
		$datos['centros'] = $this->Centro_model->obtener_centros();
		$datos['cursos'] = $this->Curso_model->obtener_cursos();
		$this->load->view('header');
		$this->load->view('ciclo/nuevo_ciclo',$datos);
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para inserta un nuevo ciclo
	public function nuevo_ciclo(){
		$datos = array(
			'ID_Curso' => $this->input->post('ID_Curso'),
			'ID_Centro' => $this->input->post('ID_Centro'),
			'COD_Ciclo' => $this->input->post('COD_Ciclo'),									
			'DESC_Ciclo' => $this->input->post('DESC_Ciclo'),
		);
		$this->Ciclo_model->nuevo_ciclo($datos);
		redirect('Ciclo');		
	}

	//Aqui se visualiza el formulario para editar un ciclo
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['ciclos']=$this->Ciclo_model->obtener_ciclo($datos['segmento']);
		$datos['centros'] = $this->Centro_model->obtener_centros();
		$datos['cursos'] = $this->Curso_model->obtener_cursos();
		$this->load->view('header');
		$this->load->view('ciclo/editar_ciclo',$datos);
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para editar un ciclo
	public function actualizar(){
		$datos = array(
			'ID_Curso' => $this->input->post('ID_Curso'),
			'ID_Centro' => $this->input->post('ID_Centro'),
			'COD_Ciclo' => $this->input->post('COD_Ciclo'),
			'DESC_Ciclo' => $this->input->post('DESC_Ciclo')
		);
		$id = $this->uri->segment(3);
		$this->Ciclo_model->actualizar_ciclo($id,$datos);
		redirect('Ciclo');
	}

	//Funcion que realiza la SQL para borrar un ciclo
	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Ciclo_model->borrar_ciclo($id);
		redirect('Ciclo');
	}	

	//Funcion que nos mostrara unos filtros para una busqueda mas exacta
	public function filtrar_ciclo(){
		$datos = array(
			'ID_Curso' => $this->input->post('ID_Curso'),
			'ID_Centro' => $this->input->post('ID_Centro'),
		);	

		$datos['ciclos']=$this->Ciclo_model->filtrar_ciclo_valores($datos);	
		$datos['centros'] = $this->Centro_model->obtener_centros();
		$datos['cursos'] = $this->Curso_model->obtener_cursos();

		$this->load->view('header');
		$this->load->view('ciclo/listar_ciclo',$datos);
		$this->load->view('footer');		
	}
}