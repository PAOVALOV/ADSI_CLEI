<?php include('connection.php');

$output= array();
$sql = "SELECT * FROM estudiantes ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id_estudiante',
	1 => 'documento_estudiante',
	2 => 'nombre_estudiante',
	3 => 'apellido_estudiante',
	4 => 'email_estudiante',
	5 => 'fechadenacimiesto_estudiante',
	6 => 'numerocontacto_estudiante',
	7 => 'ciudad_estudiante',
	8 => 'discapacidad_estudiante',
	9 => 'curso_estudiante',
	10 => 'horario_estudiante',
	11 => 'acudiente__estudiante',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE id_estudiante like '%".$search_value."%'";
	$sql .= " OR documento_estudiante like '%".$search_value."%'";
	$sql .= " OR apellido_estudiante like '%".$search_value."%'";
	$sql .= " OR email_estudiante like '%".$search_value."%'";
	$sql .= " OR fechadenacimiesto_estudiante like '%".$search_value."%'";
	$sql .= " OR numerocontacto_estudiante like '%".$search_value."%'";
	$sql .= " OR ciudad_estudiante like '%".$search_value."%'";
	$sql .= " OR discapacidad_estudiante like '%".$search_value."%'";
	$sql .= " OR curso_estudiante like '%".$search_value."%'";
	$sql .= " OR horario_estudiante like '%".$search_value."%'";
	$sql .= " OR acudiente__estudiante like '%".$search_value."%'";

}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id_estudiante desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['id_estudiante'];
	$sub_array[] = $row['documento_estudiante'];
	$sub_array[] = $row['nombre_estudiante'];
	$sub_array[] = $row['apellido_estudiante'];
	$sub_array[] = $row['email_estudiante'];
	$sub_array[] = $row['fechadenacimiesto_estudiante'];
	$sub_array[] = $row['numerocontacto_estudiante'];
	$sub_array[] = $row['ciudad_estudiante'];
	$sub_array[] = $row['discapacidad_estudiante'];
	$sub_array[] = $row['curso_estudiante'];
	$sub_array[] = $row['horario_estudiante'];
	$sub_array[] = $row['acudiente__estudiante'];

	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id_estudiante'].'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$row['id_estudiante'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);


