<?php

$usuario = $_POST['email'];
$contraseña = $_POST['contraseña'];

include('database.php');

// Conectar a la BD
$conexion = mysqli_connect("localhost", "root", "", "ocho");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si el usuario ya existe
$consulta = "SELECT * FROM login WHERE usuario='$usuario'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    // El usuario ya existe
    echo "El usuario ya existe en la base de datos.";

} else {
    // Insertar el nuevo usuario
    $consulta = "INSERT INTO login (usuario, password) VALUES ('$usuario', '$contraseña')";
    if (mysqli_query($conexion, $consulta)) {
        // Redirigir al usuario a index.php
        header("Location: index.php");
        exit;
    } else {
        echo "Error al agregar el usuario: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);

?>
