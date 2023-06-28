<?php
include("conexion.php");
include("SessionManager.php");

$idUsuario = SessionManager::verificarSesion();
$conexion = conectar::Conexion();

$cnx = conectar::Conexion();

$consulta = "SELECT Rut, Nombre, Horarios, Mail, Permisos FROM Usuario WHERE Rut = :rut";
$stmt = $cnx->prepare($consulta);
$stmt->bindParam(':rut', $idUsuario);
$stmt->execute();
$resultado = $stmt->fetch();

if ($resultado) {
    // Datos del usuario
    $rut = $resultado['Rut'];
    $nombre = $resultado['Nombre'];
    $horarios = $resultado['Horarios'];
    $mail = $resultado['Mail'];
    $permisos = $resultado['Permisos'];
} else {
    // El usuario no existe en la base de datos
    echo "Usuario no encontrado";
    exit;
}

$consulta2 = $cnx->prepare('SELECT rut_superior FROM Usuario WHERE Rut = :rut');
$consulta2->bindParam(':rut', $rut);
$consulta2->execute();
$resultado2 = $consulta2->fetch(PDO::FETCH_ASSOC);
$Rut_aprobante = $resultado2['rut_superior'];
$Aprobacion = 'En espera';

$insert = $cnx->prepare('INSERT INTO JefeTrabajador (id_solicitud, Rut_aprobante, Aprobación, Rut_solicitante, Fecha) 
            VALUES (?,?,?,?,?)');

$insert->execute([$_GET["id_solicitud"], $Rut_aprobante, $Aprobacion, $_GET["Rut_solicitante"], $_GET["Fecha"]]);
header('Location: /Ingenieria/crearsoli.php');
?>
<script src="ojito.js" type="text/javascript"></script>
