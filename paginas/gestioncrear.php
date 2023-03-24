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


  <title>Crear Estudiante</title>

  <!-- Esto es bootstrap -->
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
  <script src="../plugins/bootstrap/js/bootstrap.bundle.js"></script>

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
    <!-- SIDEBAR -->
    <div class=" d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 320px;">
      <a href="../paginas/Inicio_del_sistema.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="../media/logo/Isologoinstitutoclei.png" height="95">
      </a>
      <hr>

      <!-- Modulos del sistema -->
      <ul class="nav nav-pills flex-column mb-auto">
        <!-- Modulo de Inicio -->
        <li class="nav-item " width="85" height="85">
          <a href="../paginas/Inicio_del_sistema.php" class="nav-link text-white">
            <img src="../media/iconos/home.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50">
            Inicio
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Gestión Activo -->
        <li>
          <a href="../paginas/gestion.php" class="nav-link text-white active" aria-current="page">
            <img src="../media/iconos/Management.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50">
            Gestión - Crear
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
        <a href="_sesion/cerrarSesion.php" onclick = "return confirmarAccesoURL()"><button type="button" class="btn btn-danger" style="background-color: rgb(168, 4, 4);">Salir del sistema</button></a>

      </div>
    </div>
    <!-- END SIDEBAR -->

    <!-- Espacio entre el menú y la página del contenido de gestión -->

    <!-- CONTENIDO DEL MODULO DE CREACIÓN DE ESTUDIANTE-->
    <div class="overflow-auto">
      <div class="row p-5 rounded-3 border shadow-lg  bg-light bg-gradient">
        <div>
          <h1 class="display-4 fw-bold lh-2 text-center"> AGREGAR NUEVO ESTUDIANTE</h1><br>
          <p class="lead text-center"> Complete cada uno de los campos requeridos</p><br>
          <div class="hijo">
            <!-- Formulario para crear un estudiante-->
            <form class="row" method="POST" action="gestioncrear.php">

              <div class=" col-md-6 mb-3">
                <label for="numero de documento" class="form-label" require>Número de documento</label>
                <input type="text" class="form-control" name="documento_form">
                <div id="emailHelp" class="form-text">Escribir número de documento sin puntos ni espacios</div>
              </div>

              <div class=" col-md-6 mb-3">
                <label for="Nombre" class="form-label" require>Nombres</label>
                <input type="text" class="form-control" name="nombre_form">
              </div>

              <div class="col-md-6 mb-3">
                <label for="Apellido" class="form-label" require>Apellidos</label>
                <input type="text" class="form-control" name="apellido_form">
              </div>

              <div class="col-md-6 mb-3">
                <label for="email_estudiante" class="form-label" require>Correo</label>
                <input type="email" class="form-control" name="email_form">
              </div>

              <!-- Calendario -->
              <div class="col-md-6 mb-3">
                <label for="fecha de nacimiento" class="form-label" require>Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha_form">
              </div>

              <br>
              <div class="col-md-6 mb-3">
                <label for="Número del estudiante" class="form-label" require>Número del estudiante</label>
                <input type="text" class="form-control" name="numero_estudiante_form">
              </div>

              <div class="col-md-6 mb-3">
                <label for="curso" class="form-label" require>Curso</label>
                <select class="form-select" name="curso_form">
                  <!-- Lista desplegable -->
                  <option selected>Seleccione una curso </option>
                  <option value="Validación del bachillerato">Validación_del_bachillerato</option>
                  <option value="PREICFES - Saber 11">PreIcfes_Saber_11</option>
                  <option value="Pre - Universitario">Pre_Universitario</option>
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label for="Estudiante" class="form-label">Horario de clases</label>
                <select class="form-select" name="horario_form">
                  <!-- Lista desplegable -->
                  <option selected>Seleccione un horario </option>
                  <option value="Martes y jueves de 8:00 am a 10:30 am">Martes_y_jueves_8:00a.m._a_10:30a.m.</option>
                  <option value="Martes y jueves de 6:30 pm a 09:00 pm">Martes_y_jueves_6:30p.m._a_09:00p.m.</option>
                  <option value="Sábados de 08:00 am a 01:00 pm">Sábados_08:00a.m._a_01:00p.m.</option>
                  <option value="Domingos de 08:00 am a 01:00 pm">Domingos_08:00a.m._a_01:00p.m.</option>
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label for="numero de documento" class="form-label" require>Número del acudiente </label>
                <input type="text" class="form-control" name="numero_acudiente_form">
              </div>

              <div class="col-md-6 mb-3">
                <label for="Nombre" class="form-label" require>Ciudad de residencia</label>
                <input type="text" class="form-control" name="ciudad_residencia_form">
              </div>
              <div class=" col-md-6 mb-3">
                <label for="Tiene discapacidad" class="form-label" require>¿Tiene alguna discapacidad?</label>
                <!-- Lista desplegable -->
                <select class="form-select" name="discapacidad_form">
                  <option selected>Seleccione una opción</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>


              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="col-md-2 btn btn-primary btn btn-success" name="btn_guardar">Agregar</button>
                <a type="button" class="col-md-2 btn btn-primary" href="../paginas/gestioncrear.php">Limpiar</a>
                <a type="button" class="col-md-2 btn btn-info" href="../paginas/gestion.php">Regresar</a>

              </div>
            </form>
          </div>
          <br>
        </div>


        <?php

        $contadorvacio  = "";                                  /*Variables de control para validar si está vacio y si existe la consulta*/
        $contadorexiste = "";

        if (isset($_POST['btn_guardar'])) {

          $contadorvacio  = 0;                              /*Inicializa las variables en 0 para trabajar*/
          $contadorexiste = 0;

          $documento = $_POST["documento_form"];            /*pide los datos por POST desde el formulario*/
          $nombre = $_POST["nombre_form"];
          $apellido = $_POST["apellido_form"];
          $email = $_POST["email_form"];
          $fecha = $_POST["fecha_form"];
          $numero_estudiante = $_POST["numero_estudiante_form"];
          $curso = $_POST["curso_form"];
          $horario = $_POST["horario_form"];
          $numero_acudiente = $_POST["numero_acudiente_form"];
          $ciudad_residencia = $_POST["ciudad_residencia_form"];
          $discapacidad = $_POST["discapacidad_form"];


          if (
            $documento    == "" ||
            $nombre       == "" ||
            $apellido     == "" ||
            $email        == "" ||
            $fecha        == "" ||
            $curso        == "" ||
            $horario      == "" ||
            $numero_estudiante == "" ||
            $numero_acudiente  == "" ||
            $ciudad_residencia  == "" ||
            $discapacidad == ""
          ) {                                     /*si está alguno de los campos vacios*/
            echo "
        <div class='container'>
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
                <div class='alert alert-danger' role='alert'>
                  <strong>¡Error!</strong> El estudiante ya está registrado.
                </div>
              </center>
            </div>

            <a href="../paginas/gestionactualizar.php"><button type="button" class="btn btn-warning">Modificar</button></a>

        <?php
          }

          if ($contadorvacio == 0 and $contadorexiste == 0) {             /*Si no se acumuló ninguna de las variables de control, se debe hacer el Insert a la DB */

            require_once '../conexion/conexion.php';                      /*LLama la conexión*/

            $db = new db_conexion();                                      /*Abre la base de datos*/
            mysqli_query($db->conectar(), "INSERT INTO estudiantes
                                  (documento_estudiante,
                                  nombre_estudiante,
                                  apellido_estudiante,
                                  email_estudiante,
                                  fechadenacimiesto_estudiante,
                                  numerocontacto_estudiante,
                                  curso_estudiante,
                                  horario_estudiante,
                                  acudiente__estudiante,
                                  ciudad_estudiante,
                                  discapacidad_estudiante
                                  ) 
                                  VALUES 
                                  ('$documento',
                                  '$nombre',
                                  '$apellido',
                                  '$email',
                                  '$fecha',
                                  '$numero_estudiante',
                                  '$curso',
                                  '$horario',
                                  '$numero_acudiente',
                                  '$ciudad_residencia',
                                  '$discapacidad')");

            $db->db_cerrar();
            echo "<div class='container formulario'>
          <center>
          <div class='alert alert-success' role='alert'>
          <strong>Completado!</strong> Ingreso Con exito.
          </div>
          </center>";
          };
        }
        ?>

      </div> <!-- Los div de acá se cierran para que aparezca todo dentro del div -->
    </div>


  </main>


</body>

</html>