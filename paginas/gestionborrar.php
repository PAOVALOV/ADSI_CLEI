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
  

</head>

<body>

  <main >
    <!-- SIDE BARD -->
    <div class=" d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 320px;">
      <a href="../paginas/Inicio_del_sistema.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <img src="../media/logo/Isologoinstitutoclei.png"  height="95">
      </a>
      <hr>

      <!-- Modulos del sistema -->
      <ul class="nav nav-pills flex-column mb-auto" >
        <!-- Modulo de Inicio -->
        <li class="nav-item " width="85" height="85">
          <a href="../paginas/Inicio_del_sistema.php" class="nav-link text-white">
            <img src="../media/iconos/home.ico"class="img-fluid" style="padding-inline-end: 10px;"  width="50" height="50">
            Inicio
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Gestión Activo -->
        <li>
          <a href="../paginas/gestion.php" class="nav-link text-white active" aria-current="page">
            <img src="../media/iconos/Management.ico"class="img-fluid" style="padding-inline-end: 10px;"  width="50" height="50">
            Gestión - Borrar
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Financiero -->
        <li>
          <a href="../paginas/financiero.php" class="nav-link text-white">
            <img src="../media/iconos/Financiero.ico"class="img-fluid" style="padding-inline-end: 10px;"  width="50" height="50">
            Financiero
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Novedades -->
        <li>
          <a href="../paginas/novedades.php" class="nav-link text-white">
            <img src="../media/iconos/Novedad.ico"class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50">
            Novedades
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Administrador -->
        <li>
          <a href="../paginas/systemadministrador.php" class="nav-link text-white">
            <img src="../media/iconos/Administrador .ico"class="img-fluid" style="padding-inline-end: 10px;"  width="50" height="50">
            Administrador
          </a>
        </li>
        <div class="b-divider"></div>

        <!-- Modulo de Estudiantes -->
        <li>
          <a href="../datatables/estudiantes.php" class="nav-link text-white">
            <img src="../media/iconos/Estudiante.ico"class="img-fluid" style="padding-inline-end: 10px;"  width="50" height="50">
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

    <!-- Formulario de gestión estudiantil para realizar la consulta si el estudiante existe o si no-->
    <div class="container my-5 hijo-2">
      <div class="row p-5 pb-5 pe-lg-5 pe-lg-5 rounded-3 border shadow-lg">
        <div class="text-center">
          <h1 class="display-4 fw-bold lh-2 text-center" >Eliminar estudiante</h1><br>
          <p class="lead text-center" > Ingresa el número de documento del estudiante a eliminar
          </p><br>
          <div class="alert alert-danger" role="alert">
            Ten cuidado! esta acción es irreversible
           </div>
          <div class="hijo">
            <!-- Formulario de consulta -->

            <form class="row g-6" method="POST" action="gestionborrar.php">
            <div class="col-auto">
              <label for="inputPassword2" class="visually-hidden">Número de consulta</label>
              <input type="text" name="documento" class="form-control" id="floatingPassword" placeholder="Número de documento">
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-danger" value="Consultar"  name="btn_eliminar">Eliminar</button>
              <a href="../paginas/gestion.php"><button type="button" class="btn btn-primary">Regresar</button></a>
            </div>
            
            </form>  
          </div>
          <br>
          <!-- Ventana emergente para conectarla con php -->
          <?php

            $consultaestudiante = "";
            $contadornoexiste = "";
            $contadorvacio = "";

            if (isset($_POST['btn_eliminar'])) {

              $contadornoexiste = 0;
              $contadorvacio = 0;
              $consultaestudiante = $_POST["documento"];   /*Pide la cedula por POST*/

              if ($consultaestudiante == "") {             /*si la cedula esta en blanco informa mensaje, sino hace la consulta*/
                // Imprime una alerta cuando el campo está vacio
                $contadorvacio ++;
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
                    $contadornoexiste ++;                                 //Si existe realiza la consulta e informa que puede ver el informe

                    $db = new db_conexion(); 

                    mysqli_query($db->conectar(),"DELETE FROM estudiantes
                                                  WHERE 
                                                  documento_estudiante='$consultaestudiante'");         
                    $db->db_cerrar();

                    echo "<div class='container formulario'>
                          <center>
                          <div class='alert alert-success' role='alert'>
                          <strong>Completado!</strong> Eliminado con exito.
                          </div>
                          </center>";
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
        </div>
      </div>
    </div>

<?php
}        
?>
</div>
</div>
</div>
<div class="b-example-divider"></div>
 </main>
    
</body>

</html>
