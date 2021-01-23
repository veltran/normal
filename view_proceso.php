<?php 
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
	$_SESSION["grupo"]="";
 ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-reboot.css">
		<link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" type="text/css" href="css/Estilos_horarios.css">
		<link rel="stylesheet" type="text/css" href="alertify/css/alertify.css">
		<link rel="stylesheet" type="text/css" href="alertify/css/themes/bootstrap.css">
</head>
<body>
	<?php
		include ('header.php');
	?>
			<div class="mt-2">
					<div id="contenido" class="col-10 container ">
						<div class="row ml-1 ">
							<div  class="col-12  ">
								<!-- contenido -->
								<div class="container bg-light">
									<div class="text-center"><h4>Comenzar Proceso</h4></div>
									<form  class="pt-4 	">
										<div class="text-center form-group row">
											<label class="col-sm-2 control-label" for="">Ingresar ciclo escolar</label>
											<select class="col-sm-6 form-control" name="" id="periodo">
											<?php 
												$consulta="SELECT * FROM periodos" ;
												$res=mysqli_query($sql,$consulta);
												while($row=mysqli_fetch_array($res)){
												$id=$row['id_periodo'];
												$materia=$row['des_periodo'];
											?>
											<option id="id_periodo" name="id_periodo" value="<?php echo $id; ?>"><?php echo $materia; ?></option>
											<?php	
											}
											?>
											</select>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 control-label" for="">Selecciona carrera</label>
											<select  class="col-sm-6 form-control"name		="" id="carrera">
											<?php 
												$consulta="SELECT * FROM carreras" ;
												$res=mysqli_query($sql,$consulta);
												while($row=mysqli_fetch_array($res)){
												$id=$row['id_carrera'];
												$materia=$row['nom_carrera'];
											?>
											<option id="id_carrera" name="id_carrera" value="<?php echo $id; ?>"><?php echo $materia; ?></option>
											<?php	
											}
											?>
											</select>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 control-label" for="">Selecciona semestre</label>
											<select class="col-sm-6 form-control" name="" id="semestre">
											<?php 
												$consulta="SELECT * FROM semestres" ;
												$res=mysqli_query($sql,$consulta);
												while($row=mysqli_fetch_array($res)){
												$id=$row['id_semestre'];
												$materia=$row['des_semestre'];
											?>
											<option id="id_semestre" name="id_semestre" value="<?php echo $id; ?>"><?php echo $materia; ?></option>
											<?php	
												}
											?>
											</select>
										</div>
										<div class="form-group row">
											<label  class="col-sm-2 cotrol-label" for="">Grupo</label>
											<select class="col-sm-6 form-control" name="" id="grupo">
												<?php
														$consulta="SELECT * FROM grupos" ;
														$res=mysqli_query($sql,$consulta);
														while($row=mysqli_fetch_array($res)){
														$id=$row['id_grupo'];
														$grupo=$row['des_grupo'];
												?>
												<option value="<?php echo $id;?>"><?php echo $grupo; ?></option>
												<?php }?>
											</select>
										</div>
									<div class="pt-4 text-right">
									</div>
									<div id="respuesta"></div>
								</form>	
									<div class="text-right pr-5 pb-5">
										<a class="btn btn-danger mr-5" href="home.php"> Cancelar</a>
									<a type="button" class="btn btn-primary" id="Enviar" href="view_agregarMaterias.php">Continuar</a></div>	
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- <?php
		include('view_footer.php');
	?> -->
</body>
	<script>
		$('#Enviar').click(function(){
			var Periodo=document.getElementById('periodo').value;
			var Carrera=document.getElementById('carrera').value;
			var Semestre=document.getElementById('semestre').value;
			var Grupo=document.getElementById('grupo').value;
			var ruta="Per="+Periodo+"&Carr="+Carrera+"&Sem="+Semestre+"&Gr="+Grupo;
			console.log("mensaje"+ruta);
			$.ajax({
				url:'insertar_nuevoH.php',
				type:'POST',
				data: ruta,
			})
			.done(function(res){
				$('#respuesta').html(res)
			});
		});
	</script>
</html>

