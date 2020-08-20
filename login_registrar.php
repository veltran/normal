<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrar</title>

		<link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" href="css/login.css">
		<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<form action="registro.php" method="POST" enctype="aplication/x-ww-from-urlencoded">
		<div class="contenedor" >
			<h1>Registrate</h1>
			<br>
			<div class="form-group">
				<label for="caja1"> Nombre de usuario
				</label>
				<br>
				<input type="text" id="caja1" name="usuario" placeholder="Nombre " required autofocus>
				
			</div>
			<div class="form-group">
					<label for="caja2" >Password</label>
					<br>
					<input id="caja2" type="password" name="pasword" placeholder="Password" required="">
					<br>
				<input type="submit" value="Registrarse">
			</div>
		
			
		</div>

	</form>
	
</body>
</html>