	<?php 
session_start();
?>
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
			if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
				printf('<th>Acciones</th></tr>');
			}
			printf('</thead>
			<tbody>');
			foreach ($competencias->result() as $competencia) {
				printf('<tr class="primero">',$competencia->ID_Competencia,$competencia->ID_Competencia);
				foreach ($competencia as $detalle) {
					printf('<td>
					<a href="%sindex.php/Competencia/editar/%s">%s</a>
					</td>',base_url(),$competencia->ID_Competencia,$detalle);
				}
				?>
				<?php
				
					if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
						$url = "'".base_url()."index.php/Competencia/borrar/".$competencia->ID_Competencia."'"; 
						printf('<td><input type="button" onclick="location.href=%s" value="Borrar"></td>',$url);
					}
				printf('</tr>');
				}	
			printf('</tbody></table>');
		}
		else{
				printf('No hay Registros');
		}
		?>		
</div>