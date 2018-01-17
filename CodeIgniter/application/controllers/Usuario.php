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

	//ok
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

	//ok
	public function nuevo(){
		$datos['centros'] = $this->Centro_model->obtener_centros();
		$datos['tusuarios'] = $this->TUsuario_model->obtener_tusuarios();
		$this->load->view('header');
		$this->load->view('usuario/nuevo_usuario',$datos);
		$this->load->view('footer');
	}

	//ok
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

	//ok
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['usuarios']=$this->Usuario_model->obtener_usuario($datos['segmento']);
		$datos['centros'] = $this->Centro_model->obtener_centros();
		$datos['tusuarios'] = $this->TUsuario_model->obtener_tusuarios();
		$this->load->view('header');
		$this->load->view('usuario/editar_usuario',$datos);
		$this->load->view('footer');
	}

	//ok 
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

	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Usuario_model->borrar_usuario($id);
		redirect('Usuario');
	}	

	public function filtrar_usuario(){
		$datos = array(
			'ID_TUsuario' => $this->input->post('ID_TUsuario'),
			'ID_Centro' => $this->input->post('ID_Centro'),
		);	
		//$filtro_centro = $this->input->post('ID_Centro');
		//$filtro_curso = $this->input->post('ID_TUsuario');	

		$datos['usuarios']=$this->Usuario_model->filtrar_usuario_valores($datos);	
		$datos['centros'] = $this->Centro_model->obtener_centros();
		$datos['tusuarios'] = $this->TUsuario_model->obtener_tusuarios();

		$this->load->view('header');
		$this->load->view('usuario/listar_usuario',$datos);
		$this->load->view('usuario/nuevo_usuario',$datos);
		$this->load->view('footer');		
	}
}