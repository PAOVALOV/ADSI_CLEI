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


  <title>Módulo de Gestión </title>

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
        <a href="_sesion/cerrarSesion.php" onclick="return confirmarAccesoURL()"><button type="button" class="btn btn-danger" style="background-color: rgb(168, 4, 4);">Salir del sistema</button></a>

      </div>
    </div>
    <!-- END SIDE BARD -->

    <!-- Espacio entre el menú y la página del contenido de gestión -->
    <div class="b-example-divider"></div>

    <!-- Formulario de gestión estudiantil para realizar la consulta si el estudiante existe o si no-->
    <div class="container my-5 hijo-2">

      <div class="row p-5 rounded-3 border shadow-lg overflow-auto ">
        <div>
          <h1 class="display-4 fw-bold lh-2 text-center">Gestión estudiantil</h1><br>
          <p class="lead text-center"> Ingresa el número de documento del estudiante sin espacios ni puntos
          </p><br>
          <div class="hijo">
            <!-- Formulario de consulta -->
            <form class="row g-6" method="POST" action="gestion.php">
              <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Número de consulta</label>
                <input type="text" name="documento" class="form-control" id="floatingPassword" placeholder="Número de documento">
              </div>
              <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3" value="Consultar" name="btn_consultar">Consultar</button>
              </div>
            </form>
          </div>
          <br>
          <!-- Ventana emergente para conectarla con php -->
          <?php

          $consultaestudiante = "";
          $contadornoexiste = "";
          $contadorvacio = "";

          if (isset($_POST['btn_consultar'])) {

            $contadornoexiste = 0;
            $contadorvacio = 0;
            $consultaestudiante = $_POST["documento"];   /*Pide la cedula por POST*/

            if ($consultaestudiante == "") {            /*si la cedula esta en blanco informa mensaje, sino hace la consulta*/
              // Imprime una alerta cuando el campo está vacio
              $contadorvacio++;
              echo '

        
                  <div class="container formulario"></div>
                    <center>
                      <div class="alert alert-danger" role="alert">
                      <strong>Error!</strong> El numero de Cedula es Obligatorio.
                      </div>
                    </center>
                  </div>';
            }

            if ($consultaestudiante <> 0) {


              require_once '../conexion/conexion.php';                      /*LLama la conexión*/
              $db = new db_conexion();                                      /*Abre la base de datos*/

              $sql = "SELECT * FROM estudiantes                             /*Realiza la consuta*/ 
                      WHERE documento_estudiante ='$consultaestudiante'";

              $resultado = mysqli_query($db->conectar(), $sql);           /*pasa la query a la variable resultado*/
              while ($registro = mysqli_fetch_array($resultado)) {        /*pasa a vector*/
                $db->db_cerrar();

                if ($consultaestudiante == $registro['documento_estudiante']) {
                  $contadornoexiste++;                                 //Si existe realiza la consulta e informa que puede ver el informe
          ?>
                  <?php
                  require_once '../conexion/conexion.php';                      /*LLama la conexión*/
                  $db = new db_conexion();                                      /*Abre la base de datos*/

                  $sql = "SELECT *  FROM estudiantes";
                  $query = mysqli_query($db->conectar(), $sql);           /*pasa la query a la variable resultado*/

                  $row = mysqli_fetch_array($query);
                  ?>
                  <!-- Consulta los datos de estudiante -->
                  <br>
                  <div class="overflow-auto container p-4 p-md-12 border rounded-4 border bg-light bg-gradient p-2 border-5 " style="padding: 100px;">
                    <div class="overflow-auto" class="bd-example-snippet bd-code-snippet text-start">
                      <h3 class="fs-8 fw-bolder text-center" ;>Datos personales</h3>
                      <div class="bd-example mt-5">
                        <table class="table table-sm table-bordered">
                          <tbody>
                            <?php
                            ?>
                            <!-- Se mantendrá oculto el identificador del estudiante, es necesario para que se lleve a la página actualizar y quede identificado a quien se le realizará el cambio en la bd -->
                            <type="hidden" <?php echo $registro['id_estudiante']; ?>>

                              <input type="hidden" name="id_estudiante" value="<?php echo $row['id_estudiante'] ?>">

                              <tr>
                                <td scope="col"> Nombres : <?php echo " " . $registro['nombre_estudiante']; ?></td>
                                <td scope="col">Apellidos: <?php echo  " " . $registro['apellido_estudiante']; ?></td>
                              </tr>
                              <tr>
                                <td>Número de documento: <?php echo  " " . $registro['documento_estudiante']; ?></td>
                                <td>Fecha de nacimiento: <?php echo " " . $registro['fechadenacimiesto_estudiante']; ?></td>
                              </tr>
                              <tr>
                                <td>Número de celular: <?php echo " " . $registro['numerocontacto_estudiante']; ?></td>
                                <td>ciudad de residencia: <?php echo " " . $registro['ciudad_estudiante']; ?> </td>
                              </tr>
                              <tr>
                                <td scope="col">Email: <?php echo " " . $registro['email_estudiante']; ?></td>
                                <td scope="col">Numero del acudiente: <?php echo  " " . $registro['acudiente__estudiante']; ?></td>
                              </tr>
                              <tr>
                                <td scope="col">Curso: <?php echo "" . $registro['curso_estudiante']; ?></td>
                                <td scope="col">Horario: <?php echo "" . $registro['horario_estudiante']; ?></td>

                              </tr>
                              <?php


                              ?>
                          </tbody>
                        </table>
                        </tr>
                        <!-- ubica los botones en la parte inferior izquierda del documento -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                          <!-- lleva el identidcador por POST a la págima actualizar -->
                          <th><a href="gestionactualizar.php?id=<?php echo $registro['id_estudiante'] ?>" class="btn btn-warning">Editar</a></th>
                          <!-- me dirige a la página de confirmación para elimenar el usuario -->
                          <th><a href="gestionborrar.php" class="btn btn-danger">Eliminar</a></th>


                        </div>
                      </div>
                      <!-- limpia el espacio para realizar otra consulta -->
                      <th><a href="gestion.php" class="btn btn-info">Limpiar</a></th>
                    </div>
                  </div>


            <?php

                }
              }
            }
          }
          if ($contadornoexiste == 0 and $contadorvacio == 0) {
            ?>
            <div class="alert alert-danger" role="alert">
              <center>
                <strong>Estudiante no encontrado en el sistema.</strong>
                <br>
                <!-- (Si no existe en la base de datos) Boton para crear un nuevo estudiante -->

            </div>
            <br>
            <a href="../paginas/gestioncrear.php"> <button type="button" class=" d-grid gap-2 mx-auto btn btn-success"> Crear estudiante</button></a>
            <br>
            </center>
          <?php
          }
          ?>

        </div>

      </div>
      <small class="text-muted text-center"> Año 2023</small>

    </div>

    <!-- Espacio entre el menú y la página del contenido de gestión -->
    <div class="b-example-divider"></div>

  </main>

</body>

</html>