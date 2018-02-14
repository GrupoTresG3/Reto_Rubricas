<?php
session_start();
if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
	?>
	<?php
	$form = array(
		'name' => 'form_curso'
		);
	$COD_Curso = array(
		'name' => 'COD_Curso',
		'placeholder' => 'Código de Curso',
		'maxlength' => 10,
		'size' => 20
		);
		?>

		<div id="centro2">
			<?php echo form_open('Curso/nuevo_curso',$form);?>
			<?php echo form_label('Código de Curso: ','COD_Curso'); ?>
			<?php echo form_input($COD_Curso); ?>
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