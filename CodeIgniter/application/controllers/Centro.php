<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Centro extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Centro_model');

	}

	//Cargamos la pagina principal
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['centros'] = $this->Centro_model->obtener_centros();
		}else{
			$datos['centros'] = $this->Centro_model->obtener_centro($datos['segmento']);
		}
		
		$this->load->view('header');
		$this->load->view('centro/listar_centro',$datos);
		$this->load->view('footer');
	}

	//Aqui se visualiza el formulario para crear un nuevo centro
	public function nuevo(){
		$this->load->view('header');
		$this->load->view('centro/nuevo_centro');
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para inserta un nuevo centro
	public function nuevo_centro(){
		$datos = array(
			'COD_Centro' => $this->input->post('COD_Centro'),
			'DESC_Centro' => $this->input->post('DESC_Centro')
		);
		$this->Centro_model->nuevo_centro($datos);
		redirect('Centro');		
	}

	//Aqui se visualiza el formulario para editar un centro
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['centros']=$this->Centro_model->obtener_centro($datos['segmento']);
		$this->load->view('header');
		$this->load->view('centro/editar_centro',$datos);
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para editar un centro
	public function actualizar(){
		$datos = array(
			'COD_Centro' => $this->input->post('COD_Centro'),
			'DESC_Centro' => $this->input->post('DESC_Centro')
		);
		$id = $this->uri->segment(3);
		$this->Centro_model->actualizar_centro($id,$datos);
		redirect('Centro');
	}

	//Funcion que realiza la SQL para borrar un centro
	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Centro_model->borrar_centro($id);
		redirect('Centro');
	}	
}