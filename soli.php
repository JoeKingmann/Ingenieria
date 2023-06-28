<?php

include("conexion.php");

$cnx = conectar::Conexion();
$idSolicitud = $_GET["id"];
$action = $_GET["action"];

$editar = $cnx->prepare("UPDATE Solicitudes SET Aprobación = ? WHERE id_solicitud = ?");
$editar->execute([$action, $idSolicitud]);

header("Location: aceptarsoli.php");
?>