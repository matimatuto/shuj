<?php
$usuario = $_POST['email'];
$contraseña = $_POST['password'];

include('database.php');

// Conectar a la BD
$conexion = mysqli_connect("localhost", "root", "", "tablausuarios");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$consulta = "SELECT * FROM login WHERE mail='$usuario' and contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    $filas = mysqli_num_rows($resultado);
    if ($filas > 0) {
        ?>
        <div>
            <script>window.location.href = "index.html"</script>;
        </div>
        <?php
    } else {
        ?>
        <div>
        <script>window.location.href = "inicio-sesion.html"</script>;
        </div>
        <?php
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>