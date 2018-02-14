<?php
session_start();
if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
	?>
	<div id="centro">
		<?php
		printf('Gestión de USUARIOS<br>');
		printf('--------------------------------------------------------------------<br>');
		
		//FILTROS DE CENTROS Y TUsuarios
		if ($centros){
			$ID_Centro = array(
				0         => 'Todos los Centros'
				);
			foreach ($centros->result() as $centro) {
				$ID_Centro[$centro->ID_Centro] = $centro->DESC_Centro;
			}	
		}
		else{
			$ID_Centro = array(
				0         => 'Todos los Centros'
				);
		}

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
				0         => 'No hay TUsuarios'
				);
		}

		?>


		<div>
			<?php echo form_open('Usuario/filtrar_usuario');?>
			<?php echo form_label('Centro: ','ID_Centro'); ?>
			<?php
			echo form_dropdown('ID_Centro', $ID_Centro);
			?>
			<br/>
			<?php echo form_label('Tusuario: ','ID_TUsuario'); ?>
			<?php
			echo form_dropdown('ID_TUsuario', $ID_TUsuario);
			?>
			<br/>
			<?php echo form_submit('Filtrar','Filtrar'); ?>
			<?php echo form_close();?>
		</div>

		<?php
		printf('--------------------------------------------------------------------<br>');	


		//TABLA DE RESULTADOS DEL LISTADO	
		if ($usuarios){
			printf('<table>
				<thead>			
					<tr>');
				$primerusuario = $usuarios->result()[0];
				foreach ($primerusuario as $key => $value) {
					printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
				}
				printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
					foreach ($usuarios->result() as $usuario) {
						printf('<tr class="primero">',$usuario->ID_Usuario,$usuario->ID_Usuario);
						foreach ($usuario as $detalle) {
							printf('<td>
								<a href="%sindex.php/Usuario/editar/%s">%s</a>
							</td>',base_url(),$usuario->ID_Usuario,$detalle);
						}
						$url = "'".base_url()."index.php/Usuario/borrar/".$usuario->ID_Usuario."'"; 
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
				$url = "'".base_url()."index.php/Usuario/nuevo'";
				$js_volver_button = 'onClick="location.href='.$url.'"';
				?>

				<?php echo form_button('Nuevo','Nuevo Usuario',$js_volver_button) ?>		
			</div>
			<?php  
		}
		else{
			?>
			<script>
				alert('No eres admin');
				window.location="<? echo base_url().'index.php'?>";
			</script>
			<?php
		}

		?>