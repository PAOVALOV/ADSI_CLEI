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

<body>
  <!-- MENÚ -->
  <header>

    <!-- Navbar botones de los modulos de inicio, estidiante e ingreso a personal -->
    <div class="navbar fixed-top navbar-dark bg-dark shadow-sm">
      <div class="container">
        <!-- logo en el navbar -->
        <a href="../index.html" class="navbar-brand d-flex align-items-center">
          <img src="../media/logo/logoinstitutoclei.png" alt="" class="me-2" wsidth="40" height="40">
          <strong>Instituto CLEI</strong>
        </a>
        <nav class="fw-bold nav nav-masthead nav-pills nav-fill justify-content-center float-md-end">
          <ul class="nav nav-pills">
            <!-- Boton de inicio -->
            <a class="nav-link" style="margin-left: 20px" href="../index.html">Inicio</a>
            <!-- Boton de Estudiante -->
            <a class="nav-link" style="margin-left: 20px" href="../paginas/consultaestudiante.php">Estudiante</a>
            <!-- desplegable de ingreso "Empleado" o "Administrador" -->
            <a class="nav-link active" aria-current="page" style="margin-left: 20px" href="../paginas/empleado.php">Ingreso de personal</a>
          </ul>
        </nav>
        <!-- Boton del navbar -->
        <button>
        </button>
      </div>
    </div>
  </header>


  <!-- LOGIN DE INGRESO -->
  <main class="form-signin w-100 m-auto text-center" style="padding-top: 50px;">
    <form class="p-4 p-md-12 border rounded-4 border bg-light bg-gradient p-2 border-5" action="_functions.php" method="POST">

      <img class="mb-4" src="../media/logo/logopaovadark.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 fw-normal fw-bolder">Acceso</h1>

      <div class="form-floating">
        <input type="text" class="form-control" name="usuario" required>
        <label for="floatingInput"> Usuario </label>
      </div>

      <div class="form-floating">
        <input type="password" name="contrasena" class="form-control" required>

        <label for="password">Contraseña:</label><br>
        <input type="hidden" name="accion" value="acceso_user">
      </div>

      <button class="w-100 btn btn-lg btn-primary" name="enviar" type="submit">Ingresar</button>
      <br>

      <?php

      require_once '../conexion/conexion.php'; /*LLama la conexión*/

      if (isset($_POST['enviar'])) {

        $db = new db_conexion();  /*Abre la base de datos*/

        $usuario = $_POST['usuario'];

        $sql = "SELECT usuario_login,passport_login FROM usuarios 
            WHERE usuario_login  = '$usuario'";

        $query_exec = mysqli_query($db->conectar(), $sql);         /*pasa la query a la variable resultado*/
        while ($row = mysqli_fetch_array($query_exec)) {            /*pasa a vector*/
          $db->db_cerrar();


          if ($_POST['contrasena'] == $row['passport_login'] and $_POST['usuario'] == $row['usuario_login']) {
            header('location:Inicio_del_sistema.php');
          }
        }

      ?>
        <br>


        <div class="container">

          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Usuario o contraseña incorrectos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

        </div>
      <?php

      }

      ?>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>
</body>

</html>