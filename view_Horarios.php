<?php 
	session_start();
	$nombre="Admin";
	$_SESSION['usuario']="Admin";
	if($nombre== null || $nombre==''){
		header("location:index.php");
	}
			$carr=0;
			$sem=0;
			$per=0;
			// $per=
			// $carr
			// $sem=
			// $id_as=
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Principal</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-reboot.css">
		<link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/Estilos_horarios.css">
		<script type="text/javascript" src="js/redips-drag-min.js"></script>
		<script type="text/javascript" src="js/script_Docente.js"></script>
	</head>
	<body onload="REDIPS.drag.init()">
		<?php
		include ('header.php');
		?>
		<div class="container-fluid mt-2">
			<!--Menú orizontal -->
			<div class="col-12" id="Principal">
				<div class="row" id="redips-drag">
					
					<div id="contenido" class="col-12  ">
						<div class="row bg-light ml-3">
							<div class="container col-12">
									<div>
										<div class="text-center redips-mark">
											<h5 class="redips-mark">Horario Grupo</h5>
											<!-- Mostrando todos las opciones para consultar el horario-->
												<div id="menu de consulta">
												<form>
													<div class="form-row">
														<div class="col">
														<select id="Periodo" class="form-control">
														<?php 
																$con="SELECT * FROM periodos" ;
																$res=mysqli_query($sql,$con);
																while($row=mysqli_fetch_array($res)){
															?>
															<option id="Per" name="Per" value="<?php echo $row['id_periodo']; ?>"><?php echo $row['des_periodo']; ?></option>
															<?php	
															}
															?>
														</select>
														</div>
														<div class="col">
														<select id="Carrera" class="form-control">
														<?php 
																$con="SELECT * FROM carreras" ;
																$r=mysqli_query($sql,$con);
																while($row=mysqli_fetch_array($r)){
															?>
															<option id="Carr" name="Carr" value="<?php echo $row['id_carrera']; ?>"><?php echo $row['nom_carrera']; ?></option>
															<?php	
															}
															?>
														</select>
														</div>
														<div class="col">
															<select id="Semestre" class="form-control">
															<?php 
																	$con="SELECT * FROM semestres" ;
																	$re=mysqli_query($sql,$con);
																	while($row=mysqli_fetch_array($re)){
																?>
																<option id="Sem" name="Sem" value="<?php echo $row['id_semestre']; ?>"><?php echo $row['des_semestre']; ?></option>
																<?php	
																}
																?>
															</select>
														</div>
														<div class="col">
															<select id="Grupo" class="form-control">
															<?php 
																	$con="SELECT * FROM grupos" ;
																	$re=mysqli_query($sql,$con);
																	while($row=mysqli_fetch_array($re)){
																?>
																<option id="Gr" name="Gr" value="<?php echo $row['id_grupo']; ?>"><?php echo $row['des_grupo']; ?></option>
																<?php	
																}
																?>
															</select>
														</div>
														<button type="button" id="consultar" class="btn btn-primary">Continuar</button>
													</div>
												</form>
											</div>
											</br>
											<div id="tHora">

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
			$('#consultar').click(function(){
					//	var asigna=document.getElementById('pdf_asigna').;
					var periodo=0;
						var	carrera=0;
						var semestre =0;
						var grupo=0;
						periodo=document.getElementById('Periodo').value;
						carrera=document.getElementById('Carrera').value;
						semestre =document.getElementById('Semestre').value;
						grupo=document.getElementById('Grupo').value;
						ruta="Per="+periodo+"&Car="+carrera+"&Sem="+semestre+'&Gr='+grupo;
						console.log(ruta);
						$.ajax({
							url:'tabla_mostrarHorario.php',
							type:'POST',
							data:ruta,
						}).done(function(res){
							$('#tHora').html(res);
					});
						});
						
		</script>
		
	</body>
</html>