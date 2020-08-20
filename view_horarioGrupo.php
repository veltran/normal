<?php 
	session_start();
	$nombre=$_SESSION["usuario"];
	
	if($nombre== null || $nombre==''){
		
		header("location:index.php");

	}
	 echo "asigna_horario :". $_SESSION["asigna_h"]."<br>";
	 echo "PERIODO :". $_SESSION["idperiodo"]."<br>";
 echo "CARRERA:". $_SESSION["carrera"]."<br>";
  echo "SEMESTRE:".$_SESSION["semestre"]."<br>";
  			$carr=0;
  			$sem=0;

  			$carr=$_SESSION["carrera"];
  			$sem=$_SESSION["semestre"];


 ?><!DOCTYPE html>
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
					
					<div class="col-sm-2 pr-2"> 
						<div class="row">
						
									<?php 
								include 'conexion.php';
								 ?>
								 <table id="left" class="table table-striped table-hover ">
								 	<thead >
								 		<tr>
								 			<td class="redips-mark">MATERIAS</td>
								 		</tr>
								 	</thead>
								 	<tbody>
								 		<?php

								 		if($carr==0 ){
								 			echo "No ha elegido horario";
								 		}
								 		else{

								 		$consulta="SELECT asigna_materias.id_asigna_m as id_as,docentes.nom_docente,materias.nom_materia as nombre from asigna_materias,docentes,materias,carreras,semestres where asigna_materias.id_materia=materias.id_materia and asigna_materias.id_docente=docentes.id_docente and  materias.id_carrera=carreras.id_carrera AND materias.id_semestre=semestres.id_semestre AND carreras.id_carrera=$carr AND semestres.id_semestre=$sem;";

								 		$con=mysqli_query($sql,$consulta);
								 		if (mysqli_num_rows($con)==0) {
								 			echo "No se han agregado materias";
								 		}
								 		else{
								 			
								 		}
								 		 ?>
										
											<?php 
											foreach ($con as $key => $row):?>
										<div>
											<tr >
												<td dragable="true" class="redips-mark" >
													<div  class="redips-drag redips-clone  climit1_4 " id="<?php echo $row['id_as']; ?>" style="border: 0px;">
													<?php echo $row['nombre']; ?>
													</div>
												</td>
											</tr>
											
										</div>
											<?php endforeach; 

										}?>
								 	</tbody>
								 </table>
						</div>
						
					</div> 
					<div id="contenido" class="col-10  ">
						<div class="row bg-light ml-3">
							<div class="container col-12">
									<div>
										<div class="text-center redips-mark">
											<h2 class="redips-mark">Horario Grupo</h2>
										</div>
										<!-- <div>
											<label for="">
												Buscar grupo
											</label>
											<input type="text">
										</div> -->
										<table id="right" class="table table-striped table-bordered">
												<colgroup>
													<col width="100"/>
													<col width="180"/>
													<col width="180"/>
													<col width="180"/>
													<col width="180"/>
													<col width="180"/>
													<col width="180"/>
													

												</colgroup>
											<thead class="table-primary" style="background-color: #007bff; color:white; font-weight: bold;">
												<tr>
												<td class="redips-mark">hora</td>
												<td class="redips-mark">Lunes</td>
												<td class="redips-mark">Martes</td>
												<td class="redips-mark">Miercoles</td>
												<td class="redips-mark">Jueves</td>
												<td class="redips-mark">Viernes</td>
												<td class="redips-mark text-center">Eliminar</td>
												
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="redips-mark dark" id="hora">7:00-8:00</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													
												</tr> 
												<tr>
													<td class="redips-mark dark">8:00-9:00</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<td class="redips-mark dark">9:00-10:00</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<td class="redips-mark dark">10:00-11:00</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<td class="redips-mark dark">11:00-12:00</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr><tr>
													<td class="redips-mark dark">13:00-14:00</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td class="redips-trash" title="Trash">Trash</td>
												</tr>
												<tr>
													<td class="redips-mark dark">14:00-15:00</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<td class="redips-mark dark">15:00-16:00</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<td class="redips-mark dark">16:00-17:00</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
											</tbody>
											<tfoot>
												<tr></tr>
											</tfoot>
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
		
		<?php
		include('view_footer.php');
		?>
		
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		
	</body>
</html>