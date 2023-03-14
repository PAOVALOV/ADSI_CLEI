<?php

session_start();
error_reporting(0);

$validar = $_SESSION['usuario'];

if( $validar == null || $validar = ''){

  header("Location: empleado.php");
  die();
  
}


require_once '../conexion/conexion.php'; /*LLama la conexión*/

$db=new db_conexion();


$id=$_POST['id_estudiante'];
$documento=$_POST['documento'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$fecha=$_POST['fecha'];
$numero_estudiante=$_POST['numero_estudiante'];
$ciudad=$_POST['ciudad'];
$discapacidad=$_POST['discapacidad'];
$curso=$_POST['curso'];
$horario=$_POST['horario'];
$acudiente=$_POST['acudiente'];



$sql="UPDATE estudiantes SET
documento_estudiante = '$documento',
nombre_estudiante = '$nombre',
apellido_estudiante = '$apellido',
email_estudiante = '$email',
fechadenacimiesto_estudiante = '$fecha',
numerocontacto_estudiante = '$numero_estudiante',
ciudad_estudiante = '$ciudad',
discapacidad_estudiante = '$discapacidad',
curso_estudiante = '$curso',
horario_estudiante = '$horario',
acudiente__estudiante = '$acudiente'
WHERE id_estudiante = '$id'";

echo $numero_estudiante;

$query = mysqli_query($db->conectar(), $sql);           /*pasa la query a la variable resultado*/

    if($query){
        Header("Location:gestion.php");

        echo 'Fue actualizado con exito';
    }
?>


   