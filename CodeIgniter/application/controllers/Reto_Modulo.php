<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reto_Modulo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('reto_model');
		$this->load->model('Modulo_model');
		$this->load->model('Usuario_model');
		$this->load->model('reto_Modulo_model');		
	}

	//ok
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['retos_modulos'] = $this->reto_Modulo_model->obtener_retos_modulos_valores();
		}else{
			$datos['retos_modulos'] = $this->reto_Modulo_model->obtener_reto_modulo($datos['segmento']);
		}
		$datos['modulos'] = $this->Modulo_model->obtener_modulos();
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios();
		$datos['retos'] = $this->reto_model->obtener_retos();
		
		$this->load->view('header');
		$this->load->view('reto_modulo/listar_reto_modulo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function nuevo(){
		$datos['modulos'] = $this->Modulo_model->obtener_modulos_valores();
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios_valores();
		$datos['retos'] = $this->reto_model->obtener_retos();
		$this->load->view('header');
		$this->load->view('reto_modulo/nuevo_reto_modulo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function nuevo_reto_modulo(){
		$datos = array(
			'ID_Reto_modulo' => $this->input->post('ID_Reto_modulo'),
			'ID_Reto' => $this->input->post('ID_Reto'),
			'ID_Modulo' => $this->input->post('ID_Modulo'),									
			'ID_UAdmin' => $this->input->post('ID_UAdmin'),
			'IN_Extendido' => $this->input->post('IN_Extendido'),
			'IN_EAbierta' => $this->input->post('IN_EAbierta'),
		);
		$this->reto_Modulo_model->nuevo_reto_modulo($datos);
		redirect('Reto_Modulo');		
	}

	//ok
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['retos_modulos']=$this->reto_Modulo_model->obtener_reto_modulo($datos['segmento']);
		$datos['retos'] = $this->reto_model->obtener_retos();
		$datos['modulos'] = $this->Modulo_model->obtener_modulos();
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios();
		$this->load->view('header');
		$this->load->view('reto_modulo/editar_reto_modulo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function actualizar(){
		$datos = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
			'ID_Modulo' => $this->input->post('ID_Modulo'),
			'ID_UAdmin' => $this->input->post('ID_Usuario'),
			'IN_Extendido' => $this->input->post('IN_Extendido'),
			'IN_EAbierta' => $this->input->post('IN_EAbierta')
		);
		$id = $this->uri->segment(3);
		$this->reto_Modulo_model->actualizar_reto_modulo($id,$datos);
		redirect('Reto_Modulo');
	}

	public function borrar(){
		$id = $this->uri->segment(3);
		$this->reto_Modulo_model->borrar_reto_modulo($id);
		redirect('Reto_Modulo');
	}	

	public function filtrar_reto_modulo(){
		$datos = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
			'ID_Usuario' => $this->input->post('ID_Usuario'),
			'ID_Modulo' => $this->input->post('ID_Modulo'),
		);	
		//$filtro_centro = $this->input->post('ID_Centro');
		//$filtro_curso = $this->input->post('ID_Curso');	

		$datos['retos_modulos']=$this->reto_Modulo_model->filtrar_reto_modulo_valores($datos);	
		$datos['retos'] = $this->reto_model->obtener_retos();
		$datos['modulos'] = $this->Modulo_model->obtener_modulos();
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios();

		$this->load->view('header');
		$this->load->view('reto_modulo/listar_reto_modulo',$datos);
		$this->load->view('reto_modulo/nuevo_reto_modulo',$datos);
		$this->load->view('footer');		
	}
	
}