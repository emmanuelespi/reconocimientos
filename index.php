<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Genera tu diploma de participación - Innovación Tecnológica en Educación S.A.P.I. de C.V.</title>
	<link rel="shortcut icon" type="image/png" href="img/ico-reeduca.png">
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link rel="stylesheet" href="css/style.css"/>
</head>
<?php
include('php/conectar.php');
?>
<body>
	<div class="container"> <!--Contenedor principal de mi página-->
		<div class="row">
			<div class="col-xs-3">
				<img src="img/reeduca-logo.png" alt="Logo Reeduca" width: "200px" height="100px">
			</div>
			<div class="col-xs-6">
				<h1 class="lead" align="center">Sistema de generación de certificados</h1>
			</div>
			<div class="col-xs-3">
				<img src="img/vex-logo.png" alt="Logo VEX Robotics Competition" width="200px" height="100px">
			</div>
		</div>	
		<div class="row"> <!--la primer fila de mi página la contienen 12 "cajones"-->
			<div class="col-xs-12"> <!--aquí hago una fila vacia-->
				<br>
				<br>
				<br>
				<br>
				<p align="center">Ingresa tu VEX ID en el cuadro y da clic fuera de él una vez que lo hayas escrito</p>
			</div>
		</div>
		<div class="row"><!--la segunda fila de mi página la contienen 12 "cajones"-->
			<div class="col-xs-4"><!--Primer sección vacia de 4 cajones-->
				
			</div>
			<div class="col-xs-4"><!--Segunda sección que tiene mi formulario-->
				<form class="form-inline" name="formulario_envio" id="formulario_envio" action="#" method="post" accept-charset="UTF-8" onkeypress="if(event.keyCode == 13) event.returnValue = false;">
					<div class="form-group">
						<label for="exampleInputName2">VEX ID</label>
						<input type="text" class="form-control" placeholder="VEX ID" id="vex_id" name="vex_id">
					</div>

				</form>
			</div>
			<div class="col-xs-4"><!--Tercer sección vacia de 4 cajones-->				
			</div>
			<div class="row" id="target"> 
			</div>
		</div>
		
	</div>
	<footer class="footer">
		<p class="text-center">Av. Manuel Villalongin #150 entre Río Balsas y Río Sena Col. Cuauhtemoc,  México D.F. C.P.06500</p>
	</footer>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#vex_id').blur(function(){

				$("#info").html('<img src="loader.gif" alt="" />').fadeOut(1000);

				var vexid = $(this).val();
				var dataString = 'vex_id='+vexid;
				$.ajax({
					type: "POST",
					url: "php/buscar.php",
					data: dataString,
					success: function(data){
						$('#target').fadeIn(1000).html(data);
					}
				}); 
			});
		});
	</script>
</body>
</html>