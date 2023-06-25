<?php

include("../conexion.php");

$cnx = conectar::Conexion();
$rol = $_GET["rol"];
$variable = $_GET["variable"];
$id = intval($_GET["id"]);

$editar = $cnx->prepare("UPDATE Usuario SET $rol = ? WHERE Rut = ?");
$editar->execute([$variable, $id]);

header("Location: /Ingenieria/Metodos/editar.php?id=$id");
?>