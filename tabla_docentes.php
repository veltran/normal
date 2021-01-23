<div class="row">
	<div class="col-sm-12">
		<table id="tDocentes" class="table table-striped table-bordered">
			<thead style="background-color: #007bff; color:white; font-weight: bold;">
			<tr>
				<td>Nombre</td>
				<td>Apellido paterno</td>
				<td>Apellido materno</td>
				<td>Perfil profecional</td>
				<td>Categoria</td>
				<td>Estado </td>
				<td>Editar</td>
			</tr>
			</thead>
			<?php
				include('conexion.php');
				$result=mysqli_query($sql,"SELECT id_docente,nom_docente,ap_paterno,ap_materno,des_perfil,des_cat,des_estado,docentes.id_perfil as id_perfil,docentes.id_cat as id_cat,docentes.id_estado as id_estado from docentes,perfiles,categorias,estados where docentes.id_perfil=perfiles.id_perfil and docentes.id_cat=categorias.id_cat and docentes.id_estado=estados.id_estado;");
			?>
			<?php foreach ($result as $key => $row) : ?>
			<tr>
				<td><?php echo $row['nom_docente'];?></td>
				<td><?php echo $row['ap_paterno'];?></td>
				<td><?php echo $row['ap_materno'];?></td>
				<td><?php echo $row['des_perfil'];?></td>
				<td><?php echo $row['des_cat'];?></td>
				<td><?php echo $row['des_estado'];?></td>
				<td style="text-align:  center;">
						<button id="" class="btn bg-success btn-xm" 
								data-toggle="modal"
								data-target="#ModalEditarDocente"
									data-id="<?php echo $row['id_docente']; ?>"
									data-nombre="<?php echo $row['nom_docente']; ?>"
									data-ap="<?php echo $row['ap_paterno']; ?>"
									data-materno="<?php echo $row['ap_materno']; ?>"
									data-perfil="<?php echo $row['id_perfil']; ?>"
									data-cat="<?php echo $row['id_cat']; ?>"
									data-estado="<?php echo $row['id_estado']; ?>"
																>
							<i class="far fa-edit  text-white"></i>
						</button>	
				</td>
				
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#tDocentes').DataTable();
	});
</script>