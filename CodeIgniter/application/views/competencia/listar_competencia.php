<style>
  table {
        display: block;
        overflow-x: auto;
    }	
</style>
<div id='centro'>
<?php
		printf('Gestión de COMPETENCIAS');
		if ($competencias){
			printf('<table>
				<thead>			
				<tr>
					
				');
			$primercompetencia = $competencias->result()[0];
			foreach ($primercompetencia as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($competencias->result() as $competencia) {
				printf('<tr>
					',$competencia->ID_Competencia,$competencia->ID_Competencia);
				printf('<tr class="primero">',$competencia->ID_Competencia,$competencia->ID_Competencia);
				foreach ($competencia as $detalle) {
					//Para curso y Centro hay que sacar su COD_CENTRO y COD_CURSO
					printf('<td>
					<a href="%sindex.php/Competencia/editar/%s">%s</a>
					</td>',base_url(),$competencia->ID_Competencia,$detalle);
				}
				$url = "'".base_url()."index.php/Competencia/borrar/".$competencia->ID_Competencia."'"; 
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