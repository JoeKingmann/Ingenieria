<?php

include("../conexion.php");

$cnx = conectar::Conexion();

$insert = $cnx->prepare("DELETE FROM Usuario WHERE Rut=?");

$insert->execute([$_GET["id"]]);


header('Location: /Ingenieria/usuarios.php');
?>