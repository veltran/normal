<?php 
	include ('conexion.php');

	$id=$_POST['id'];


		$delete=mysqli_query($sql," DELETE  FROM asigna_materias WHERE asigna_materias.id_asigna_m=$id;");
			if(!$delete){
				echo "Aviso la materia que desea eliminar ya ha sido agregada a un horario.<br> Se recomienda eliminarla antes de prosegir. ";
			}
			else{
			echo'<script type="text/javascript">
    				alert("Materia eliminada");
    				Materia eliminada
    			</script>';
				}
 ?>	