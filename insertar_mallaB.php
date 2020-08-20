<?php 
	include ('conexion.php');

	$nombre=$_POST['nombre'];
	$tot_horas=$_POST['horas'];
	$semestre=$_POST['semestre'];

	$query="INSERT INTO materias (id_materia,nom_materia,tot_horas,id_semestre,id_carrera) VALUES (null,'$nombre','$tot_horas','$semestre',33)";
	$consulta=mysqli_query($sql,$query);

	 if (!$consulta) {
	 		echo "Fatal X(";
	 }
	 else{
	 	echo ":) ";
	 }
 ?>