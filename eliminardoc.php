<?php 
	include ('conexion.php');

	$id_doc =$_POST['id'];

	$res=mysqli_query($sql,"DELETE FROM docentes where id_docente=$id_doc");

 		header("location:viewDocentes.php");	
 		

 ?>