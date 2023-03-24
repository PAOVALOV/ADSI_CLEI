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


  <title>Crear Usuario
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
      onclick = "return confirmarAccesoURL()"
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
            <ul class="navbar-nav ">
              <li class="nav-item ">
                <a class="nav-link " href="administrador.php">Lista de Usuarios</a>
              </li>
              <div class="vr"></div>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="administradoruser.php">Agregar Usuario</a>
              </li>
              <!-- 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> -->
            </ul>
          </div>
        </div>
      </nav>


      <!-- Vista de los integrantes del perosnal de la institución -->

      <div class="container mt-5 ">
        <div class="row justify-content-md-center">

          <div class="col-md-5 border border-secondary border-3" style="padding: 50px ">
            <div>
              <h1 class="text-center">Ingrese datos</h1>
              <form class=" mt-5" action="" method="POST">
                <input type="hidden" class="form-control mb-3" name="id_login" placeholder="id_login">
                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                <input type="text" class="form-control mb-3" name="apellido" placeholder="Apellido">
                <input type="text" class="form-control mb-3" name="documento" placeholder="Documento">
                <input type="text" class="form-control mb-3" name="usuario" placeholder="Usuario">
                <input type="text" class="form-control mb-3" name="contrasena" placeholder="Passport">
                <label class="form-label">Cargo del usuario:</label>
                <select class="form-select form-control mb-3" name="cargo" placeholder="cargo">
                  <!-- Lista desplegable -->
                  <option selected> Elegir rol</option>
                  <option value="Empleado">Empleado</option>
                  <option value="Administrador">Administrador</option>
                </select>

                <input type="submit" name="btn_new" class="btn btn-primary">

                <br>
                <?php

                $contadorvacio  = "";                                  /*Variables de control para validar si está vacio y si existe la consulta*/
                $contadorexiste = "";

                if (isset($_POST['btn_new'])) {

                  $contadorvacio  = 0;                              /*Inicializa las variables en 0 para trabajar*/
                  $contadorexiste = 0;

                  $id = $_POST['id_login'];
                  $nombre = $_POST['nombre'];
                  $apellido = $_POST['apellido'];
                  $documento = $_POST['documento'];
                  $usuario = $_POST['usuario'];
                  $contrasena = $_POST['contrasena'];
                  $cargo = $_POST['cargo'];


                  if (
                    $documento        == ""
                  ) {                                     /*si está alguno de los campos vacios*/
                    echo "
                          <div class='container'>
                            <center>
                            <br>
                              <div class='alert alert-danger' role='alert'>
                              <strong>Error!</strong> Los Campos con * son Obligatorios.
                              </div>
                            </center>
                          </div>";

                    $contadorvacio++;                          /*Este acumulador se marca cuando el campo está vacio*/
                  } else {

                    require_once '../conexion/conexion.php';                    /*LLama la conexión*/

                    $db = new db_conexion();                                    /*Abre la base de datos*/
                    $sql = "SELECT * FROM usuarios        /*Realiza la consuta*/ 
          WHERE documentoempleado_login ='$documento'";

                    $resultado = mysqli_query($db->conectar(), $sql);           /*pasa la query a la variable resultado*/
                    while ($registro = mysqli_fetch_array($resultado)) {        /*pasa a vector*/
                      $db->db_cerrar();

                      $contadorexiste++;                       /*Este acumulador se marca cuando el número existe en la DB*/
                    }
                  }


                  if ($contadorexiste == 1) {
                    require_once '../conexion/conexion.php';                    /*LLama la conexión*/

                    $db = new db_conexion();                                    /*Abre la base de datos*/
                    $sql = "SELECT * FROM usuarios        /*Realiza la consuta*/ 
                  WHERE documentoempleado_login ='$documento'";

                    $resultado = mysqli_query($db->conectar(), $sql);           /*pasa la query a la variable resultado*/
                    while ($registro = mysqli_fetch_array($resultado)) {        /*pasa a vector*/
                      $db->db_cerrar();
                ?>

                      <div class='container formulario'> <br>
                        <center>
                          <div class='alert alert-danger' role='alert'>
                            <strong>¡Error!</strong> El usuario ya está registrado.
                          </div>
                          <th><a href="admiactualizar.php?id=<?php echo  $registro['id_login'] ?>" class="btn btn-info">Editar</a></th>
                        </center>
                      </div>


                <?php
                    }
                  }

                  if ($contadorvacio == 0 and $contadorexiste == 0) {             /*Si no se acumuló ninguna de las variables de control, se debe hacer el Insert a la DB */

                    require_once '../conexion/conexion.php';                      /*LLama la conexión*/

                    $db = new db_conexion();                                      /*Abre la base de datos*/
                    mysqli_query($db->conectar(), "INSERT INTO usuarios VALUES('$id','$nombre','$apellido','$documento','$usuario','$contrasena','$cargo')");

                    $db->db_cerrar();
                    echo "<div class='container formulario'>
  <center><br>
  <div class='alert alert-success' role='alert'>
  <strong>Nuevo Usuario!</strong> Ingreso Con exito.
  </div>
  </center>";
                  };
                }
                ?>
              </form>
            </div>
          </div>
        </div>

      </div>



  </main>

</body>

</html>