<?php 
include 'conexion.php';

 ?>
<div>
	<table class="table table-condensed table-bordered table-hover" id="tmateria" >
 	<thead>
 		<tr>
 			<td>Materia</td>
 			<td>Semestre</td>
 			
 		</tr>
 	</thead>
 	<?php 
 		$consulta=mysqli_query($sql," SELECT materias.id_materia,materias.nom_materia,semestres.des_semestre as semestre from materias,semestres,carreras where materias.id_semestre=semestres.id_semestre and materias.id_carrera=carreras.id_carrera and carreras.id_carrera=32 ORDER BY materias.id_materia ASC;");
 	 ?>
	<tbody>
		<div>
			<?php foreach ($consulta as $key => $row) :?>
		<tr>
			<td><?php echo $row['nom_materia']; ?></td>
			<td><?php echo $row['semestre'] ?></td>
		</tr>
			<?php endforeach; ?>
		</div>
	</tbody>
 </table>
</div>
<script>
	$(document).ready(function(){
		$('#tmateria').DataTable();
	});
</script>
 