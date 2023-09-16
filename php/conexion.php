<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "acceso";

// Crear una conexión
$conexion= mysqli_connect('localhost','root','','acceso');

// Verificar la conexión
if ($conexion->connect_error) {
    die("La conexión a la base de datos falló: " . $conexion->connect_error);
}
?>
