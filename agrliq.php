<?php
include("menu.php");
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
		<form id="Formulario" action="ingresar2.php" method="get">
			<h4>Ingreso de liquidación</h4>
			<input class="controls" type="number" name="id_liquidaciones" id="id_liquidaciones" placeholder="Ingrese el ID de liquidación" required>
			<input class="controls" type="number" name="Rut" id="Rut" placeholder="Ingrese el Rut" required>
			<input class="controls" type="number" name="monto" id="monto" placeholder="Ingrese el Monto" required>
			<input class="controls" type="date" name="Fecha" id="Fecha" placeholder="Ingrese la Fecha" required>
			<input class="bottom" type="submit" value="Agregar Liquidacion">
		</form>
	</section>
</body>

</html>
