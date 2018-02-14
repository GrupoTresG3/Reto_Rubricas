<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Centro_model');
		$this->load->model('TUsuario_model');
		$this->load->model('Usuario_model');		
	}

	//Cargamos la pagina principal
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['usuarios'] = $this->Usuario_model->obtener_usuarios_valores();
		}else{
			$datos['usuarios'] = $this->Usuarios_model->obtener_usuario($datos['segmento']);
		}
		$datos['centros'] = $this->Centro_model->obtener_centros();
		$datos['tusuarios'] = $this->TUsuario_model->obtener_tusuarios();

		$this->load->view('header');
		$this->load->view('usuario/listar_usuario',$datos);
		$this->load->view('footer');
	}

	//Aqui se visualiza el formulario para crear un nuevo Usuario
	public function nuevo(){
		$datos['centros'] = $this->Centro_model->obtener_centros();
		$datos['tusuarios'] = $this->TUsuario_model->obtener_tusuarios();
		$this->load->view('header');
		$this->load->view('usuario/nuevo_usuario',$datos);
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para inserta un nuevo Usuario
	public function nuevo_usuario(){
		$datos = array(
			
			'ID_Centro' => $this->input->post('ID_Centro'),
			'ID_TUsuario' => $this->input->post('ID_TUsuario'),
			'User' => $this->input->post('User'),									
			'Password' => $this->input->post('Password'),
			'Nombre' => $this->input->post('Nombre'),
			'Apellidos' => $this->input->post('Apellidos'),
			'Email' => $this->input->post('Email'),
			'Dni' => $this->input->post('Dni'),


			);
		$this->Usuario_model->nuevo_usuario($datos);
		redirect('Usuario');		
	}

	//Aqui se visualiza el formulario para editar un Usuario
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['usuarios']=$this->Usuario_model->obtener_usuario($datos['segmento']);
		$datos['centros'] = $this->Centro_model->obtener_centros();
		$datos['tusuarios'] = $this->TUsuario_model->obtener_tusuarios();
		$this->load->view('header');
		$this->load->view('usuario/editar_usuario',$datos);
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para editar un Usuario
	public function actualizar(){
		$datos = array(
			'ID_Centro' => $this->input->post('ID_Centro'),
			'ID_TUsuario' => $this->input->post('ID_TUsuario'),
			'User' => $this->input->post('User'),									
			'Password' => $this->input->post('Password'),
			'Nombre' => $this->input->post('Nombre'),
			'Apellidos' => $this->input->post('Apellidos'),
			'Email' => $this->input->post('Email'),
			'Dni' => $this->input->post('Dni'),
			);
		$id = $this->uri->segment(3);
		$this->Usuario_model->actualizar_usuario($id,$datos);
		redirect('Usuario');
	}

	//Funcion que realiza la SQL para borrar un Usuario
	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Usuario_model->borrar_usuario($id);
		redirect('Usuario');
	}	

	//Funcion que nos mostrara unos filtros para una busqueda mas exacta
	public function filtrar_usuario(){
		$datos = array(
			'ID_TUsuario' => $this->input->post('ID_TUsuario'),
			'ID_Centro' => $this->input->post('ID_Centro'),
			);	

		$datos['usuarios']=$this->Usuario_model->filtrar_usuario_valores($datos);	
		$datos['centros'] = $this->Centro_model->obtener_centros();
		$datos['tusuarios'] = $this->TUsuario_model->obtener_tusuarios();

		$this->load->view('header');
		$this->load->view('usuario/listar_usuario',$datos);
		$this->load->view('footer');		
	}
}