<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario de ajax </title>
	<script type="text/javascript" src="js/jquery.js"></script>
	

</head>
<body>
	<div>
		<form action="">
			<label for="">
				Ingresa Nombre
			</label>
			<select name="" id="Nombre">
				<option value="Uriel">Uriel</option>
				<option value="Marco">Marco</option>
				<option value="Pedro">Pedro</option>
			</select>
			<label for="">
				Ingresa Apellido	
			</label>
			<input type="text"id="Apellido">
			<label for="">
				Ingresa  edad
			</label>
			<input type="text"id="Edad">

		</form>
		<div>
			<button type="button" id="Enviar">
				Enviar
			</button>
		</div>
		<div id="respuesta">
			
		</div>
	</div>
</body>

<script>
	$('#Enviar').click(function(){
		var Nombre=document.getElementById('Nombre').value;
		var Apellido=document.getElementById('Apellido').value;
		var Edad=document.getElementById('Edad').value;

		var ruta="Nom="+Nombre+"&Ape="+Apellido+"&Ed="+Edad;

		$.ajax({
		url:'insertar_nuevoH.php',
		type:'POST',
		data: ruta,
		}).done(function(res){
			$('#respuesta').html(res)
		});
	});
</script>	

	
</script>
</html>	