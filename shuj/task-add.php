<?php

  session_start();

  // $usuario = $_POST['email'];

  include('database.php');

  if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $usuario2 = $_SESSION['usuario'];
    $query = "INSERT into todotabla(name, description, usuario) 
              VALUES ('$name', '$description', '$usuario2')";
    $result = mysqli_query($connection, $query);

    if (!$result) {
      die('Query Failed.');
    }

    echo "Task Added Successfully";  
}
?>
