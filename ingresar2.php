<?php

include("conexion.php");

$cnx = conectar::Conexion();

$insert = $cnx->prepare('INSERT INTO Liquidaciones (id_liquidaciones, Rut, monto, Fecha) 
            VALUES (?,?,?,?)');

$insert->execute([$_GET["id_liquidaciones"], $_GET["Rut"], $_GET["monto"], $_GET["Fecha"]]);
header('Location:agrliq.php');
?>
<script src="ojito.js" type="text/javascript"></script>
