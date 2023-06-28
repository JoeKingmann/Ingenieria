<?php
include("menu.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="CSS/jja.css">
</head>

<body>
    <h1>Perfil de Usuario</h1>

    <div class="user-info">
        <h2>Información Personal del
            <?php echo $permisos; ?>
        </h2>
        <p><strong>Nombre:</strong>
            <?php echo $nombre; ?>
        </p>
        <p><strong>Rut:</strong>
            <?php echo $rut; ?>
        </p>
        <p><strong>Correo:</strong>
            <?php echo $mail; ?>
        </p>
        <p><strong>Horario de esta semana:</strong> </p>
        <p>
            <?php echo $horarios; ?>
        </p>
    </div>

    <div class="logout-button">
        <button onclick="cerrarSesion()">Cerrar sesión</button>
    </div>

    <script>
        function cerrarSesion() {
            if (confirm("¿Estás seguro de que deseas cerrar sesión?")) {
                window.location.href = "/Ingenieria/CloseSession.php";
            }
        }
    </script>
</body>

</html>
