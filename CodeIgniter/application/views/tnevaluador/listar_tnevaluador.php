<div id="centro">
<?php
		printf('Gestión de TNEvaluador');
		if ($tnevaluadores){
			printf('<table>
				<thead>			
				<tr>');
			$primertnevaluador = $tnevaluadores->result()[0];
			foreach ($primertnevaluador as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($tnevaluadores->result() as $tnevaluador) {
				printf('<tr>',$tnevaluador->ID_TNEvaluador,$tnevaluador->ID_TNEvaluador);
				printf('<tr class="primero">',$tnevaluador->ID_TNEvaluador,$tnevaluador->ID_TNEvaluador);
				foreach ($tnevaluador as $detalle) {
					//Para curso y Centro hay que sacar su COD_CENTRO y COD_CURSO
					printf('<td>
					<a href="%sindex.php/TNEvaluador/editar/%s">%s</a>
					</td>',base_url(),$tnevaluador->ID_TNEvaluador,$detalle);
				}
				$url = "'".base_url()."index.php/TNEvaluador/borrar/".$tnevaluador->ID_TNEvaluador."'"; 
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