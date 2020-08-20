<?php 
	include 'conexion.php';

	$Nombre=$_POST['Nom'];
	echo("nombre".$Nombre);
	$insertar=mysqli_query($sql,"INSERT INTO plantillas (id_plantilla,des_plantilla) values(null,'$Nombre');");

	if(!$insertar){
		echo "Fatal :(";
	}else{
		echo "Consulta exitosa :)";
	}


 ?>