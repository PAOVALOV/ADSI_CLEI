<?php include('connection.php');
$id = $_POST['id_estudiante'];
$sql = "SELECT * FROM users WHERE id_estudiante='$id' LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>
