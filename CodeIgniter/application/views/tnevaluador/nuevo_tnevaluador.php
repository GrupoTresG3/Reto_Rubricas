<?php
session_start();
	if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
?>
<?php
$form = array(
	'name' => 'form_tnevaluador'
	);
$DESC_TNEvaluador = array(
	'name' => 'DESC_TNEvaluador',
	'placeholder' => 'Descripcion de TNEvaluador',
	'maxlength' => 10,
	'size' => 20
	);
?>

<div id="centro2">
	<?php echo form_open('TNEvaluador/nuevo_tnevaluador',$form);?>
	<?php echo form_label('Descripcion de TNEvaluador: ','DESC_TNEvaluador'); ?>
	<?php echo form_input($DESC_TNEvaluador); ?>
	<br>
	<?php echo form_submit('Crear','Crear'); ?>
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