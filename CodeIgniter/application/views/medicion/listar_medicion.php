<div id="centro">
<?php
		printf('Gestión de MEDICIONES<br>');
		printf('--------------------------------------------------------------------<br>');
		
		//FILTROS DE CURSO Y GRUPO
		if ($tusuarios){
			$ID_TUsuario = array(
	    		0         => 'Todos los TUsuarios'
			);
			foreach ($tusuarios->result() as $tusuario) {
				$ID_TUsuario[$tusuario->ID_TUsuario] = $tusuario->DESC_TUsuario;
			}	
		}
		else{
			$ID_TUsuario = array(
	    		0         => 'Todos los TUsuarios'
			);
		}
	

		?>


		<div>
			<?php echo form_open('Medicion/filtrar_medicion');?>
			<?php echo form_label('TUsuario: ','ID_TUsuario'); ?>
			<?php
			//DESPLEGABLE DE CENTRO
			echo form_dropdown('ID_TUsuario', $ID_TUsuario);
			?>
			<br/>
			<?php echo form_submit('Filtrar','Filtrar'); ?>
			<?php echo form_close();?>
		</div>

		<?php
		printf('--------------------------------------------------------------------<br>');	


		//TABLA DE RESULTADOS DEL LISTADO	
		if ($mediciones){
			printf('<table>
				<thead>			
				<tr>');
			$primermedicion = $mediciones->result()[0];
			foreach ($primermedicion as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
				printf('<th>Acciones</th></tr>');
			}
			printf('</thead>
			<tbody>');
			foreach ($mediciones->result() as $medicion) {
				printf('<tr class="primero">',$medicion->ID_Medicion,$medicion->ID_Medicion);
				//Paso el objeto stdClass a Array para modificar COD_Centro y COD_Curso
				//$cicloArray = get_object_vars($ciclo);
				//var_dump($ciclo['ID_curso']);
				foreach ($medicion as $detalle) {
					//Para curso y Centro hay que sacar su COD_CENTRO y COD_CURSO
					printf('<td>
					<a href="%sindex.php/Medicion/editar/%s">%s</a>
					</td>',base_url(),$medicion->ID_Medicion,$detalle);
				}
				if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
					$url = "'".base_url()."index.php/Medicion/borrar/".$medicion->ID_Medicion."'"; 
					printf('<td><input type="button" onclick="location.href=%s" value="Borrar"></td>',$url);
				}
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