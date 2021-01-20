<?php 
echo $id=$_POST['id'];

	if (isset($_POST['usuario']) ) {
		include 'conexion.php';
		$nombre=$_POST['usuario'];
		echo $nombre;

		$queri=mysqli_query($sql,"UPDATE usuarios  SET usuario = '$nombre' WHERE usuarios.id_usu = $id") or die('No fue posible registrar <br>');
		
		if(isset($_POST['pasword'])){
			$pasword=password_hash($_POST['pasword'], PASSWORD_DEFAULT);
			$queri=mysqli_query($sql,"UPDATE usuarios SET passwor = '$pasword' WHERE usuarios.id_usu = $id") or die('No fue posible registrar <br>');		
		}
		
        mysqli_close($conexion);

		header('location:conf_usuarios.php');
	}else{
		header('location:conf_usuarios.php');
	}
 ?>