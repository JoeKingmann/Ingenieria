<?php
include("menu.php");
$variable = "Admin";

if (isset($_POST['btn1'])) {
    $variable = "Usuario";
} elseif (isset($_POST['btn2'])) {
    $variable = "JefeArea";
} elseif (isset($_POST['btn3'])) {
    $variable = "Contador";
} elseif (isset($_POST['btn4'])) {
    $variable = "BackOffice";
}
$gsent = $conexion->query("SELECT Rut, Nombre, Horarios, Mail, Permisos FROM Usuario WHERE Permisos = '$variable'");
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

        .botones {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            width: 75%;
            font-family: Arial, sans-serif;
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
    <h2 style="text-align: center;">Tabla de Trabajadores</h2>
    <form class="botones" method="POST">
        <button type="submit" name="btn1" class="botoncito">Trabajadores</button>
        <button type="submit" name="btn2" class="botoncito">Jefes de Área</button>
        <button type="submit" name="btn3" class="botoncito">Contadores</button>
        <button type="submit" name="btn4" class="botoncito">BackOffices</button>
    </form>
    <table>
        <tr>
            <th>Rol</th>
            <th>Nombre</th>
            <th>Horario</th>
        </tr>
        <?php foreach ($gsent as $trabajador): ?>
            <tr>
                <td>
                    <?php echo $trabajador['Permisos']; ?>
                </td>
                <td>
                    <?php echo $trabajador['Nombre']; ?>
                </td>
                <td>
                    <?php echo $trabajador['Horarios']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>