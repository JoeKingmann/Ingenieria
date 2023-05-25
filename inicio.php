<?php
include("conexion.php");
include("SessionManager.php");

$idUsuario = SessionManager::verificarSesion();
$conexion = conectar::Conexion();

// Consulta SQL para obtener los datos del usuario
$consulta = "SELECT Rut, Nombre, Horarios, Mail FROM Usuario WHERE Rut = :rut";
$stmt = $conexion->prepare($consulta);
$stmt->bindParam(':rut', $idUsuario);
$stmt->execute();
$resultado = $stmt->fetch();

if($resultado){
    // Datos del usuario
    $rut = $resultado['Rut'];
    $nombre = $resultado['Nombre'];
    $horarios = $resultado['Horarios'];
    $mail = $resultado['Mail'];
} else {
    // El usuario no existe en la base de datos
    echo "Usuario no encontrado";
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="CSS/C.css">
</head>
<body>
    <h1>Perfil de Usuario</h1>

    <div class="user-info">
        <h2>Información Personal</h2>
        <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
        <p><strong>Rut:</strong> <?php echo $rut; ?></p>
        <p><strong>Correo:</strong> <?php echo $mail; ?></p>
        <p><strong>Horario de esta semana:</strong> </p>
        <p><?php echo $horarios; ?></p>
    </div>

    <div class="logout-button">
        <button onclick="cerrarSesion()">Cerrar sesión</button>
    </div>

    <script>
        function cerrarSesion() {
            if (confirm("¿Estás seguro de que deseas cerrar sesión?")) {
                window.location.href = "CloseSession.php";
            }
        }
    </script>
</body>
</html>
