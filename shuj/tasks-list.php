<?php
  session_start();

  include('database.php');
  
  if ( $_SESSION['usuario'] == "ADMIN" )
  {

    $query = "SELECT * from todotabla";
    // $query = "SELECT * from todotabla ";
  
    $result = mysqli_query($connection, $query);
    if(!$result) {
      die('Query Failed'.mysqli_error($connection));
    }
  
    $json = array();
    while($row = mysqli_fetch_array($result)) {
      $json[] = array(
        'name' => $row['name'],
        'description' => $row['description'],
        'id' => $row['id'],
        'usuario' => $row['usuario']
      );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
  }
  else {
    $query = "SELECT * from todotabla where usuario='$_SESSION[usuario]' ";
    // $query = "SELECT * from todotabla ";
  
    $result = mysqli_query($connection, $query);
    if(!$result) {
      die('Query Failed'.mysqli_error($connection));
    }
  
    $json = array();
    while($row = mysqli_fetch_array($result)) {
      $json[] = array(
        'name' => $row['name'],
        'description' => $row['description'],
        'id' => $row['id'],
      );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
  }

 
?>
