
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
	<title>Configuración</title>
</head>
<style>
    .conf{
        font-size:70px;
    }
    #us{
        color:#b10e09;
    }
    #car{
 color:#62a714;
    }
    #mat{
 color:#ff7900;
    }
    #gr{
 color:#712066;
    }
    #in{

    }
    #doc{
 color:#b10e09;
    }
    .conf:hover { color: white; } /* CSS link hover (green) */
</style>
<body>
	<?php
		include ('header.php');
	?>
	<div id="contenido" class=" container mt-2">
			<!-- contenido -->
				<div class="bg-light  m-2">
					<div class="justify-content-center text-center">
                        <h4 >Ajustes-Materias</h4>
                        <br>
                        <div class=" text-right mr-4" >
                        <!-- botones -->
							<div>
								<form>
									<div class="form-row">
									
										<div class="col-8">
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
										
										<button type="button" id="consultar" class="btn btn-outline-primary">Continuar</button>
									</div>
								</form>
							</div>
                        </div>
                        <div id="table_materias" class="text-left mt-2 mr-4 ml-4 mb-4">
					    </div>
                    </div>
				</div>
		</div>
	</div>
	<?php
		include('view_footer.php');
	?> 
<div>
	<form action="insertar_categoria.php" method="POST">
				<div class="modal fade" id="ModalAgregarMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar nueva materia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
						<label>
						Nombre de la materia
                        </label>
						<input class="form-control input-sm" name="categoria" type="text" required>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar
					</button>
					<button type="submit" class="btn btn-primary"  id="agregar_m">Aceptar
					</button>
				</div>
			</div>
		</div>
	</div>
    </form>
</div>
</div>
	<!-- Modal Editar Grupos -->
<div>
	<form action="insertar_materia.php" method="POST">
				<div class="modal fade" id="ModalEditarMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar materia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<input id="idCar" name="id" hidden="true">
						<label >  Nombre de la materia</label>
						<input type="text" id="idNom" name="categoria" class="form-control input-sm"  >
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar
					</button>
					<button type="submit" class="btn btn-primary"  id="agregar_m">Aceptar
					</button>
				</div>
			</div>
		</div>
	</div>
    </form>
</div>
</body>
	<script>
        	//Modal editar una categoria
		$('#ModalEditarMateria').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var id_c = button.data('id');
        var nom_cat = button.data('nombre');
        var modal = $(this)
        modal.find('.modal-title').text('Materia: ' +nom_cat);
        modal.find('.modal-body input#idCar').val(id_c); 
        modal.find('.modal-body input#idNom').val(nom_cat); 
    });
	$('#consultar').click(function(){
		//	var asigna=document.getElementById('pdf_asigna').;
			var	carrera=0;
			var semestre =0;
			var grupo=0;
			carrera=document.getElementById('Carrera').value;
			semestre =document.getElementById('Semestre').value;
			ruta="Car="+carrera+"&Sem="+semestre;
			console.log(ruta);
			$.ajax({
				url:'tabla_materias.php',
				type:'POST',
				data:ruta,
			}).done(function(res){
				$('#table_materias').html(res);
		});
			});
						
    </script>
</html>

