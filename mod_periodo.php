<?php 
	include 'conexion.php';

$con=mysqli_query($sql, "SELECT des_periodo from periodos WHERE periodos.id_periodo=81
	");

while($row=mysqli_fetch_array($con)){
		$per=$row['des_periodo'];
								}
	
$_SESSION["periodo"]=$per;

 ?>