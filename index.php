<?php
include("SessionManager.php");
$idUsuario = SessionManager::ingresarSesion();
?>


<!DOCTYPE html>
<html lang="en-US">

<head>

    <title>Ingreso de trabajadores</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>

<body>
    <section class="form-register">
        <form id="Formulario" action="/Ingenieria/validar.php" method="get">
            <h4>Ingreso de trabajadores</h4>
            <input class="controls" type="text" name="usuario" id="usuario" placeholder="Ingrese su rut" required>
            <input class="controls" type="password" name="password" id="password" placeholder="Ingrese su contraseña"
                required>
            <input class="bottom" type="submit" value="Iniciar sesion">
        </form>


    </section>


</body>

</html>
