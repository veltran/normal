<div class="row">
	<div class="col-sm-12">
		<table class="table table-hover table-condensed table-bordered">
			<thead style="background-color: #007bff; color:white; font-weight: bold;">
			<tr>
				<td>#</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Apellido m</td>
				<td>Perfil</td>
				<td>Eliminar</td>
			</tr>
			</thead>
			<?php
				include('conexion.php');
				$result=mysqli_query($sql," SELECT asigna_plantillas.id_docente,nom_docente,ap_paterno,ap_materno,des_plantilla FROM asigna_plantillas,docentes,plantillas,asigna_horario WHERE asigna_plantillas.id_docente=docentes.id_docente and asigna_plantillas.id_plantilla=plantillas.id_plantilla  and asigna_plantillas.id_asigna_h=12 and asigna_plantillas.id_plantilla=14");
			?>
			<?php foreach ($result as $key => $row) : ?>
			<tr>
				<td><?php echo $row['id_docente'];?></td>
				<td><?php echo $row['nom_docente'];?></td>
				<td><?php echo $row['ap_paterno'];?></td>
				<td><?php echo $row['ap_materno'];?></td>
				<td><?php echo $row['des_plantilla'];?></td>
				<td style="text-align:  center;">
					Eliminar
				</td>
				
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>