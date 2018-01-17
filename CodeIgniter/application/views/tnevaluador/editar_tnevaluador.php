<?php
$form = array(
	'name' => 'form_tnevaluador'
	);
$url = "'".base_url()."index.php/TNEvaluador'";
$js_cancel_button = 'onClick="location.href='.$url.'"';
$DESC_TNEvaluador = array(
	'name' => 'DESC_TNEvaluador',
	'value' => $tnevaluador->result()[0]->DESC_TNEvaluador,
	'placeholder' => 'Descripcion de TNEvaluador',
	'maxlength' => 10,
	'class' => 'prueba',
	'size' => 25
	);
?>

<div id="margenEditar">
	<?php echo form_open('TNEvaluador/actualizar/'.$tnevaluador->result()[0]->ID_TNEvaluador,$form);?>
	<?php echo form_label('Descripcion de TNEvaluador: ','DESC_TNEvaluador'); ?>
	<?php echo form_input($DESC_TNEvaluador); ?>
	<br>
	<?php echo form_submit('Guardar','Guardar'); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>
	<?php echo form_close();?>
</div>

