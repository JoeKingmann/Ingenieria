<?php
include("../menu.php");
$id = $_GET["id"];
$gsent = $conexion->query("SELECT Rut, Nombre, Horarios, Mail, Permisos, Password FROM Usuario WHERE Rut = '$id'");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Trabajadores</title>
	<link rel="stylesheet" href="../CSS/e.css">
	<style>
		table {
			margin-left: auto;
			margin-right: auto;
			text-align: center;
			width: 70%;
			border-collapse: collapse;
			font-family: Arial, sans-serif;
			color: #fff;
			background-color: #333;
		}

		.botones {
			margin-left: auto;
			margin-right: auto;
			text-align: center;
			width: 75%;
			font-family: Arial, sans-serif;
		}


		th,
		td {
			padding: 12px 105px;
			text-align: center;
		}

		th {
			background-color: #555;
			font-weight: bold;
			border-bottom: 2px solid #444;
		}

		td {
			border-bottom: 1px solid #444;
		}

		tr:hover td {
			background-color: #444;
		}

		.highlight {
			background-color: #666;
		}
	</style>
</head>

<body>
	<h2 style="text-align: center; margin: 10px;">Trabajadores</h2>
	<table>
		<tr>
			<th>Rol</th>
			<th>Nombre</th>
			<th>Horario</th>
			<th>Correo</th>
			<th>Contraseña</th>
		</tr>
		<?php foreach ($gsent as $trabajador): ?>
			<tr>
				<td>
					<?php echo $trabajador['Permisos']; ?>
				</td>
				<td>
					<?php echo $trabajador['Nombre']; ?>
				</td>
				<td>
					<?php echo $trabajador['Horarios']; ?>
				</td>
				<td>
					<?php echo $trabajador['Mail']; ?>
				</td>
				<td>
					<?php echo $trabajador['Password']; ?>
				</td>

			</tr>
		<?php endforeach; ?>
	</table>
	<section class="form-register">
		<form id="Formulario" action="edit.php" method="get">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<select class="controls" name="rol" id="rol" required>
				<option value="">Seleccionar dato a cambiar</option>
				<option value="Permisos">Rol</option>
				<option value="Nombre">Nombre</option>
				<option value="Horarios">Horario</option>
				<option value="Mail">Correo</option>
				<option value="Password">Contraseña</option>
			</select>
			<input class="controls" type="text" name="variable" id="variable" placeholder="Ingrese el valor" required>
			<input class="bottom" type="submit" value="Agregar Usuario">
		</form>


	</section>

</body>

</html>