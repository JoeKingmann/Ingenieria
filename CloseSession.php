<?php
include("SessionManager.php");

SessionManager::cerrarSesion();

header("Location: index.php");
exit;
?>
