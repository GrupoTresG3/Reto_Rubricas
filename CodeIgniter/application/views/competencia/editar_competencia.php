<?php
$form = array(
	'name' => 'form_competencia'
	);
$url = "'".base_url()."index.php/Competencia'";
$js_cancel_button = 'onClick="location.href='.$url.'"';

$DESC_Competencia = array(	
	'name' => 'DESC_Competencia',
	'placeholder' => 'Descripción de Competencia',
	'value' => $competencias->result()[0]->DESC_Competencia,
	'maxlength' => 100,
	'class' => 'prueba',
	'size' => 25
	);
$Mal = array(
	'name' => 'Mal',
	'placeholder' => 'Descripcion de la compentia Mala',
	'value' => $competencias->result()[0]->Mal,
	'maxlength' => 10,
	'class' => 'prueba',
	'size' => 20
	);
$Regular = array(
	'name' => 'Regular',
	'placeholder' => 'Descripcion de la compentia Regular',
	'value' => $competencias->result()[0]->Regular,
	'maxlength' => 10,
	'class' => 'prueba',
	'size' => 20
	);
$Bien = array(
	'name' => 'Bien',
	'placeholder' => 'Descripcion de la compentia Buena',
	'value' => $competencias->result()[0]->Bien,
	'maxlength' => 10,
	'class' => 'prueba',
	'size' => 20
	);
$Excelente = array(
	'name' => 'Excelente',
	'placeholder' => 'Descripcion de la compentia Excelente',
	'value' => $competencias->result()[0]->Excelente,
	'maxlength' => 10,
	'class' => 'prueba',
	'size' => 20
	);
?>

<div id="margenEditar">
	<?php echo form_open('Competencia/actualizar/'.$competencias->result()[0]->ID_Competencia,$form);?>
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
	<?php echo form_submit('Guardar','Guardar',"id='botonesEditar'"); ?>

	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>
	<?php echo form_close();?>
</div>

