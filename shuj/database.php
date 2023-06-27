<?php

  $servidor = "localhost";
  $nombreusuario = "ocho";
  $password = "8421ocho2";
  $db = "ocho";
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
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    usuario VARCHAR(100) NOT NULL
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
