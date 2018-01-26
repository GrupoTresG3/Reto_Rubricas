<?php
session_start();
	if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
?>
<div id="centro">
<?php
		printf('Gestión de EQUIPOS<br>');
		printf('--------------------------------------------------------------------<br>');
		
		//FILTROS DE CURSO Y GRUPO
		if ($retos){
			$ID_Reto = array(
	    		0         => 'Todos los retos Retos'
			);
			foreach ($retos->result() as $reto) {
				$ID_Reto[$reto->ID_Reto] = $reto->DESC_Reto;
			}	
		}
		else{
			$ID_Reto = array(
	    		0         => 'Todos los retos Retos'
			);
		}
	

		?>


		<div>
			<?php echo form_open('Equipo/filtrar_equipo');?>
			<?php echo form_label('Reto: ','ID_Reto'); ?>
			<?php
			//DESPLEGABLE DE CENTRO
			echo form_dropdown('ID_Reto', $ID_Reto);
			?>
			<br/>
			<?php echo form_submit('Filtrar','Filtrar'); ?>
			<?php echo form_close();?>
		</div>

		<?php
		printf('--------------------------------------------------------------------<br>');	


		//TABLA DE RESULTADOS DEL LISTADO	
		if ($equipos){
			printf('<table>
				<thead>			
				<tr>');
			$primerequipo = $equipos->result()[0];
			foreach ($primerequipo as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($equipos->result() as $equipo) {
				printf('<tr class="primero">',$equipo->ID_Equipo,$equipo->ID_Equipo);
				//Paso el objeto stdClass a Array para modificar COD_Centro y COD_Curso
				//$cicloArray = get_object_vars($ciclo);
				//var_dump($ciclo['ID_curso']);
				foreach ($equipo as $detalle) {
					//Para curso y Centro hay que sacar su COD_CENTRO y COD_CURSO
					printf('<td>
					<a href="%sindex.php/Equipo/editar/%s">%s</a>
					</td>',base_url(),$equipo->ID_Equipo,$detalle);
				}
				$url = "'".base_url()."index.php/Equipo/borrar/".$equipo->ID_Equipo."'"; 
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
				$url = "'".base_url()."index.php/Equipo/nuevo'";
				$js_volver_button = 'onClick="location.href='.$url.'"';
				?>

				<?php echo form_button('Nuevo','Nuevo Equipo',$js_volver_button) ?>	
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