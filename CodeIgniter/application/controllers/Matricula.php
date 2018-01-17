<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matricula extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Matricula_model');
		$this->load->model('Equipo_model');
		$this->load->model('Usuario_model');

	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('matricula/matriculaView');
		$this->load->view('footer');
	}

	public function nueva_matricula(){
		$datos = array(
			'ID_Equipo' => $this->input->post('ID_Equipo'),
			'ID_Usuario' => $this->input->post('ID_Usuario'),
		);
		$this->Matricula_model->nueva_matricula();
		redirect('');		
	}

}