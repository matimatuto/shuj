<?php
    $usuario = $_POST['email'];
    $contraseña = $_POST['password'];

    session_start();
    $_SESSION['usuario'] = $usuario;
    
    include('database.php');

    // Conectar a la BD
    $conexion = mysqli_connect("localhost", "ocho", "8421ocho2", "ocho");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $consulta = "SELECT * FROM login WHERE usuario='$usuario' and password='$contraseña'";
    $resultado = mysqli_query($conexion, $consulta);

    if( $usuario == "ADMIN" &&  $contraseña == "ADMIN")
    {
        header("location:index.php");
    }
    else if ($resultado) {
        $filas = mysqli_num_rows($resultado);
        if ($filas > 0) {
            header("location:index.php");
            
        } 
        else 
        {
            echo "error";
        }
    } 
    else 
    {
        echo "Error en la consulta: " . mysqli_error($conexion);
    }

    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>
