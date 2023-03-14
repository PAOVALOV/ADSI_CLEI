<?php

session_start();
error_reporting(0);

$validar = $_SESSION['usuario'];

if( $validar == null || $validar = ''){

  header("Location: empleado.php");
  die();
  
}


require_once '../conexion/conexion.php';                      /*LLama la conexión*/
$db = new db_conexion();                                      /*Abre la base de datos*/

$id_login=$_GET['id'];

$sql="DELETE FROM usuarios  WHERE id_login='$id_login'";
$query = mysqli_query($db->conectar(), $sql);           /*pasa la query a la variable resultado*/

    // me redirige una vez se realiza la query
    if($query){
        Header("Location: administrador.php");
    }
?>
