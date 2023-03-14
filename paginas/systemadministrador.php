<?php

session_start();
error_reporting(0);

$validar = $_SESSION['usuario'];

if( $validar == null || $validar = ''){

  header("Location: empleado.php");
  die();
  
}
?>

<!DOCTYPE html>
<html lang="es ">

<head>
  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>Inicio</title>

  <!-- Esto es bootstrap -->
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
  <script src="plugins/bootstrap/js/bootstrap.bundle.js"></script>

  <!-- Este es mi estilo -->
  <link rel="stylesheet" href="../paginas/styles/system.css">

  <style>
    body {
      background-image: url('../media/imagenes/fondoadmi.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-position: center center;


    }
  </style>


</head>

<body>

  <main>
    <!-- SIDE BARD -->
    <div class=" d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 320px;">
      <a href="../paginas/Inicio_del_sistema.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none ">
        <img src="../media/logo/Isologoinstitutoclei.png" height="95">
      </a>
      <hr>

      <!-- Modulos del sistema -->
      <ul class="nav nav-pills flex-column mb-auto">
        <!-- Modulo de Inicio -->
        <li class="nav-item " width="85" height="85">
          <a href="../paginas/Inicio_del_sistema.php" class="nav-link text-white">
            <img src="../media/iconos/home.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50" alt="">
            Inicio
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Gestión -->
        <li>
          <a href="../paginas/gestion.php" class="nav-link text-white">
            <img src="../media/iconos/Management.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50" alt="">
            Gestión
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Financiero -->
        <li>
          <a href="../paginas/financiero.php" class="nav-link text-white">
            <img src="../media/iconos/Financiero.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50" alt="">
            Financiero
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Novedades -->
        <li>
          <a href="../paginas/novedades.php" class="nav-link text-white">
            <img src="../media/iconos/Novedad.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50" alt="">
            Novedades
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Administrador Activo -->
        <li>
          <a href="../paginas/systemadministrador.php" class="nav-link text-white active" aria-current="page">
            <img src="../media/iconos/Administrador .ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50" alt="">
            Administrador
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Estudiantes -->
        <li>
          <a href="../datatables/estudiantes.php" class="nav-link text-white ">
            <img src="../media/iconos/Estudiante.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50" alt="">
            Estudiantes
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="_sesion/cerrarSesion.php"><button type="button" class="btn btn-danger" style="background-color: rgb(168, 4, 4);">Salir del sistema</button></a>

      </div>
    </div>
    <!-- END SIDE BARD -->

    <!-- Espacio entre el menú y la página del contenido de gestión -->
    <div class="b-example-divider"></div>

    <div class="form-signin w-100 m-auto text-center">
      <form class="p-4 p-md-12 border rounded-4 border bg-light bg-gradient p-2 border-5 bg-opacity-75" action="_functions.php" method="POST">

        <img class="mb-4" src="../media/logo/logopaovadark.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 fw-normal fw-bolder">Acceso</h1>

        <div class="form-floating ">
          <input type="text" class="form-control" id="floatingInput" name="usuario" required="">
          <label for="floatingInput"> Usuario </label>
        </div>

        <div class="form-floating">
          <input name="contrasena" type="password" class="form-control" required="">
          <label for="floatingPassword">Contraseña</label>
          <input type="hidden" name="accion" value="acceso_user">

        </div>

        <button class="w-100 btn btn-lg btn-primary" name="enviar" type="submit">Ingresar</button>
        <br>

        <?php

        require_once '../conexion/conexion.php';

        if (isset($_POST['enviar'])) {
          

          $db = new db_conexion();

          $usuario = $_POST['usuario'];

          $sql = "SELECT * FROM usuarios WHERE user_administrador = '$usuario'";

          $query_exec = mysqli_query($db->conectar(), $sql);         /*pasa la query a la variable resultado*/
          while ($row = mysqli_fetch_array($query_exec)) {            /*pasa a vector*/
            $db->db_cerrar();


            if ($_POST['contrasena'] == $row['password_administrador'] and $_POST['usuario'] == $row['user_administrador']) {
              // header('location:administrador.php');
              echo '<script>window.location="'.'administrador.php"</script>"';
            }  

        ?>
          <br>
          <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error! </strong> Usuario o contraseña incorrectos.
              </button>
            </div>
          </div>
        <?php
 }
        }


        ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
      </form>
    </div>

    <div class="b-example-divider"></div>

  </main>

</body>

</html>
s