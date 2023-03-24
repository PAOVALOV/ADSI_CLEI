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
  <title>Actualizar Documento
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
          <a href="../paginas/systemadministrador.php" class="nav-link text-white">
            <img src="../media/iconos/Administrador .ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50" alt="">
            Administrador
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Estudiantes -->
        <li>
          <a href="./datatables/estudiantes.php" class="nav-link text-white ">
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


    $sql = "SELECT id_estudiante, documento_estudiante FROM estudiantes WHERE id_estudiante='$id'";
    $query = mysqli_query($db->conectar(), $sql);           /*pasa la query a la variable resultado*/

    $row = mysqli_fetch_array($query);

    ?>
    <div class="container mt-5">
      <form action="gestionactualizardoc.php?id=<?php echo $row['id_estudiante'] ?>" method="POST">
        <div class="row g-3 align-items-center">
          <input type="hidden" name="id_estudiante" value="<?php echo $row['id_estudiante'] ?>">

          <h1 class="display-4 fw-bold lh-2 text-center">Modificar número de documento</h1><br>
          </p><br>
          <div class="col-sm-6">
            <label class="form-label">Número de documento actual</label>
            <input type="hidden" name="documento" value="<?php echo $row['documento_estudiante'] ?>">

            <input type="text" class="form-control" name="documento" placeholder="Nombre" value="<?php echo $row['documento_estudiante'] ?>" disabled>
          </div>

          <div class="col-sm-6">
            <label for="lastName" class="form-label">Corrección</label>
            <input type="text" class="form-control" name="documentonew" placeholder="" value="">

          </div>
        </div><br>
        <input name="btn_guardar" type="submit" class="btn btn-primary btn-block aling-items-end" value="Actualizar">
        <th><a href="gestion.php" class="btn btn-info">Regresar a gestión</a></th>

      </form>
      <input type="hidden" name="documento" value="<?php echo $row['documento_estudiante'] ?>">


      <?php

      $contadorvacio  = "";                                  /*Variables de control para validar si está vacio y si existe la consulta*/
      $contadorexiste = "";

      if (isset($_POST['btn_guardar'])) {

        $contadorvacio  = 0;                              /*Inicializa las variables en 0 para trabajar*/
        $contadorexiste = 0;

        $documento = $_POST["documentonew"];            /*pide los datos por POST desde el formulario*/
        $documentoOld = $_POST["documento"];            /*pide los datos por POST desde el formulario*/


        if (
          $documento    == ""
        ) {                                     /*si está alguno de los campos vacios*/
          echo "
<div class='container  mt-5'>
  <center>
    <div class='alert alert-danger' role='alert'>
    <strong>Error!</strong> Los Campos con * son Obligatorios.
    </div>
  </center>
</div>";

          $contadorvacio++;                          /*Este acumulador se marca cuando el campo está vacio*/
        } else {

          require_once '../conexion/conexion.php';                    /*LLama la conexión*/

          $db = new db_conexion();                                    /*Abre la base de datos*/
          $sql = "SELECT documento_estudiante FROM estudiantes        /*Realiza la consuta*/ 
          WHERE documento_estudiante ='$documento'";

          $resultado = mysqli_query($db->conectar(), $sql);           /*pasa la query a la variable resultado*/
          while ($registro = mysqli_fetch_array($resultado)) {        /*pasa a vector*/
            $db->db_cerrar();

            $contadorexiste++;                       /*Este acumulador se marca cuando el número existe en la DB*/
          }
        }

        if ($contadorexiste == 1) {                   /*Este IF imprime la alerta si existía y da la opción de modificar al estudiante*/
      ?>

          <div class='container formulario'>
            <center>
              <div class='alert alert-danger  mt-5' role='alert'>
                <strong>¡Error!</strong> El estudiante ya está registrado.
              </div>
            </center>
          </div>

          <a href="gestionactualizar.php?id=<?php echo $row['id_estudiante'] ?>"><button type="button" class="btn btn-warning">Modificar</button></a>

      <?php
        }

        if ($contadorvacio == 0 and $contadorexiste == 0) {             /*Si no se acumuló ninguna de las variables de control, se debe hacer el Insert a la DB */

          require_once '../conexion/conexion.php';                      /*LLama la conexión*/

          $db = new db_conexion();                                      /*Abre la base de datos*/
          mysqli_query($db->conectar(), "UPDATE estudiantes SET
    documento_estudiante = '$documento'
    WHERE id_estudiante = '$id'");

          $db->db_cerrar();
        };

        if ($contadorvacio == 0 and $contadorexiste == 0) {             /*Si no se acumuló ninguna de las variables de control, se debe hacer el Insert a la DB */

          require_once '../conexion/conexion.php';                      /*LLama la conexión*/
          $documento = $_POST["documentonew"];            /*pide los datos por POST desde el formulario*/
          $documentoOld = $_POST["documento"];            /*pide los datos por POST desde el formulario*/

          $db = new db_conexion();                                      /*Abre la base de datos*/
          mysqli_query($db->conectar(), "UPDATE financiero SET
    documentoestudiante_financiero = '$documento'
    WHERE documentoestudiante_financiero = '$documentoOld'");

          $db->db_cerrar();
        };
        if ($contadorvacio == 0 and $contadorexiste == 0) {             /*Si no se acumuló ninguna de las variables de control, se debe hacer el Insert a la DB */

          require_once '../conexion/conexion.php';                      /*LLama la conexión*/
          $documento = $_POST["documentonew"];            /*pide los datos por POST desde el formulario*/
          $documentoOld = $_POST["documento"];            /*pide los datos por POST desde el formulario*/

          $db = new db_conexion();                                      /*Abre la base de datos*/
          mysqli_query($db->conectar(), "UPDATE novedades SET
    documentoestudiante_novedades = '$documento'
    WHERE documentoestudiante_novedades = '$documentoOld'");

          $db->db_cerrar();
          echo "<div class='container formulario'>
  <center>
  <div class=' mt-5 alert alert-success' role='alert'>
  <strong>Completado!</strong> Ingreso Con exito.
  </div>
  </center>";
        };
      }
      ?>
    </div>

</body>

</html>