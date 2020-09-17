<?php 
session_start();
	include "conexion.php";

	$Po=$_SESSION["idperiodo"];
	$Ca=$_SESSION["carrera"];
	$Se=$_SESSION["semestre"];
	$Gr=$_SESSION['grupo'];

	$idmateria=$_POST['id_materia'];
	$iddocente=$_POST['id_docente'];
	
	$consulta=mysqli_query($sql," SELECT id_asigna_h FROM asigna_horario where asigna_horario.id_periodo=$Po and asigna_horario.id_carrera=$Ca and asigna_horario.id_semestre=$Se ");
	if(mysqli_num_rows($consulta)==0){
		
	}else{
		while($row=mysqli_fetch_array($consulta)){
			$id=$row['id_asigna_h'];
		}
		$cueri= mysqli_query($sql,"SELECT asigna_materias.id_asigna_m FROM asigna_materias WHERE asigna_materias.id_materia=$idmateria AND id_docente=$iddocente AND id_asigna_h=$id AND id_grupo=$Gr"); 
		if(mysqli_num_rows($cueri)){
			echo'<script type="text/javascript">
			alert("La materia ya ha sido asignada a este docente anteriormente");
			window.location.href="view_agregarMaterias.php";
			</script>';
			
		}
		else{
				
			$conDoc= mysqli_query($sql,"SELECT docentes.nom_docente AS ndoc,docentes.ap_paterno AS apdoc,docentes.ap_materno AS amdoc FROM asigna_materias,docentes WHERE asigna_materias.id_docente=docentes.id_docente AND asigna_materias.id_materia=$idmateria AND id_asigna_h=$id AND id_grupo=$Gr"); 
			if(mysqli_num_rows($conDoc)==0){
					$insertar=mysqli_query($sql,"INSERT INTO asigna_materias (id_asigna_m, id_materia, id_docente,id_asigna_h,id_grupo) VALUES (NULL, '$idmateria', '$iddocente',$id ,'$Gr');");
				if(!$insertar){
					echo "Error en consulta";
				}
				else{
					echo "Materia agregada con exito.";
					header ('location:view_agregarMaterias.php');
				}
			}else{
				while($row=mysqli_fetch_array($conDoc)){
					$nomD=$row['ndoc'];
					$apD=$row['apdoc'];
					$amD=$row['amdoc'];
				}
				echo '<script language="javascript">alert("';

					echo "El docente ".$nomD." ".$apD." ".$amD."  ya tiene esta materia ";

					echo '");window.location.href="view_agregarMaterias.php";</script>';
				// $insertar=mysqli_query($sql,"INSERT INTO asigna_materias (id_asigna_m, id_materia, id_docente,id_asigna_h,id_grupo) VALUES (NULL, '$idmateria', '$iddocente',$id ,'$Gr');");
				// if(!$insertar){
				// 	echo "Error en consulta";
				// }
				// else{
				// 	echo "Materia agregada con exito.";
				// 	header ('location:view_agregarMaterias.php');
				// }

			}
			
		}
	}
	
	



 ?>