<?php 
session_start();

if (isset($_SESSION['usuario'])) {
  $username = $_SESSION['usuario'];
  echo json_encode($username);
} else {
  echo json_encode(null);
}
?>
