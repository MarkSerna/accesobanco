<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include 'conexion.php';
    $nuip = $_GET['nuip'];

    $validar_usuario = mysqli_query($conexion,"SELECT * FROM usuarios WHERE nuip ='$nuip'");

    $nuipExiste = mysqli_num_rows($validar_usuario) > 0;

    header('Content-Type: application/json');
    echo json_encode(['existe' => $nuipExiste]);
?>