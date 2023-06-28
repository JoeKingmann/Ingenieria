<?php
include("menu.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $action = $_GET["action"];

    // Verificar si el id pertenece a un registro válido en la tabla JefeTrabajador
    $consulta = $conexion->query("SELECT * FROM JefeTrabajador WHERE id_solicitud = '$id'");
    $trabajador = $consulta->fetch();

    if (!$trabajador) {
        echo "El registro no existe";
        exit;
    }

    // Cambiar el valor de la columna "Aprobación" según la acción realizada
    if ($action == "aprobar") {
        $aprobacion = "Aprobado";
    } elseif ($action == "rechazar") {
        $aprobacion = "Rechazado";
    } else {
        echo "Acción inválida";
        exit;
    }

    // Actualizar el valor de "Aprobación" en la tabla JefeTrabajador
    $update = $conexion->prepare("UPDATE JefeTrabajador SET Aprobación = :aprobacion WHERE id_solicitud = :id");
    $update->bindParam(":aprobacion", $aprobacion);
    $update->bindParam(":id", $id);
    $update->execute();
}

$gsent = $conexion->query("SELECT * FROM JefeTrabajador WHERE Rut_aprobante = '$rut' AND Aprobación = 'En espera'");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Solicitudes</title>
    <link rel="stylesheet" href="CSS/l.css">
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
        
        .botones {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            width: 75%;
            font-family: Arial, sans-serif;
        }

        th,
        td {
            padding: 12px 60px;
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

        .botoncitoParWrapper {
            display: inline-block;
        }

        .botoncitoPar {
            margin-right: 10px;
            background-color: #4CAF50;
            color: white;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center; margin: 10px;">Solicitudes</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Rut_aprobante</th>
            <th>Aprobación</th>
            <th>Fecha</th>
        </tr>
        <?php foreach ($gsent as $trabajador): ?>
            <tr>
                <td>
                    <?php echo $trabajador['id_solicitud']; ?>
                </td>
                <td>
                    <?php echo $trabajador['Rut_aprobante']; ?>
                </td>
                <td>
                    <?php echo $trabajador['Aprobación']; ?>
                </td>
                <td>
                    <?php echo $trabajador['Fecha']; ?>
                </td>
                <td>
                    <div class="botoncitoParWrapper">
                        <a class="botoncitoPar" href="?id=<?php echo $trabajador['id_solicitud']; ?>&action=aprobar">Aprobar</a>
                        <a class="botoncitoPar" href="?id=<?php echo $trabajador['id_solicitud']; ?>&action=rechazar">Rechazar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
