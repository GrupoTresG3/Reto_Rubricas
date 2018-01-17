<?php
$form = array(
	'name' => 'form_usuario'
	);
$url = "'".base_url()."index.php/Usuario'";
$js_cancel_button = 'onClick="location.href='.$url.'"';
$User = array(
	'name' => 'User',
	'placeholder' => 'Usuario',
	'maxlength' => 10,
	'size' => 20,
	'class' => 'prueba',
	'required' => 1,
	'value' => $usuarios->result()[0]->User
	);
$Password = array(	
	'name' => 'Password',
	'placeholder' => 'Password',
	'maxlength' => 100,
	'class' => 'prueba',
	'size' => 25,
	'required' => 1,
	'value' => $usuarios->result()[0]->Password
	);
$Nombre = array(	
	'name' => 'Nombre',
	'placeholder' => ' Nombre',
	'maxlength' => 100,
	'class' => 'prueba',
	'size' => 25,
	'required' => 1,
	'value' => $usuarios->result()[0]->Nombre
	);
$Apellidos = array(	
	'name' => 'Apellidos',
	'placeholder' => ' Apellidos',
	'maxlength' => 100,
	'class' => 'prueba',
	'size' => 25,
	'required' => 1,
	'value' => $usuarios->result()[0]->Apellidos
	);
$Email = array(	
	'name' => 'Email',
	'placeholder' => 'Email',
	'maxlength' => 100,
	'class' => 'prueba',
	'size' => 25,
	'required' => 1,
	'value' => $usuarios->result()[0]->Email
	);
$Dni = array(	
	'name' => 'Dni',
	'placeholder' => 'Dni',
	'maxlength' => 100,
	'class' => 'prueba',
	'size' => 25,
	'required' => 1,
	'value' => $usuarios->result()[0]->Dni
	);


	if ($centros){
		$ID_Centro = array();
		foreach ($centros->result() as $centro) {
			$ID_Centro[$centro->ID_Centro] = $centro->DESC_Centro;
		}	
	}
	else{
		$ID_Centro = array(
    		0         => 'No hay Centros'
		);
	}

		if ($tusuarios){
		$ID_TUsuario = array();
		foreach ($tusuarios->result() as $tusuario) {
			$ID_TUsuario[$tusuario->ID_TUsuario] = $tusuario->DESC_TUsuario;
		}	
	}
	else{
		$ID_TUsuario = array(
    		0         => 'No hay TUsuarios'
		);
	}	

?>

<div id="margenEditar">
	<?php echo form_open('Usuario/actualizar/'.$usuarios->result()[0]->ID_Usuario);?>
	<?php echo form_label('Centro: ','ID_Centro'); ?>
	<?php
	//DESPLEGABLE DE CENTRO
	echo form_dropdown('ID_Centro', $ID_Centro, $usuarios->result()[0]->ID_Centro);
	?>
	<br>

	<?php echo form_label('Tusuario: ','ID_TUsuario'); ?>
	<?php
	//DESPLEGABLE DE CURSOS
	echo form_dropdown('ID_TUsuario', $ID_TUsuario, $usuarios->result()[0]->ID_TUsuario);
	?>
	<br>

	<?php echo form_label('User: ','User'); ?>
	<?php echo form_input($User); ?>
	<br>
	<?php echo form_label('Password: ','Password'); ?>
	<?php echo form_input($Password); ?>
	<br>	
	<?php echo form_label('Nombre: ','Nombre'); ?>
	<?php echo form_input($Nombre); ?>
	<br>
	<?php echo form_label('Apellidos: ','Apellidos'); ?>
	<?php echo form_input($Apellidos); ?>
	<br>
	<?php echo form_label('Email: ','Email'); ?>
	<?php echo form_input($Email); ?>
	<br>
	<?php echo form_label('Dni: ','Dni'); ?>
	<?php echo form_input($Dni); ?>
	<br>
	<?php echo form_submit('Actualizar','Actualizar',"id='botonesEditar'"); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>	
	<?php echo form_close();?>
</div>