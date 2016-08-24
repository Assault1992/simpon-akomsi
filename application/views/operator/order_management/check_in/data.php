<?php
mysqli_connect("localhost","root","","simponv2");
if ($con->connect_errno)
  {
	  echo "<script>Window.alert('Koneksi DB Error')</script>";
  }

// Fetch the data
$query2 = "
	SELECT *
	FROM t_touchdown
	WHERE id = $_GET[id]
";
$result = mysqli_query( $konek,$query2);

// All good?
if ( !$result ) {
}
$hasil=array();
while ( $row = mysqli_fetch_assoc( $result ) ) {
  $hasil=$row;
}
echo json_encode($hasil);
// Close the connection
mysqli_close($konek);
?>