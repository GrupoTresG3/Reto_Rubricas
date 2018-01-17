<div id='centro'>
<?php
		printf('Gestión de GRUPOSCOMPETENCIAS');
		if ($gruposcompetencias){
			printf('<table>
				<thead>			
				<tr>');
			$primergrupocompetencia = $gruposcompetencias->result()[0];
			foreach ($primergrupocompetencia as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($gruposcompetencias->result() as $grupocompetencia) {
				printf('<tr>',$grupocompetencia->ID_Grupo_Competencia,$grupocompetencia->ID_Grupo_Competencia);
				printf('<tr class="primero">',$grupocompetencia->ID_Grupo_Competencia,$grupocompetencia->ID_Grupo_Competencia);
				foreach ($grupocompetencia as $detalle) {
					//Para curso y Centro hay que sacar su COD_CENTRO y COD_CURSO
					printf('<td>
					<a href="%sindex.php/GrupoCompetencia/editar/%s">%s</a>
					</td>',base_url(),$grupocompetencia->ID_Grupo_Competencia,$detalle);
				}
				$url = "'".base_url()."index.php/GrupoCompetencia/borrar/".$grupocompetencia->ID_Grupo_Competencia."'"; 
				printf('<td><input type="button" onclick="location.href=%s" value="Borrar"></td>',$url);
				printf('</tr>');
			}	
			printf('</tbody></table>');
		}
		else{
				printf('No hay Registros');
		}
		?>		
</div>