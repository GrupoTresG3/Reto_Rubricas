<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicion extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Medicion_model');
		$this->load->model('TUsuario_model');
	
	}

	//Cargamos la pagina principal
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['mediciones'] = $this->Medicion_model->obtener_mediciones_valores();
		}else{
			$datos['mediciones'] = $this->Medicion_model->obtener_medicion($datos['segmento']);
		}
		$datos['tusuarios'] = $this->TUsuario_model->obtener_tusuarios();

		$this->load->view('header');
		$this->load->view('medicion/listar_medicion',$datos);
		$this->load->view('footer');
	}

	//Aqui se visualiza el formulario para crear una nueva medicion
	public function nuevo(){
		$datos['tusuarios'] = $this->TUsuario_model->obtener_tusuarios();
		$this->load->view('header');
		$this->load->view('medicion/nuevo_medicion',$datos);
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para inserta una nueva medicion
	public function nuevo_medicion(){
		$datos = array(
			'ID_TUsuario' => $this->input->post('ID_TUsuario'),
			'COD_Medicion' => $this->input->post('COD_Medicion'),									
			'DESC_Medicion' => $this->input->post('DESC_Medicion')
		);
		$this->Medicion_model->nuevo_medicion($datos);
		redirect('Medicion');		
	}

	//Aqui se visualiza el formulario para editar una medicion
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['mediciones']=$this->Medicion_model->obtener_medicion($datos['segmento']);
		$datos['tusuarios'] = $this->TUsuario_model->obtener_tusuarios();
		$this->load->view('header');
		$this->load->view('medicion/editar_medicion',$datos);
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para editar una medicion
	public function actualizar(){
		$datos = array(
			'ID_TUsuario' => $this->input->post('ID_TUsuario'),
			'COD_Medicion' => $this->input->post('COD_Medicion'),									
			'DESC_Medicion' => $this->input->post('DESC_Medicion')
		);
		$id = $this->uri->segment(3);
		$this->Medicion_model->actualizar_medicion($id,$datos);
		redirect('Medicion');
	}

	//Funcion que realiza la SQL para borrar una medicion
	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Medicion_model->borrar_medicion($id);
		redirect('Medicion');
	}	

	//Funcion que nos mostrara unos filtros para una busqueda mas exacta
	public function filtrar_medicion(){
		$datos = array(
			'ID_TUsuario' => $this->input->post('ID_TUsuario'),
		);	

		$datos['mediciones']=$this->Medicion_model->filtrar_medicion_valores($datos);	
		$datos['tusuarios'] = $this->TUsuario_model->obtener_tusuarios();

		$this->load->view('header');
		$this->load->view('medicion/listar_medicion',$datos);
		$this->load->view('footer');		
	}
}