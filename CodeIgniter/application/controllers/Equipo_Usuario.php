<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo_Usuario extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Equipo_model');
		$this->load->model('Usuario_model');
		$this->load->model('Equipo_Usuario_model');		
	}

	//ok
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['equipos_usuarios'] = $this->Equipo_Usuario_model->obtener_equipos_usuarios_valores();
		}else{
			$datos['equipos_usuarios'] = $this->Equipos_Usuarios_model->obtener_equipo_usuario($datos['segmento']);
		}
		$datos['equipos'] = $this->Equipo_model->obtener_equipos();
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios();

		$this->load->view('header');
		$this->load->view('equipo_usuario/listar_equipo_usuario',$datos);
		$this->load->view('footer');
	}

	//ok
	public function nuevo(){
		$datos['equipos'] = $this->Equipo_model->obtener_equipos();
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios();
		$this->load->view('header');
		$this->load->view('equipo_usuario/nuevo_equipo_usuario',$datos);
		$this->load->view('footer');
	}

	//ok
	public function nuevo_equipo_usuario(){
		$datos = array(
			'ID_Equipo' => $this->input->post('ID_Equipo'),
			'ID_Usuario' => $this->input->post('ID_Usuario'),
			'COD_Rol' => $this->input->post('COD_Rol'),									
			
		);
		$this->Equipo_Usuario_model->nuevo_equipo_usuario($datos);
		redirect('Equipo_Usuario');		
	}

	//ok
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['equipos_usuarios']=$this->Equipo_Usuario_model->obtener_equipo_usuario($datos['segmento']);
		$datos['equipos'] = $this->Equipo_model->obtener_equipos();
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios();
		$this->load->view('header');
		$this->load->view('equipo_usuario/editar_equipo_usuario',$datos);
		$this->load->view('footer');
	}

	//ok
	public function actualizar(){
		$datos = array(
			'ID_Equipo' => $this->input->post('ID_Equipo'),
			'ID_Usuario' => $this->input->post('ID_Usuario'),
			'COD_Rol' => $this->input->post('COD_Rol'),
		);
		$id = $this->uri->segment(3);
		$this->Equipo_Usuario_model->actualizar_equipo_usuario($id,$datos);
		redirect('Equipo_Usuario');
	}

	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Equipo_Usuario_model->borrar_equipo_usuario($id);
		redirect('Equipo_Usuario');
	}	

	public function filtrar_equipo_usuario(){
		$datos = array(
			'ID_Equipo' => $this->input->post('ID_Equipo'),
			'ID_Usuario' => $this->input->post('ID_Usuario'),
		);	
		//$filtro_centro = $this->input->post('ID_Centro');
		//$filtro_curso = $this->input->post('ID_Curso');	

		$datos['equipos_usuarios']=$this->Equipo_Usuario_model->filtrar_equipo_usuario_valores($datos);	
		$datos['equipos'] = $this->Equipo_model->obtener_equipos();
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios();

		$this->load->view('header');
		$this->load->view('equipo_usuario/listar_equipo_usuario',$datos);
		$this->load->view('equipo_usuario/nuevo_equipo_usuario',$datos);
		$this->load->view('footer');		
	}
}