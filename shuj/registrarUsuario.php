<?php

    $usuario = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    include('database.php');

    // Conectar a la BD
    // $conexion = mysqli_connect("localhost", "root", "", "tablausuarios");

    if (!$connection) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Verificar si el usuario ya existe
    $consulta = "SELECT * FROM login WHERE mail='$usuario'";
    $resultado = mysqli_query($connection, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        // El usuario ya existe
        echo "El usuario ya existe en la base de datos.";

    } else {
        // Insertar el nuevo usuario
        $consulta = "INSERT INTO login (usuario, password) VALUES ('$usuario', '$contraseña')";
        if (mysqli_query($connection, $consulta)) {
            // Redirigir al usuario a index.php
            ?>
            <div>
                <script>window.location.href = "index.php"</script>;
            </div>
            <?php
        } else {
            echo "Error al agregar el usuario: " . mysqli_error($connection);
        }
    }

    mysqli_close($connection);
?>
