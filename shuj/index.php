<?php
  session_start();
  $varsesion = $_SESSION['usuario'];

  if($varsesion==null || $varsesion='')
  {
    header("location:inicio-sesion.html");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>ocho</title>
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body>
    <!-- NAVIGATION  -->
    <nav class="titleContainer">
      <h1>
        Bienvenido: <?php echo $_SESSION['usuario'] ?>
      </h1>

      <div class="container-input">
        <input type="search" placeholder="Buscar tarea" name="search" class="input" id="search">
      </div>

      <ul class="acorh">
        <li class="account">
          <a href="#">Cuenta<span class="hover-effect"></span></a>
          <ul>
            <li><a href="inicio-sesion.html">Iniciar Sesion</a></li>
            <li><a href="registrarUsuario.html">Crear Cuenta</a></li>
          </ul>
        </li>
      </ul>

      <small style="float: right"> <a href="logout.php">Cerrar Sesion</a> </small>

    </nav>
    
    <div class="resultados" id="task-result">
      <ul id="container"></ul>
    </div>
    
    <div class="card">
      <div class="card-body">
        <form class="form" id="task-form">
          <p class="title">Ingrese la tarea</p>
            <div class="flex">
              <label class="form-group">
                <input required="" type="text" id="name" placeholder="Nombre" type="text" class="input1" class="form-control">
              </label>
              <label class="form-group">
                <input required="" type="text" id="description" placeholder="Descripción" class="input1" class="form-control">
              </label>
            </div>  
            <input type="hidden" id="taskId">

            <button class="submit">
              Submit
            </button>
        </form>
      </div>
    </div>

  
    <!-- TABLE -->
<?php if ($_SESSION['usuario'] == "ADMIN") { ?>
  <div>
    <table class="tg">
      <thead>
        <tr>
          <td class="tgCabezera">Id</td>
          <td class="tgCabezera">Usuario</td>
          <td class="tgCabezera">Name</td>
          <td class="tgCabezera">Descripción</td>
          <td class="tgCabezera">Borrar</td>
          <td class="tgCabezera">Editar</td>
        </tr>
      </thead>
      <tbody id="tasks" class="tg-0lax"></tbody>
    </table>
  </div>
<?php } else { ?>
  <div>
    <table class="tg">
      <thead>
        <tr>
          <td class="tgCabezera">Id</td>
          <td class="tgCabezera">Name</td>
          <td class="tgCabezera">Descripción</td>
          <td class="tgCabezera">Borrar</td>
          <td class="tgCabezera">Editar</td>
        </tr>
      </thead>
      <tbody id="tasks" class="tg-0lax"></tbody>
    </table>
  </div>
<?php } ?>


    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <script src="app.js"></script>
    
  </body>

</html>
