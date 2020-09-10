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
			
					<div id="contenido" class="col-12 pb-10 ">
						<div class="row bg-light ml-3 margin">
							<div class="container col-12">
								<!-- contenido -->
								<div class="text-center">
									<h3>Diseñar Horario</h3>
								</div>
								<form class="form form-group pt-4" action="">
									
									<label class="btn form-control" for=""> <a class="btn btn-info" href="view_horarioDocente.php">Horario Docente</a>
									</label>
									<label class="btn form-control" for=""><a class="btn btn-info" href="view_horarioGrupo.php">Horario Grupo</a></label>
									<label class="btn form-control" for=""><a class="btn btn-info" href="view_Horarios.php"> Ver Horario Grupo</a></label>

								</form>
								
							</div>
						</div> 
					</div>	
				</div>
			</div>
		</div>
		
		<?php
		include('view_footer.php');
		?>
		
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

	
		
	</body>
</html>