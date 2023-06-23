<?php

class SessionManager
{
    public static function iniciarSesion($idUsuario)
    {
        session_start();
        $_SESSION['Rut_usuario'] = $idUsuario;
    }

    public static function verificarSesion()
    {
        session_start();

        if (isset($_SESSION['Rut_usuario'])) {
            // El usuario ha iniciado sesión, puedes acceder al ID almacenado en la variable de sesión
            $idUsuario = $_SESSION['Rut_usuario'];

            return $idUsuario;
        } else {
            // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
            header("Location: index.php");
            exit;
        }
    }

    public static function ingresarSesion()
    {
        session_start();

        if (isset($_SESSION['Rut_usuario'])) {
            // El usuario ha iniciado sesión, puedes acceder al ID almacenado en la variable de sesión
            $idUsuario = $_SESSION['Rut_usuario'];
            header("Location: inicio.php");
            return $idUsuario;
        }
    }
    public static function cerrarSesion()
    {
        session_start();
        session_destroy();
    }
}
?>