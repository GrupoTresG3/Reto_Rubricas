<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reto extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Reto_model');
	}

	//Cargamos la pagina principal
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['retos'] = $this->Reto_model->obtener_retos();
		}else{
			$datos['retos'] = $this->Reto_model->obtener_retos($datos['segmento']);
		}
		
		$this->load->view('header');
		$this->load->view('reto/listar_reto',$datos);
		$this->load->view('footer');
	}

	//Aqui se visualiza el formulario para crear un nuevo reto
	public function nuevo(){
		$this->load->view('header');
		$this->load->view('reto/nuevo_reto');
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para inserta un nuevo reto
	public function nuevo_reto(){
		$datos = array(
			'COD_Reto' => $this->input->post('COD_Reto'),
			'DESC_Reto' => $this->input->post('DESC_Reto')
			);
		$this->Reto_model->nuevo_reto($datos);
		redirect('Reto');		
	}

	//Aqui se visualiza el formulario para editar un reto
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['retos']=$this->Reto_model->obtener_reto($datos['segmento']);
		$this->load->view('header');
		$this->load->view('reto/editar_reto',$datos);
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para editar un reto
	public function actualizar(){
		$datos = array(
			'COD_Reto' => $this->input->post('COD_Reto'),
			'DESC_Reto' => $this->input->post('DESC_Reto')
			);
		$id = $this->uri->segment(3);
		$this->Reto_model->actualizar_reto($id,$datos);
		redirect('Reto');
	}

	//Funcion que realiza la SQL para borrar un reto
	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Reto_model->borrar_reto($id);
		redirect('Reto');
	}	
}