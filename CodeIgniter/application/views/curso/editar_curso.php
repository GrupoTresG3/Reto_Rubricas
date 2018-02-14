	<?php
session_start();
	if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
?>
<?php
$form = array(
	'name' => 'form_curso'
	);
$url = "'".base_url()."index.php/Curso'";
$js_cancel_button = 'onClick="location.href='.$url.'"';
$COD_Curso = array(
	'name' => 'COD_Curso',
	'value' => $cursos->result()[0]->COD_Curso,
	'placeholder' => 'Código de Curso',
	'maxlength' => 10,
	'size' => 20
	);
?>

<div id="margenEditar">
	<?php echo form_open('Curso/actualizar/'.$cursos->result()[0]->ID_Curso,$form);?>
	<?php echo form_label('Código de Curso: ','COD_Curso'); ?>
	<?php echo form_input($COD_Curso); ?>
	<br>
	<?php echo form_submit('Guardar','Guardar',"id='botonesEditar'"); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>
	<?php echo form_close();?>
</div>
<?php  
}
else{
	?>
	<script>
		alert('No eres admin');
		window.location="<? echo base_url().'index.php'?>";
	</script>
	<?php
}

?>
