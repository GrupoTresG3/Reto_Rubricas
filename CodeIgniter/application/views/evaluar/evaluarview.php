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
.verboton{
	display:none;
}
</style>
<script type="text/javascript">
	$("document").ready(function(){
		//Obtienes los retos dependiendo del usuario que esta logeado
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

		var dato=[];
		var user=0;
		//Obtengo los usuarios del equipo en el que esta el usuario logeado y las notas corresppodientes que el usuario logeado a evaluado a los susuarios de su equipo
		$("#retos").on('change',function(){
			$("#tabla_reto").empty();
			$('.vertabla').removeClass('vertabla');
			var cod=$(this).val();
			$.get("<? echo base_url().'index.php/Evaluar/obtener_usuarios'?>",{ID_Reto:cod},function(datos){
				usuarios=JSON.parse(datos);
				$("#tabla_reto").append('<td></td>')
				var contador=0;
				var x='';
				var i=0;


				$.get("<? echo base_url().'index.php/Evaluar/obtener_competencias'?>",{ID_Reto:cod},function(datos){

					datos2=JSON.parse(datos);
					$.each(datos2,function(indice,valor){
						$("#tabla_reto").append(
							`<td>`+valor.DESC_Competencia+`</td>`
							);

					});
					$("#tabla_reto").append(
						`<td>Evaluar</td>`
						);
					$("#tabla_reto").append(
						`<tr>`
						);
					var nombre="";

					$.each(usuarios,function(indice,valor){
						$.ajaxSetup({
							async: false
						});
						if(valor.User!=nombre){
						//alert(valor.User);
						$("#tabla_reto").append(`

							<td>`+valor.User+`</td>`
							);
						var cod=valor.User;
					//alert(cod);

					$.get("<? echo base_url().'index.php/Evaluar/obtener_nota_filtro'?>",{nota:cod},function(datos){
						datos3=JSON.parse(datos);

						console.log(datos2);
						if (datos3==false){
							//Si aun no esta evaluado sus notas seran 0.0
							$.each(datos2,function(indice,valor){
								$("#tabla_reto").append(
									`<td>0.0</td>`
									);
							});
							$("#tabla_reto").append(`<td><center><input  type="radio" data-idusuario=`+valor.ID_Usuario+` name="evaluar" class="evaluar" value="Evaluar"></center></td>`)
							$("#tabla_reto").append(
								`<tr>`)								
							
						}else{

							$.each(datos3,function(indice,valor){
								$("#tabla_reto").append(
									`<td>`+valor.Nota+`</td>
									`
									);

							});
							$("#tabla_reto").append(`<td><center><input type="radio" data-idusuario=`+valor.ID_Usuario+` name="evaluar" class="evaluar" value="Evaluar"></center></td>`)
							$("#tabla_reto").append(
								`<tr>`)							

						}


					});					

					nombre= valor.User;

				}

			});					
					

				});

			});
		});


		$.ajaxSetup({
			async: true
		});


		//Cuando evaluas se crea una tabla mostrando competencias dependiendo del usuario logeado se selecciona la medicion para coger la competencias correctas
		$('#tabla_reto').on('click','input',function (){
			var id2 = $('input:radio[name="evaluar"]:checked').data('idusuario');
			user=id2;
			document.getElementById("user").value=user;
			$("#tabla_evaluar").empty();
			$("#tabla_reto").empty();
			$('.vertabla').removeClass('vertabla');
			$('.verboton').removeClass('verboton');
			var cod=$(this).val();
			$.get("<? echo base_url().'index.php/Evaluar/obtener_competencia'?>",{ID_Competencia:cod},function(datos){
				datos2=JSON.parse(datos);
				$("#tabla_evaluar").append('<tr><td>'+'Competencia'+'</td><td>'+'Mal'+'</td><td>'+'Regular'+'</td><td>'+'Bien'+'</td><td>'+'Excelente'+'</td></tr>')
				$.each(datos2,function(indice,valor){

					$("#tabla_evaluar").append(`
						<tr class="primero">
						<td>`+valor.DESC_Competencia+`</td>
						<td><div class="checkEvaluarContenido">`+valor.Mal+`</div><br><div class="checkEvaluar"><input type="radio" required name=`+indice+` data-id=`+valor.ID_Competencia+` data-nota='25'></div>
						</td>
						<td><div class="checkEvaluarContenido">`+valor.Regular+`</div><br><div class="checkEvaluar"><input type="radio" required name=`+indice+` data-id=`+valor.ID_Competencia+` data-nota='50' ></div>
						</td>
						<td><div class="checkEvaluarContenido">`+valor.Bien+`</div><br><div class="checkEvaluar"><input type="radio" required name="`+indice+`" data-id=`+valor.ID_Competencia+` data-nota='75' ></div>
						</td>
						<td><div class="checkEvaluarContenido">`+valor.Excelente+`</div><br><div class="checkEvaluar"><input type="radio" required name=`+indice+` data-id=`+valor.ID_Competencia+` data-nota='100' ></div>
						</td>

						</tr>
						`);

					$("#boton").click(function () {
								//alert($('input:radio[name='+indice+']:checked').data('id'));
									//alert($('input:radio[name='+indice+']:checked').data('nota'));


									var id1 = $('input:radio[name='+indice+']:checked').data('id');
									var nota1 = $('input:radio[name='+indice+']:checked').data('nota');
									dato.push({id:id1, nota:nota1});
									console.log( dato);
									datos=JSON.stringify(dato);
									
									document.getElementById("dato").value=datos;

								});	

				});
			});
		});
	});
</script>

<form  method="post" class="prueba" action="<? echo base_url()."index.php/Evaluar/nueva_nota"?>" >
	<label>Retos</label>
	<select id="retos" name="ID_Reto">
		<option value="">Selecciona una opción</option>
		
	</select>
	<br>
	

	<!--<? echo base_url()."index.php/Evaluar/nueva_nota"?>-->
	<div class="vertabla">
		


		
		<table id='tabla_reto'><tr></table>
			<table id='tabla_evaluar'><tr></table>
				<input type="hidden" id="user" name="user" value="">
				<input type="hidden" id="dato" name="dato" value="">
				<input type="submit" id="boton" class="verboton" name="enviar" value="enviar" >

			</div>
		</form>
		<span id="#span"></span>





		