<?php
$form = array(
	'name' => 'form_tusuario'
	);
$url = "'".base_url()."index.php/TUsuario'";
$js_cancel_button = 'onClick="location.href='.$url.'"';
$DESC_TUsuario = array(
	'name' => 'DESC_TUsuario',
	'value' => $tusuarios->result()[0]->DESC_TUsuario,
	'placeholder' => 'Descripcion de TUsuario',
	'maxlength' => 10,
	'class' => 'prueba',
	'size' => 25
	);
?>

<div id="margenEditar">
	<?php echo form_open('TUsuario/actualizar/'.$tusuarios->result()[0]->ID_TUsuario,$form);?>
	<?php echo form_label('Descripcion de TUsuario: ','DESC_TUsuario'); ?>
	<?php echo form_input($DESC_TUsuario); ?>
	<br>
	<?php echo form_submit('Guardar','Guardar',"id='botonesEditar'"); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>
	<?php echo form_close();?>
</div>

