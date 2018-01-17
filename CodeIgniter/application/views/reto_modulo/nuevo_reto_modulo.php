<?php
$form = array(
	'name' => 'form_reto_modulo'
	);
$IN_Extendido = array(
	'name' => 'IN_Extendido',
	'placeholder' => 'Código de IN_Extendido',
	'maxlength' => 10,
	'size' => 20,
	'class' => 'prueba',
	'required' => 1
	);
$IN_EAbierta = array(	
	'name' => 'IN_EAbierta',
	'placeholder' => 'Descripción de IN_EAbierta',
	'maxlength' => 100,
	'class' => 'prueba',
	'size' => 25,
	'required' => 1
	);


	//FILTROS
		if ($modulos){
		$ID_Modulo = array();
		foreach ($modulos->result() as $modulo) {
			$ID_Modulo[$modulo->ID_Modulo] = $modulo->DESC_Modulo;
		}	
	}
	else{
		$ID_Modulo = array(
    		0         => 'No hay Modulos'
		);
	}

	if ($usuarios){
		$ID_Usuario = array();
		foreach ($usuarios->result() as $usuario) {
			$ID_Usuario[$usuario->ID_Usuario] = $usuario->Nombre;
		}	
	}
	else{
		$ID_Usuario = array(
    		0         => 'No hay Usuarios'
		);
	}

	if ($retos){
		$ID_Reto = array();
		foreach ($retos->result() as $reto) {
			$ID_Reto[$reto->ID_Reto] = $reto->COD_Reto;
		}	
	}
	else{
		$ID_Reto = array(
    		0         => 'No hay Retos'
		);
	}

?>

<div id="centro2">
	<?php echo form_open('Reto_Modulo/nuevo_reto_modulo',$form);?>
	<?php echo form_label('Modulo: ','ID_Modulo'); ?>
	<?php
	//DESPLEGABLE DE CENTRO
	echo form_dropdown('ID_Modulo', $ID_Modulo,1);
	?>
	<br>

	<?php echo form_label('Reto: ','ID_Reto'); ?>
	<?php
	//DESPLEGABLE DE CURSOS
	echo form_dropdown('ID_Reto', $ID_Reto,1);
	?>
	<br>
	<?php echo form_label('Usuario: ','ID_Usuario'); ?>
	<?php
	//DESPLEGABLE DE CURSOS
	echo form_dropdown('ID_Usuario', $ID_Usuario,1);
	?>
	<br>

	
	<?php echo form_label('IN_Extendido: ','IN_Extendido'); ?>
	<?php echo form_input($IN_Extendido); ?>
	<br>	
	<?php echo form_label('IN_EAbierta: ','IN_EAbierta'); ?>
	<?php echo form_input($IN_EAbierta); ?>
	<br>
	<?php echo form_submit('Crear','Crear',"id='botonesNuevo'"); ?>
	<?php echo form_close();?>
</div>