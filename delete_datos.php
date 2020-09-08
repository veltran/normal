<?php
	include 'conexion.php';

 	$id= $_POST['I'];
 	$bloque=$_POST['loc'];

echo "el id es =" .$id."   El bloque es a eliminar es = ".$bloque;
	if($bloque==0|| $bloque==""||$bloque==null){
		
	}
	else
	{
		
		$consulta= mysqli_query($sql,"SELECT horarios.id_horario from horarios,asigna_bloque_h where horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_asigna_bh=$bloque and horarios.id_asigna_m=$id ;");
	
		if (mysqli_num_rows($consulta)==0) {
			echo "El registro no existe o los parametros estan erroneos ";
		
		}else{
			echo "Si existe, a hora eliminalo..FROM.";
			$delete=mysqli_query($sql," DELETE  FROM horarios WHERE id_asigna_bh=$bloque AND horarios.id_asigna_m=$id; ");
			if(!$delete){
				echo "Error en query";

			}
			else{
				echo " <br>Se borro correctamente";
			}
		}

	}

?>