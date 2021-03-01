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

<body>
	<?php
		include ('header.php');
	?>
	<div id="contenido" class=" container mt-2">
			<!-- contenido -->
				<div class="bg-light  m-2">
					<div class="justify-content-center text-center">
                        <h4 >Ajustes-Info</h4>
                        <br>
                        
                        <div class=" mt-2 mr-4 ml-4 mb-4">
				            <dir id="tabla_info_horarios">
				            	
				            </dir>
					    </div>
                        </div>
				</div>
		</div>
	</div>
		
	<!-- <?php
		include('view_footer.php');
	?> -->
<div>
	<form action="editar_info.php" method="POST">
				<div class="modal fade" id="ModalEditarInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar carrera</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<input id="id" name="id" type="text" hidden="true">
						<label  for=""   >
							Titulo
                        </label>
						<input id="tit" name="tit" class="form-control input-sm"  type="text" required>
						<label >Nombre de encargado</label>
						<input id="nom" name="nom" class="form-control input-sm" type="text" required>
						<label for="">Descripción</label>
						<input id="desc" name="desc" class="form-control input-sm" type="text" required>
						
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
</div>

</body>
	<script>
		$(document).ready(function(){
			$('#tabla_info_horarios').load('tabla_info_horarios.php');
		});
        	//Modal editar una carrera
		$('#ModalEditarInfo').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var id= button.data('id');
		var titulo=button.data('titulo');
        var nom = button.data('nombre');
		var desc=button.data('desc');
        var modal = $(this)
        modal.find('.modal-title').text('Editar información '+titulo );
        modal.find('.modal-body input#id').val(id); 
		modal.find('.modal-body input#tit').val(titulo);
		modal.find('.modal-body input#nom').val(nom);
		modal.find('.modal-body input#desc').val(desc);
    });
    </script>
</html>

