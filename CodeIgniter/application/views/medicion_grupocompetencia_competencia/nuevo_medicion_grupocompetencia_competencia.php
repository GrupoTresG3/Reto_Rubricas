<?php
$form = array(
	'name' => 'form_medicion_grupocompetencia_competencia'
	);
$Porcentaje = array(
	'name' => 'Porcentaje',
	'placeholder' => 'Porcentaje',
	'maxlength' => 10,
	'size' => 20,
	'class' => 'prueba',
	'required' => 1
	);


	if ($gruposcompetencias){
			$ID_Grupo_Competencia = array(
				0         => 'Todos los GruposCompetencias'
			);
			foreach ($gruposcompetencias->result() as $grupocompetencia) {
				$ID_Grupo_Competencia[$grupocompetencia->ID_Grupo_Competencia] = $grupocompetencia->DESC_Grupo_Competencia;
			}	
		}
		else{
			$ID_Grupo_Competencia = array(
	    		0         => 'Todos los GruposCompetencias'
			);
		}

		if ($competencias){
			$ID_Competencia = array(
				0         => 'Todos las Competencias'
			);
				foreach ($competencias->result() as $competencia) {
					$ID_Competencia[$competencia->ID_Competencia] = $competencia->DESC_Competencia;
				}	
		}
		else{
			$ID_Competencia = array(
    			0         => 'No hay Competencias'
			);
		}
		
		if ($mediciones){
			$ID_Medicion = array(
	    		0         => 'Todos las Mediciones'
			);
			foreach ($mediciones->result() as $medicion) {
				$ID_Medicion[$medicion->ID_Medicion] = $medicion->DESC_Medicion;
			}	
		}
		else{
			$ID_Medicion = array(
	    		0         => 'Todos las Mediciones'
			);
		}	

?>

<div id="centro2">
	<?php echo form_open('Medicion_GrupoCompetencia_Competencia/nuevo_medicion_grupocompetencia_competencia');?>
	<?php echo form_label('GrupoCompetencia: ','ID_Grupo_Competencia'); ?>
	<?php
	//DESPLEGABLE GRUPOCOMPETENCIA
	echo form_dropdown('ID_Grupo_Competencia', $ID_Grupo_Competencia);
	?>
	<?php echo form_label('Medicion: ','ID_Medicion'); ?>
	<?php
	//DESPLEGABLE DE MEDICION
	echo form_dropdown('ID_Medicion', $ID_Medicion);
	?>
	<br>
	<?php echo form_label('Competencia: ','ID_Competencia'); ?>
	<?php
	//DESPLEGABLE DE COMPETENCIA
	echo form_dropdown('ID_Competencia', $ID_Competencia);
	?>
	<br>
	
	<?php echo form_label('Porcentaje: ','Porcentaje'); ?>
	<?php echo form_input($Porcentaje); ?>
	<br>	
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>