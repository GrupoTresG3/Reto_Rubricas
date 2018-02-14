<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	//Obtiene el usuario que tenga el mismo user y password que se a recibido
	public function obtener_tipo_usuario(){

		if(isset($_POST['user'])){

			$passwordmd5=md5($_POST['password']);
			if(isset($_POST["user"]) &&isset($passwordmd5)){

				if($_POST["user"]!=""&&$passwordmd5!=""){

					$user_id=null;
					$query= "select * from `Usuario` WHERE `User`='".$_POST['user']."' AND `Password`='$passwordmd5'";
					$query = $this->db->query($query);
					foreach ($query->result()as $row) {
						$user_id=$row->ID_TUsuario;
						$user_ev=$row->ID_Usuario;
						$user_nom=$row->User;
					}

					$query2= "select * from `Medicion` WHERE `ID_TUsuario`=".$user_id."";
					$query2 = $this->db->query($query2);
					foreach ($query2->result()as $row) {
						$user_md=$row->ID_Medicion;
						
					}

					if($user_id==null){
					}else{
						echo $user_id;
						session_start();
						//Manda variables 
						$_SESSION["user_id"]=$user_id; 
						$_SESSION["user_ev"]=$user_ev;
						$_SESSION["user_md"]=$user_md; 
						$_SESSION["user_nom"]=$user_nom;      
					}
				}
			}
		}
	}
	//Cierra sesion
	public function cerrar_sesion(){
		session_start();
		session_destroy(); 
		
	}
}





?>