<?php
$form = array(
	'name' => 'form_grupocompetencia'
	);
$url = "'".base_url()."index.php/GrupoCompetencia'";
$js_cancel_button = 'onClick="location.href='.$url.'"';
$DESC_Grupo_Competencia = array(	
	'name' => 'DESC_Grupo_Competencia',
	'value' => $gruposcompetencias->result()[0]->DESC_Grupo_Competencia,
	'placeholder' => 'Descripción de GrupoCompetencia',
	'maxlength' => 100,
	'size' => 30
	);
	?>

	<div id = 'margenEditar'>
		<?php echo form_open('GrupoCompetencia/actualizar/'.$gruposcompetencias->result()[0]->ID_Grupo_Competencia,$form);?>
		<br>
		<?php echo form_label('Descripción de GrupoCompetencia: ','DESC_Grupo_Competecia'); ?>
		<?php echo form_input($DESC_Grupo_Competencia); ?>
		<br>
		<?php echo form_submit('Guardar','Guardar',"id='botonesEditar'"); ?>
		<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>
		<?php echo form_close();?>
	</div>
