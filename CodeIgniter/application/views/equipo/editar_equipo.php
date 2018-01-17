<?php
$form = array(
	'name' => 'form_equipo'
	);
$url = "'".base_url()."index.php/Equipo'";
$js_cancel_button = 'onClick="location.href='.$url.'"';
$COD_Equipo = array(
	'name' => 'COD_Equipo',
	'placeholder' => 'Código de Equipo',
	'maxlength' => 10,
	'size' => 20,
	'class' => 'prueba',
	'required' => 1,
	'value' => $equipos->result()[0]->COD_Equipo
	);
$DESC_Equipo = array(	
	'name' => 'DESC_Equipo',
	'placeholder' => 'Descripción de Equipo',
	'maxlength' => 100,
	'class' => 'prueba',
	'size' => 25,
	'required' => 1,
	'value' => $equipos->result()[0]->DESC_Equipo
	);


	if ($retos){
		$ID_Reto = array();
		foreach ($retos->result() as $reto) {
			$ID_Reto[$reto->ID_Reto] = $reto->ID_Reto;
		}	
	}
	else{
		$ID_Reto = array(
    		0         => 'No hay Equipos'
		);
	}	

?>

<div id="margenEditar">
	<?php echo form_open('Equipo/actualizar/'.$equipos->result()[0]->ID_Equipo);?>
	<?php echo form_label('Equipo: ','ID_Equipo'); ?>
	<?php
	//DESPLEGABLE DE CENTRO
	echo form_dropdown('ID_Reto', $ID_Reto, $equipos->result()[0]->ID_Reto);
	?>
	<br>

	<?php echo form_label('Código de Equipo: ','COD_Equipo'); ?>
	<?php echo form_input($COD_Equipo); ?>
	<br>
	<?php echo form_label('Descripción de Equipo: ','DESC_Equipo'); ?>
	<?php echo form_input($DESC_Equipo); ?>
	<br>	
	<?php echo form_submit('Actualizar','Actualizar',"id='botonesEditar'"); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>	
	<?php echo form_close();?>
</div>