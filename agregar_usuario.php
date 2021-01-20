<?php 
	if (isset($_POST['usuario']) and isset($_POST['pasword'])) {
		include 'conexion.php';
		$nombre=mysqli_real_escape_string($sql,$_POST['usuario']);
		

		$pasword=password_hash($_POST['pasword'], PASSWORD_DEFAULT);

		$queri=mysqli_query($sql,'INSERT INTO usuarios(usuario,passwor) VALUES ("'.$nombre.'","'.$pasword.'")')or die('No fue posible registrar <br>'.mysqli_error($conexion));
		mysqli_close($conexion);

		header('location:conf_usuarios.php');
	}else{
		//header('location: ./');
	}
 ?>