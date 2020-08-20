 <?php 
	session_start();
	$nombre=$_SESSION["usuario"];
	
	if($nombre== null || $nombre==''){
		
		header("location:index.php");

	}

 ?>		
		
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Principal</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-reboot.css">
		<link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" type="text/css" href="css/Estilos_horarios.css">
		<link rel="stylesheet" href="librerias/datatable/bootstrap.js">
		<link rel="stylesheet" href="librerias/datatable/dataTables.bootstrap4.min.css">
	</head>
	<body>
		<?php
		include ('header.php');
		?>
		<div class="container-fluid mt-2">
			<!--Menú orizontal -->
			<div class="col-12" id="Principal">
				<div class="row">
					
			
					<div id="contenido" class="col-12  ">
						<div class="row bg-light ml-3">
							<div class="container col-12">
								<!-- Contenido -->
									<div>
										<div class="text-center">
											<h2>Docentes</h2>
										</div>
										<div class=" text-right">
											<button class="btn  "><a class="btn btn-primary" href="view_agregarDocente.php">Agregar docente <span class="fa fa-plus-circle pl-1" ></a></span></button>
										</div >
										<div class="pt-3">
										<div id="tabladocentes">
											
										</div>
										</div>
										
										<div class="text-right">
											<button class="btn">
												<a class="btn btn-primary"href="view_dicenarHorario.php">Regresar</a>
											</button>
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
	<!-- Modal editar -->
		<form action="editardocente.php" method="POST">
		<div class="modal fade" id="ModalEditarDocente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ediatar Datos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<input  id="idDocU" name="idDocU" hidden="true">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nomU" name="nomU" required>
						<label>Apellido paterno</label>
						<input type="text" class="form-control input-sm" id="apPaternoU" name="apPaternoU" required>
						<label>Apellido materno</label>
						<input type="text"  class="form-control input-sm" id="apMaternoU" name="apMaternoU" required>
						<label for="">Perfil docente</label>
						
						<select name="perfilU" class="form-control input-sm" id="perfilU" required="false">
							<?php 
								include 'conexion.php';
								$consulta = "SELECT * FROM perfiles " ;
								$perfil= mysqli_query($sql,$consulta);
								while($row = mysqli_fetch_array($perfil)){
									$id=$row['id_perfil'];
									$des=$row['des_perfil'];
								?>
									<option value="<?php echo $id; ?>"><?php echo $des?></option>
								<?php
								}
							 ?>
							
						</select>
						<label for="">Categoria</label>
						<!-- <input type="text"  class="form-control input-sm" id="categoriaU" name="categoriaU" required> -->
						<select name="categoriaU" class="form-control input-sm" id="categoriaU" required>
							<?php 
								include 'conexion.php';
								$select ="SELECT * FROM categorias";
								$consulta =mysqli_query($sql,$select);

								while($row=mysqli_fetch_array($consulta)){
									$id = $row['id_cat'];
									$desc = $row['des_cat'];
									?>
									<option  value="<?php echo $id ?>"> <?php echo $desc ?></option>
									<?php
								}

							 ?>

						</select>
						<label for="">Estado</label>
						<br>

						<div class="text-center">
							<label>Activo</label>
						<input  class="mr-3"name="estadoU" type="radio"   value="9" required="">

						<label class="" >Inactivo</label>
						<input  class=""name="estadoU" type="radio" value="10" required="">	

						</div>
					
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
		<script type="text/javascript" src="librerias/datatable/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="librerias/datatable/dataTables.bootstrap4.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#tabladocentes').load('tabla_docentes.php');
			});
		</script>
		<script type="text/javascript">
			$('#ModalEditarDocente').on('show.bs.modal',function(event){
				var button =$(event.relatedTarget)

				var id_doc = button.data('id')
				var nomdoc = button.data('nombre')
				var appaterno = button.data('ap')
				var apmaterno = button.data('materno')
				var perfil = button.data('perfil')
				var cat = button.data('cat')
				var estado = button.data('estado')

				var modal =$(this)
				modal.find('.modal-title').text('Actualizar a' + nomdoc)
				modal.find('.modal-body input#idDocU').val(id_doc)
				modal.find('.modal-body input#nomU').val(nomdoc)
				modal.find('.modal-body input#apPaternoU').val(appaterno)
				modal.find('.modal-body input#apMaternoU').val(apmaterno)
				modal.find('.modal-body option.perfilU').val(perfil)
				modal.find('.modal-body option#categoriaU').val(cat)
				modal.find('.modal-body input#estadoU').val(estado)
			});
		</script>
	</body>
</html>