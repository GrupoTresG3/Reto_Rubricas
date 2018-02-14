<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacidad extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');   
    $this->load->model('Privacidad_model');

  }

  public function index()
  {
    $this->load->view('header');
    $this->load->view('privacidad/privacidad');
    $this->load->view('footer');
  }
}