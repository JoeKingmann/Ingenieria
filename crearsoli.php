<?php
include("menu.php");
$gsent = $conexion->query("SELECT rut_superior FROM Usuario WHERE Rut = '$rut'");
?>


<!DOCTYPE html>
<html lang="en-US">

<head>

	<title>Ingreso de liquidación</title>
	<link rel="stylesheet" href="CSS/agregar.css">
	<style>
		input[type="number"]::-webkit-inner-spin-button,
		input[type="number"]::-webkit-outer-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		input[type="number"] {
			-moz-appearance: textfield;
		}
	</style>
</head>

<body>
	<section class="form-register">
		<form id="Formulario" action="/Ingenieria/ingresar3.php" method="get">
			<h4>Ingreso de liquidación</h4>
			<input class="controls" type="number" name="id_solicitud" id="id_solicitud" placeholder="Ingrese el ID de solicitud" required>
			<input class="controls" type="number" name="Rut_solicitante" id="Rut_solicitante" placeholder="Ingrese su Rut" required>
			<input class="controls" type="date" name="Fecha" id="Fecha" placeholder="Ingrese la Fecha" required>
			<input class="bottom" type="submit" value="Enviar solicitud">
		</form>
	</section>
</body>

</html>
