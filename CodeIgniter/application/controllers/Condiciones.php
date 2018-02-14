<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Condiciones extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');   
    $this->load->model('Condiciones_model');
  }

  //ok
  public function index()
  { 
    $this->load->view('header');
    $this->load->view('condiciones/condiciones');
    $this->load->view('footer');
  }
}
