<?php 


// $plantilla=$_POST['Plantilla'];
?>
<div class="row">
	<div class="col-sm-12">
		<table id="tDocentes" class="table table-hover table-condensed table-bordered">
			<thead style="background-color:#007bff ; color:white; font-weight: bold;">
			<tr>
				<!-- <td>#</td> -->
				<td>Nombre</td>
				<td>Apellido paterno</td>
				<td>Apellido materno</td>
				<td>Perfil profecional</td>
				<td>Total horas </td>
				<td>Agregar Materia</td>
				<td>Editar</td>

			</tr>
			</thead>
			<?php
				include('conexion.php');
				

				$result=mysqli_query($sql,"SELECT DISTINCT docentes.id_docente,docentes.nom_docente,docentes.ap_paterno,docentes.ap_materno,perfiles.des_perfil,docentes.tot_horas_clase from docentes,plantillas,perfiles where  docentes.id_perfil=perfiles.id_perfil");
			?>
			<?php foreach ($result as $key => $row) : ?>
			<tr>
				<!-- <td><?php //echo $row['id_docente'];?></td> -->
				<td><?php echo $row['nom_docente'];?></td>
				<td><?php echo $row['ap_paterno'];?></td>
				<td><?php echo $row['ap_materno'];?></td>
				<td><?php echo $row['des_perfil'];?></td>
				<td><?php echo $row['tot_horas_clase'];?></td>
				<td> <a type="button" class="btn btn-primary " 

						data-toggle="modal"
						data-target="#ModalAgregarMateria"

						data-id="<?php echo $row['id_docente']; ?>" 
						data-nombre="<?php echo $row['nom_docente']; ?>"
						data-ap="<?php echo $row['ap_paterno']; ?>"
						data-materno="<?php echo $row['ap_materno']; ?>"
						data-horaClase="<?php echo $row['tot_horas_clase']; ?>"
						data-perfil="<?php echo $row['des_perfil']; ?>"
					>Materia

				</a> </td>
				<td style="text-align:  center;">
					<a type="button" class="btn btn-warning editar_btn" id="<?php echo $row['id_docente'] ?>"
					data-toggle="modal"
					data-target="#ModalEditarMateria"
					
						data-id="<?php echo $row['id_docente']; ?>"
						data-nombre="<?php echo $row['nom_docente']; ?>"
						data-ap="<?php echo $row['ap_paterno']; ?>"
						data-materno="<?php echo $row['ap_materno']; ?>"
						data-horaClase="<?php echo $row['tot_horas_clase']; ?>"
						data-perfil="<?php echo $row['des_perfil']; ?>"

					>Editar</a>
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