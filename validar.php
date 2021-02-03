<?php 
session_start();
	if (isset($_POST['usuario']) and isset($_POST['password'])) {
		include('conexion.php');
		$nombreusuario=mysqli_real_escape_string($sql,$_POST['usuario']);
		
		$password=mysqli_real_escape_string($sql,$_POST['password']);

		$connombre='SELECT  * FROM usuarios WHERE usuario="'.$nombreusuario.'"';

		$comprobacion=$sql->query($connombre);

		if ($comprobacion->num_rows>0) {

			$consulta=mysqli_query($sql,'SELECT passwor from usuarios WHERE usuario="'.$nombreusuario.'"');
			$recoger_dato=mysqli_fetch_assoc($consulta);
		
			$comprobar_pass=password_verify($password,$recoger_dato['passwor']);
			
		
			if ($comprobar_pass){
				$_SESSION['usuario']=$nombreusuario;
				header('location:home.php');
			}else{
			
			//    echo '<script language="javascript">';
			// 	echo 'alert(" Datos incorrectos")';
			// 	echo '</script>';
				 header('location: index.php');

			}
		}
		else{
			print 'No se ha encontrado en el registro<br>';
			header('location: index.php');
		}
	}else{
		header('location: ./');
	}


 ?>