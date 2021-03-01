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
		<link rel="stylesheet" href="css/style.css"> 
 <link rel="stylesheet" type="text/css" href="css/estilos.css">		
		<script type="text/javascript" src="js/redips-drag-min.js"></script>
	</head>
	<body onload="REDIPS.drag.init()">
		 	<?php
		 include ('header.php');
		?> 
		<div class="container-fluid mt-2" >
			<!--Menú orizontal -->
			<div class="col-12" >
				<div class="row" id="redips-drag">
					<div class="col-sm-2 pr-2"> 
						<div class="row">
						
									<?php 
								include 'conexion.php';
								 ?>

								 <table class="table table-striped table-hover ">
								 	<thead >
								 		<tr>
								 			<td>MATERIAS</td>
								 		</tr>
								 	</thead>
								 	<tbody>
								 		<?php 
								 		$consulta="SELECT materias.nom_materia AS nombre FROM materias,semestres,carreras WHERE materias.id_carrera=carreras.id_carrera AND materias.id_semestre=semestres.id_semestre AND carreras.id_carrera=31 AND semestres.id_semestre=11;";
								 		$con=mysqli_query($sql,$consulta);
								 		 ?>
										
											<?php 
											foreach ($con as $key => $row):?>
										<div>
											<tr >
												<td  >
													<div  class="redips-drag " style="border: 0px;">
													<?php echo $row['nombre']; ?>
													</div>
												</td>
											</tr>
											
										</div>
											<?php endforeach; ?>
								 	</tbody>
								 </table>
						</div>
						
					</div> 
					<div id="contenido" class="col-10  ">
						<div class="row bg-light ml-3">
							<div class="container col-12">
								<!-- Contenido -->
									<div >
										<div class="text-center">
											<h2>Horario Docente</h2>
										</div>
										<!-- <div class="form-group row ml-2">
											<label class="" for="">
												Buscar docente
											</label>
											<input class="col-sm-2 form-control ml-2" type="text">
										</div> -->
										<table class="table table-striped table-hover" id="table2" >
											<thead class="" style="background-color: #007bff; color:white; font-weight: bold; ">
												<tr >
												<td>hora</td>
												<td>Lunes</td>
												<td>Martes</td>
												<td>Jueves</td>
												<td>Viernes</td>
												<td>Sabado</td>
												</tr>
											</thead>
											<tbody >
												<tr>
													<td>7:00-9:00</td>
													<td>Libre</td>
													<td>Libre</td>
													<td>Libre</td>
													<td>Libre</td>
													<td >Libre</td>
												</tr>
												<tr>
													<td >9:00-10:00</td>
													<td>
														<div >
														Libre
														</div>
													</td>
													<td>Libre</td>
													<td>Libre</td>
													<td>Libre</td>
													<td>Libre</td>
												</tr>
												<tr>
													<td>11:00-13:00</td>
													<td></td>
													<td>Libre</td>
													<td>Libre</td>
													<td>Libre</td>
													<td>Libre</td>
												</tr>
												<tr>
													<td>13:00-15:00</td>
													<td>Libre</td>
													<td>Libre</td>
													<td>Libre</td>
													<td>Libre</td>
													<td>Libre</td>
												</tr>
												<tr>
													<td>15:00 pm-17:00 pm</td>
													<td >Libre</td>
													<td>Libre</td>
													<td>Libre</td>
													<td>Libre</td>
													<td>Libre</td>
												</tr>
											</tbody>
										</table>
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
		
	
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	</body>
   <!--<script>
		$('#tabla_materias').load('tabla_materias_h.php');
	</script> -->
</html>