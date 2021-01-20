<?php 
	session_start();
	$nombre="Admin";
	$_SESSION['usuario']="Admin";
	if($nombre== null || $nombre==''){
		header("location:index.php");
	}
	if($_SESSION["asigna_h"]==""){
		header("location:home.php");	

	}


	// echo "asigna_horario :". $_SESSION["asigna_h"]."<br>";
	// echo "PERIODO :". $_SESSION["idperiodo"]."<br>";
	// echo "CARRERA:". $_SESSION["carrera"]."<br>";
	// echo "SEMESTRE:".$_SESSION["semestre"]."<br>";
	// echo "GRUPO".$_SESSION["grupo"];
			$carr=0;
			$sem=0;
			$per=0;
			$per=$_SESSION["idperiodo"];
			$carr=$_SESSION["carrera"];
			$sem=$_SESSION["semestre"];
			$id_as=$_SESSION["asigna_h"];
			$id_gr=$_SESSION["grupo"];
			
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
									$consulta="SELECT asigna_materias.id_asigna_m as id_as,materias.nom_materia as nombre from asigna_materias,materias where asigna_materias.id_materia=materias.id_materia AND asigna_materias.id_asigna_h=$id_as AND asigna_materias.id_grupo=$id_gr";
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
											<h5 class="redips-mark">Horario Grupo</h5>
											<div id="respuesta"></div>
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
														$quer=mysqli_query($sql,"SELECT * FROM grupos WHERE id_grupo=$id_gr");
														while($roow=mysqli_fetch_array($quer)){
															$grupos=$roow['des_grupo'];
														} 
														?>
											<div class="row">
														
												<h6 class="aling-lefth"><!--mensaje carrera-->		
													<?php	echo "Carrera:". $carrera. "   " ; ?>
												</h6>	
												<h6 class="pl-4">
												<?php		echo  "  ".$semestre."  " ;
													}?>
												</h6>
												<h6 class="pl-4">Grupo: <?php echo " ".$grupos;
												
												?></h6>
											</div>
										</div>
										<?php 	
											$arreglo= array();
										function consulta($v,$as,$grup){
											$queri="  SELECT horarios.id_asigna_m as
											id_as,asigna_materias.id_asigna_h, materias.nom_materia as materia FROM
											horarios,asigna_materias,materias,asigna_bloque_h,bloques_h WHERE 
											horarios.id_asigna_m=asigna_materias.id_asigna_m and
											asigna_materias.id_materia=materias.id_materia and 
											horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and 
											asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h 
											and horarios.id_asigna_bh=$v and asigna_materias.id_asigna_h=$as AND asigna_materias.id_grupo=$grup";
											return $queri;
										}
										?>
										<table id="right" class="table table-striped table-bordered ">
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
													<td class="redips-mark">Hora</td>
													<td class="redips-mark">Lunes</td>
													<td class="redips-mark">Martes</td>
													<td class="redips-mark">Miércoles</td>
													<td class="redips-mark">Jueves</td>
													<td class="redips-mark">Viernes</td>
													<td class="redips-mark text-center">Eliminar</td>
												</tr>
											</thead>
											<tbody >
												<tr>
													<td class="redips-mark " id="hora">7:00-8:00</td>
													<td>
													<?php
													$val=200;
													$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
													// var_dump($ver);
													if(mysqli_num_rows($ver)==0){
													}else{	
													while($row=mysqli_fetch_array($ver)){
													
														$id_asm=$row["id_as"];
														$des_mat=$row["materia"];
														}
													?>
													<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
													<?php
													echo $des_mat;
														}	
												?>
													</div>
												</td>
													<td>
													<?php
													$val=210;
													$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
													// var_dump($ver);
													if(mysqli_num_rows($ver)==0){
														//echo "llego aqui";
													}else{	
													while($row=mysqli_fetch_array($ver)){
														$id_asm=$row["id_as"];
														$des_mat=$row["materia"];
														}
													?>
													<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
													<?php
													echo $des_mat;
														}	
												?>
													</div>
													</td>
													<td>
													<?php
													
													$val=220;
													$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
													// var_dump($ver);
													if(mysqli_num_rows($ver)==0){
														//echo "llego aqui";
													}else{	
													while($row=mysqli_fetch_array($ver)){
														$id_asm=$row["id_as"];
														$des_mat=$row["materia"];
														}
													?>
													<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
													<?php
													echo $des_mat;
														}	
												?>
													</div>
													</td>
														<td>
															<?php
																$val=230;
																$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
																if(mysqli_num_rows($ver)==0){
																}else{	
																while($row=mysqli_fetch_array($ver)){
																	$id_asm=$row["id_as"];
																	$des_mat=$row["materia"];
																	}
																?>
																<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
																<?php
																echo $des_mat;
																	}	
															?>
														</div>
													</td>
													<td>
													<?php
																$val=240;
																$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
																if(mysqli_num_rows($ver)==0){
																}else{	
																while($row=mysqli_fetch_array($ver)){
																	$id_asm=$row["id_as"];
																	$des_mat=$row["materia"];
																	}
																?>
																<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
																<?php
																echo $des_mat;
																	}	
															?>
														</div>
													</td>
													<td rowspan="10"  class="redips-trash " title="Trash" style="text-align:center;"><i  class="far fa-trash-alt" style="color:red; font-size: 40px;padding-top:200px;"></i>
													</td>
													
												</tr> 
												<tr>
													<td class="redips-mark dark">8:00-9:00</td>
													<td>
														<?php
																$val=201;
																$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
																if(mysqli_num_rows($ver)==0){
																}else{	
																while($row=mysqli_fetch_array($ver)){
																	$id_asm=$row["id_as"];
																	$des_mat=$row["materia"];
																	}
																?>
																<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
																<?php
																echo $des_mat;
																	}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=211;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
															<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=221;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
															<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=231;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
															<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=241;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
															<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
												</tr>
												<tr>
													<td class="redips-mark dark">9:00-10:00</td>
													<td>
														<?php
															$val=202;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
															<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=212;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
															<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=222;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
															<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=232;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
															<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=242;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
															<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
												</tr>
												<tr>
													<td class="redips-mark dark">10:00-11:00</td>
													<td>
														<?php
															$val=203;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=213;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=223;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=233;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=243;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
												</tr>
												<tr>
													<td class="redips-mark dark">11:00-12:00</td>
													<td>
														<?php
															$val=204;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=214;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=224;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=234;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>													
													</td>
													<td>
														<?php
															$val=244;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
												</tr>
												<tr>
												<td class="redips-mark dark">12:00-13:00</td>
													<td>
														<?php
															$val=205;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
													<?php
															$val=215;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=225;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=235;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=245;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
												</tr>
												<tr>
													<td class="redips-mark dark">13:00-14:00</td>
													<td>
														<?php
															$val=206;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
													<?php
															$val=216;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=226;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
													<?php
															$val=236;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=246;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
												
												</tr>
												<tr>
													<td class="redips-mark dark">14:00-15:00</td>
													<td>
														<?php
															$val=207;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=217;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=227;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=237;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=247;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
												</tr>
												<tr>
												<td class="redips-mark dark">15:00-16:00</td>
													<td>
														<?php
															$val=208;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=218;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=228;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=238;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=248;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
												</tr>
												<tr>
													<td class="redips-mark dark">16:00-17:00</td>
													<td>
														<?php
															$val=209;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=219;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=229;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
													<?php
															$val=239;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
															echo $des_mat;
																}	
															?>
														</div>
													</td>
													<td>
														<?php
															$val=249;
															$ver=mysqli_query($sql,consulta($val,$id_as,$id_gr));
															if(mysqli_num_rows($ver)==0){
															}else{	
															while($row=mysqli_fetch_array($ver)){
																$id_asm=$row["id_as"];
																$des_mat=$row["materia"];
																}
															?>
														<div class="redips-drag "  id="<?php echo $id_asm?> " style="border: 0px;">
															<?php
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
										<div id="tabla_info">
											<?php include('tabla_infoMAt.php'); ?>
										</div>
										<!-- <div class="text-right row" >
											<div class="col">
												<label for="">ELABORÓ</label>
												<input type="text">
											</div>
											<div class="col">
												<label for=""> REVISÓ</label>
												<input type="text">
											</div>
											<div class="col">
												<label for="">Vo. Bo.</label>
												<input type="text">
											</div>
											<div class="col">
												<label> VALIDA </label>
												<input for="">
											</div>
										</div> -->
										<div class="text-right">
											<button class="btn">
												<a class="btn btn-outline-primary"href="view_agregarMaterias.php">Regresar</a>
											</button>	
											<button class="btn aling-right" >
												<a class="btn btn-outline-danger" href="pdf.php" id="enviar"><i class="far fa-file-pdf " style="font-size:27px;" ></i></a>
													
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
		<script>
			// $('#enviar').click(function(){
			// 			var Asigna=document.getElementById('pdf_asigna').value;
			// 			var	Periodo=document.getElementById('pdf_carrera').value;
			// 			var Carrera=document.getElementById('pdf_semestre').value;
			// 			//var semestre=document.getElementById('pdf_periodo').innerHTML;
			// 			var ruta="As="+Asigna+"&Per="+Periodo+"&Car="+Carrera;
			// 			console.log(ruta);
			// 			$.ajax({
			// 				url:'pruebadomp.php',
			// 				type:'POST',
			// 				data:ruta,
			// 			}).done(function(res){
							
			// 			});
			// 			//$('#tabla_armarP').load('tabla_docentesP.php');
			// 		});
		</script>
		
	</body>
</html>