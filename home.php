<?php 
include "conexion.php";
	session_start();
	$nombre=$_SESSION["usuario"];
	
	if($nombre== null || $nombre==''){
		
		header("location:index.php");

	}
	$_SESSION["idperiodo"]="";
	$_SESSION["periodo"]="";
	$_SESSION["carrera"]="";
	$_SESSION["semestre"]="";
	$_SESSION["asigna_h"]="";

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
						<div class="row">
						
								<ul class=" nav  estilo-menu bg-light">
									<li>
										<a id="l1"class=" nav-link texto-menu 	bg-light" href=""> Nuevo
										</a>
									</li>
									<li class="nav-item">
										<a id="l2"class="nav-link texto-menu 	bg-light"  href="">Calendario 
										</a>
									</li>
									<li class="nav-item">
										<a id="l3"class="nav-link texto-menu 	bg-light" href="">Descripción	
										</a>
									</li>
									<li class="nav-item">
										<a id="l4" class="nav-link texto-menu 	bg-light" href="view_dicenarHorario.php" tabindex="-1" >			Horarios  
										</a>
									</li>
								
								</ul>
						
						</div>
						
					</div> 
					<div id="contenido" class="col-10  ">
						
						
							
								<div class="row bg-light ml-3">
									<div class="container col-12">
										<img  class="est_img"src="img/cal.jpg" width="900px" height="300px"  alt="">
										<div class="text-center">
										<button class="btn"><a class="btn btn-primary"href="view_proceso.php">Start</a>
										</button>
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
		
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

	
		
	</body>
</html>