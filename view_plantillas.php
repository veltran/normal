<?php 
	session_start();
	$nombre=$_SESSION["usuario"];
	
	if($nombre== null || $nombre==''){
		
		header("location:index.php");

	}

 ?>							<!DOCTYPE html>
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
			<!--Menú orizontal -->
			<div class="col-12" id="Principal">
				<div class="row">
					
					<div class="col-2">
						<div class="row">
							<div class="  ">
								<ul class=" nav  estilo-menu bg-light">
									<li>
										<a id="l1"class=" nav-link texto-menu bg-light" href="">Nuevo</a>
									</li>
									<li class="nav-item">
										<a id="l2"class="nav-link texto-menu bg-light"  href="view_malla1.php">Editar</a>
									</li>
								
									<li class="nav-item">
										<a id="l4" class="nav-link texto-menu bg-light" href="" tabindex="-1" ></a>
									</li>
								</ul>
							</div>
						</div>
						
					</div>
					<div id="contenido" class="col-10 container ">
						<div class="row ml-1 "><!-- contenedor -->
							<div class=" container col-12 bg-light  ">
								<!-- contenido -->
								<div class="text-center ">
									<h3>Plantillas Docente</h3>
								</div>
								<div class="form-group row pt-4"> 
									<label class="col-sm-2 control-label" for="">Selecciona la plantilla
									</label>
									<select class="col-sm-6 form-control mr-4" name="" id="">
										<option value="">Plantilla 1</option>
										<option value="">Plantilla 2</option>
									</select>
									<!-- <span  class="btn btn-primary pl-1 ml-4" data-toggle="modal" data-target="#modal_nuevo">Crear nueva plantilla <i class="fa fa-plus-circle "></i></span>
									 -->
								</div>
									<div class="col-12 pt-4 ">
										
											<div class="text-center">
												<h4>Plantilla nueva</h4>
											</div>
												<div id="tabla">

												</div>
										
										
									</div>
								<div class="text-right">
									<button type="button" class="btn btn-danger mr-5">Cancelar</button>	
									<button class="btn mr-5"><a href="view_agregarMaterias.php" type="btn "< class="btn btn-primary">Guardar</a></button>
								</div>
								
							</div>
					
						</div>
						
					</div>
				</div>
			</div>
		</div>
			<!-- Modal agregar -->
<form id="frmnuevo">
	<div class="modal fade" id="modal_nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar docente</h5>
				
				</div>
				<div class="modal-body">
					
						<!-- <input type="text" hidden="" id="idDoc" name="idDoc"> -->
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nom" required>
						
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" id="btnGuardar">Aceptar</button>
				</div>
			</div>
		</div>
	</div>
	</form>
	
		<div id="respuesta">
			
		</div>

	<?php
		include('view_footer.php');
	?>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('tabla_plantillas.php');
	});
</script>
	<script >
		
			$(function(){
		$('#frmnuevo').on('submit',function(e){
			e.preventDefault();
			var datos =$(this).serialize();
			console.log(this);
			$.post('insertar_plantilla.php',datos).done(function(response){
				$('#frmnuevo')[0].reset();
				alertify.success("Agregado con exito !");
				$('#frmnuevo').modal('hidde'); 
			}).fail(function(xhr){

			});
		});
	});
	</script>

		
</script>
</body>
</html>

