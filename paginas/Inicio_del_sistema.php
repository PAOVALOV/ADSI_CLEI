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
<html lang="es ">

<head>
  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>Inicio del sistema</title>

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
      <a href="../paginas/Inicio_del_sistema.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white">
        <img src="../media/logo/Isologoinstitutoclei.png" height="95">
      </a>
      <hr>

      <!-- Modulos del sistema -->
      <ul class="nav nav-pills flex-column mb-auto">
        <!-- Modulo de Inicio -->
        <li class="nav-item " width="85" height="85">
          <a href="../paginas/Inicio_del_sistema.php" class="nav-link text-white active" aria-current="page">
            <img src="../media/iconos/home.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50">
            Inicio
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Gestión -->
        <li>
          <a href="../paginas/gestion.php" class="nav-link text-white">
            <img src="../media/iconos/Management.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50">
            Gestión
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Financiero -->
        <li>
          <a href="../paginas/financiero.php" class="nav-link text-white">
            <img src="../media/iconos/Financiero.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50">
            Financiero
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Novedades -->
        <li>
          <a href="../paginas/novedades.php" class="nav-link text-white">
            <img src="../media/iconos/Novedad.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50">
            Novedades
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Administrador -->
        <li>
          <a href="../paginas/systemadministrador.php" class="nav-link text-white">
            <img src="../media/iconos/Administrador .ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50">
            Administrador
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Estudiantes -->
        <li>
          <a href="../datatables/estudiantes.php" class="nav-link text-white">
            <img src="../media/iconos/Estudiante.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50">
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


    <!-- CONTENIDO DE INICO -->

    <div class="container  overflow-auto">
      <div class="row p-5 pb-5 pe-lg-5 pt-lg-5 align-items-center rounded-3 border shadow-lg overflow-auto">
        <div>
          <!-- Contenido de gestión estudiantel sitio informativo (Sin definir contenido) -->
          <h1 class="display-4 fw-bold lh-1 text-center">¡BIENVENIDO USUARIO!</h1>
          <br>
          <p class="lead">
          </p>
          <div class="alert alert-primary" role="alert">
            En cada uno de los módulos primero se hace la validación de la existencia del estudiante, en caso de que no exista lo guiará al módulo para agregarlo al sistema.
          </div>
          <div class="container px-4 py-5 " id="hanging-icons">
            <h2 class="pb-2 border-bottom text-center">MODULOS DEL SISTEMA</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3 ">
              <div class="col d-flex align-items-start border" style='padding: 20px;'>
                <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                </div>

                <div>
                  <img src="../media/iconos/proceso.png" class="img-fluid  mx-auto d-block" style="padding-inline-end: 10px;" width="100" height="100">

                  <h4 class="mt-3 fs-2 text-center">Gestión</h4>
                  <p>Permite realizar la CRUD con los datos del estudiante</p>
                  <ul>
                    <li>Crear</li>
                    <li>Modificar</li>
                    <li>Eliminar</li>
                  </ul>
                  <a href="gestion.php" class="btn btn-primary">
                    Ir a gestión
                  </a>
                </div>
              </div>
              <div class="col d-flex align-items-start border" style='padding: 20px;'>
                <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                  <svg class="bi" width="1em" height="1em">
                    <use xlink:href="#cpu-fill" />
                  </svg>
                </div>
                <div>
                  <img src="../media/iconos/financiero.png" class="img-fluid mx-auto d-block" style="padding-inline-end: 10px;" width="100" height="100">

                  <h3 class="mt-3 fs-2 text-center">Financiero</h3>
                  <p>Permite crear y visualizar los pagos que se han realizado del estudiante que se consulte. </p>
                  <ul>
                    <li>Agregar un pago</li>
                    <li>Vista de pagos realizados</li>
                  </ul>
                  <a href="financiero.php" class="btn btn-primary">
                    Ir a financiero
                  </a>
                </div>
              </div>
              <div class="col d-flex align-items-start border" style='padding: 20px;'>
                <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                  <svg class="bi" width="1em" height="1em">
                    <use xlink:href="#tools" />
                  </svg>
                </div>
                <div>
                  <img src="../media/iconos/novedad.png" class="img-fluid mx-auto d-block" style="padding-inline-end: 10px;" width="100" height="100">

                  <h4 class="mt-3 fs-2 text-center">Novedades</h4>
                  <p>Permite crear y visualizar los anexos que se han realizado del estudiante que se consulte.</p>
                  <ul>
                    <li>Agregar un anexo</li>
                    <li>Vista de anexos creados</li>
                  </ul>
                  <a href="novedades.php" class="btn btn-primary">
                    Ir a novedades
                  </a>
                </div>
              </div>

            </div>
            <div class="row ">
              <div class="col d-flex align-items-start border" style='padding: 20px;'>
                <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                  <svg class="bi" width="1em" height="1em">
                    <use xlink:href="#toggles2" />
                  </svg>
                </div>
                <div>
                  <img src="../media/iconos/estudiantes.png" class="img-fluid mx-auto d-block" style="padding-inline-end: 10px;" width="200" height="200">

                  <h3 class="mt-3 fs-2 text-center">Estudiantes</h3>
                  <p>Modulo en el cual se tiene una vista todos los estudientes que se han creado</p>
                  <a href="estudiantes.php" class="btn btn-primary">
                    Ir a estudiantes
                  </a>
                </div>
              </div>
              <div class="col d-flex align-items-start border" style='padding: 20px;'>
                <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                  <svg class="bi" width="1em" height="1em">
                    <use xlink:href="#cpu-fill" />
                  </svg>
                </div>
                <div>
                  <img src="../media/iconos/administrador.png" class="img-fluid mx-auto d-block" style="padding-inline-end: 10px;" width="120" height="120">

                  <h3 class="mt-3 fs-2 text-center">Administrador</h3>
                  <p>Se debe de tener el permiso de administrador para acceder, realiza la CRUD de usaurios y copia de seguridad de los estudiantes</p>
                  <li>Crear usuario</li>
                  <li>Modificar usuario</li>
                  <li>Eliminar usuario</li>
                  <li>Copia de seguriadad de la base de datos</li><br>

                  <a href="systemadministrador.php" class="btn btn-primary">
                    Ir a administrador
                  </a>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>

  </main>

</body>

</html>