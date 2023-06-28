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
		.container {
			margin: 20px auto;
			width: 70%;
			border: 1px solid #ccc;
			padding: 20px;
			font-family: Arial, sans-serif;
			background-color: #ccc; /* Color de fondo */
		}

		.container p {
			margin: 10px 0;
		}

		.botones {
			margin-top: 20px;
			text-align: center;
		}
	</style>
</head>

<body>
	<h2 style="text-align: center; margin: 10px;">Trabajadores</h2>
	<?php foreach ($gsent as $trabajador): ?>
		<div class="controls">
			<p><strong>Rol:</strong> <?php echo $trabajador['Permisos']; ?></p>
			<p><strong>Nombre:</strong> <?php echo $trabajador['Nombre']; ?></p>
			<p><strong>Horario:</strong> <?php echo $trabajador['Horarios']; ?></p>
			<p><strong>Correo:</strong> <?php echo $trabajador['Mail']; ?></p>
			<p><strong>Contraseña:</strong> <?php echo $trabajador['Password']; ?></p>
			<div class="botones">
				<a class="botoncito" href="/Metodos/eliminar.php?id=<?php echo $trabajador['Rut'] ?>">Eliminar</a>
			</div>
		</div>
	<?php endforeach; ?>

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
