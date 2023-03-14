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
  <script src="../plugins/bootstrap/js/bootstrap.bundle.js"></script>

  <!-- Este es mi estilo -->
  <link rel="stylesheet" href="../paginas/styles/system.css">
  <!-- <style>
    body {
      background-image: url('../media/imagenes/novedad.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-position: center center;


    }
  </style> -->

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

        <!-- Modulo de Financiero Activo-->
        <li>
          <a href="../paginas/financiero.php" class="nav-link text-white">
            <img src="../media/iconos/Financiero.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50">
            Financiero
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Novedades -->
        <li>
          <a href="../paginas/novedades.php" class="nav-link text-white active" aria-current="page">
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

    <!-- Espacio entre el menú y la página del contenido de gestión -->
    <div class="b-example-divider"></div>


    <!-- CONTENIDO DEL MODULO FINANCIERO -->
    <div class="container my-5 hijo-2"> 
      <div class="row p-5 pb-5 pe-lg-5 pe-lg-5 rounded-3 border shadow-lg overflow-auto bg-light bg-gradient">
        <div class="text-center">
          <h1 class="display-4 fw-bold lh-2 text-center">Anexos Estudiantiles</h1><br>
          <p class="lead text-center"> Ingresa el número de documento del estudiante sin espacios ni puntos
          </p><br>
          <div class="hijo">
            <!-- Formulario de consulta -->
            <form class="row g-6" method="POST" action="novedades.php">
              <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Número de consulta</label>
                <input type="text" name="documento_form" class="form-control" id="floatingPassword" placeholder="Número de documento">
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
            $consultaestudiante = $_POST["documento_form"];   /*Pide la cedula por POST*/

            function documento()
            {

              global $consultaestudiante;
              return $consultaestudiante;
            }

            if ($consultaestudiante == "") {             /*si la cedula esta en blanco informa mensaje, sino hace la consulta*/
              // Imprime una alerta cuando el campo está vacio
              $contadorvacio++;
              echo '
                <br>
                <br>        
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
                  $contadornoexiste++;
                                                   //Resultado de la query
          ?>

</div>
<div>
<figure class="text-center">
  <blockquote class="blockquote">
    <p>Anexos creados</p>
  </blockquote>
  <figcaption class="blockquote-footer">
   De: <?php echo $registro['nombre_estudiante'] . " " . $registro['apellido_estudiante']; ?>  </figcaption>
</figure>
</div>

<table class="table table-striped table-bordered border border-5 bg-light bg-gradient">
                            <tbody>
                            <thead class="table-dark">
                  <th>#</th>
                  <th>Fecha del anexo</th>
                  <th>Motivo</th>
                  <th>Encargado</th>
                  <th>Anexo</th> 

  </thead>
                                <tr>
                                    <?php
                                      $contador=0;
                                    $sql2 = "SELECT * FROM novedades                                   WHERE documentoestudiante_novedades ='$consultaestudiante'";

                                    $resultado2 = mysqli_query($db->conectar(), $sql2);         /*pasa la query a la variable resultado*/
                                    while ($registro2 = mysqli_fetch_array($resultado2)) {      /*pasa a vector*/
                                      $contador++;
                                        $db->db_cerrar()

                                    ?>
                                <tr>
                                    <td> <?php echo " " . $contador?></td>
                                    <td> <?php echo " " . $registro2['fecha_novedades']; ?></td>
                                    <td> <?php echo " " . $registro2['tipo_novedades']; ?></td>
                                    <td> <?php echo " " . $registro2['empleado_novedades']; ?></td>
                                    <td> <?php echo " " . $registro2['anexo_novedades']; ?></td>
                                </tr>

                    </div>

                <?php
                                    }
                ?>

                </tr>
                </tbody>
                </table><br><hr t>



                  <div class="container p-4 p-md-12 border rounded-4 border bg-light bg-gradient p-2 border-5 text-center" style="padding: 100px;">
                    <div class="form-row">

                    <h2>Agregar un nuevo Anexo</h2><br><hr>

                      <div class="bd-example-snippet bd-code-snippet text-start">


                        <form class="row" method="POST" action="novedades.php">
                        <input type="hidden" name="documento_form" value="<?php echo  $registro['documento_estudiante'] ?>">

                          <div class="col-sm-6">
                            <label class="form-label">Número de documento</label>
                            <input type="text" class="form-control" name="documento_form" placeholder="Número de documento" value="<?php echo $registro['documento_estudiante'] ?>" disabled>
                          </div>

                          <div class="col-md-6">
                            <label for="inputState" class="form-label" value="<?php if (isset($novedad)) echo $novedad ?>">Tipo de novedad</label>
                            <!-- Lista desplegable -->
                            <select id="inputState" class="form-select" name="novedad_form">
                              <option selected>Tipo de novedad</option>
                              <option value="Acuerdo de pago">Acuerdo de pago</option>
                              <option value="Retiro">Retiro</option>
                              <option value="Suspención">Suspención</option>
                              <option value="Reactivación">Reactivación</option>
                              <option value="Cambio de horario">Cambio de horario</option>
                              <option value="Certificado">Certificado</option>
                            </select>
                          </div>

                          <div class="col-md-6">
                              <label for="inputState" class="form-label">Empleado encargado</label>
                              <!-- Lista desplegable -->
                              <select id="inputState" class="form-select" name="empleado_form">
                                <option selected>Elige tu nombre</option>
                                <option value="Julian Paez">Julian Paez</option>
                                <option value="Laura Vanegas">Laura Vanegas</option>
                                <option value="Sofia Torres">Sofia Torres</option>
                                <option value="Mateo López">Mateo López</option>
                              </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                              <label for="fecha de nacimiento" class="form-label">Fecha de anexo</label>
                              <input type="date" class="form-control" name="fecha_form">
                            </div>


                            <div class="mb-3">
                              <label for="exampleFormControlTextarea" class="form-label">Descripción del anexo</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="anexo_form"></textarea>
                            </div>

                          

                          <!-- <div class="col-md-6 mb-3">
                  <label for="formFile" class="form-label">Subir comprobante de pago</label>
                  <input class="form-control" type="file" id="formFile">
                  </div> -->

                          <br>
                          <div class="col-12">
                            <button type="submit" name="btn_anexo" class="btn btn-primary btn-lg">Subir anexo</button>
                          </div>

                        </form>

                      </div>
                    </div>
                    

                  <small class="text-muted"> Año 2022</small>
        </div>

  <?php
                }
              }
            }
          }
          if ($contadornoexiste == 0 and $contadorvacio == 0) {
  ?>
  <div class="alert alert-danger" role="alert">
    <strong>Estudiante no encontrado en el sistema.</strong>
    <br>
    <!-- (Si no existe en la base de datos) Boton para crear un nuevo estudiante -->

  </div>
  <br>
  <a href="../paginas/gestioncrear.php"> <button type="button" class="btn btn-success"> Crear estudiante</button></a>
  <br>

<?php
          }
