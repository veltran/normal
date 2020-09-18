<?php
session_start();
$asigna_h=$_SESSION["asigna_h"];
$periodo=$_SESSION["idperiodo"];
$grupo=$_SESSION["grupo"];

	include 'conexion.php';
	$id= $_POST['I'];
	$bloque=$_POST['loc'];
				//  corroboramos si el bloque coincide al periodo,carrera,semestre,grupo,grado
				$conDocente=mysqli_query($sql,"SELECT asigna_materias.id_docente AS doc FROM asigna_materias
				WHERE asigna_materias.id_asigna_m=$id ");
				while($row=mysqli_fetch_array($conDocente))
				{
					$docente=$row["doc"];
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
				//Echo "Se inserto correctamente";
				$mate_horas=mysqli_query($sql,"SELECT * FROM horas_materias WHERE id_asigna_m=$id ");
					if(mysqli_num_rows($mate_horas)==0){
						$insertar=mysqli_query($sql,"INSERT INTO horas_materias (id_hora,id_asigna_m,tot_horas_as)VALUES(null,$id,0)");
						if(!$insertar){
							echo "Error en query";
						}
						else{
							echo "Se inserto correctamente";
						}
					}
					else{
						$con=mysqli_query($sql,"SELECT tot_horas_as FROM horas_materias WHERE id_asigna_m=$id");
						while ($row=mysqli_fetch_array($con)) {
							$hora=$row['tot_horas_as'];
						} 
						$contador=$hora+1;
						$actualizar=mysqli_query($sql,"UPDATE horas_materias SET tot_horas_as=$contador WHERE horas_materias.id_asigna_m = $id");
						if(!$actualizar){
							Echo "Error al actualizar";
						}
					}
				}
				
			}else{
				//echo  "El docente ya tiene una materia a la misma hora ";
				echo '<script language="javascript">alert("El docente ya tiene una materia a esta hora '; 
				echo  'Porfavor elija otra hora");</script>';
				
			}	
			

?>
