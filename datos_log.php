<?php 

session_start();
$_SESSION["periodo"]="";
$_SESSION["idperiodo"]="";

	include ('conexion.php');
	$nom=	$_POST['Nom'];
	$pass=	$_POST['Pass'];


	$con="SELECT usuario FROM usuarios where usuarios.usuario='$nom' and usuarios.pass='$pass' ";
	$consulta=mysqli_query($sql,$con);
	if (!$consulta) {
		echo "El usuario no existe";		
	}else{	
		$_SESSION["usuario"]= $nom;
		echo "Bienvenido".$_SESSION["usuario"];

		header ('location:home.php');


	}

 ?>