?>

<?php


if (isset($_POST['btn_anexo'])) {

  $contadorvacio2  = 0;                              /*Inicializa las variables en 0 para trabajar*/
  $contadorexiste2 = 0;

  $documento = $_POST["documento_form"];            /*pide los datos por POST desde el formulario*/
  $novedad = $_POST["novedad_form"];
  $fecha = $_POST["fecha_form"];
  $anexo = $_POST["anexo_form"];
  $empleado = $_POST["empleado_form"];
 # $comprobante = $_POST["formFile"];


  if ($documento    == "") 

  { 
                                       /*si está alguno de los campos vacios*/
    echo "
       <div class='container'>
         <center>
           <div class='alert alert-danger' role='alert'>
           <strong>Error!</strong> Los Campos con * son Obligatorios.
           </div>
         </center>
       </div>";

    $contadorvacio2++;                          /*Este acumulador se marca cuando el campo está vacio*/
  } else {

    require_once '../conexion/conexion.php';                    /*LLama la conexión*/

    $db = new db_conexion();     /*Abre la base de datos*/

    $sql = "SELECT * FROM estudiantes        /*Realiza la consuta*/ 
                 WHERE documento_estudiante ='$documento'";

    $resultado = mysqli_query($db->conectar(), $sql);           /*pasa la query a la variable resultado*/
    while ($registro = mysqli_fetch_array($resultado)) {        /*pasa a vector*/
      $db->db_cerrar();

      $contadorexiste2++;                       /*Este acumulador se marca cuando el número existe en la DB*/
    }
  }

  if ($contadorexiste2 == 0 and $contadorvacio2 == 0) {                   /*Este IF imprime la alerta si existía y da la opción de modificar al estudiante*/
?>

    <div class='container formulario'>
      <center>
        <div class='alert alert-danger' role='alert'>
          <strong>¡Error!</strong> El estudiante no existe.
        </div>
      </center>
    </div>
    </div>


<?php
  }

  if ($contadorvacio2 == 0 and $contadorexiste2 == 1) {             /*Si no se acumuló ninguna de las variables de control, se debe hacer el Insert a la DB */

    require_once '../conexion/conexion.php';                      /*LLama la conexión*/

    $db = new db_conexion();                                      /*Abre la base de datos*/
    mysqli_query($db->conectar(), "INSERT INTO novedades
                  (documentoestudiante_novedades,
                  anexo_novedades,
                  fecha_novedades,
                  tipo_novedades,
                  empleado_novedades) 
                  VALUES 
                  ('$documento',
                  '$anexo',
                  '$fecha',
                  '$novedad',
                  '$empleado')");
    $db->db_cerrar();
    echo "<div class='container formulario'>
         <center>
         <div class='alert alert-success' role='alert'>
         <strong>Novedad ingresada con exito!</strong> 
         </div>
         </div>
         </center>";
  };
}
?>

      </div>


    </div>
    </div>



    <div class="b-example-divider"></div>

  </main>



</body>

</html>