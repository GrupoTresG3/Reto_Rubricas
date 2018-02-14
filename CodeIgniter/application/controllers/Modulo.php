<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Centro_model');
		$this->load->model('Curso_model');
		$this->load->model('Ciclo_model');
		$this->load->model('Modulo_model');			
	}

	//Cargamos la pagina principal
	public function index()
	{
		$datos['ciclos'] = $this->Modulo_model->obtener_datos_ciclo();
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['modulos'] = $this->Modulo_model->obtener_modulos_valores();
		}else{
			$datos['modulos'] = $this->Modulo_model->obtener_modulo($datos['segmento']);
		}

		$this->load->view('header');
		$this->load->view('modulo/listar_modulo',$datos);
		$this->load->view('footer');
	}

	//Aqui se visualiza el formulario para crear un nuevo modulo
	public function nuevo(){
		$datos['ciclos'] = $this->Modulo_model->obtener_datos_ciclo();
		$this->load->view('header');
		$this->load->view('modulo/nuevo_modulo',$datos);
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para inserta un nuevo modulo
	public function nuevo_modulo(){
		$datos = array(
			'ID_Modulo' => $this->input->post('ID_Modulo'),
			'ID_Ciclo' => $this->input->post('ID_Ciclo'),
			'COD_Modulo' => $this->input->post('COD_Modulo'),									
			'DESC_Modulo' => $this->input->post('DESC_Modulo'),
			);
		$this->Modulo_model->nuevo_modulo($datos);
		redirect('Modulo');		
	}

	//Aqui se visualiza el formulario para editar un modulo
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['modulos']=$this->Modulo_model->obtener_modulo($datos['segmento']);
		$datos['ciclos'] = $this->Modulo_model->obtener_datos_ciclo();
		$this->load->view('header');
		$this->load->view('modulo/editar_modulo',$datos);
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para editar un ciclo
	public function actualizar(){
		$datos = array(
			'ID_Modulo' => $this->input->post('ID_Modulo'),
			'ID_Ciclo' => $this->input->post('ID_Ciclo'),
			'COD_Modulo' => $this->input->post('COD_Modulo'),
			'DESC_Modulo' => $this->input->post('DESC_Modulo')
			);
		$id = $this->uri->segment(3);
		$this->Modulo_model->actualizar_modulo($id,$datos);
		redirect('Modulo');
	}

	//Funcion que realiza la SQL para borrar un ciclo
	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Modulo_model->borrar_modulo($id);
		redirect('Modulo');
	}	
	
	//Funcion que nos mostrara unos filtros para una busqueda mas exacta
	public function filtrar_modulo(){
		$datos = array(
			'ID_Curso' => $this->input->post('ID_Curso'),
			'ID_Centro' => $this->input->post('ID_Centro'),
			'ID_Ciclo' => $this->input->post('ID_Ciclo'),
			);	

		$datos['modulos']= $this->Modulo_model->filtrar_modulo_valores($datos);	
		$datos['ciclos'] = $this->Modulo_model->obtener_datos_ciclo();

		$this->load->view('header');
		$this->load->view('modulo/listar_modulo',$datos);
		$this->load->view('footer');		
	}
}