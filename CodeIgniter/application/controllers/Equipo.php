<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Equipo_model');
		$this->load->model('Reto_model');
	
	}

	//ok
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['equipos'] = $this->Equipo_model->obtener_equipos_valores();
		}else{
			$datos['equipos'] = $this->Equipo_model->obtener_equipo($datos['segmento']);
		}
		$datos['retos'] = $this->Reto_model->obtener_retos();

		$this->load->view('header');
		$this->load->view('equipo/listar_equipo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function nuevo(){
		$datos['retos'] = $this->Reto_model->obtener_retos();
		$this->load->view('header');
		$this->load->view('equipo/nuevo_equipo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function nuevo_equipo(){
		$datos = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
			'COD_Equipo' => $this->input->post('COD_Equipo'),									
			'DESC_Equipo' => $this->input->post('DESC_Equipo')
		);
		$this->Equipo_model->nuevo_equipo($datos);
		redirect('Equipo');		
	}

	//ok
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['equipos']=$this->Equipo_model->obtener_equipo($datos['segmento']);
		$datos['retos'] = $this->Reto_model->obtener_retos();
		$this->load->view('header');
		$this->load->view('equipo/editar_equipo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function actualizar(){
		$datos = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
			'COD_Equipo' => $this->input->post('COD_Equipo'),									
			'DESC_Equipo' => $this->input->post('DESC_Equipo')
		);
		$id = $this->uri->segment(3);
		$this->Equipo_model->actualizar_equipo($id,$datos);
		redirect('Equipo');
	}

	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Equipo_model->borrar_equipo($id);
		redirect('Equipo');
	}	

	public function filtrar_equipo(){
		$datos = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
		);	
		//$filtro_centro = $this->input->post('ID_Centro');
		//$filtro_curso = $this->input->post('ID_Curso');	

		$datos['equipos']=$this->Equipo_model->filtrar_equipo_valores($datos);	
		$datos['retos'] = $this->Reto_model->obtener_retos();

		$this->load->view('header');
		$this->load->view('equipo/listar_equipo',$datos);
		$this->load->view('equipo/nuevo_equipo',$datos);
		$this->load->view('footer');		
	}
}