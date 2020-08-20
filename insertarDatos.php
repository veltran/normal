<?php 
	include("conexion.php");

	 $nombre=$_POST['nom'];
	 $ap=$_POST['apPaterno'];
	 $materno=$_POST['apMaterno'];
	 $perfil=$_POST['perfil'];
	 $categoria=$_POST['categoria'];
	
 
	 $insertar = "INSERT INTO docentes (nom_docente, ap_paterno,ap_materno,id_perfil,id_cat,id_estado) VALUES ('$nombre','$ap', '$materno','$perfil','$categoria','10')";
	 
	 $res=mysqli_query($sql,$insertar);
	
	
	 if (!$res) {
	 		echo "Fatal ";
	 }
	 else{
	 	echo ":) ";
	 }

 ?>