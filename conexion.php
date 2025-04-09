<?php
$conexion = new mysqli("localhost", "root", "", "senaquest2");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>

