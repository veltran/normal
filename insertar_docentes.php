<?php 
	include 'conexion.php';

	$Nombre=$_POST['Nom'];
	$ApellidoP=$_POST['Ap'];
	$ApellidoM=$_POST['Apm'];
	$Perfil=$_POST['Per'];
	$Categoria=$_POST['Cat'];

	#echo "El nombre es: ".$Nombre."Apellido es:".$ApellidoP."Apellido materno es:".$ApellidoM."Perfil es : ".$Perfil." Categoria: ".$Categoria;
	$insertar=mysqli_query($sql,"INSERT INTO docentes (id_docente,nom_docente,ap_paterno,ap_materno,id_perfil,id_cat,tot_horas_clase,id_estado)VALUES (null,'$Nombre','$ApellidoP','$ApellidoM',$Perfil,$Categoria,0,9)");
	if(!$insertar){
		echo "Error en query";
	}
	else{
		echo"Consulta Exitosa :)";
	}


 ?>