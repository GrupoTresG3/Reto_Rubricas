<div id="centro">
<?php
		printf('Gestión de EQUIPOS_USUARIOS<br>');
		printf('--------------------------------------------------------------------<br>');
		
		//FILTROS DE CURSO Y GRUPO
		if ($equipos){
			$ID_Equipo = array(
	    		0         => 'Todos los Equipos'
			);
			foreach ($equipos->result() as $equipo) {
				$ID_Equipo[$equipo->ID_Equipo] = $equipo->DESC_Equipo;
			}	
		}
		else{
			$ID_Equipo = array(
	    		0         => 'Todos los Equipos'
			);
		}

		if ($usuarios){
			$ID_Usuario = array(
	    		0         => 'Todos los Usuarios'
			);
			foreach ($usuarios->result() as $usuario) {
				$ID_Usuario[$usuario->ID_Usuario] = $usuario->User;
			}	
		}
		else{
			$ID_Usuario = array(
	    		0         => 'Todos los Usuarios'
			);
		}	

		?>


		<div>
			<?php echo form_open('Equipo_Usuario/filtrar_equipo_usuario');?>
			<?php echo form_label('Equipo: ','ID_Equipo'); ?>
			<?php
			//DESPLEGABLE DE CENTRO
			echo form_dropdown('ID_Equipo', $ID_Equipo);
			?>
			<br/>
			<?php echo form_label('Usuario: ','ID_Usuario'); ?>
			<?php
			//DESPLEGABLE DE CURSOS
			echo form_dropdown('ID_Usuario', $ID_Usuario);
			?>
			<br/>
			<?php echo form_submit('Filtrar','Filtrar'); ?>
			<?php echo form_close();?>
		</div>

		<?php
		printf('--------------------------------------------------------------------<br>');	


		//TABLA DE RESULTADOS DEL LISTADO	
		if ($equipos_usuarios){
			printf('<table>
				<thead>			
				<tr>');
			$primerequipousuario = $equipos_usuarios->result()[0];
			foreach ($primerequipousuario as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($equipos_usuarios->result() as $equipo_usuario) {
				printf('<tr>',$equipo_usuario->ID_Equipo_Alumno,$equipo_usuario->ID_Equipo_Alumno);
				//Paso el objeto stdClass a Array para modificar COD_Centro y COD_Curso
				//$cicloArray = get_object_vars($ciclo);
				//var_dump($ciclo['ID_curso']);
				foreach ($equipo_usuario as $detalle) {
					//Para curso y Centro hay que sacar su COD_CENTRO y COD_CURSO
					printf('<td>
					<a href="%sindex.php/Equipo_Usuario/editar/%s">%s</a>
					</td>',base_url(),$equipo_usuario->ID_Equipo_Alumno,$detalle);
				}
				$url = "'".base_url()."index.php/Equipo_Usuario/borrar/".$equipo_usuario->ID_Equipo_Alumno."'"; 
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
		<br>
			<?php 
				$url = "'".base_url()."index.php/Equipo_Usuario/nuevo'";
				$js_volver_button = 'onClick="location.href='.$url.'"';
				?>

				<?php echo form_button('Nuevo','Nuevo Equipo Usuario',$js_volver_button) ?>		
</div>