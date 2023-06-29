<?php

include("conexion.php");

$cnx = conectar::Conexion();

$insert = $cnx->prepare('INSERT INTO Liquidaciones (Rut, monto, Fecha) 
            VALUES (?,?,?)');

$insert->execute([$_GET["Rut"], $_GET["monto"], $_GET["Fecha"]]);
header('Location:/Ingenieria/agrliq.php');
?>
<script src="ojito.js" type="text/javascript"></script>
