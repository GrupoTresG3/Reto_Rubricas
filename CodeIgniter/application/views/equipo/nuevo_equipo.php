<?php
$form = array(
	'name' => 'form_equipo'
	);
$COD_Equipo = array(
	'name' => 'COD_Equipo',
	'placeholder' => 'Código de Equipo',
	'maxlength' => 10,
	'size' => 20,
	'class' => 'prueba',
	'required' => 1
	);
$DESC_Equipo = array(	
	'name' => 'DESC_Equipo',
	'placeholder' => 'Descripción de Equipo',
	'maxlength' => 100,
	'class' => 'prueba',
	'size' => 25,
	'required' => 1
	);


	if ($retos){
		$ID_Reto = array();
		foreach ($retos->result() as $reto) {
			$ID_Reto[$reto->ID_Reto] = $reto->DESC_Reto;
		}	
	}
	else{
		$ID_Reto = array(
    		0         => 'No hay Equipos'
		);
	}

?>

<div id="centro2">
	<?php echo form_open('Equipo/nuevo_equipo',$form);?>
	<?php echo form_label('Reto: ','ID_Reto'); ?>
	<?php
	//DESPLEGABLE DE CENTRO
	echo form_dropdown('ID_Reto', $ID_Reto,1);
	?>
	<br>

	<?php echo form_label('Código de Equipo: ','COD_Equipo'); ?>
	<?php echo form_input($COD_Equipo); ?>
	<br>
	<?php echo form_label('Descripción de Equipo: ','DESC_Equipo'); ?>
	<?php echo form_input($DESC_Equipo); ?>
	<br>	
	<?php echo form_submit('Crear','Crear',"id='botonesNuevo'"); ?>
	<?php echo form_close();?>
</div>