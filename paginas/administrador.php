<?php

session_start();
error_reporting(0);

$validar = $_SESSION['usuario'];

if ($validar == null || $validar = '') {

  header("Location: systemadministrador.php");
  die();
}
?>


<!DOCTYPE html>
<html lang="es ">

<head>
  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>Lista de Usuarios
  </title>

  <!-- Esto es bootstrap -->
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
  <script src="plugins/bootstrap/js/bootstrap.bundle.js"></script>

  <!-- Este es mi estilo -->
  <link rel="stylesheet" href="../paginas/styles/system.css">

  <script>
    //Cuadro de diálogo de confirmación en JavaScript
    function confirmarAccesoURL() {
      return confirm("¿Está seguro que desea salir del sistema?");
    }
  </script>

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
        <a href="_sesion/cerrarSesion.php" onclick="return confirmarAccesoURL()"><button type="button" class="btn btn-danger" style="background-color: rgb(168, 4, 4);">Salir del sistema</button></a>
      </div>
    </div>
    <!-- END SIDE BARD -->


    <div class="container">

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">

        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Lista de Usuarios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="administradoruser.php">Agregar Usuario</a>
              </li>

              <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="administradoruser.php">Agregar Usuario</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> -->
            </ul>
          </div>
        </div>
      </nav>


      <!-- Vista de los integrantes del perosnal de la institución -->

      <?php
      require_once '../conexion/conexion.php';                      /*LLama la conexión*/
      $db = new db_conexion();                                      /*Abre la base de datos*/

      $sql = "SELECT *  FROM usuarios";
      $query = mysqli_query($db->conectar(), $sql);           /*pasa la query a la variable resultado*/

      $row = mysqli_fetch_array($query);
      ?>
      <div class="container mt-5">
        <div class="row justify-content-md-center">

          <br>
          <div class="">
            <table class="table border border-dark border-3" style="padding: 50px ">
              <!-- se asigna el nombre de cabecera de la columna -->
              <thead class="table-success table-dark table-bordered">
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Documento</th>
                  <th>Usuario</th>
                  <th>Contraseña</th>
                  <th>Cargo</th>
                  <th></th>
                  <th></th>

                </tr>
              </thead>

              <tbody class="table-bordered">
                <?php
                while ($row = mysqli_fetch_array($query)) {
                ?>
                  <!-- Vistas de los datos de los empleados -->
                  <tr>
                    <th><?php echo $row['id_login'] ?></th>
                    <th><?php echo $row['nombreempleado_login'] ?></th>
                    <th><?php echo $row['apellidoempleado_login'] ?></th>
                    <th><?php echo $row['documentoempleado_login'] ?></th>
                    <th><?php echo $row['usuario_login'] ?></th>
                    <th><?php echo $row['passport_login'] ?></th>
                    <th><?php echo $row['cargoempleado_login'] ?></th>

                    <!-- Me redirige a el modulo de madificar y por POST lleva el identificador para saer a quien se le dabe realizar el cambio -->
                    <th><a href="admiactualizar.php?id=<?php echo $row['id_login'] ?>" class="btn btn-info">Editar</a></th>
                    <!-- Realiza de inmediata la acción de elimina -->
                    <!-- Se va implementar una alerta, está en proceso -->
                    <th><a href="admieliminar.php?id=<?php echo $row['id_login'] ?>" class="btn btn-danger">Eliminar</a></th>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>

        </div>



  </main>

</body>

</html>