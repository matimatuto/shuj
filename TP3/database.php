<?php

$servidor = "localhost";
$nombreusuario = "root";
$password = "";
$db = "tablausuarios";
$table = "todotabla";
$table1 = "login";

$connection = new mysqli($servidor, $nombreusuario, $password, $db);

if ($connection->connect_error)
{
  die("Conexión fallida: " . $connection->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $db";

// if ($connection->query($sql) === true) 
// {
//   echo "base  correctamente.";
// } 
// else 
// {
//   die("Error al crear base de datos: " . $connection->error);
// }

$connection->select_db($db);

$sql = "CREATE TABLE IF NOT EXISTS $table 
(
  id INT(8) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  dni INT(8) NOT NULL,
  mail VARCHAR(100) NOT NULL,
)";

$sql1 = "CREATE TABLE IF NOT EXISTS $table1 
(
  usuario VARCHAR(100) PRIMARY KEY,
  password VARCHAR(100)
)";


// if ($connection->query($sql1))
// {
//   echo "La tabla se creó correctamente.";
// } 
// else 
// {
//    die("Erroralcreartabla: ".$connection->error);
// }

?>