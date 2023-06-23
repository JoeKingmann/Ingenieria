<?php
include("menu.php");
$variable = "";

if (isset($_POST['btn1'])) {
	$variable = "Usuario";
} elseif (isset($_POST['btn2'])) {
	$variable = "JefeArea";
}
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
	<h1>Botones</h1>
	<form method="POST">
		<button type="submit" name="btn1">Botón 1</button>
		<button type="submit" name="btn2">Botón 2</button>
	</form>

	<p>El valor de la variable es:
		<?php echo $variable; ?>
	</p>
</body>

</html>