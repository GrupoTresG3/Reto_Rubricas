<?php
session_start();
	if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
?>
<?php
$form = array(
	'name' => 'form_centro'
	);
$COD_Centro = array(
	'name' => 'COD_Centro',
	'placeholder' => 'Código de Centro',
	'maxlength' => 10,
	'class' => 'prueba',
	'size' => 20
	);
$DESC_Centro = array(	
	'name' => 'DESC_Centro',
	'placeholder' => 'Descripción de Centro',
	'maxlength' => 100,
	'class' => 'prueba',
	'size' => 25
	);
?>

<div id='centro2'>
	<?php echo form_open('Centro/nuevo_centro',$form);?>
	<?php echo form_label('Código de Centro: ','COD_Centro'); ?>
	<?php echo form_input($COD_Centro); ?>
	<br>
	<?php echo form_label('Descripción de Centro: ','DESC_Centro'); ?>
	<?php echo form_input($DESC_Centro); ?>
	<br><br>
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

