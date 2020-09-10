<?php 
	session_start();
	$nombre=$_SESSION["usuario"];
	
	if($nombre== null || $nombre==''){
		
		header("location:index.php");

	}
	$Periodo=$_SESSION["periodo"];
	$Carrera=$_SESSION["carrera"];
	$Semestre=$_SESSION["semestre"];

	echo "id_asigna:".$_SESSION["asigna_h"];
	echo "<br> id_carrera:".$_SESSION["carrera"];
	echo "<br> id_semestre".$_SESSION["semestre"];
	echo "<br> id_periodo:".$_SESSION["idperiodo"];
include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-reboot.css">
		<link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" type="text/css" href="css/Estilos_horarios.css">
		<link rel="stylesheet" type="text/css" href="alertify/css/alertify.css">
		<!-- <link rel="stylesheet" type="text/css" href="alertify/css/themes/bootstrap.css"> -->
		<!-- 	<link rel="stylesheet" href="librerias/datatable/bootstrap.js"> -->
		<link rel="stylesheet" href="librerias/datatable/dataTables.bootstrap4.min.css">
</head>
<body>
	<?php
		include ('header.php');
	?>
	
			<div class="mt-2">
			
			<div class="col-12" id="Principal">
				<div class="row">
				
					<div id="contenido" class="col-12  ">
						<div class="row ml-1 ">
							<div  class="col-12  ">
								<!-- contenido -->
								<div class=" bg-light">
									<div class="text-center">
										<h6>Agregar Materias</h6>
									</div>
									<div id="tAsignarM"class="text-centerx pt-3 ">
									</div>
									<div class="text-right">
										<button class="btn"><a class="btn btn-danger" href="">Cancelar</a></button>
										<button class="btn"><a class="btn btn-success" href="view_verhorario.php">Aceptar</a></button>
									</div>
								</div>
					
						</div>
						
					</div>
				</div>
			</div>
			<div id="res">	
			</div>
		</div>
		<!-- mesaje -->
		<div id="respuesta">
			
		</div>

	
		
	<?php
		include('view_footer.php');
	?>
<!-- Modal Agregar Materia -->
		<div>
			<form action="agregarmateria.php" method="POST">
				<div class="modal fade" id="ModalAgregarMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar materia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<input id="idDocU" name="id_docente" hidden="true" >
						<label >  Perfil  </label>
						<label id="nombreU" name="nombre" for=""   class="form-control input-sm"  >
						</label>
						<label >Seleccione la materia a agregar:</label>
 						<select  class="form-control input-sm" name="id_materia" id="" required="">
							<?php 
								

								$consulta="SELECT materias.id_materia, materias.nom_materia FROM materias,carreras,semestres WHERE materias.id_carrera=carreras.id_carrera and materias.id_semestre=semestres.id_semestre and semestres.id_semestre=$Semestre and carreras.id_carrera=$Carrera";
								$res=mysqli_query($sql,$consulta);

								while($row=mysqli_fetch_array($res)){
									$id=$row['id_materia'];
									$materia=$row['nom_materia'];

								?>
								<option id="id_materia" name="id_materia" value="<?php echo $id; ?>"><?php echo $materia; ?></option>
								<?php	
								}
							?>
						</select>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">	     Cancelar
					</button>
					<button type="submit" class="btn btn-primary"  id="agregar_m">Aceptar

					</button>
				</div>
			</div>
		</div>
	</div>

</form>
		</div>
	<!-- Modal Editar materias -->
	<div>
			<form action="" method="POST">
				<div class="modal fade" id="ModalEditarMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar materia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<input id="idDocE" name="idDocE" hidden="true">
						<label >  Perfil  </label>
						<label id="perfilE" name="nombre" for=""   class="form-control input-sm"  >
						</label>
						
 						<div id="tabla_editarM">
 							
 							
 						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">	     Cancelar
					</button>
					<button type="submit" class="btn btn-primary"  id="agregar_m">Aceptar

					</button>
				</div>
			</div>
		</div>
	</div>

</form>
		</div>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="librerias/datatable/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="librerias/datatable/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
			$(document).ready(function(){$('#tAsignarM').load('tabla_asignarM.php');
				});

	</script>
	<!-- <script>

		$("#plantilla").click(
		function(){
			var plantilla=document.getElementById('plantilla').value;

			var ruta="Plantilla="+plantilla;

			$.ajax({
				url:'tabla_asignarM.php',
				type:'POST',
				data:ruta,
			}).done(function(res){
				$("#tAsignarM").html(res);
			});

		});
		//$('#tAsignarM').load('tabla_asignarM.php');
	</script>	 -->
	<!-- <script>
		$("#plantilla")
	</script> -->
	<script>
		$('#ModalAgregarMateria').on('show.bs.modal',function(event){
			var button = $(event.relatedTarget)

			var id_doc = button.data('id')
			var nom_doc = button.data('nombre')
			var ap = button.data('ap')
			var ap_m = button.data('materno')
			var tot_horas = button.data('horaClase')
			var perfil = button.data('perfil');

			var modal = $(this)
			modal.find('.modal-title').text('Agregar materia a:' +nom_doc+ap);
			modal.find('.modal-body input#idDocU').val(id_doc);

			modal.find('.modal-body label#nombreU').text(perfil);
			modal.find('.modal-body label#nombreU').val(nom_doc)
		});
	</script>
	<script>
//Carga de materias De docente
		$(document).ready(function(){

			 $(document).on('click', '.editar_btn', function(){
              var id=$(this).attr('id'); // this hace referencia al botón con la clase .edit
    			
    			 $ruta="id="+id;
				console.log($ruta);
				 $.ajax({
				 	url:'tabla_editarMaterias.php',
				 	type:'POST',
				 	data:$ruta,
				 })
				 .done(function(res) {	
				 	$('#tabla_editarM').html(res);
					// function(){$('#tabla_editarM').load('tabla_editarMaterias.php');}


				});

   			 });

		}); 
		//Modal editar una materia
		$('#ModalEditarMateria').on('show.bs.modal',function(event){
		
			var button = $(event.relatedTarget)
			var id_doc = button.data('id');
			var nom_doc = button.data('nombre');
			var ap = button.data('ap');
			var ap_m = button.data('materno');
			var perfil = button.data('perfil');
			var modal = $(this)
			modal.find('.modal-title').text('Profesor: ' +nom_doc+' '+ap);
			modal.find('.modal-body input#idDocE').val(id_doc); 
			modal.find('.modal-body input#idDocE').text(id_doc); 
			modal.find('.modal-body label#perfilE').text(perfil);
			modal.find('.modal-body label#perfilE').val(perfil);

			// $r= document.getElementById('idDocE').value;
			// 	console.log($r);
			
		 });
				//Eliminar un a materia
			$(document).ready(function(){ $(document).on('click', '.delete_materia', function(){
              var id_delete=$(this).attr('id'); // this hace referencia al botón con la clase .edit
    			
    			 $ruta="id="+id_delete;
				console.log($ruta);
				 $.ajax({
				 	url:'delete_materiaD.php',
				 	type:'POST',
				 	data:$ruta,
				 })
				 .done(function(res) {	
				 	 $('#tabla_editarM').html(res);//Respuesta de la consulta 
					// function(){$('#tabla_editarM').load('tabla_editarMaterias.php');}
// 

				});

   			 });

		});
	</script>

</body>
</html>

