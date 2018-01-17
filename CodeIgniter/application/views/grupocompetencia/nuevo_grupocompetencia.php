<?php
$form = array(
	'name' => 'form_grupocompetencia'
	);
$DESC_Grupo_Competencia = array(	
	'name' => 'DESC_Grupo_Competencia',
	'placeholder' => 'Descripción de GrupoCompetencia',
	'maxlength' => 100,
	'size' => 30
	);
?>

<div id='centro2'>
	<?php echo form_open('GrupoCompetencia/nuevo_grupocompetencia',$form);?>
	<br>
	<?php echo form_label('Descripción de GrupoCompetencia: ','DESC_Grupo_Competencia'); ?>
	<?php echo form_input($DESC_Grupo_Competencia); ?>
	<br>
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>

