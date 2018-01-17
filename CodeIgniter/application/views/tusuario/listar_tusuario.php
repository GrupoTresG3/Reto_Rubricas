<div id="centro">
<?php
		printf('Gestión de TUsuarios');
		if ($tusuarios){
			printf('<table>
				<thead>			
				<tr>');
			$primertusuario = $tusuarios->result()[0];
			foreach ($primertusuario as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($tusuarios->result() as $tusuario) {
				printf('<tr>',$tusuario->ID_TUsuario,$tusuario->ID_TUsuario);
				printf('<tr class="primero">',$tusuario->ID_TUsuario,$tusuario->ID_TUsuario);
				foreach ($tusuario as $detalle) {
					//Para curso y Centro hay que sacar su COD_CENTRO y COD_CURSO
					printf('<td>
					<a href="%sindex.php/TUsuario/editar/%s">%s</a>
					</td>',base_url(),$tusuario->ID_TUsuario,$detalle);
				}
				$url = "'".base_url()."index.php/TUsuario/borrar/".$tusuario->ID_TUsuario."'"; 
				printf('<td><input type="button" onclick="location.href=%s" value="Borrar"></td>',$url);
				printf('</tr>');
			}	
			printf('</tbody></table>');
			?>
				<br>
				<?php 
				$url = "'".base_url()."index.php/TUsuario/nuevo'";
				$js_volver_button = 'onClick="location.href='.$url.'"';
				?>

				<?php echo form_button('Nuevo','Nuevo TUsuario',$js_volver_button) ?>
				<?php
		}
		else{
				printf('No hay Registros');
		}
		?>		
</div>