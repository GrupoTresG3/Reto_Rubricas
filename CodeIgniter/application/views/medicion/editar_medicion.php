<?php
$form = array(
	'name' => 'form_medicion'
	);
$url = "'".base_url()."index.php/Medicion'";
$js_cancel_button = 'onClick="location.href='.$url.'"';
$COD_Medicion = array(
	'name' => 'COD_Medicion',
	'placeholder' => 'Código de Medicion',
	'maxlength' => 10,
	'size' => 20,
	'class' => 'prueba',
	'required' => 1,
	'value' => $mediciones->result()[0]->COD_Medicion
	);
$DESC_Medicion = array(	
	'name' => 'DESC_Medicion',
	'placeholder' => 'Descripción de Medicion',
	'maxlength' => 100,
	'class' => 'prueba',
	'size' => 25,
	'required' => 1,
	'value' => $mediciones->result()[0]->DESC_Medicion
	);


	if ($tusuarios){
		$ID_TUsuario = array();
		foreach ($tusuarios->result() as $tusuario) {
			$ID_TUsuario[$tusuario->ID_TUsuario] = $tusuario->ID_TUsuario;
		}	
	}
	else{
		$ID_TUsuario
		 = array(
    		0         => 'No hay TUsuarios'
		);
	}	

?>

<div id="margenEditar">
	<?php echo form_open('Medicion/actualizar/'.$mediciones->result()[0]->ID_Medicion);?>
	<?php echo form_label('Medicion: ','ID_Medicion'); ?>
	<?php
	//DESPLEGABLE DE CENTRO
	echo form_dropdown('ID_TUsuario', $ID_TUsuario, $mediciones->result()[0]->ID_TUsuario);
	?>
	<br>

	<?php echo form_label('Código de Equipo: ','COD_Medicion'); ?>
	<?php echo form_input($COD_Medicion); ?>
	<br>
	<?php echo form_label('Descripción de Equipo: ','DESC_Medicion'); ?>
	<?php echo form_input($DESC_Medicion); ?>
	<br>	
	<?php echo form_submit('Actualizar','Actualizar',"id='botonesEditar'"); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>	
	<?php echo form_close();?>
</div>