
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
                        <div class="text-right mr-4" >
                        <!-- botones -->
                            <button class="btn btn-info" data-toggle="modal"data-target="#ModalAgregarCategoria">Agregar categoria</button>
                        </div>
                        <div class=" mt-2 mr-4 ml-4 mb-4">
				            <table class="table table-striped mr-4">
                            <thead class="bg-success text-white">
                                <tr>
                                    <td>Nombre de categoria</td>
                                    <td>Editar</td>                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php include 'conexion.php';
                                    $cueri=mysqli_query($sql,"SELECT * FROM materias");
                                    while($row=mysqli_fetch_array($cueri)){
                                            $id_cat=$row['id_materia'];
                                            $nom_cat=$row['nom_materia'];
                                        ?>
                                        <tr>
                                            <td id="<?php echo $id_materia; ?>">
                                                <?php echo $nom_materia;?>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-primary" 
                                                data-toggle="modal"
                                                data-target="#ModalEditarCategoria"
                                                data-id="<?php echo $id_materia; ?>"
                                                data-nombre="<?php echo $nom_materia; ?>"
                                                >
                                                    <i class="far fa-edit"></i>
                                                
                                                </button>
                                            </td>
                                        </tr>      
                                        <?php     
                                    }
                                ?>
                            </tbody>
                            </table>
					    </div>
                        </div>
				</div>
		</div>
	</div>
		
	<!-- <?php
		include('view_footer.php');
	?> -->
<div>
	<form action="insertar_categoria.php" method="POST">
				<div class="modal fade" id="ModalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar nueva categoria</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
						
                        
						<label>
						Nombre de la categoria
                        </label>
						<input class="form-control input-sm" name="categoria" type="text" required>
						
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
	<!-- Modal Editar Grupos -->
<div>
	<form action="insertar_categoria.php" method="POST">
				<div class="modal fade" id="ModalEditarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar categoria</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<input id="idCar" name="id" hidden="true">
						<label >  Nombre de la categoria </label>
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
		$('#ModalEditarCategoria').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var id_c = button.data('id');
        var nom_cat = button.data('nombre');
        var modal = $(this)
        modal.find('.modal-title').text('Grupo: ' +nom_cat);
        modal.find('.modal-body input#idCar').val(id_c); 
        modal.find('.modal-body input#idNom').val(nom_cat); 
    });
    </script>
</html>

