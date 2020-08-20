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
											<h2>Licenciatura en Educación Primaria-2018</h2>
										</div>
										<div class=" text-right">
										
										</div >
										<div class="pt-3">
										<div id="malla">
											
										</div>
										</div>
										
										<div class="text-right">
											<button type="button" class="btn btn-primary"
											data-toggle="modal"
											data-target="#modalAgregar">Agregar materia</button>
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
<!-- Modal agregar -->
<form id="formnuevo">
	<div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar materia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
						<!-- <input type="text" hidden="" id="idDoc" name="idDoc"> -->
						<label>Nombre materia</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre" required>
						<label> Total de horas</label>
						<input type="text" class="form-control input-sm" id="t_horas" name="t_horas" required>
						<label >Semestre</label>
						<select name="semestre" id="semestre" class="form-control ">
							<?php 
							include ('conexion.php');

								$con=mysqli_query($sql,"SELECT * from semestres");

								while ($row=mysqli_fetch_array($con)) {
									$id=$row['id_semestre'];
									$desc=$row['des_semestre'];
								?>
								<option value="<?php echo $id; ?>"><?php echo $desc; ?></option>
								<?php
								}


							 ?>
						</select>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary"  id="Enviar_materia">Aceptar</button>
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
				$('#malla').load('tabla_mallaP.php');
			});
		</script>
		<script>
			$('#Enviar_materia').click(function(){
				var Nombre=document.getElementById('nombre').value;
				var T_horas=document.getElementById('t_horas').value;
				var Semestre=document.getElementById('semestre').value;

				var ruta="nombre="+Nombre+"&horas="+T_horas+"&semestre="+Semestre;
				console.log("Datos"+ruta);
				$.ajax({
					url:'insertar_materiaP.php',
					type:'POST',
					data:ruta,
				}).done(function(res){
					console.log(res);
				});

			});



		</script>

	</body>
</html>