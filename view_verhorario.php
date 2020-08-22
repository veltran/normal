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
			  $id_as=$_SESSION["asigna_h"];


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
											<h6 class="aling-lefth">
												<?php 
													if(empty($id_as)){

													}
													else{

												
														$consulta=mysqli_query($sql, "SELECT carreras.nom_carrera as carrera,semestres.des_semestre as semestre
														from asigna_horario,carreras,periodos,semestres WHERE asigna_horario.id_carrera=carreras.id_carrera and
														asigna_horario.id_semestre=semestres.id_semestre and id_asigna_h=$id_as");
													while($roow=mysqli_fetch_array($consulta)){
														$carrera=$roow['carrera'];
														$semestre=$roow['semestre'];
													} 
													if(!$consulta)
													{
														
													}else
													{
											
													}
														echo "Carrera:". $carrera. "   " ;
														echo  "".$semestre ;
												}
												?>
											</h6>
											
										</div>
										<?php 	
										include "conexion.php";

											$arreglo= array();
	$a= array();
	$mat=array();
	$cont=200;
	$c=0;
	$f=0;
	for ($i=0; $i<50  ; $i++) { 
		$a[$i]=$cont;
		$cont++;
	}

	$con= mysqli_query($sql,"SELECT id_asigna_m, id_asigna_bh from horarios ORDER BY horarios.id_asigna_bh asc;
	");
	if (mysqli_num_rows($con)==0) {
	echo "No se han agregado materias";
	
	}else{
		while($row=mysqli_fetch_array($con)){
		$id_as=$row["id_asigna_m"];
		$id_as_bh=$row["id_asigna_bh"];
		$arreglo[]=$id_as_bh;
		}
	
	$row_cnt = $con->num_rows;
				
			for ($i=0; $i<50 ; $i++) {
			// echo $i."<br>"; 
				$h=$a[$i];
				if ($arreglo[$c]==$h) {
				$mat[$i]=$arreglo[$c];
				// echo $mat[$i]."<br>";
				if($c< $row_cnt-1){
					$c++;
				}
				}else{

					$mat[$i]="";
					// echo $mat[$i];
				}
				$h="";
				// echo $mat[$i]."<br>";

			}

	}					
		

										?>
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
													<td class="redips-mark " id="hora">7:00-8:00</td>
													<td >
														<div class="redips-drag" style="border: 0px;">
														<?php
														$val=0;
														
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{

																	$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
																$des_mat="";
															}

														 ?>
													 	
													 </div></td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
														$val=10;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																	echo $mat[$val]."<br>";
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
														$val=20;
																if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>
													 	
													 </div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
														$val=30;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 

														$val=40;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {									echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													
												</tr> 
												<tr>
													<td class="redips-mark dark">8:00-9:00</td>
													<td><div class="redips-drag" style="border: 0px;">
														<?php 
														$val=1;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php $val="";
															$val=11;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																	$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=21;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=31;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=41;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
												</tr>
												<tr>
													<td class="redips-mark dark">9:00-10:00</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=2;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");	
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
														$val=12;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=22;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");	

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=32;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=42;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{

																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
												</tr>
												<tr>
													<td class="redips-mark dark">10:00-11:00</td>
													<td><div class="redips-drag" style="border: 0px;">
														<?php 
															$val=3;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div></td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=13;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=23;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=33;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");	
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=43;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
												</tr>
												<tr>
													<td class="redips-mark dark">11:00-12:00</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=4;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																	$hor=$mat[4];

																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=14;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
														$val=24;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=34;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=44;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
												</tr>
												<tr>
													<td class="redips-mark dark">12:00-13:00</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=5;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{

																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=15;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																	
																$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
														$val=25;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=35;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																	

																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=45;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																	$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
												</tr>
												<tr>
													<td class="redips-mark dark">13:00-14:00</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=6;
															
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																	while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=16;
																if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}
														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=26;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td><div class="redips-drag" style="border: 0px;">
														<?php 
														$val=36;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div></td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=46;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td class="redips-trash bg-danger" title="Trash">
													Eliminar
													</td>
												</tr>
												<tr>
													<td class="redips-mark dark">14:00-15:00</td>
													<td><div class="redips-drag" style="border: 0px;">
														<?php 
															$val=7;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div></td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
														$val=17;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td><div class="redips-drag" style="border: 0px;">
														<?php 
															$val=27;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div></td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=37;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=47;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
												</tr>
												<tr>
													<td class="redips-mark dark">15:00-16:00</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=8;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=18;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td><div class="redips-drag" style="border: 0px;">
														<?php 
															$val=28;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div></td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=38;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=48;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
												</tr>
												<tr>
													<td class="redips-mark dark">16:00-17:00</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=9;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=19;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
													<td><div class="redips-drag" style="border: 0px;">
														<?php 
															$val=29;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");

																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div></td>
													<td><div class="redips-drag" style="border: 0px;">
														<?php 
															$val=39;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div></td>
													<td>
														<div class="redips-drag" style="border: 0px;">
														<?php 
															$val=49;
															if (mysqli_num_rows($con)==0||$mat[$val]==""||$mat[$val]==0) {
																echo "Disponible";
															}
																else{
																		$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$val];");	
																while($row=mysqli_fetch_array($ver)){
																	$des_mat=$row["materia"];
																}
																echo $des_mat;
															}

														 ?>

														</div>
													</td>
												</tr>

												<?php 
												
													
												 ?>
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