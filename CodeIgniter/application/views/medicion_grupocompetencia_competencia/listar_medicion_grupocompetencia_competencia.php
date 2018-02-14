<div id="centro">
	<?php
	printf('Gestión de MEDICIONES_GRUPOSCOMPETENCIAS_COMPETENCIAS<br>');
	printf('--------------------------------------------------------------------<br>');
	
		//FILTROS DE GRUPOCOMPETENCIA, COMPETENCIA Y MEDICIONES
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


	<div>
		<?php echo form_open('Medicion_GrupoCompetencia_Competencia/filtrar_medicion_grupocompetencia_competencia');?>
		<?php echo form_label('GrupoCompetencia: ','ID_Grupo_Competencia'); ?>
		<?php
		echo form_dropdown('ID_Grupo_Competencia', $ID_Grupo_Competencia);
		?>
		<?php echo form_label('Medicion: ','ID_Medicion'); ?>
		<?php
		echo form_dropdown('ID_Medicion', $ID_Medicion);
		?>
		<br>
		<?php echo form_label('Competencia: ','ID_Competencia'); ?>
		<?php
		echo form_dropdown('ID_Competencia', $ID_Competencia);
		?>
		<?php echo form_submit('Filtrar','Filtrar'); ?>
		<?php echo form_close();?>
	</div>

	<?php
	printf('--------------------------------------------------------------------<br>');	


		//TABLA DE RESULTADOS DEL LISTADO	
	if ($mediciones_gruposcompetencias_competencias){
		printf('<table>
			<thead>			
				<tr>');
			$primermediciongrupocompetenciacompetencia = $mediciones_gruposcompetencias_competencias->result()[0];
			foreach ($primermediciongrupocompetenciacompetencia as $key => $value) {
				printf('<th id="%s">
					<span>%s</span>
				</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
		</thead>
		<tbody>');
				foreach ($mediciones_gruposcompetencias_competencias->result() as $medicion_grupocompetencia_competencia) {

					printf('<tr class="primero">',$medicion_grupocompetencia_competencia->ID_GrupoCompetencia_Competencia,$medicion_grupocompetencia_competencia->ID_GrupoCompetencia_Competencia);
					foreach ($medicion_grupocompetencia_competencia as $detalle) {
						printf('<td>
							<a href="%sindex.php/Medicion_GrupoCompetencia_Competencia/editar/%s">%s</a>
						</td>',base_url(),$medicion_grupocompetencia_competencia->ID_GrupoCompetencia_Competencia,$detalle);
					}
					$url = "'".base_url()."index.php/Medicion_GrupoCompetencia_Competencia/borrar/".$medicion_grupocompetencia_competencia->ID_GrupoCompetencia_Competencia."'"; 
					printf('<td><input type="button" onclick="location.href=%s" value="Borrar"></td>',$url);
					printf('</tr>');
				}	
				printf('</tbody></table>');
			}
			else{
				printf('No hay Registros');
			}

			printf('--------------------------------------------------------------------<br>');	

			?>		
		</div>