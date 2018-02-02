
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

  //ok
  public function index()
  { 
    $datos['equipos'] = $this->Equipo_model->obtener_equipos();

    $this->load->view('header');
    $this->load->view('evaluar/evaluarview.php',$datos);
    $this->load->view('footer');
  }

  public function nueva_nota(){
    //$notamedia=$_POST[0]+$_POST[1]+$_POST[2]+$_POST[3]+$_POST[4]+$_POST[5]+$_POST[6]+$_POST[7]+$_POST[8];
    //Pillar todas las competencias de esa Medicion y hacer un bucle.

    foreach (json_decode($_POST['dato']) as $reg_nota) {
          //var_dump($reg_nota);
      $datos = array(
        'ID_Reto' => $this->input->post('ID_Reto'),
        'ID_Medicion' =>$_SESSION['user_md'],
        'ID_Evaluador' =>$_SESSION['user_ev'],                 
        'ID_Usuario' => $this->input->post('user'),
        'ID_Competencia' => $reg_nota->id,
        'Nota' => $reg_nota->nota,
      );
          //var_dump($datos);
          //echo '<br>';echo '<br>';
          //var_dump($datos['ID_Usuario']);
      $this->Evaluar_model->nueva_nota($datos);
    } 
    redirect('');
  }
  
  public function obtener_retos(){
   $dato=$_SESSION['user_ev'];
    //como gestionar sesiones emn codeigniter.
    //abrir la sesion y llamos directamente funcion para ver la sql
   $datos['retos'] = $this->Reto_model->obtener_reto_evaluar($dato); 
          //var_dump ($datos['retos']->result());
   echo json_encode($datos['retos']->result());
 }
 public function obtener_user_equipo(){
  $dato=$_GET['user'];
  $datos['equipos'] = $this->Equipo_model->obtener_equipos_evaluar($dato); 
  echo json_encode($datos['equipos']->result());

}
public function obtener_usuarios(){
  $dato=$_SESSION['user_ev'];
  $dat=$_GET['ID_Reto'];
  $datos['usuarios'] = $this->Evaluar_model->obtener_usuarios_reto_grupo($dato, $dat); 

  echo json_encode($datos['usuarios']->result());

}
public function obtener_competencias(){
  $dato=$_SESSION['user_id'];
          //$dato=2;
  $datos['notas'] = $this->Evaluar_model->obtener_competencias($dato); 
  echo json_encode($datos['notas']->result());
}

public function obtener_nota_filtro(){
  $dato=$_GET['nota'];
  $datos['nota'] = $this->Evaluar_model->obtener_nota_filtro($dato); 
  if ($datos['nota'] == false){
    echo json_encode(false);
  }
  else{
   echo json_encode($datos['nota']->result()); 
 }
}

public function obtener_usuario(){
  $dato=$_GET['ID_Equipo'];
  $datos['usuario'] = $this->Usuario_model->obtener_usuarios_evaluar($dato); 
  echo json_encode($datos['usuario']->result());

}

public function obtener_competencia(){
  $dato=$_SESSION['user_id'];
  $datos['competencia'] = $this->Competencia_model->obtener_competencias_evaluar($dato); 
  echo json_encode($datos['competencia']->result());

}
public function filtrar_evaluar(){
    $dato=$_SESSION['user_ev'];
    $datos = array(
      'ID_Equipo' => $this->input->post('ID_Equipo'),

    );  
    //$filtro_centro = $this->input->post('ID_Centro');
    //$filtro_curso = $this->input->post('ID_Curso'); 

    $datos['evaluar']=$this->Evaluar_model->filtrar_nota_valores($datos, $dato); 
    $datos['equipos'] = $this->Equipo_model->obtener_equipos();
    

    $this->load->view('header');
    $this->load->view('evaluar/evaluarview.php',$datos);
    $this->load->view('footer');    
  }


}