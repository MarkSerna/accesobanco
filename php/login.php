<?php
include 'conexion.php';
$tipo_identificacion = $_POST['tipo_identificacion'];
$nuip = $_POST['nuip'];
$clave = $_POST['clave'];

// Consulta SQL para verificar si el usuario y la contraseña existen
$sql = "SELECT * FROM usuarios WHERE tipo_identificacion = '$tipo_identificacion' AND nuip = '$nuip' AND clave = '$clave'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Usuario y contraseña válidos
    echo "<script>alert('Bienvenido $nuip'); window.location.href = '../mprincipal.html';</script>";
} else {
    // Usuario o contraseña incorrectos
    echo "<script>alert('Usuario o contraseña incorrectos, verifique los datos e inténtelo de nuevo'); window.location.href = '../index.php';</script>";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>