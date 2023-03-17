<?php

session_start();
error_reporting(0);

$validar = $_SESSION['usuario'];

if ($validar == null || $validar = '') {

  header("Location: empleado.php");
  die();
}

require_once '../conexion/conexion.php';                      /*LLama la conexión*/
$con = new db_conexion();


$id_login = $_POST['id_login'];
$nombreempleado_login = $_POST['nombre'];
$apellidoempleado_login = $_POST['apellido'];
$documentoempleado_login = $_POST['documento'];
$usuario_login = $_POST['usuario'];
$passport_login = $_POST['contrasena'];
$cargoempleado_login = $_POST['cargo'];



$sql = "INSERT INTO usuarios VALUES('$id_login','$nombreempleado_login','$apellidoempleado_login','$documentoempleado_login','$usuario_login','$passport_login','$cargoempleado_login')";

$query = mysqli_query($con->conectar(), $sql);

if ($query) {
  Header("Location: administrador.php");
} else {
}
