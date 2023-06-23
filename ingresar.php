<?php

include("conexion.php");

$cnx = conectar::Conexion();

$insert = $cnx->prepare('INSERT INTO Usuario (Rut, Nombre, Mail, Sueldo, Horarios, Permisos, Password) 
            VALUES (?,?,?,?,?,?,?)');

$insert->execute([$_GET["rut"], $_GET["nombre"], $_GET["mail"], $_GET["sueldo"], $_GET["horario"], $_GET["rol"], $_GET["contraseña"]]);
header('Location: /Ingenieria/usuarios.php');
?>
<script src="ojito.js" type="text/javascript"></script>