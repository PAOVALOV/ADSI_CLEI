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
  <title>Actualizar Estudiante  </title>
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
          <a href="../paginas/gestion.php" class="nav-link text-white active" aria-current="page">
            <img src="../media/iconos/Management.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50" alt="">
            Gestión - Editar
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
          <a href="../datatables/estudiantes.php" class="nav-link text-white">
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
        <a href="_sesion/cerrarSesion.php" onclick = "return confirmarAccesoURL()"><button type="button" class="btn btn-danger" style="background-color: rgb(168, 4, 4);">Salir del sistema</button></a>

      </div>
    </div>
    <!-- END SIDE BARD -->

    <!-- Espacio entre el menú y la página del contenido de gestión -->
    <div class="b-example-divider"></div>
    <?php
    require_once '../conexion/conexion.php';                      /*LLama la conexión*/
    $db = new db_conexion();     /*Abre la base de datos*/
    $id = $_GET['id'];

    $sql = "SELECT * FROM estudiantes WHERE id_estudiante='$id'";
    $query = mysqli_query($db->conectar(), $sql);           /*pasa la query a la variable resultado*/

    $row = mysqli_fetch_array($query);
    ?>
    <div class="container mt-5">
      <h1 class="display-4 fw-bold lh-2 text-center">Editar datos del estudiante</h1>

      <form action="gestionupdate.php" method="POST">

        <input type="hidden" name="id_estudiante" value="<?php echo $row['id_estudiante'] ?>">

        <div class="row g-3 align-items-center">

          <div class="col-sm-6  mt-5">
            <label class="form-label">Número de documento</label>
            <input type="text" class="form-control" name="documento" placeholder="Nombre" value="<?php echo $row['documento_estudiante'] ?>" disabled>
          </div>

          <div class="col-sm-4  mt-5">
            <label class="form-label" type="hidden">-</label><br>
            <a href="gestionactualizardoc.php?id=<?php echo $row['id_estudiante'] ?>" class="btn btn-warning">Modificar documento</a>
          </div>

          <div class="col-sm-6">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre_estudiante'] ?>">
          </div>
          <div class="col-sm-6">
            <label class="form-label">Apellidos:</label>
            <input type="text" class="form-control" name="apellido" placeholder="apellido" value="<?php echo $row['apellido_estudiante'] ?>">
          </div>
          <div class="col-sm-6">
            <label class="form-label">Correo electrónico:</label>
            <input type="email" class="form-control" name="email" placeholder="email" value="<?php echo $row['email_estudiante'] ?>">
          </div>
          <div class="col-sm-6">
            <label class="form-label">Fecha de nacimiento:</label>
            <input type="date" class="form-control" name="fecha" placeholder="fecha" value="<?php echo $row['fechadenacimiesto_estudiante'] ?>">
          </div>
          <div class="col-sm-6">
            <label class="form-label">Numero de teléfono:</label>
            <input type="text" class="form-control" name="numero_estudiante" placeholder="numero_estudiante" value="<?php echo $row['numerocontacto_estudiante'] ?>">
          </div>
          <div class="col-sm-6">
            <label class="form-label">Ciudad de residencia</label>
            <input type="text" class="form-control" name="ciudad" placeholder="ciudad" value="<?php echo $row['ciudad_estudiante'] ?>">
          </div>
          <div class="col-sm-6">
            <label class="form-label">Discapacidad:</label>
            <select class="form-select form-control" name="discapacidad" placeholder="discapacidad" value="<?php echo $row['discapacidad_estudiante'] ?>">
              <!-- Lista desplegable -->
              <option selected value="<?php echo $row['horario_estudiante'] ?>"><?php echo $row['discapacidad_estudiante'] ?> </option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>

          <div class="col-sm-6">
            <label class="form-label">Programa en curso:</label>
            <select class="form-select form-control" name="curso" placeholder="curso" value="<?php echo $row['curso_estudiante'] ?>">
              <!-- Lista desplegable -->
              <option selected value="<?php echo $row['horario_estudiante'] ?>"><?php echo $row['curso_estudiante'] ?> </option>
              <option value="Validación del bachillerato">Validación del bachillerato</option>
              <option value="PREICFES - Saber 11">Pre-Icfes</option>
              <option value="Pre - Universitario">Pre-Universitario</option>
            </select>
          </div>

          <div class="col-sm-6">
            <label class="form-label">Número de acudiente:</label>
            <input type="text" class="form-control" name="acudiente" placeholder="acudiente" value="<?php echo $row['acudiente__estudiante'] ?>">
          </div>

          <div class="col-sm-6">
            <label class="form-label">Horario de estudio</label>
            <select class="form-select form-control" name="horario" placeholder="Horario de estudio" value="<?php echo $row['horario_estudiante'] ?>">
              <!-- Lista desplegable -->
              <option selected value="<?php echo $row['horario_estudiante'] ?>"><?php echo $row['horario_estudiante'] ?> </option>
              <option value="Martes y jueves de 8:00 am a 10:30 am">Martes y jueves 8:00a.m. a 10:30a.m.</option>
              <option value="Martes y jueves de 6:30 pm a 09:00 pm">Martes y jueves 6:30p.m. a 09:00p.m.</option>
              <option value="Sábados de 08:00 am a 01:00 pm">Sábados 08:00a.m. a 01:00p.m.</option>
              <option value="Domingos de 08:00 am a 01:00 pm">Domingos 08:00a.m. a 01:00p.m.</option>
            </select>
          </div>
          <div class="col-sm-6">
            <input type="hidden" name="id_estudiante" value="<?php echo $row['id_estudiante'] ?>">
            <input type="hidden" name="documento" value="<?php echo $row['documento_estudiante'] ?>">
          </div>
        </div>

        <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
      </form>

    </div>
</body>

</html>