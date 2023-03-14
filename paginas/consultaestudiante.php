<!DOCTYPE html>
<html lang="es" class="h-100 ">

<head>
  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>Inicio</title>

  <!-- Esto es bootstrap -->
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
  <script src="../plugins/bootstrap/js/bootstrap.bundle.js"></script>

  <!-- Este es mi estilo -->
  <link rel="stylesheet" href="../paginas/styles/mainstyles.css">

  <!-- Fondo del LOGIN -->
  <style>
    body {
      background-image: url('../media/imagenes/fondoprincipal.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-position: center center;


    }
  </style>


</head>

<body background="../media/imagenes/fondoprincipal.jpg" ;>

  <!-- MENÚ -->
  <header>

    <!-- Navbar desplegable al dar click y contenido-->
    <div id="navbarHeader" class="collapse bg-dark ">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">Acercar de nosotros</h4>
            <p class="text-muted">Somos una institución que facilita soluciones educativas tanto para personas como para colegios y otras instituciones; nos enfocamos en facilitar procesos educativos y brindar cursos de preparación especializados.</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contactanos</h4>
            <ul class="list-unstyled">
              <li><a href="https://api.whatsapp.com/send?phone=573117206123&text=Buen+d%C3%ADa,+necesito+informaci%C3%B3n+de+los+programas+educativos.&utm_source=webpage" class="text-white">WhatsApp</a></li>
              <li><a href="https://www.facebook.com/cleicolombia/" class="text-white">Vísitanos en Facebook</a></li>
              <li><a href="https://www.youtube.com/channel/UCqjg1DQBzTBxR29qB5eAoVgss" class="text-white">Canal de YouTube</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Navbar botones de los modulos de inicio, estidiante e ingreso a personal -->
    <div class="navbar fixed-top navbar-dark bg-dark shadow-sm">
      <div class="container">
        <!-- logo en el navbar -->
        <a href="../index.html" class="navbar-brand d-flex align-items-center">
          <img src="../media/logo/logoinstitutoclei.png" class="me-2" wsidth="40" height="40">
          <strong>Instituto CLEI</strong>
        </a>
        <nav class="fw-bold nav nav-masthead nav-pills nav-fill justify-content-center float-md-end">
          <ul class="nav nav-pills">
            <!-- Boton de inicio -->
            <a class="nav-link" style="margin-left: 20px" href="../index.html">Inicio</a>
            <!-- Boton de Estudiante -->
            <a class="nav-link active" aria-current="page" style="margin-left: 20px" href="../paginas/consultaestudiante.html">Estudiante</a>
            <!-- Boton de ingreso al sistema -->
            <a class="nav-link" style="margin-left: 20px" href="../paginas/empleado.php">Ingreso de personal</a>

          </ul>
        </nav>
        <!-- Boton del navbar -->
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>

  <!-- CONTENIDO DEL MÓDULO DE CONSULTA ESTUDIANTES-->

  <main style="padding-top: 20px;">
    <div class="container-fluid col-xl-10 col-xxl-8 px-4 py-5 text-white">
      <div class=" row align-items-center  py-5">
        <!-- Parte 1 del contenido  -->
        <div class="col-lg-6 text-center text-lg-start">
          <h1 class="display-4 fw-bold lh-1 mb-3">Consulta tu estado en el Instituto CLEI</h1>
          <p class="col-lg-10 fs-4">Podrás visiaulizar tu información personal y los pagos que has realizado hasta la fecha. </p>
        </div>
        <!-- Parte 2 formulario de ingreso para realizar la consulta -->
        <div class="col-md-10 mx-auto col-lg-6" style="color:#000000">
          <form class="p-4 p-md-12 border rounded-4 border bg-light bg-gradient p-2 border-5 text-center" style="padding: 100px;" method="POST" action="consultaestudiante.php" name="MiForm">
            <p class="fs-3 fw-bolder">Escribe tu documento</p>
            <p>Ingresa el número de documento del estudiante sin espacios ni puntos. </p>
            <br>
            <div class="form-floating mb-3 form-group" label for="documento">
              <input type="text" name="documento" class="form-control" id="floatingPassword" placeholder="text">
              <label for="floatingPassword">Número de documento</label>
            </div>

            <input class="w-100 btn btn-lg btn-primary" type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">



            <?php

            require_once '../conexion/conexion.php';  /*LLama la conexión*/
           $db = new db_conexion();               /*Abre la base de datos*/

            $consultaestudiante = "";
            $contadornoexiste = 0;
            $contadorvacio = 0;

            if (isset($_POST['btn_consultar'])) {

              $consultaestudiante = $_POST["documento"];   /*Pide la cedula por POST*/

              if ($consultaestudiante == "") {             /*si la cedula esta en blanco informa mensaje, sino hace la consulta*/
                // Imprime una alerta cuando el campo está vacio
                $contadorvacio ++;

                ?>
                <br>
                <br>        
                  <div class="container formulario"></div>
                      <div class="alert alert-danger align-items-center" role="alert" >
                      <strong>Error!</strong> El numero de cédula es obligatorio.
                      </div><hr class="my-4">
                  </div>

                <?php
              }

              if ($consultaestudiante <> 0) {                              //Realiza la consuta 
              $sql = "SELECT documento_estudiante FROM estudiantes
                      WHERE documento_estudiante ='$consultaestudiante'";

                $resultado = mysqli_query($db->conectar(), $sql);         /*pasa la query a la variable resultado*/
                while ($registro = mysqli_fetch_array($resultado)) {      /*pasa a vector*/
                $db->db_cerrar();

                  if ($consultaestudiante == $registro['documento_estudiante']) { 
                    $contadornoexiste ++;                                                         //Si existe realiza la consulta e informa que puede ver el informe
                    ?>

                      <br>
                      <br>
                      <a href="consulta.php?documento=<?php echo $consultaestudiante ?>"><button type="button" method="POST" action="consulta.php" class="btn btn-success">¡Estudiante encontrado! <br> Ver consulta</button><hr class="my-4">
</a>
                    
                    <?php
                    
                  }
                }
              }
              
              if ($contadornoexiste == 0 and $contadorvacio == 0){ 
                echo '
                <br>
                <br>        
                  <div class="container formulario align-items-center"></div>        
                      <div class="alert alert-danger" role="alert">
                      <strong>Error!</strong> El número de documento no coincide con alguno de nuestros estudiantes. <br>
                      <a href="#" class="link-danger">Contactar a ún asesor</a>
                      </div><hr class="my-4">
        
                  </div>';
              }
            
            }  
            ?>
            <small class="text-muted"> Año 2022</small>
          </form>
        </div>
      </div>
    </div>
  </main>



</body>





</html>