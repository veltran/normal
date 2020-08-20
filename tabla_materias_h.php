<?php 
include 'conexion.php';
 ?>

 <table class="table  table-hover">
 	<thead >
 		<tr>
 			<td>MATERIAS</td>
 		</tr>
 	</thead>
 	<tbody>
 		<?php 
 		$consulta="SELECT materias.nom_materia AS nombre FROM materias,semestres,carreras WHERE materias.id_carrera=carreras.id_carrera AND materias.id_semestre=semestres.id_semestre AND carreras.id_carrera=31 AND semestres.id_semestre=11;";
 		$con=mysqli_query($sql,$consulta);
 		 ?>
		
			<?php 
			foreach ($con as $key => $row):?>
		<div>
			<tr >
				<td  >
					<div  class="redips-drag " >
					<?php echo $row['nombre']; ?>
					</div>
				</td>
			</tr>
			
		</div>
			<?php endforeach; ?>
 	</tbody>
 </table>