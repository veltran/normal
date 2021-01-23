
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
		<title>Login</title>
		<link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" href="css/login.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		
<body>
	
	 <form action="validar.php ?>" method="POST" class="form-login">
	 	<div class="contenedor" >
	 		<h1>Iniciar sesión</h1>
	 			<div class="form-group">
	 			
	 				<label>Nombre del usuario</label>
			 		<!-- <i class="fas fa-user-alt icon"> </i> --><input type="text" id="caja1" name="usuario" placeholder="Usuario" required>
	 			</div>

		 		
			 
				<label >Contraseña</label><br>
				<div class="form-group">
						<span><!-- <i class="fas fa-key" style="color: red;"></i></span> -->
					<input type="password" name="password" placeholder="Contraseña" required id="">
				
				</div>
				
		
						
 <div class="seperator"><b></b></div>
			<button type="submit button" class="btn btn-secondary" value="Iniciar sesion" name="" style="background-color: #ffd16f" id="">Iniciar sesion</button>
		 <div >
		 	<!-- <button type="button" class="btn btn-secondary" style="margin: 3px;padding-right: 30px;" onclick="registrar();">
		 		Registrar 
		 	</button> -->
		 	<br/>
		 </div>
	 </div>
</form>
 <script type="text/javascript">
 	function registrar(){
 		window.location="login_registrar.php";
 	}
 </script>
</body>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>
				