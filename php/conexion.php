<?php
$server ="localhost";
$user ="root";
$password ="12345678";
$bd ="clinica502";
$conexion = new mysqli($server, $user, $password, $bd) or die("Error en la conexion");
$conexion->set_charset("utf8");
?>