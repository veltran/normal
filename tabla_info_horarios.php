<?php 
	include ('conexion.php');
 ?>
<table class="table table-striped mr-4">
	<thead class="bg-primary text-white">
	    <tr>
	        <td>Número</td>
	        <td>Período</td>
	        <td>Carrera</td>    
	        <td>Semestre</td>
	        <td>Descripción</td>
	        <!--<td>Editar</td>-->
	    </tr>
	</thead>
	
	<tbody>
		<?php 
			$qr = mysqli_query($sql,"SELECT id_asigna_h as id, periodos.des_periodo as periodo,carreras.nom_carrera as carrera, semestres.des_semestre as semestre, asigna_horario.titulo_horario FROM periodos,carreras,semestres,asigna_horario WHERE periodos.id_periodo=asigna_horario.id_periodo AND carreras.id_carrera=asigna_horario.id_carrera AND semestres.id_semestre=asigna_horario.id_semestre ");
	 
		?>
		<?php foreach ($qr as $key => $row) : ?>
			<tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['periodo'];?></td>
				<td><?php echo $row['carrera'];?></td>
				<td><?php echo $row['semestre'];?></td>
				<td><?php echo $row['titulo_horario'];?></td>
				<!--<td style="text-align:  center;">
					<div>
						<a type="button" class="btn btn-outline-info" 
						
					>Editar
 
				</a>
					</div>
				</td>-->
				
			</tr>
			<?php endforeach; ?>
	      
	</tbody>
</table>						