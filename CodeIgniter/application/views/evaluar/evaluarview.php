<?php

 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
.verequipos {
    display: none;
}
.verusuario {
    display: none;
}
.vertabla {
    display: none;
}
</style>
	<script type="text/javascript">
		$("document").ready(function(){
			
				$.get("<? echo base_url().'index.php/Evaluar/obtener_retos'?>", function(datos){
					console.log(datos);
					//alert(datos);
					datos2=JSON.parse(datos);
					//alert(datos2);
					$.each(datos2,function(indice,valor){
						$("#retos").append('<option value="'+valor.ID_Reto +'">'+valor.DESC_Reto+'</option>')
					});
					//alert(jQuery.type(datos));
				});
			

				$("#retos").on('change',function(){
					$("#equipos").empty();
					$('.verequipos').removeClass('verequipos');
					var cod=$(this).val();
					$.get("<? echo base_url().'index.php/Evaluar/obtener_equipos'?>",{ID_Reto:cod},function(datos){
						datos2=JSON.parse(datos);
						$("#equipos").append('<option value="0">'+"Seleccion una opcion"+'</option>');
						$.each(datos2,function(indice,valor){
							$("#equipos").append('<option value="'+valor.ID_Equipo +'">'+valor.COD_Equipo+'</option>')
						});
					});
				});

					$("#equipos").on('change',function(){
					$("#usuario").empty();
					$('.verusuario').removeClass('verusuario');
					var cod=$(this).val();
					$.get("<? echo base_url().'index.php/Evaluar/obtener_usuario'?>",{ID_Equipo:cod},function(datos){
						datos2=JSON.parse(datos);
						$("#usuario").append('<option value="0">'+"Seleccion una opcion"+'</option>');
						$.each(datos2,function(indice,valor){
							$("#usuario").append('<option value="'+valor.ID_Usuario +'">'+valor.Nombre+'</option>')
						});
					});
					});

					var arraynota= [];
					$("#usuario").on('change',function(){	
						$("#tabla_reto").empty();
						$('.vertabla').removeClass('vertabla');
						var cod=$(this).val();
						$.get("<? echo base_url().'index.php/Evaluar/obtener_competencia'?>",{ID_Competencia:cod},function(datos){
							datos2=JSON.parse(datos);
								$("#tabla_reto").append('<tr><td>'+'Competencia'+'</td><td>'+'Mal'+'</td><td>'+'Regular'+'</td><td>'+'Bien'+'</td><td>'+'Excelente'+'</td></tr>')
							$.each(datos2,function(indice,valor){
								$("#tabla_reto").append('<tr class="primero">                                <td>'+valor.DESC_Competencia+'</td><td><div class="checkEvaluarContenido">'+valor.Mal+'</div><br><div class="checkEvaluar"><input type="radio" name="'+indice+'" value='+valor.ID_Competencia+'-25></div></td><td><div class="checkEvaluarContenido">'+valor.Regular+'</div><br><div class="checkEvaluar"><input type="radio" name="'+indice+'" value='+valor.ID_Competencia+'-50></div></td><td><div class="checkEvaluarContenido">'+valor.Bien+'</div><br><div class="checkEvaluar"><input type="radio" name="'+indice+'" value='+valor.ID_Competencia+'-75></div></td><td><div class="checkEvaluarContenido">'+valor.Excelente+'</div><br><div class="checkEvaluar"><input type="radio" name="'+indice+'" value='+valor.ID_Competencia+'-100></div></td></tr>')


								$("#boton").click(function () {	 
									alert($('input:radio[name='+indice+']:checked').val());
									arraynota.push($('input:radio[name='+indice+']:checked').val());
			
								});

							});
						});
					});
		});
	</script>

	<form  method="post" action="<? echo base_url()."index.php/Evaluar/nueva_nota"?>" >
	<label>Retos</label>
	<select id="retos" name="ID_Reto">
		<option value="">Selecciona una opción</option>
		
	</select>
	<br>
	<div class= "verequipos">
		<label>Equipos</label>
		<select id="equipos" >
		
		</select>
	</div>
	<div class="verusuario" >
		<label>Usuario</label>
		<select id="usuario" name="ID_Usuario">
		
		</select>
	</div>
	<br>
<!--<? echo base_url()."index.php/Evaluar/nueva_nota"?>-->
	<div class="vertabla">
		
			
			
		
		<table id='tabla_reto'></table>
		<input type="submit" id="boton" name="enviar" value="enviar" >
		
	</div>
	</form>
	<span id="#span"></span>





	