<?php
include("menu.php");
$gsent = $conexion->query("SELECT * FROM JefeTrabajador WHERE Rut_solicitante = '$rut'");
?>

<!DOCTYPE html>
<html>

<head>
	<title>Trabajadores</title>
	<link rel="stylesheet" href="CSS/l.css">
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
			<th>Id</th>
			<th>Rut_aprobante</th>
			<th>Aprobación</th>
			<th>Fecha</th>
		</tr>
		<?php foreach ($gsent as $trabajador): ?>
			<tr>
				<td>
					<?php echo $trabajador['id_solicitud']; ?>
				</td>
				<td>
					<?php echo $trabajador['Rut_aprobante']; ?>
				</td>
				<td>
					<?php echo $trabajador['Aprobación']; ?>
				</td>
				<td>
					<?php echo $trabajador['Fecha']; ?>
				</td>

			</tr>
		<?php endforeach; ?>
	</table>

</body>

</html>
