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
		<title>Principal</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-reboot.css">
		<link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" type="text/css" href="css/Estilos_horarios.css">
	</head>
	<body>
		<?php
		include ('header.php');
		?>
		<div class="container-fluid mt-2">
			<!--Menú orizontal -->
			<div class="col-12" id="Principal">
				<div class="row">
					
					<div class="col-sm-2 pr-2"> 
						
						
					</div> 
					<div id="contenido" class="col-10  ">
						<div class="row  ml-3">
							<div class="container bg-light col-12">
								<!-- Contenido -->
									<div>
										<div class="text-center">
											<h2>Agregar Docentes</h2>
										</div>
										
										<div class="ml-5 pt-3 btn-ligth ">
											<form class=""action="">
												<div class="ml-4 form-group row">
													<label class="col-sm-4 col-form-label" for="">Nombre de docente
													</label>
													<div class="col-sm-6">
														<input class="form-control input-sm"xtype="text" id="nombre" required>
													</div>
													
												</div>
												<div class="ml-4 form-group row"> 
													<label  class="col-sm-4" for="">
															Apellido paterno
													 </label>
													 <div class="col-sm-6"> 
													 	<input class="form-control input-sm" type="text" id="apellidoP" required="true">
													 </div>
												</div>
												<div class="ml-4 form-group row">
													<label class="col-sm-4"for="">
														Apellido materno
													</label>
													<div class="col-sm-6">
														<input class="form-control input-sm" type="text" id="apellidoM" required>
													</div>
												</div>
												<div class="ml-4 form-group row">	<label for="" class="		col-sm-4">Agregar perfil
													</label>
													<div class="col-sm-6">
														<select class=" form-control" id="perfil">
														<option value="100"></option>
														<option value="101">Ingeniero en Sistemas</option>
														<option value="102">Lic. en Administracion</option>
														<option value="104">Ing. Forestal</option>
														<option value="103">Ing. Industrial</option>
														<option value="105">Ingeniero mecanico</option>
														<option value="106">Maestro de inglés</option>
														<option value="107">Mtro. en Educacion Pimaria</option>
													</select>
													</div>
													
												</div>
												<div class="ml-4 form-group row">	<label for="" class="		col-sm-4">Agregar categoria
													</label>
													<div class="col-sm-6 " >
														<select name="" class="form-control" id="categoria" required>
															<option value=""></option>
															<option value="60">Profesor Horas clase Base</option>
															<option value="61">Pedagogo "A" Base C.C.P</option>
															<option value="62">Plaza formador Inglés</option>
															<option value="63">Subdirector administrativo</option>
														</select>
													</div>
												</div>	
											</form>	
											<div class="text-right">
													<buttom class="btn"><a href="view_docentes.php" class="btn btn-danger">Cancelar</a></buttom>
												
														<a type="button" class="btn btn-success" href="view_docentes.php" id="enviar">Guardar</a>
													
											</div>
										</div>
										
										
									</div>
							</div>
						</div> 
					</div>
				</div>
			</div>
		</div>
		<div id="respuesta"></div>
		<?php
		include('view_footer.php');
		?>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script>
			$('#enviar').click(function(){
				var Nombre=document.getElementById('nombre').value;
				var ApellidoP=document.getElementById('apellidoP').value;
				var ApellidoM=document.getElementById('apellidoM').value;
				var Perfil=document.getElementById('perfil').value;
				var Categoria=document.getElementById('categoria').value;

				 var ruta="Nom="+Nombre+"&Ap="+ApellidoP+"&Apm="+ApellidoM+"&Per="+Perfil+"&Cat="+Categoria;
				 $.ajax({
				 	url:'insertar_docentes.php',
				 	type:'POST',
				 	data:ruta,
				 })
				 .done(function(res){
				 	$('#respuesta').html(res);
				 });
			});
		</script>
	</body>

</html>