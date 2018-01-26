<?php
session_start();
	if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
?>
<div id="centro">
<?php
		printf('Gestión de MODULOS<br>');
		printf('--------------------------------------------------------------------<br>');
		
		//FILTROS DE Ciclos
		if ($ciclos){
		$ID_Ciclo = array(
				0         => 'Todos los Ciclos'
		);
		foreach ($ciclos->result() as $ciclo) {
			$ID_Ciclo[$ciclo->ID_Ciclo] = $ciclo->COD_Curso . " -- ". $ciclo->DESC_Centro . " -- ". $ciclo->DESC_Ciclo;
			}	
		}
		else{
			$ID_Ciclo = array(
    			0         => 'No hay Ciclos'
			);
		}

		

		?>


		<div>
			<?php echo form_open('Modulo/filtrar_modulo');?>
			<?php echo form_label('Ciclo: ','ID_Ciclo'); ?>
			<?php
			//DESPLEGABLE DE CENTRO
			echo form_dropdown('ID_Ciclo', $ID_Ciclo);
			?>
			<br/>
			<?php echo form_submit('Filtrar','Filtrar'); ?>
			<?php echo form_close();?>
		</div>

		<?php
		printf('--------------------------------------------------------------------<br>');	


		//TABLA DE RESULTADOS DEL LISTADO	
		if ($modulos){
			printf('<table>
				<thead>			
				<tr>');
			$primermodulo = $modulos->result()[0];
			foreach ($primermodulo as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($modulos->result() as $modulo) {
				printf('<tr class="primero">',$modulo->ID_Modulo,$modulo->ID_Modulo);
				//Paso el objeto std	Class a Array para modificar COD_Centro y COD_Curso
				//$cicloArray = get_object_vars($ciclo);
				//var_dump($ciclo['ID_curso']);
				foreach ($modulo as $detalle) {
					//Para curso y Centro hay que sacar su COD_CENTRO y COD_CURSO
					printf('<td>
					<a href="%sindex.php/Modulo/editar/%s">%s</a>
					</td>',base_url(),$modulo->ID_Modulo,$detalle);
				}
				$url = "'".base_url()."index.php/Modulo/borrar/".$modulo->ID_Modulo."'"; 
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
			$url = "'".base_url()."index.php/Modulo/nuevo'";
			$js_volver_button = 'onClick="location.href='.$url.'"';
			?>

			<?php echo form_button('Nuevo','Nuevo Modulo',$js_volver_button) ?>		
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