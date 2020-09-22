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
                        <h4 >Ajustes-Grupos</h4>
                        <br>
                        <div class="text-right mr-4" >
                            <button class="btn btn-info" data-toggle="modal"data-target="#ModalAgregarGrupo">Agregar grupo</button>
                        </div>
                        <div class=" mt-2 mr-4 ml-4 mb-4">
				            <table class="table table-striped mr-4">
                            <thead class="bg-success text-white">
                                <tr>
                                    <td>Nombre del grupo</td>
                                    <td>Editar</td>                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php include 'conexion.php';
                                    $cueri=mysqli_query($sql,"SELECT * FROM grupos");
                                    while($row=mysqli_fetch_array($cueri)){
                                            $id_gru=$row['id_grupo'];
                                            $nom_g=$row['des_grupo'];
                                        ?>
                                        <tr>
                                            <td id="<?php echo $id_gru; ?>">
                                                <?php echo $nom_g;?>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-primary" 
                                                data-toggle="modal"
                                                data-target="#ModalEditarGrupo"
                                                data-id="<?php echo $id_gru; ?>"
                                                data-nombre="<?php echo $nom_g; ?>"
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
	<form action="insertar_grupo.php" method="POST">
				<div class="modal fade" id="ModalAgregarGrupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar nuevo grupo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
						
                        
						<label>
						Nombre del grupo
                        </label>
						<input class="form-control input-sm" name="grupo" type="text" required>
						
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
	<form action="insertar_grupo.php" method="POST">
				<div class="modal fade" id="ModalEditarGrupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar Grupo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<input id="idCar" name="id" hidden="true">
						<label >  Nombre del grupo </label>
						<input type="text" id="idNom" name="grupo" class="form-control input-sm"  >
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
        	//Modal editar una carrera
		$('#ModalEditarGrupo').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var id_gr = button.data('id');
        var nom_gr = button.data('nombre');
        var modal = $(this)
        modal.find('.modal-title').text('Grupo: ' +nom_gr);
        modal.find('.modal-body input#idCar').val(id_gr); 
        modal.find('.modal-body input#idNom').val(nom_gr); 
    });
    </script>
</html>

