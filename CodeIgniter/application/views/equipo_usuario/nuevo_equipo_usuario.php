<?php
$form = array(
	'name' => 'form_equipo_usuario'
	);
$COD_Rol = array(
	'name' => 'COD_Rol',
	'placeholder' => 'Código de Rol',
	'maxlength' => 10,
	'size' => 20,
	'class' => 'prueba',
	'required' => 1
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

<div id="centro2">
	<?php echo form_open('Equipo_Usuario/nuevo_equipo_usuario',$form);?>
	<?php echo form_label('Equipo: ','ID_Equipo'); ?>
	<?php
	//DESPLEGABLE DE CENTRO
	echo form_dropdown('ID_Equipo', $ID_Equipo,1);
	?>
	<br>

	<?php echo form_label('Usuario: ','ID_Usuario'); ?>
	<?php
	//DESPLEGABLE DE CURSOS
	echo form_dropdown('ID_Usuario', $ID_Usuario,1);
	?>
	<br>

	<?php echo form_label('Código de Rol: ','COD_Rol'); ?>
	<?php echo form_input($COD_Rol); ?>
	<br>	
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>