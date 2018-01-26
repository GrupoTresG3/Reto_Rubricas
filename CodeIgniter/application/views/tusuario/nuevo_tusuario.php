<?php
session_start();
	if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
?>
<?php
$form = array(
	'name' => 'form_tusuario'
	);
$DESC_TUsuario = array(
	'name' => 'DESC_TUsuario',
	'placeholder' => 'Descripcion de TUsuario',
	'maxlength' => 20,
	'size' => 20
	);
?>

<div id="centro2">
	<?php echo form_open('TUsuario/nuevo_tusuario',$form);?>
	<?php echo form_label('Descripcion de TUsuario: ','DESC_TUsuario'); ?>
	<?php echo form_input($DESC_TUsuario); ?>
	<br>
	<?php echo form_submit('Crear','Crear',"id='botonesNuevo'"); ?>
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