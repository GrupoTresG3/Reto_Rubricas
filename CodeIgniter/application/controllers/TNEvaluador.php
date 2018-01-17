<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TNEvaluador extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('TNEvaluador_model');
	}

	//ok
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['tnevaluadores'] = $this->TNEvaluador_model->obtener_tnevaluadores();
		}else{
			$datos['tnevaluadores'] = $this->TNEvaluador_model->obtener_tnevaluadores($datos['segmento']);
		}
		
		$this->load->view('header');
		$this->load->view('tnevaluador/listar_tnevaluador',$datos);
		$this->load->view('tnevaluador/nuevo_tnevaluador');
		$this->load->view('footer');
	}

	//ok
	public function nuevo(){
		$this->load->view('header');
		$this->load->view('tnevaluador/nuevo_tnevaluador');
		$this->load->view('footer');
	}

	//ok
	public function nuevo_tnevaluador(){
		$datos = array(
			'DESC_TNEvaluador' => $this->input->post('DESC_TNEvaluador'),
		);
		$this->TNEvaluador_model->nuevo_tnevaluador($datos);
		redirect('TNEvaluador');		
	}

	//
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['tnevaluador']=$this->TNEvaluador_model->obtener_tnevaluador($datos['segmento']);
		$this->load->view('header');
		$this->load->view('tnevaluador/editar_tnevaluador',$datos);
		$this->load->view('footer');
	}

	public function actualizar(){
		$datos = array(
			'DESC_TNEvaluador' => $this->input->post('DESC_TNEvaluador')
		);
		$id = $this->uri->segment(3);
		$this->TNEvaluador_model->actualizar_tnevaluador($id,$datos);
		redirect('TNEvaluador');
	}

	public function borrar(){
		$id = $this->uri->segment(3);
		$this->TNEvaluador_model->borrar_tnevaluador($id);
		redirect('TNEvaluador');
	}	
}