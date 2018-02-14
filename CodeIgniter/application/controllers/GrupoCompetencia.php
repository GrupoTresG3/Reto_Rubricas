<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrupoCompetencia extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('GrupoCompetencia_model');
	}

	//Cargamos la pagina principal
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['gruposcompetencias'] = $this->GrupoCompetencia_model->obtener_gruposcompetencias();
		}else{
			$datos['gruposcompetencias'] = $this->GrupoCompetencia_model->obtener_grupocompetencia($datos['segmento']);
		}
		
		$this->load->view('header');
		$this->load->view('grupocompetencia/listar_grupocompetencia',$datos);
		$this->load->view('footer');
	}

	//Aqui se visualiza el formulario para crear un nuevo GrupoCompetencia
	public function nuevo(){
		$this->load->view('header');
		$this->load->view('grupocompetencia/nuevo_grupocompetencia');
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para inserta un nuevo GrupoCompetencia
	public function nuevo_grupocompetencia(){
		$datos = array(
			'DESC_Grupo_Competencia' => $this->input->post('DESC_Grupo_Competencia')
			);
		$this->GrupoCompetencia_model->nuevo_grupocompetencia($datos);
		redirect('GrupoCompetencia');		
	}

	//Aqui se visualiza el formulario para editar un GrupoCompetencia
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['gruposcompetencias']=$this->GrupoCompetencia_model->obtener_grupocompetencia($datos['segmento']);
		$this->load->view('header');
		$this->load->view('grupocompetencia/editar_grupocompetencia',$datos);
		$this->load->view('footer');
	}

	//Funcion que realiza la SQL para editar un GrupoCompetencia
	public function actualizar(){
		$datos = array(
			'DESC_Grupo_Competencia' => $this->input->post('DESC_Grupo_Competencia')
			);
		$id = $this->uri->segment(3);
		$this->GrupoCompetencia_model->actualizar_grupocompetencia($id,$datos);
		redirect('GrupoCompetencia');
	}

	//Funcion que realiza la SQL para borrar un GrupoCompetencia
	public function borrar(){
		$id = $this->uri->segment(3);
		$this->GrupoCompetencia_model->borrar_grupocompetencia($id);
		redirect('GrupoCompetencia');
	}	
}