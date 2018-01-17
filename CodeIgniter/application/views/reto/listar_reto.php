<div id="centro">
<?php
		printf('Gestión de RETOS');
		if ($retos){
			printf('<table>
				<thead>			
				<tr>');
			$primerreto = $retos->result()[0];
			foreach ($primerreto as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($retos->result() as $reto) {
				printf('<tr>',$reto->ID_Reto,$reto->ID_Reto);
				printf('<tr class="primero">',$reto->ID_Reto,$reto->ID_Reto);
				foreach ($reto as $detalle) {
					//Para curso y Centro hay que sacar su COD_CENTRO y COD_CURSO
					printf('<td>
					<a href="%sindex.php/Reto/editar/%s">%s</a>
					</td>',base_url(),$reto->ID_Reto,$detalle);
				}
				$url = "'".base_url()."index.php/Reto/borrar/".$reto->ID_Reto."'"; 
				printf('<td><input type="button" onclick="location.href=%s" value="Borrar"></td>',$url);
				printf('</tr>');
			}	
			printf('</tbody></table>');
			?>
			<br>
			<?php 
				$url = "'".base_url()."index.php/Reto/nuevo'";
				$js_volver_button = 'onClick="location.href='.$url.'"';
				?>

				<?php echo form_button('Nuevo','Nuevo Reto',$js_volver_button) ?>
			<?php
		}
		else{
				printf('No hay Registros');
		}
		?>		
</div>