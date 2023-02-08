<?php
session_start();

// Borrar conetnido variables de sesion
$_SESSION = array();

// Cerrar sesion
session_destroy();

header("location: login.php");
exit;
?>