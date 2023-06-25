<?php

  session_start();

  // $usuario = $_POST['email'];

  include('database.php');

  if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $mail = $_POST['mail'];
    $usuario2 = $_SESSION['usuario'];
    $query = "INSERT into todotabla(name, apellido, dni, mail, usuario) 
              VALUES ('$name', '$apellido', '$dni', '$mail', '$usuario2')";
    $result = mysqli_query($connection, $query);

    if (!$result) {
      die('Query Failed.');
    }

    echo "Task Added Successfully";  
}
?>
