<?php

require_once '../conexion/conexion.php'; /*LLama la conexión*/

$db = new db_conexion();


$id = $_POST['id_login'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$documento = $_POST['documento'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$cargo = $_POST['cargo'];


$sql = "UPDATE usuarios SET
id_login='$id',
nombreempleado_login='$nombre',
apellidoempleado_login='$apellido',
documentoempleado_login='$documento',
usuario_login='$usuario',
passport_login='$contrasena',
cargoempleado_login='$cargo'
WHERE id_login ='$id'";



$query = mysqli_query($db->conectar(), $sql);           /*pasa la query a la variable resultado*/

if ($query) {
    Header("Location:administrador.php");
}
