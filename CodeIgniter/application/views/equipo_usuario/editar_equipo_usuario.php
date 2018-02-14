<?php
session_start();
if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
	?>
	<?php
	$form = array(
		'name' => 'form_equipo_usuario'
		);
	$url = "'".base_url()."index.php/Equipo_Usuario'";
	$js_cancel_button = 'onClick="location.href='.$url.'"';
	$COD_Rol = array(
		'name' => 'COD_Rol',
		'placeholder' => 'Código de Rol',
		'maxlength' => 20,
		'class' => 'prueba',
		'size' => 25,
		'required' => 1,
		'value' => $equipos_usuarios->result()[0]->COD_Rol
		);



	if ($equipos){
		$ID_Equipo = array();
		foreach ($equipos->result() as $equipo) {
			$ID_Equipo[$equipo->ID_Equipo] = $equipo->DESC_Equipo;
		}	
	}
	else{
		$ID_Equipo = array(
			0         => 'No hay Equipos'
			);
	}

	if ($usuarios){
		$ID_Usuario = array();
		foreach ($usuarios->result() as $usuario) {
			$ID_Usuario[$usuario->ID_Usuario] = $usuario->User;
		}	
	}
	else{
		$ID_Usuario = array(
			0         => 'No hay Usuarios'
			);
	}	

	?>

	<div id="margenEditar">
		<?php echo form_open('Equipo_Usuario/actualizar/'.$equipos_usuarios->result()[0]->ID_Equipo_Alumno);?>
		<?php echo form_label('Equipo: ','ID_Equipo'); ?>
		<?php
		echo form_dropdown('ID_Equipo', $ID_Equipo, $equipos_usuarios->result()[0]->ID_Equipo);
		?>
		<br>
		<?php echo form_label('Usuario: ','ID_Usuario'); ?>
		<?php
		echo form_dropdown('ID_Usuario', $ID_Usuario, $equipos_usuarios->result()[0]->ID_Usuario);
		?>
		<br>
		<?php echo form_label('Código de Rol: ','COD_Rol'); ?>
		<?php echo form_input($COD_Rol); ?>
		<br>
		<?php echo form_submit('Actualizar','Actualizar',"id='botonesEditar'"); ?>
		<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>	
		<?php echo form_close();?>
	</div>
	<?php  
}
else{
	?>
	<script>
		alert('No eres admin');
		window.location="<? echo base_url().'index.php'?>";
	</script>
	<?php
}

?>