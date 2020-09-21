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
                        <h4 >Ajustes-Carreras</h4>
                        <br>
                        <div class="text-right mr-4" >
                            <button class="btn btn-info" data-toggle="modal"data-target="#ModalAgregarCarrera">Agregar carrera</button>
                        </div>
                        <div class=" mt-2 mr-4 ml-4 mb-4">
				            <table class="table table-striped mr-4">
                            <thead class="bg-success text-white">
                                <tr>
                                    <td>Nombre de la carrera</td>
                                    <td>Editar</td>                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php include 'conexion.php';
                                    $cueri=mysqli_query($sql,"SELECT * FROM carreras");
                                    while($row=mysqli_fetch_array($cueri)){
                                            $id_car=$row['id_carrera'];
                                            $nom_c=$row['nom_carrera'];
                                        ?>
                                        <tr>
                                            <td id="<?php echo $id_c; ?>">
                                                <?php echo $nom_c;?>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-primary" 
                                                data-toggle="modal"
                                                data-target="#ModalEditarCarreras"
                                                data-id="<?php echo $id_car; ?>"
                                                data-nombre="<?php echo $nom_c; ?>"
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
	<form action="insertar_carrera.php" method="POST">
				<div class="modal fade" id="ModalAgregarCarrera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar carrera</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
						
                        
						<label id="nombreU" name="nombre" for=""   class="form-control input-sm"  >
						Nombre de la carrera
                        </label>
						<input class="form-control input-sm" name="name" type="text" required>
						
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
	<!-- Modal Editar Carreras -->
<div>
	<form action="insertar_carrera.php" method="POST">
				<div class="modal fade" id="ModalEditarCarreras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar carrera</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<input id="idCar" name="id" hidden="true">
						<label >  Nombre de carrera </label>
						<input type="text" id="idNom" name="name" class="form-control input-sm"  >
                        <label id="idNom"for=""></label>
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
		$('#ModalEditarCarreras').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var id_doc = button.data('id');
        var nom_car = button.data('nombre');
        var modal = $(this)
        modal.find('.modal-title').text('Carrera: ' +nom_car);
        modal.find('.modal-body input#idCar').val(id_doc); 
    });
    </script>
</html>

