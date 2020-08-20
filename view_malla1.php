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
</head>
<body>
	<?php
		include ('header.php');
	?>
	
			<div class="mt-2">
			<!--Menú orizontal -->
			<div class="col-12" id="Principal">
				<div class="row">
					
					<!-- <div class="col-2">
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
						 -->
					</div>
					<div id="contenido" class="col-12 container ">
						<div class="row ml-1 ">
							<div class="col-12  ">
								<!-- contenido -->
								<div class="row container bg-light">
									
										
	<div class=" row container"id="targeta"> 
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						<h4>Licenciatura en educación primaria 2018</h4>
					

					</div>
					<div class="card-body">
					
						<br>
						<div id="tablaMalla1">
							
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
		</div>
		
	<?php
		include('view_footer.php');
	?>
		
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<script>
		$(document).ready(fucntion(){
			$('#tablaMalla1').load('tablaMalla1.php');
		});
	</script>
	
</body>
</html>