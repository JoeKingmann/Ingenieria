<?php
include("conexion.php");
include("SessionManager.php");

if(isset($_GET['usuario']) && isset($_GET['password'])){
    $usuario = $_GET['usuario'];
    $password = $_GET['password'];

    // Establece la conexión con la base de datos
    $conexion = conectar::Conexion();

    $consulta = "SELECT * FROM `Usuario` WHERE Rut = :usuario AND Password = :password";

    // Preparar la consulta
    $stmt = $conexion->prepare($consulta);

    // Asignar los parámetros
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':password', $password);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $resultado = $stmt->fetch();

    if($resultado){
        // Ingreso con exito y se dirige al inicio
        session_start();
        SessionManager::iniciarSesion($resultado['Rut']);
        header('Location: /Ingenieria/inicio.php');
        exit;
    }else{
        // Redirige nuevamente al inicio para volver a intentarlo
        header('Location: /Ingenieria/index.php');
    }
}
?>
