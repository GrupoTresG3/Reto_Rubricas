<?php
session_start();
	if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
?>
<div id="centro">
<?php
		printf('Gestión de RETOS_MODULOS<br>');
		printf('--------------------------------------------------------------------<br>');
		
		//FILTROS DE CURSO Y GRUPO
		if ($modulos){
			$ID_Modulo = array(
				0         => 'Todos los Modulos'
			);
			foreach ($modulos->result() as $modulo) {
				$ID_Modulo[$modulo->ID_Modulo] = $modulo->DESC_Modulo;
			}	
		}
		else{
			$ID_Modulo = array(
	    		0         => 'Todos los Modulos'
			);
		}

		if ($usuarios){
			$ID_Usuario = array(
				0         => 'Todos los Usuarios'
			);
				foreach ($usuarios->result() as $usuario) {
					$ID_Usuario[$usuario->ID_Usuario] = $usuario->Nombre;
				}	
		}
		else{
			$ID_Usuario = array(
    			0         => 'No hay Usuarios'
			);
		}
		
		if ($retos){
			$ID_Reto = array(
	    		0         => 'Todos los Retos'
			);
			foreach ($retos->result() as $reto) {
				$ID_Reto[$reto->ID_Reto] = $reto->COD_Reto;
			}	
		}
		else{
			$ID_Reto = array(
	    		0         => 'Todos los Retos'
			);
		}	

		?>


		<div>
			<?php echo form_open('Reto_Modulo/filtrar_reto_modulo');?>
			<?php echo form_label('Modulo: ','ID_Modulo'); ?>
			<?php
			//DESPLEGABLE DE CENTRO
			echo form_dropdown('ID_Modulo', $ID_Modulo);
			?>
			<br/>
			<?php echo form_label('Reto: ','ID_Reto'); ?>
			<?php
			//DESPLEGABLE DE CURSOS
			echo form_dropdown('ID_Reto', $ID_Reto);
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
		if ($retos_modulos){
			printf('<table>
				<thead>			
				<tr>');
			$primerretomodulo = $retos_modulos->result()[0];
			foreach ($primerretomodulo as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($retos_modulos->result() as $reto_modulo) {
				printf('<tr class="primero">',$reto_modulo->ID_Reto_modulo,$reto_modulo->ID_Reto_modulo);
				//Paso el objeto stdClass a Array para modificar COD_Centro y COD_Curso
				//$cicloArray = get_object_vars($ciclo);
				//var_dump($ciclo['ID_curso']);
				foreach ($reto_modulo as $detalle) {
					//Para curso y Centro hay que sacar su COD_CENTRO y COD_CURSO
					printf('<td>
					<a href="%sindex.php/Reto_Modulo/editar/%s">%s</a>
					</td>',base_url(),$reto_modulo->ID_Reto_modulo,$detalle);
				}
				$url = "'".base_url()."index.php/Reto_Modulo/borrar/".$reto_modulo->ID_Reto_modulo."'"; 
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
				$url = "'".base_url()."index.php/Reto_Modulo/nuevo'";
				$js_volver_button = 'onClick="location.href='.$url.'"';
				?>

				<?php echo form_button('Nuevo','Nuevo Reto Modulo',$js_volver_button) ?>			
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