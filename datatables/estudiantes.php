<!DOCTYPE html>
<html lang="es" class="h-100">

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

  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css" />
  <link rel="stylesheet" href="../datatables/js/spanish.json">


  <script>
    function ConfirmDemo() {
      alert("¡Gracias por confirmar!");
      window.location.href = "../index.html";
      if (mensaje) {
        alert("¡Haz denegado el mensaje!");
      }
      //Verificamos si el usuario denegó el mensaje
      else {
        alert("¡Haz denegado el mensaje!");
      }
    }
  </script>
</head>

<body>

  <main>

    <!-- SIDE BARD -->
    <div class=" d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 320px;">
      <a href="../paginas/Inicio_del_sistema.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none ">
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
          <a href="../paginas/estudiantes.php" class="nav-link text-white active" aria-current="page">
            <img src="../media/iconos/Estudiante.ico" class="img-fluid" style="padding-inline-end: 10px;" width="50" height="50">
            Estudiantes
          </a>
        </li>
      </ul>
      <hr>

      <div class="dropdown">




        <a href="../index.html"><button type="button" onclick="ConfirmDemo();" class="btn btn-danger">Salir del sistema</button></a>

      </div>
    </div>

    <!-- END SIDE BARD -->



    </div>
    <div class="row overflow-auto">
      <nav class="navbar bg-light">
    </div>
      </nav>
    <div class="container overflow-auto"><br>
    <h1 class="text-center fw-bold">Estudiantes en el Instituto CLEI</h1>

      <div class="row">
        <div>
          <table id="example" class="table table-striped ">
            <thead>
              <th>ID</th>
              <th>DOCUMENTO</th>
              <th>NOMMBRE</th>
              <th>APELLIDOS</th>
              <th>EMAIL</th>
              <th>FECHA DE NACIMIENTO</th>
              <th>TELEFONO</th>
              <th>CIUDAD</th>
              <th>DISCAPACIDAD</th>
              <th>CURSO</th>
              <th>HORARIO</th>
              <th>ACUDIENTE</th>

            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    </div>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable({
          "fnCreatedRow": function(nRow, aData, iDataIndex) {
            $(nRow).attr('id_estudiante', aData[0]);
          },
          'serverSide': 'true',
          'processing': 'true',
          'paging': 'true',
          'order': [],
          'ajax': {
            'url': 'fetch_data.php',
            'type': 'post',
          },
          "aoColumnDefs": [{
              "bSortable": false,
              "aTargets": [5]
            },

          ]
        });
      });
    </script>



</body>

</html>