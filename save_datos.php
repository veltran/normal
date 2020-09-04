<?php
session_start();
$asigna_h=$_SESSION["asigna_h"];
$periodo=$_SESSION["idperiodo"];
	include 'conexion.php';
	$id= $_POST['I'];
	$bloque=$_POST['loc'];
	echo "id".$id ."id de bloque = ".$bloque;
				// comrobamos si en el bloque con respecto al horario "horario 1" ya hay un registro 
// 		$consulta= mysqli_query($sql,"SELECT horarios.id_asigna_bh as bloque,asigna_materias.id_asigna_h as
// 		 as_horaio,horarios.id_asigna_m ,asigna_materias.id_docente, horarios.id_aula,horarios.id_grupo from 
// 		 horarios,asigna_bloque_h,asigna_materias,docentes where horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and
// 		  asigna_bloque_h.id_asigna_bh=$bloque and horarios.id_asigna_m=asigna_materias.id_asigna_m and 
// 		  asigna_materias.id_asigna_h=$asigna_h AND asigna_materias.id_docente=docentes.id_docente 
// ");
				
	
//Docente n esta con una materia a la misma hora en este horario?
//si muestra mensaje "Docente tiene una materia a la misma hora"
//no Inserta materia.
//procedimiento: consulta materia de docente a la mima hora n
//if no hay registro {inserta}
//else {Docente ya tiene materia en esta hora} 

				//  corroboramos si el bloque coincide al periodo,carrera,semestre,grupo,grado
				$conDocente=mysqli_query($sql,"SELECT asigna_materias.id_docente AS doc FROM asigna_materias
				WHERE asigna_materias.id_asigna_m=$id ");
				while($row=mysqli_fetch_array($conDocente))
				{
				echo	$docente=$row["doc"];
				}

			//hacer una consulta para saber si el docente se encuemtra en algun otro horario a la misma hora
			$con_docente=mysqli_query($sql, "SELECT asigna_horario.id_periodo,asigna_materias.id_docente,docentes.nom_docente FROM 
			horarios,asigna_materias,asigna_horario,docentes WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m
			AND asigna_materias.id_asigna_h=asigna_horario.id_asigna_h AND asigna_materias.id_docente=docentes.id_docente
			AND asigna_horario.id_periodo=$periodo AND horarios.id_asigna_bh=$bloque AND asigna_materias.id_docente=$docente");

			if (mysqli_num_rows($con_docente)==0){
			$query=mysqli_query($sql,"INSERT INTO horarios (id_horario,id_asigna_m,id_aula,id_asigna_bh,id_grupo)values
			(null,$id,21,$bloque,260);");
				if(!$query){
				echo "Error en query";
				}
				else{
				Echo "Se inserto correctamente";
				}
				
		}else{
			echo "El docente ya tiene una materia a la misma hora ";
				
			//confirmamos que el docente no este ya en esta hora "bloque";)
			// while($row=mysqli_fetch_array($consulta))
			// {
			// 	$docente1=$row["id_docente"];
			// }
		}	
		//$con_docente=mysqli_query($sql,"SELECT ");
		//echo "Si existe, a hora actualizalo...";
		// 	$actualiza=mysqli_query($sql," UPDATE horarios set id_asigna_m=$id where id_asigna_bh=$bloque;");
		// 	if(!$actualiza){
		// 		echo "Error en query";
		// 	}
		// 	else{
		// 		echo " <br>Se actualizo correctamente";
		// 	}
		
 // 	$query=mysqli_query($sql,"INSERT INTO horarios (id_horario,id_asigna_m,id_aula,id_asigna_bh,id_grupo)values(null,$id,21,$bloque,260);");

?>
