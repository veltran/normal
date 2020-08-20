<?php 
session_start();
	include "conexion.php";

	$Po=$_SESSION["idperiodo"];
	$Ca=$_SESSION["carrera"];
	$Se=$_SESSION["semestre"];

	$idmateria=$_POST['id_materia'];
	$iddocente=$_POST['id_docente'];
	
		
	

	$consulta=mysqli_query($sql," SELECT id_asigna_h FROM asigna_horario  asigna_horario where asigna_horario.id_periodo=$Po and asigna_horario.id_carrera=$Ca and asigna_horario.id_semestre=$Se;");
	;
	while($row=mysqli_fetch_array($consulta)){
		$id=$row['id_asigna_h'];
	}
	
	
	$insertar=mysqli_query($sql,"INSERT INTO `asigna_materias` (`id_asigna_m`, `id_materia`, `id_docente`, `id_asigna_p`, `id_asigna_h`) VALUES (NULL, '$idmateria', '$iddocente', NULL, $id)");
		if(!$insertar){
			echo "Error en consulta";
		}
		else{
			echo "Materia agregada con exito.";
			header ('location:view_agregarMaterias.php');
		}

		



 ?>