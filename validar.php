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
				echo "exito";
			}else{
				echo "Usuario o contrasena incorrecta";
			}
		}
		else{
			echo "Usuario o contrasena incorrecta";
		}
	}else {echo "Porfavor llene las casillas";}

 ?>