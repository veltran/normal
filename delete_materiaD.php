<?php 
	include ('conexion.php');

	$id=$_POST['id'];


		$delete=mysqli_query($sql," DELETE  FROM asigna_materias WHERE asigna_materias.id_asigna_m=$id;");
			if(!$delete){
				echo "Error en query";

			}
			else{
			echo'<script type="text/javascript">
    				alert("Materia eliminada");
    				Materia eliminada
    			</script>';
				}
 ?>	