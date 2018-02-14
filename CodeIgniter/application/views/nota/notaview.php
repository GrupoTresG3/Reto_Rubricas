
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
	$("document").ready(function(){

		//Muestra las notas del los usuarios evaluados en el equipo del usuario logeado.
		$.get("<? echo base_url().'index.php/Nota/obtener_nota'?>", function(datos){
			datos2=JSON.parse(datos);
			var nombre='';
			$("#tabla_nota").append('<tr><td><b>Alumno</b></td><td><b>Nota</b></td></tr>');

			$.each(datos2,function(indice,valor){
				$.ajaxSetup({
					async: false
				});
				if(valor.User!=nombre){
						//alert(valor.User);
						$("#tabla_nota").append(`
							<td>`+valor.User+`</td>`
							);
						var cod=valor.User;
					//alert(cod);

					$.get("<? echo base_url().'index.php/Nota/obtener_nota_filtro'?>",{nota:cod},function(datos){
						datos3=JSON.parse(datos);

						console.log(datos2);
						if (datos3==false){

							$("#tabla_nota").append(
								`<td>No evaluado</td>`
								);

							$("#tabla_nota").append(
								`<tr>`)
							
						}else{
							var resultado = 0;
							var resul = 0;

							$.each(datos3,function(indice,valor){
								resul=(valor.Nota*valor.Porcentaje)/100;
								resultado= resul + resultado;	
							});
							$("#tabla_nota").append(
								`<td>`+resultado/10+`</td>`
								);
							$("#tabla_nota").append(
								'<tr>')						

						}


					});					
					nombre= valor.User;
				}
			});					
		});

		$.ajaxSetup({
			async: true
		});

	});
</script>

<table id='tabla_nota'></table>

<span id="#span"></span>






