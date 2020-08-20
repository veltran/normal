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
	<title>Inicio</title>
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
						<div class="row ml-1 ">
							<div class="col-12  ">
								<!-- contenido -->
																		
									<div class=" row container"id="targeta"> 
										<div class="row">
											<div class="col-sm-12">
												<div class="card text-left">
													<div class="card-header">
													Docentes
														
													</div>
													<div class="card-body">
														<span class="btn btn-primary" data-toggle="modal" data-target="#modal_nuevo">Agregar nuevo <span class="fa fa-plus-circle pl-1" ></span></span>
														<hr>
														<div id="tabla">
															
														</div>
													</div>
													<div class="card-footer text-muted">
														
													</div>
													
												</div>
											</div>
										</div>

									</div>
								
							</div>
					
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
	<?php
		include('view_footer.php');
	?>
		<!-- Modal agregar -->
		<form id="frmnuevo">
	<div class="modal fade" id="modal_nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar docente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
						<!-- <input type="text" hidden="" id="idDoc" name="idDoc"> -->
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nom" required>
						<label>Apellido paterno</label>
						<input type="text" class="form-control input-sm" id="apPaterno" name="apPaterno" required>
						<label>Apellido materno</label>
						<input type="text"  class="form-control input-sm" id="apMaterno" name="apMaterno" required>
						<div class="form-group">
							<label class="control-label" for="">Perfil docente</label>
							<!-- <input type="text"  class="form-control input-sm" id="perfil" name="perfil" value="20" required> -->
							<select class="form-control" name="perfil" id="">
								<option value="40">selecciona opcion</option>
								<option value="41">ingeniero sistemas</option>
								<option value="42">licenciatura en administracion</option>
								<option value="">ingenieria industrial</option>

							</select>
						</div>
						<label for="">Categoria</label>
						<input type="text"  class="form-control input-sm" id="categoria" name="categoria" value="40" required>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary"  id="btnActualizar">Aceptar</button>
				</div>
			</div>
		</div>
	</div>
	</form>
	<!-- Modal editar -->
		<form action="editardocente.php" method="POST">
	<div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ediatar Datos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<input  id="idDocU" name="idDocU">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nomU" name="nomU" required>
						<label>Apellido paterno</label>
						<input type="text" class="form-control input-sm" id="apPaternoU" name="apPaternoU" required>
						<label>Apellido materno</label>
						<input type="text"  class="form-control input-sm" id="apMaternoU" name="apMaternoU" required>
						<label for="">Perfil docente</label>
						<input type="text"  class="form-control input-sm" id="perfilU" name="perfilU" required>
						<label for="">Categoria</label>
						<input type="text"  class="form-control input-sm" id="categoriaU" name="categoriaU" required>
						
 
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary"  id="btnActualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
	</form>


		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script src="alertify/alertify.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('tabladocentes.php'); 
	});
</script>
<script >
	$(function(){
		$('#frmnuevo').on('submit',function(e){
			e.preventDefault();
			var datos =$(this).serialize();
			//console.log(this);
			$.post('insertarDatos.php',datos).done(function(response){
				$('#frmnuevo')[0].reset();
				alertify.success("Agregado con exito !");
				$('#tabla').load('tabladocentes.php');
				// $('#frmnuevo').modal('hidde'); 
			}).fail(function(xhr){

			});
		});
	});
</script>
<script type="text/javascript">
	$('#ModalEditar').on('show.bs.modal',function(event){
		var button = $(event.relatedTarget)

		var id_doc = button.data('id')
		var nomdoc = button.data('nombre')
		var appaterno = button.data('ap')
		var apmaterno = button.data('materno')
		var perfil = button.data('perfil')
		var cat = button.data('cat')
	

		var modal =$(this)
		modal.find('.modal-title').text('Actualizar a' + nomdoc)
		modal.find('.modal-body input#idDocU').val(id_doc)
		modal.find('.modal-body input#nomU').val(nomdoc)
		modal.find('.modal-body input#apPaternoU').val(appaterno)		
		modal.find('.modal-body input#apMaternoU').val(apmaterno)
		modal.find('.modal-body input#perfilU').val(perfil)		
		modal.find('.modal-body input#categoriaU').val(cat)
			

	})
</script>

</body>
</html>

