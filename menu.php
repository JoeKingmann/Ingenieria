<?php
include("conexion.php");
include("SessionManager.php");

$idUsuario = SessionManager::verificarSesion();
$conexion = conectar::Conexion();

// Consulta SQL para obtener los datos del usuario
$consulta = "SELECT Rut, Nombre, Horarios, Mail, Permisos FROM Usuario WHERE Rut = :rut";
$stmt = $conexion->prepare($consulta);
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
?>


<div class="top-menu">
    <div class="dropdown">
        <button onclick="toggleDropdown()" class="dropbtn">Menú</button>
        <div id="myDropdown" class="dropdown-content">
            <a href="inicio.php">Inicio</a>
            <a href="CloseSession.php">Cerrar Sesion</a>
        </div>
    </div>

    <?php
    if ($permisos == 'Admin') {
        ?>
        <div class="dropdown">
            <button onclick="toggleDropdown2()" class="dropbtn">Información</button>
            <div id="DropdownAdmin" class="dropdown-content">
                <a href="trabajadores.php">Trabajadores</a>
            </div>
        </div>
        <?php
    } elseif ($permisos == 'BackOffice') {
        ?>
        <div class="dropdown">
            <button onclick="toggleDropdown3()" class="dropbtn">Usuarios</button>
            <div id="DropdownBackOffice" class="dropdown-content">
                <a href="agregar.php">Ingresar Usuarios</a>
                <a href="usuarios.php">Ver Usuarios</a>
                <a href="agrliq.php">Ingresar Liquidaciones</a>
            </div>
        </div>
        <?php
    } elseif ($permisos == "JefeArea") {
        ?>
        <div class="dropdown">
            <button onclick="toggleDropdown4()" class="dropbtn">Información</button>
            <div id="DropdownComun" class="dropdown-content">
                <a href="liquidaciones.php">Mis Liquidaciones</a>
                <a href="#">Mis permisos</a>
                <a href="#">Historial de Horarios</a>
            </div>
        </div>
        <div class="dropdown">
            <button onclick="toggleDropdown5()" class="dropbtn">Trabajadores</button>
            <div id="DropdownJefeArea" class="dropdown-content">
                <a href="agregar.php">Solicitudes de permisos</a>
                <a href="usuarios.php">Horarios</a>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="dropdown">
            <button onclick="toggleDropdown3()" class="dropbtn">Información</button>
            <div id="DropdownBackOffice" class="dropdown-content">
                <a href="liquidaciones.php">Mis Liquidaciones</a>
                <a href="#">Mis permisos</a>
                <a href="#">Historial de Horarios</a>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<script>
    function toggleDropdown() {
        var dropdown = document.getElementById("myDropdown");
        dropdown.classList.toggle("show");
    }
    function toggleDropdown2() {
        var dropdown = document.getElementById("DropdownAdmin");
        dropdown.classList.toggle("show");
    }
    function toggleDropdown3() {
        var dropdown = document.getElementById("DropdownBackOffice");
        dropdown.classList.toggle("show");
    }
    function toggleDropdown4() {
        var dropdown = document.getElementById("DropdownComun");
        dropdown.classList.toggle("show");
    }
    function toggleDropdown5() {
        var dropdown = document.getElementById("DropdownJefeArea");
        dropdown.classList.toggle("show");
    }
    window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    };
</script>

<style>
    .top-menu {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        background-color: #333;
        height: 80px;
        padding: 15px;
        border-radius: 10000px;

    }

    .dropdown {
        margin-right: 40px;
        position: relative;
        display: inline-block;
    }

    .dropbtn {
        background-color: rgba(0, 0, 0);
        color: white;
        padding: 12px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        border-radius: 50px;
    }

    .dropbtn:hover {
        background-color: rgba(63, 65, 66);
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 9px;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        transition: background-color 0.3s ease;
        border-radius: 10px;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .show {
        display: block;
    }
</style>
