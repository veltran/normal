<?php 
	include ('conexion.php');

	 $doc=$_POST['idDocU'];	
	 $nombre=$_POST['nomU'];
	 $ap=$_POST['apPaternoU'];
	 $materno=$_POST['apMaternoU'];
	 $perfil=$_POST['perfilU'];
	 $categoria=$_POST['categoriaU'];
	 $estado=$_POST['estadoU'];
echo $estado; 	 
 	$editar = "UPDATE docentes SET nom_docente='$nombre',
									ap_paterno='$ap',
 									ap_materno='$materno',
 									id_perfil=$perfil,
 									id_cat=$categoria,
 									tot_horas_clase=20,
 									id_estado=$estado
 								
 							  WHERE id_docente='$doc'";
 							  echo $editar;

 	$resultado = mysqli_query($sql,$editar);
 	//var_dump($resultado);

 	if (!$resultado) {
 		echo "Error en query";
 	}
 	else{
 		//alertify.success("Eliminado con exito !");
 		header("location:view_docentes.php");
 	}
 ?>