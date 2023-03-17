<?php

require_once("../conexion/conexion.php");



if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros


        case 'acceso_user';
            acceso_user();
            break;

        // case 'acceso_user';
        //     acceso_admin();
        //     break;
    }
}



function acceso_user()
{
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $cargo = $_POST['cargoempleado_login'];
    $cargo = "Administrador";

    session_start();
    $_SESSION['usuario'] = $usuario;

    $conexion = mysqli_connect("localhost", "root", "", "adsi_clei");
    $consulta = "SELECT * FROM usuarios WHERE usuario_login='$usuario' AND passport_login='$contrasena'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_array($resultado);




    if ($filas['cargoempleado_login'] == 'Empleado') { //admin

        header('Location: Inicio_del_sistema.php');
    } else if ($filas['cargoempleado_login'] == 'Administrador') { //lector
        header('Location: administrador.php');
    } else {

        header('Location: login.php');
        session_destroy();
    }
}



// function acceso_admin()
// {
//     $usuario = $_POST['usuario'];
//     $contrasena = $_POST['contrasena'];

//     session_starts();
//     $_SESSION['usuario'] = $usuario;

//     $conexion = mysqli_connect("localhost", "root", "", "adsi_clei");
//     $consulta = "SELECT * FROM usuarios WHERE usuario_login='$usuario' AND passport_login='$contrasena'";
//     $resultado = mysqli_query($conexion, $consulta);
//     $filas = mysqli_fetch_array($resultado);


//     if ($filas['cargoempleado_login'] == 'Administrador') { //admin

//         header('Location: admnistrador.php');
//     } else if ($filas['cargoempleado_login'] == 'Administrador') { //lector
//         header('Location: administrador.php');
//     } else {

//         header('Location: login.php');
//         session_destroy();
//     }
// }

?>