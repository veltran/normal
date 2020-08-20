<?php
	include 'conexion.php';

 	$id= $_POST['I'];
 	$bloque=$_POST['loc'];

echo "el id es =" .$id."El bloque es a eliminar es = ".$bloque;

	$consulta= mysqli_query($sql,"SELECT horarios.id_asigna_bh from horarios,asigna_bloque_h where horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_asigna_bh=$bloque;");

		if (mysqli_num_rows($consulta)==0) {
			
		 	echo "No existe, Puede insertar id";
				$query=mysqli_query($sql,"INSERT INTO horarios (id_horario,id_asigna_m,id_aula,id_asigna_bh,id_grupo)values(null,$id,21,$bloque,260);");

				 if(!$query){
					echo "Error en query";
				}
				else{
					Echo "Se inserto correctamente";
				}
		}else{
			echo "Si existe, a hora eliminalo..FROM.";
			$delete=mysqli_query($sql," DELETE  FROM horarios WHERE id_asigna_bh=$bloque;");
			if(!$delete){
				echo "Error en query";

			}
			else{
				echo " <br>Se borro correctamente";
			}
		}


?>