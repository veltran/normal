<?php 
 include 'conexion.php';
 session_start();
 $asi=0;
 $asi=$_SESSION["asigna_h"];
 $id_gr=$_SESSION["grupo"];
  ?>
<table class="table  table-striped table-hover thead-light">
	<thead class="">
		<tr>
			<td>Semestre</td>
			<td>Materia (s)</td>
			<td>Total de Horas</td>
			<td>Eliminar</td>
		</tr>
	</thead>
	<tbody>
			<?php				
					$id = $_POST['id'];
					$consulta=mysqli_query($sql,"SELECT asigna_materias.id_asigna_m AS id_asigna, semestres.des_semestre as semestre, materias.nom_materia AS nom_materia, materias.tot_horas AS horas FROM asigna_materias,materias,docentes,semestres WHERE semestres.id_semestre=materias.id_semestre AND asigna_materias.id_materia=materias.id_materia AND 
					asigna_materias.id_docente=docentes.id_docente AND asigna_materias.id_docente=$id AND 
					asigna_materias.id_asigna_h=$asi AND asigna_materias.id_grupo=$id_gr");
					if(!$consulta)
					{
						echo "Reintentar";
						return $ban=true;
					}
				while($row=mysqli_fetch_array($consulta)){
					$id=$row["id_asigna"];
					$semestre=$row['semestre'];
					$materia=$row['nom_materia'];
					$materia=$row['horas'];
	 		?>
	 		<tr>
	 			 <!-- <td><?php //echo $id;?></td> -->
				<td><?php echo $row["semestre"]; ?></td>
				<td><?php echo $row["nom_materia"];?></td>
				<td><?php echo $row["horas"]; ?></td>
				<td >
					<button type="button" id="<?php echo $row["id_asigna"]; ?>" class="btn btn-outline-danger btn-xs delete_materia">Delete</button></td>
		 </tr>
			<?php  
				}
			?>
	</tbody>
</table>