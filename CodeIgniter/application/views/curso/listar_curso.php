<?php
session_start();
	if((isset($_SESSION['user_id']))&&($_SESSION['user_id']=='1')){
?>
<div id="centro">
<?php
		printf('Gestión de CURSOS');
		if ($cursos){
			printf('<table>
				<thead>			
				<tr>');
			$primercurso = $cursos->result()[0];
			foreach ($primercurso as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($cursos->result() as $curso) {
				printf('<tr class="primero">',$curso->ID_Curso,$curso->ID_Curso);
				foreach ($curso as $detalle) {
					//Para curso y Centro hay que sacar su COD_CENTRO y COD_CURSO
					printf('<td>
					<a href="%sindex.php/Curso/editar/%s">%s</a>
					</td>',base_url(),$curso->ID_Curso,$detalle);
				}
				$url = "'".base_url()."index.php/Curso/borrar/".$curso->ID_Curso."'"; 
				printf('<td><input type="button" onclick="location.href=%s" value="Borrar"></td>',$url);
				printf('</tr>');
			}	
			printf('</tbody></table>');
			?>
			<br>
			<?php 
				$url = "'".base_url()."index.php/Curso/nuevo'";
				$js_volver_button = 'onClick="location.href='.$url.'"';
				?>

				<?php echo form_button('Nuevo','Nuevo Curso',$js_volver_button) ?>
			<?php
		}
		else{
				printf('No hay Registros');
		}
		?>		
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