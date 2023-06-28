<?php
include("menu.php");
?>


<!DOCTYPE html>
<html lang="en-US">

<head>

	<title>Ingreso de trabajadores</title>
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
		<form id="Formulario" action="ingresar.php" method="get">
			<h4>Ingreso de trabajadores</h4>
			<input class="controls" type="text" name="nombre" id="nombre" placeholder="Ingrese el Nombre completo"
				required>
			<input class="controls" type="text" name="rut" id="rut" placeholder="Ingrese el Rut" required>
			<input class="controls" type="email" name="mail" id="mail" placeholder="Ingrese el Mail" required>
			<input class="controls" type="number" name="sueldo" id="sueldo" placeholder="Ingrese el Sueldo" required>
			<input class="controls" type="text" name="horario" id="horario" placeholder="Ingrese el Horario" required>
			<select class="controls" name="rol" id="rol" required>
				<option value="">Seleccionar un rol</option>
				<option value="Usuario">Usuario</option>
				<option value="Contador">Contador</option>
				<option value="BackOffice">BackOffice</option>
				<option value="JefeArea">Jefe de Área</option>
            </select>
            <select class="controls" name="rut_superior" id="rut_superior" required>
				<option value="">Seleccionar un superior</option>
				<option value="45432564">Juan Belaunde</option>
				<option value="206757949">Alicia Herrera</option>
				<option value="0">Administrador</option>
			</select>


			<input class="controls" type="text" name="contraseña" id="contraseña" placeholder="Ingrese la contraseña"
				required>
			<input class="bottom" type="submit" value="Agregar Usuario">
		</form>


	</section>


</body>


</html>
