<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function obtener_tipo_usuario(){
		//$passwordmd5=md5($_POST['password']);
		/*if(isset($_POST["user"]) &&isset($_POST["password"])){
			if($_POST["user"]!=""&&/*$passwordmd5$_POST["password"]!=""){
				$user_id=null;
				$query= "select * from `Usuario` WHERE `User`='".$_POST['user']."' OR `Email`='".$_POST['user']."' AND `Password`='".$_POST['password']."'";
				$query = $this->db->query($query);
				foreach ($query->result()as $row) {
					$user_id=$row->ID_TUsuario;
				}
				if($user_id==null){

				}else{
					session_start();
					$_SESSION["user_id"]=$user_id;

				}
			}
		}*/
		if(isset($_POST['user'])){

			$passwordmd5=md5($_POST['password']);
			if(isset($_POST["user"]) &&isset($passwordmd5)){

				if($_POST["user"]!=""&&$passwordmd5!=""){

					$user_id=null;
					$query= "select * from `Usuario` WHERE `User`='".$_POST['user']."' AND `Password`='$passwordmd5'";
					$query = $this->db->query($query);
					foreach ($query->result()as $row) {
						$user_id=$row->ID_TUsuario;
					}
					if($user_id==null){
        //print "<script>alert(\"Acceso invalido.\");window.location='login.php';</script>";
					}else{
						echo $user_id;
						session_start();
						$_SESSION["user_id"]=$user_id;      
					}
				}
			}
		}
	}
	public function cerrar_sesion(){
		session_start();
		session_destroy(); 
		
	}
}





?>