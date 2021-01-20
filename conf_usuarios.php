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
                        <h4 >Ajustes-Usuarios</h4>
                        <br>
                        <div class="text-right mr-4" >
                            <button class="btn btn-info" data-toggle="modal"data-target="#ModalAgregarUsuario">Agregar usuario</button>
                        </div>
                        <div class=" mt-2 mr-4 ml-4 mb-4">
				            <table class="table table-striped mr-4">
                            <thead class="bg-danger text-white">
                                <tr>
                                    <td>Nombre </td>
                                    <td>Editar</td>                                
                                    <td>Eliminar</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include 'conexion.php';
                                    $cueri=mysqli_query($sql,"SELECT * FROM usuarios");
                                    while($row=mysqli_fetch_array($cueri)){
                                            $id_us=$row['id_usu'];
                                            $nom_u=$row['usuario'];
                                            $pas=$row['passwor'];

                                        ?>
                                        <tr>
                                            <td id="<?php echo $id_us; ?>">
                                                <?php echo $nom_u;?>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-primary" 
                                                data-toggle="modal"
                                                data-target="#ModalEditarUsuario"
                                                data-id="<?php echo $id_us; ?>"
                                                data-nombre="<?php echo $nom_u; ?>"
                                                data-pas="<?php echo $pas; ?>"
                                                >
                                                    <i class="far fa-edit"></i>
                                                
                                                </button>
                                            </td>
                                            <td>
                                                <button  class="btn btn-outline-danger" data-toggle="modal"
                                                data-target="#ModalEliminarUsuario"
                                                data-idel="<?php echo $id_us; ?>"
                                                data-nombreel="<?php echo $nom_u; ?>">
                                                    <i class="fas fa-user-times" ></i>
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
<!-- modal Agregar usuario -->
	<form action="agregar_usuario.php" method="POST">
				<div class="modal fade" id="ModalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar nuevo Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
                    <input id="idUs" name="id" hidden="true">
                            <label >  Nombre del usuario </label>
                            <input type="text" id="idNom" name="usuario" class="form-control input-sm">
                            <label>Nuevo password</label>
                    <input type="password" id="idPass" name="pasword" class="form-control input-sm">			
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">	    Cancelar					</button>
					<button type="submit" class="btn btn-primary"  id="agregar_m">Aceptar
					</button>
				</div>
			</div>
		</div>
	</div>

    </form>
</div>

	<!-- Modal eliminar Usuario -->
    <div>
	<form action="aconf_usuario_del.php" method="POST">
				<div class="modal fade" id="ModalEliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Desea eliminar:</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<input id="idEl" name="id" hidden="true">
						<label >  Nombre del usuario </label>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar
					</button>
					<button type="submit" class="btn btn-primary"  id="">Aceptar
					</button>
				</div>
			</div>
		</div>
	</div>
    </form>
</div>
	<!-- Modal editar Usuario -->
<div>
	<form action="actualizar_usuario.php" method="POST">
				<div class="modal fade" id="ModalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
                <div class="modal-body">
						<input id="idUs" name="id" hidden="true">
						<label >  Nombre del usuario </label>
						<input type="text" id="idNom" name="usuario" class="form-control input-sm">
                        <label>Nuevo password</label>
						<input type="password" id="idPass" name="pasword" class="form-control input-sm">
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
        	//Modal editar una Usuario
		$('#ModalEditarUsuario').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var id_gr = button.data('id');
        var nom_gr = button.data('nombre');
        var pass =button.data('pas');
        var modal = $(this)
        modal.find('.modal-title').text('Usuario: ' +nom_gr);
        modal.find('.modal-body input#idUs').val(id_gr); 
        modal.find('.modal-body input#idNom').val(nom_gr); 
        //modal.find('.modal-body input#idPass').val(pass);
    });
        	//Modal eliminar usuario
		$('#ModalEliminarUsuario').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget);
        var id_gr = button.data('idel');
        var nom_gr = button.data('nombreel');
        var modal = $(this)
        modal.find('.modal-title').text('Desea eliminar a : ' +nom_gr+'?');
        modal.find('.modal-body input#idEl').val(id_gr); 
        modal.find('.modal-body input#idnom').val(nom_gr); 
    });
      
    </script>
 
</html>

