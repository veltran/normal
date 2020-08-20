<?php 
	session_start();
	$nombre=$_SESSION["usuario"];
	
	if($nombre== null || $nombre==''){
		
		header("location:index.php");

	}

 ?>							<!DOCTYPE html>
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
		<link rel="stylesheet" href="librerias/datatable/dataTables.bootstrap4.min.css">
		
</head>
<body>
	<?php
		include ('header.php');
	?>
	
			<div class="mt-2">
			<!--Menú orizontal -->
			<div class="col-12" id="Principal">
				<div class="row">
				
					<div id="contenido" class="container-fluid ">
						<div class="row ml-1 "><!-- contenedor -->
							<div class=" container col-12 bg-light  ">
								<!-- contenido -->
								<div class="text-center ">
									<h3>Armar plantilla Docente</h3>
								</div>
								<div class="form-group row pt-4">
								
										<label class="col-sm-2 control-label" for="">Nombre de la plantilla
									</label>
									<input class="col-sm-3 form-control	"type="text" id="descripcion" required>
									<button class="btn col-sm-1 btn-primary pl-1 ml-4" data-toggle="modal"  id="Enviar" required>Crear  <i class="fa fa-plus-circle " required></i></button> x
								
								
									
								</div>
									<div class="col-12 pt-4">
										<div class="row">
											<div class="col-6">
												<h4>Plantilla </h4>
												<div>
													<table class="table table-hover table-condensed table-bordered ">
														<thead class="bg-primary text-white">
															<tr>
																<td>#</td>
																<td>Docente </td>
																<td>Eliminar</td>

															</tr>
														</thead>
														<tbody  >
															<tr   height="70 px">
																<td>1</td>
																<td id="contenedor"></td>
																<td class="text-center"><button id="btn_eliminar" onClick="eliminar();" class="btn btn-danger">Eliminar</button> </td>
															</tr>
															<tr   height="70 px">
																<td>2</td>
																<td id="contenedor2"></td>
																<td class="text-center">
																	<button id="btn_eliminar" class="btn btn-danger" onClick="eliminar();">Eliminar</button>
																 </td>
															</tr>
															<tr  height="70 px">
																<td>3</td>
																<td id="contenedor3" ></td>
																<td class="text-center"><button class="btn btn-danger" onClick="eliminar();">Eliminar</button> </td>
															</tr>
															<tr  height="70 px">
																<td>4</td>
																<td id="contenedor4" ></td>
																<td class="text-center"><button class="btn btn-danger">Eliminar</button> </td>
															</tr >
															<tr height="70 px">
																<td>5</td>
																<td id="contenedor5"></td>
																<td class="text-center"><button class="btn btn-danger">Eliminar</button> </td>
															</tr>
															<tr height="70 px">
																<td>6</td>
																<td id="contenedor6" ></td>
																<td class="text-center"><button class="btn btn-danger">Eliminar</button> </td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="col-6">
												<h4>Docentes</h4><!-- tabla docentes -->
												<div id="tabla_armarP">

													

												</div>
											</div>

										</div>
										

									</div>
								<div class="text-right">
									<button type="button" class="btn btn-danger mr-5">Cancelar</button>	
									<button class="btn mr-5"><a href="view_agregarMaterias.php" type="btn "< class="btn btn-primary">Guardar</a></button>
								</div>
								
							</div>
					
						</div>
						
					</div>
				</div>
			</div>
		</div>
			<!-- Modal agregar -->
<form id="frmnuevo">
	<div class="modal fade" id="modal_nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar docente</h5>
				
				</div>
				<div class="modal-body">
					
						<!-- <input type="text" hidden="" id="idDoc" name="idDoc"> -->
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nom" required>
						
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" id="btnGuardar">Aceptar</button>
				</div>
			</div>
		</div>
	</div>
	</form>
	
		<div id="respuesta">
			
		</div>

	<?php
		include('view_footer.php');
	?>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="librerias/datatable/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="librerias/datatable/dataTables.bootstrap4.min.js"></script>

	<script>
		$('#tabla_armarP').load('tabla_docentesP.php');
		$('#Enviar').click(function(){
			var Nombre=document.getElementById('descripcion').value;
			var ruta='Nom='+Nombre;
			console.log(ruta);
			$.ajax({
				url:'insertar_plantilla.php',
				type:'POST',
				data:ruta,
			}).done(function(res){
				$('#respuesta').html(res);
			});
			//$('#tabla_armarP').load('tabla_docentesP.php');
		});

	</script>

	<script>

		
		function iniciar() {
			var contenedor;
			var docente;
			var contenedor = document.getElementById('contenedor');
			var contenedor2 = document.getElementById('contenedor2');
			var contenedor3 = document.getElementById('contenedor3');
			var contenedor4 = document.getElementById('contenedor4');
			var contenedor5 = document.getElementById('contenedor5');
			var contenedor6 = document.getElementById('contenedor6');

			var origen = document.getElementsByClassName('arrastrar');
			origen=addEventListener('dragstart',dragIniciado,false);
		   origen=addEventListener('dragend',dragFinalizado,false);
		    contenedor.addEventListener('dragenter',
		    	function(e){e.preventDefault();},false);
		    contenedor.addEventListener('dragover',dragSobreConten,false);
		    contenedor.addEventListener('dragleave',dragSaliendoConten,false);
		    contenedor.addEventListener('drop',soltado,false);

		    contenedor2.addEventListener('dragover',dragSobreConten,false);
		    contenedor2.addEventListener('dragleave',dragSaliendoConten,false);
		    contenedor2.addEventListener('drop',soltado,false);

		    contenedor3.addEventListener('dragover',dragSobreConten,false);
		    contenedor3.addEventListener('dragleave',dragSaliendoConten,false);
		    contenedor3.addEventListener('drop',soltado,false);

		     contenedor4.addEventListener('dragover',dragSobreConten,false);
		    contenedor4.addEventListener('dragleave',dragSaliendoConten,false);
		    contenedor4.addEventListener('drop',soltado,false);

		    contenedor5.addEventListener('dragover',dragSobreConten,false);
		    contenedor5.addEventListener('dragleave',dragSaliendoConten,false);
		    contenedor5.addEventListener('drop',soltado,false);

		    contenedor6.addEventListener('dragover',dragSobreConten,false);
		    contenedor6.addEventListener('dragleave',dragSaliendoConten,false);
		    contenedor6.addEventListener('drop',soltado,false);
		}
		function dragIniciado(e){
			var dato=e.target.id;
			e.dataTransfer.setData('Text/plain',dato);
		}
		function dragSobreConten(e) {
			 e.preventDefault();
		    this.style.background = 'rgba(81, 189, 200, 0.58) ';
		}
		function dragSaliendoConten(e) { 
			e.preventDefault();
		   this.style.background = '#f8f9fa';
		}

		function dragFinalizado(e) { 
			e.preventDefault();
			elemento = e.target;
		}
		function arrastrado(e) { 
		}
		function soltado(e) { 
			e.preventDefault();
		    this.style.background = '#f8f9fa';
		    var dato= e.dataTransfer.getData('Text');
		    this.innerHTML=dato;
		    var ruta="Dato="+dato;
		    console.log(ruta);
			   	$.ajax({
			   		url:'tabla_nuevaP.php',
			   		type:'POST',
			   		data:ruta,		   
			   	}).done(function(res){
			   		console.log("exitoso");
				elemento.style.visibility = 'hidden';
			   	});
		} 
		function eliminar(e){
			var t=document.getElementById('contenedor');
			t.style.visibility='hidden ';
		}
		window.addEventListener('load', iniciar, false);
	</script>
	
</body>
</html>

	