<?php 
session_start();

if (isset($_SESSION['usuario'])) {
  $username = $_SESSION['usuario'];
  echo $username;
} else {
  echo '';
}
?>
