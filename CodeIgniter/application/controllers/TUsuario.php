<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TUsuario extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('TUsuario_model');
	}

	//Cargamos la pagina principal
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['tusuarios'] = $this->TUsuario_model->obtener_tusuarios();
		}else{
			$datos['tusuarios'] = $this->TUsuarios_model->obtener_tusuarios($datos['segmento']);
		}
		
		$this->load->view('header');
		$this->load->view('tusuario/listar_tusuario',$datos);
		$this->load->view('footer');
	}

	//Aqui se visualiza el formulario para crear un nuevo TUsuario
	public function nuevo(){
		$this->load->view('header');
		$this->load->view('tusuario/nuevo_tusuario');
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para inserta un nuevo TUsuario
	public function nuevo_tusuario(){
		$datos = array(
			'DESC_TUsuario' => $this->input->post('DESC_TUsuario'),
			);
		$this->TUsuario_model->nuevo_tusuario($datos);
		redirect('TUsuario');		
	}

	//Aqui se visualiza el formulario para editar un TUsuario
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['tusuarios']=$this->TUsuario_model->obtener_tusuario($datos['segmento']);
		$this->load->view('header');
		$this->load->view('tusuario/editar_tusuario',$datos);
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para editar un TUsuario
	public function actualizar(){
		$datos = array(
			'DESC_TUsuario' => $this->input->post('DESC_TUsuario')
			);
		$id = $this->uri->segment(3);
		$this->TUsuario_model->actualizar_tusuario($id,$datos);
		redirect('TUsuario');
	}
	
	//Funcion que realiza la SQL para borrar un TUsuario
	public function borrar(){
		$id = $this->uri->segment(3);
		$this->TUsuario_model->borrar_tusuario($id);
		redirect('TUsuario');
	}	
}