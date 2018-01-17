 <?php
$form = array(
	'name' => 'form_competencia'
	);
$DESC_Competencia = array(	
	'name' => 'DESC_Competencia',
	'placeholder' => 'Descripción de Competencia',
	'maxlength' => 100,
	'class' => 'prueba',
	'size' => 20
	);
$Mal = array(
	'name' => 'Mal',
	'placeholder' => 'Descripcion de la compentia Mala',
	'maxlength' => 10,
	'class' => 'prueba',
	'size' => 20
	);
$Regular = array(
	'name' => 'Regular',
	'placeholder' => 'Descripcion de la compentia Regular',
	'maxlength' => 10,
	'class' => 'prueba',
	'size' => 20
	);
$Bien = array(
	'name' => 'Bien',
	'placeholder' => 'Descripcion de la compentia Buena',
	'maxlength' => 10,
	'class' => 'prueba',
	'size' => 20
	);
$Excelente = array(
	'name' => 'Excelente',
	'placeholder' => 'Descripcion de la compentia Excelente',
	'maxlength' => 10,
	'class' => 'prueba',
	'size' => 20
	);
?>

<div id='centro2'>
	<?php echo form_open('Competencia/nuevo_competencia',$form);?>
	<?php echo form_label('Descripción de Competencia: ','DESC_Competencia'); ?>
	<?php echo form_input($DESC_Competencia); ?>
	<br>
	<?php echo form_label('Descripcion de la compentia Mala: ','Mal'); ?>
	<?php echo form_input($Mal); ?>
	<br>
	<?php echo form_label('Descripcion de la compentia Regular: ','Regular'); ?>
	<?php echo form_input($Regular); ?>
	<br>
	<?php echo form_label('Descripcion de la compentia Buena: ','Bien'); ?>
	<?php echo form_input($Bien); ?>
	<br>
	<?php echo form_label('Descripcion de la compentia Excelente: ','Excelente'); ?>
	<?php echo form_input($Excelente); ?>
	<br>
	<?php echo form_submit('Crear','Crear',"id='botonesCrear'"); ?>
	<?php echo form_close();?>
</div>


