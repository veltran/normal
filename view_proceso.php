<?php 
	session_start();
	$nombre=$_SESSION["usuario"];
	
	if($nombre== null || $nombre==''){
		
		header("location:index.php");

	}

 ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-reboot.css">
		<link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" type="text/css" href="css/Estilos_horarios.css">
		<link rel="stylesheet" type="text/css" href="alertify/css/alertify.css">
		<link rel="stylesheet" type="text/css" href="alertify/css/themes/bootstrap.css">
</head>
<body>
	<?php
		include ('header.php');
	?>
	
			<div class="mt-2">
		
					<div id="contenido" class="col-10 container ">
						<div class="row ml-1 ">
							<div  class="col-12  ">
								<!-- contenido -->
								<div class="container bg-light">
									<div class="text-center"><h4>Comenzar Proceso</h4></div>
									<form  class="pt-4 	">
										
										<div class="text-center form-group row">
											<label class="col-sm-2 control-label" for="">Ingresar ciclo escolar</label>
											<select class="col-sm-6 form-control" name="" id="periodo">
												
												<option value="80">Septiembre 2020-Enero 2021</option>
												<option value="81">Marzo 2021-Agosto 2021</option>
												<option value="82">Septiembre 2021-Enero 2022</option>
											</select>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 control-label" for="">Selecciona carrera</label>
											<select  class="col-sm-6 form-control"name		="" id="carrera">
												<option value="31">Licenciatura en Edicaccion Primaria</option>
												<option value="32">Licenciatura en Educacion Secundaria Quimica</option>
												<option value="34">Licenciatura en educacion Secuandaria Biologia</option>
											</select>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 control-label" for="">Selecciona semestre</label>
											<select class="col-sm-6 form-control" name="" id="semestre">
												<option value="11">Primer semestre</option>
												<option value="12">Segundo semestre</option>
												<option value="13">Tercer semestre</option>
												<option value="14">Caurto semestre</option>
												<option value="15">Quinto semestre</option>
												<option value="16">Sexto semestre</option>
												<option value="17">Septimo semestre</option>
												<option value="18">Octavo semestre</option>

											</select>
										</div>
										
									
							
									<div class="pt-4 text-right">
										

									</div>
									<div id="respuesta"></div>
								</form>	

									<div class="text-right pr-5 pb-5">
										<a class="btn btn-danger mr-5" href="home.php"> Cancelar</a>
									
									<a type="button" class="btn btn-primary" id="Enviar" href="view_agregarMaterias.php">Continuar</a></div>	
									</div>
								
								
							</div>
					
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
	<!-- <?php
		include('view_footer.php');
	?> -->
</body>

	<script>
		$('#Enviar').click(function(){
			var Periodo=document.getElementById('periodo').value;
			var Carrera=document.getElementById('carrera').value;
			var Semestre=document.getElementById('semestre').value;

			var ruta="Per="+Periodo+"&Carr="+Carrera+"&Sem="+Semestre;

			console.log("mensaje"+ruta);
			$.ajax({
				url:'insertar_nuevoH.php',
				type:'POST',
				data: ruta,
			})
			.done(function(res){
				$('#respuesta').html(res)
				
			});
		
		});

	</script>
</html>

