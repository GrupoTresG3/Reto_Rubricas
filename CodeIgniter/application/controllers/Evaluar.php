
<?php

defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Evaluar extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');   
    $this->load->model('Evaluar_model');
    $this->load->model('Reto_model');
    $this->load->model('Equipo_model');
    $this->load->model('Usuario_model');
    $this->load->model('Competencia_model');
  }

  //Cargamos la pagina principal
  public function index()
  { 
    $datos['equipos'] = $this->Equipo_model->obtener_equipos();

    $this->load->view('header');
    $this->load->view('evaluar/evaluarview.php',$datos);
    $this->load->view('footer');
  }

  //Funcion que realiza la SQL para inserta una nueva nota
  public function nueva_nota(){

    foreach (json_decode($_POST['dato']) as $reg_nota) {

      $datos = array(
        'ID_Reto' => $this->input->post('ID_Reto'),
        'ID_Medicion' =>$_SESSION['user_md'],
        'ID_Evaluador' =>$_SESSION['user_ev'],                 
        'ID_Usuario' => $this->input->post('user'),
        'ID_Competencia' => $reg_nota->id,
        'Nota' => $reg_nota->nota,
        );

      $this->Evaluar_model->nueva_nota($datos);
    } 
    redirect('');
  }

  //Funcion que utilizamos para obtener la tabla retos dependiendo del user_ev (User Evaluador)
  public function obtener_retos(){
      $dato=$_SESSION['user_ev'];
      $datos['retos'] = $this->Reto_model->obtener_reto_evaluar($dato); 
      echo json_encode($datos['retos']->result());
  }

  //Funcion que utilizamos para obtener la tabla equipos dependiendo del user al que pertenece
  public function obtener_user_equipo(){
      $dato=$_GET['user'];
      $datos['equipos'] = $this->Equipo_model->obtener_equipos_evaluar($dato); 
      echo json_encode($datos['equipos']->result());
  }

  //Funcion que utilizamos para obtener la tabla usuarios dependiendo del user_ev (User Evaluador) y si estan metidos en ese reto
  public function obtener_usuarios(){
      $dato=$_SESSION['user_ev'];
      $dat=$_GET['ID_Reto'];
      $datos['usuarios'] = $this->Evaluar_model->obtener_usuarios_reto_grupo($dato, $dat); 
      echo json_encode($datos['usuarios']->result());
  }

  //Funcion que utilizamos para obtener la tabla competencias dependiendo de si es alumno o prefesor quien evalua
  public function obtener_competencias(){
      $dato=$_SESSION['user_id'];
      $datos['notas'] = $this->Evaluar_model->obtener_competencias($dato); 
      echo json_encode($datos['notas']->result());
  }

  //Funcion que utilizamos para obtener las notas de cada alumno
  public function obtener_nota_filtro(){
      $dato=$_GET['nota'];
      $datos['nota'] = $this->Evaluar_model->obtener_nota_filtro($dato); 
        if ($datos['nota'] == false){
            echo json_encode(false);
          }else{
            echo json_encode($datos['nota']->result()); 
        }
  }

  //Funcion que utilizamos para obtener la tabla usuarios que se van a evaluar
  public function obtener_usuario(){
      $dato=$_GET['ID_Equipo'];
      $datos['usuario'] = $this->Usuario_model->obtener_usuarios_evaluar($dato); 
      echo json_encode($datos['usuario']->result());

  }

  //Funcion que utilizamos para obtener la tabla competencias dependiendo de si es alumno o prefesor quien evalua
  public function obtener_competencia(){
      $dato=$_SESSION['user_id'];
      $datos['competencia'] = $this->Competencia_model->obtener_competencias_evaluar($dato); 
      echo json_encode($datos['competencia']->result());
  }

  //Funcion que nos mostrara unos filtros para una busqueda mas exacta
  public function filtrar_evaluar(){
      $dato=$_SESSION['user_ev'];
      $datos = array(
        'ID_Equipo' => $this->input->post('ID_Equipo'),

        );  

      $datos['evaluar']=$this->Evaluar_model->filtrar_nota_valores($datos, $dato); 
      $datos['equipos'] = $this->Equipo_model->obtener_equipos();


      $this->load->view('header');
      $this->load->view('evaluar/evaluarview.php',$datos);
      $this->load->view('footer');    
  }
}