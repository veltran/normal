<?php 

	include("conexion.php");

	 $nom=$_POST['nom'];
	 $ap_paterno=$_POST['apPaterno'];
	 $ap_materno=$_POST['apMaterno'];
	 $perfil=$_POST['perfil'];
	 $categoria=$_POST['categoria'];
 
	 $insert = "INSERT INTO docentes (nom_docente,ap_paterno,ap_materno,id_perfil,id_categoria,nombramiento)Values ('$nom','$ap_paterno','$ap_materno','$perfil','$categoria','dos')";
	 $res=mysqli_query($sql,$insert);
	
	
	 if (!$res) {
	 		echo "Fatal ";
	 }
	 else{
	 	echo ":) ";
	 }

 ?>