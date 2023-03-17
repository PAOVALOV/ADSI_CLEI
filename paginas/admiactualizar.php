<?php

session_start();
error_reporting(0);

$validar = $_SESSION['usuario'];

if ($validar == null || $validar = '') {

  header("Location: empleado.php");
  die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
  <title>Actualizar</title>

  <!-- Esto es bootstrap -->
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
  <script src="plugins/bootstrap/js/bootstrap.bundle.js"></script>

  <!-- Este es mi estilo -->
  <link rel="stylesheet" href="../paginas/styles/system.css">


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
          <a href="../paginas/estudiantes.php" class="nav-link text-white ">
            <img src="../media/iconos/Estudiante.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50" alt="">
            Estudiantes
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="../index.html"><button type="button" class="btn btn-danger" style="background-color: rgb(168, 4, 4);">Salir del sistema</button></a>

      </div>
    </div>
    <!-- END SIDE BARD -->

    <!-- Espacio entre el menú y la página del contenido de gestión -->
    <div class="b-example-divider"></div>

    <div class="container">

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">

        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
            <ul class="navbar-nav ">
              <li class="nav-item ">
                <a class="nav-link " href="administrador.php">Lista de Usuarios</a>
              </li>
              <div class="vr"></div>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="administradoruser.php">Modificando Usuario</a>
              </li>

              <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> -->
            </ul>
          </div>
        </div>
      </nav>
      <?php
      require_once '../conexion/conexion.php';                      /*LLama la conexión*/
      $db = new db_conexion();     /*Abre la base de datos*/
      $id = $_GET['id'];

      $sql = "SELECT * FROM usuarios WHERE id_login='$id'";
      $query = mysqli_query($db->conectar(), $sql);           /*pasa la query a la variable resultado*/

      $row = mysqli_fetch_array($query);
      ?>

      <div class="container mt-5 ">

        <div class="container  col-md-5 border border-secondary border-3" style="padding: 50px ">

          <h1 class="text-center">Modificar datos del usuario</h1>

          <form class="mt-5" action="admiupdate.php" method="POST">

            <input type="hidden" name="id_login" value="<?php echo $row['id_login'] ?>">

            <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $row['nombreempleado_login'] ?>">
            <input type="text" class="form-control mb-3" name="apellido" placeholder="Apellido" value="<?php echo $row['apellidoempleado_login'] ?>">
            <input type="text" class="form-control mb-3" name="documento" placeholder="Documento" value="<?php echo $row['documentoempleado_login'] ?>">
            <input type="text" class="form-control mb-3" name="usuario" placeholder="Usuario" value="<?php echo $row['usuario_login'] ?>">
            <input type="text" class="form-control mb-3" name="contrasena" placeholder="" value="<?php echo $row['passport_login'] ?>">

            <select class="form-select form-control mb-3" name="cargo" placeholder="cargo">
              <!-- Lista desplegable -->
              <option selected> <?php echo $row['cargoempleado_login'] ?></option>
              <option value="Empleado">Empleado</option>
              <option value="Administrador">Administrador</option>

            </select>

            <!-- realiza la acción de actualizar     -->
            <input type="submit" name="btn_actualizar" class="btn btn-primary btn-block" value="Actualizar">



          </form>
        </div>
      </div>
    </div>
</body>

</html>