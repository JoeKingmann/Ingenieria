<?php
include("menu.php");
$variable = "Admin";

$idUsuario = SessionManager::verificarSesion();
$conexion = conectar::Conexion();

$consulta = "SELECT Rut, Nombre, Horarios, Mail, Permisos FROM Usuario WHERE Rut = :rut";
$stmt = $conexion->prepare($consulta);
$stmt->bindParam(':rut', $idUsuario);
$stmt->execute();
$resultado = $stmt->fetch();

if ($resultado) {
    $rut = $resultado['Rut'];

    $consulta2 = "SELECT * FROM Liquidaciones WHERE Rut = :rut";
    $stmt2 = $conexion->prepare($consulta2);
    $stmt2->bindParam(':rut', $rut);
    $stmt2->execute();
    $resultado2 = $stmt2->fetchAll();

    if ($resultado2) {
        // Datos de las liquidaciones
        $id_liquidaciones = $resultado2['id_liquidaciones'];
        $monto = $resultado2['monto'];
        $fecha = $resultado2['Fecha'];
    } else {
        // No se encontraron liquidaciones para el usuario
        echo "No se encontraron liquidaciones";
        exit;
    }
} else {
    // El usuario no existe en la base de datos
    echo "Usuario no encontrado";
    exit;
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Trabajadores</title>
    <link rel="stylesheet" href="CSS/jja.css">
    <style>
        table {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            width: 70%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            color: #fff;
            background-color: #333;
        }

        th,
        td {
            padding: 12px 105px;
            text-align: center;
        }

        th {
            background-color: #555;
            font-weight: bold;
            border-bottom: 2px solid #444;
        }

        td {
            border-bottom: 1px solid #444;
        }

        tr:hover td {
            background-color: #444;
        }

        .highlight {
            background-color: #666;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Tabla de Liquidaciones</h2>
    <table>
        <tr>
            <th>Monto</th>
            <th>Fecha</th>
        </tr>
        <?php foreach ($resultado2 as $liqui): ?>
            <tr>
                <td>
                    <?php echo $liqui['monto']; ?>
                </td>
                <td>
                    <?php echo $liqui['Fecha']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>

