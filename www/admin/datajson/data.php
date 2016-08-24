<?php
$con = new mysqli("localhost","root","","simponv2_3");
	if ($con->connect_errno)
	  {
	  echo "<script>Window.alert('Koneksi DB Error')</script>";
	  }
$id = $_GET["id"];
$ledging = $_GET["ledging"];
$gender = $_GET["gender"];
$query_detail = "
	SELECT
	t_participant.name n_partisipan,
	t_participant.gender gender,
	t_cabor.name n_cabor,
	t_contingent.name n_contingent,
	t_cabor.id id_cabor,
	t_contingent.id id_contingent,
	t_touchdown.status status,
	sys_user.id_ledging,
	t_touchdown.id
	FROM t_touchdown
	JOIN t_participant ON t_touchdown.id_participant = t_participant.id
	JOIN t_cabor ON t_participant.id_cabor = t_cabor.id
	JOIN t_allocation ON t_allocation.id_cabor = t_cabor.id
	JOIN t_ledging ON t_allocation.id_ledging = t_ledging.id
	JOIN sys_user ON t_ledging.id = sys_user.id_ledging
	JOIN t_contingent ON t_touchdown.id_contingent = t_contingent.id
	WHERE t_touchdown.id = $id
	AND t_allocation.id_ledging = $ledging
	AND if(t_participant.type_participant !='tp', t_allocation.for='ao', t_allocation.for = 'tp');
";	
$query_room = "
	SELECT 
	t_room.id, 
	t_room.name, 
	t_room.capacity, 
	t_room.gender, 
	t_allocation.for, 
	t_allocation.id_ledging, 
	(SELECT COUNT(id_room) FROM t_touchdown WHERE id_room = t_room.id) total 
	FROM t_room 
	JOIN t_allocation ON t_room.id_allocation = t_allocation.id 
	JOIN t_ledging ON t_allocation.id_ledging = t_ledging.id 
	JOIN sys_user ON t_ledging.id = sys_user.id_ledging 
	JOIN t_cabor ON t_allocation.id_cabor = t_cabor.id 
	JOIN t_touchdown ON t_cabor.id = t_touchdown.id_cabor 
	JOIN t_participant ON t_touchdown.id_participant = t_participant.id 
	WHERE t_room.gender = '$gender'
	AND IF(t_participant.type_participant != 'tp', t_allocation.for = 'ao', t_allocation.for = 'tp') 
	AND t_touchdown.id = $id
	AND t_allocation.id_ledging = $ledging
";
$result = mysqli_query($con,$query_detail);
$result2 = mysqli_query($con,$query_room);

// All good?
if ( !$result AND !$result2) {
}
$i=0;
$hasil=array();
$hasil["detail"]= array();
$hasil["room"]= array();
while ( $row = mysqli_fetch_assoc( $result ) ) {
  $hasil["detail"]=$row;
}

while ( $row2 = mysqli_fetch_assoc( $result2 ) ) {
  $row_array[$i]=$row2;
  $i++;
}
array_push($hasil["room"],$row_array);
echo json_encode($hasil);
// Close the connection
mysqli_close($con);
?>