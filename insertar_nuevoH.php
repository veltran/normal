<?php 
session_start();
	include 'conexion.php';

	$_SESSION["idperiodo"]="";
	 $_SESSION["asigna_h"]="";

	$_SESSION["idperiodo"]=$Periodo=$_POST['Per'];
	$_SESSION["carrera"]=$Carrera=$_POST['Carr'];
	$_SESSION["semestre"]=$Semestre=$_POST['Sem'];
	$_SESSION["grupo"]=$Grupo=$_POST['Gr'];
	 
$consulta= mysqli_query($sql,"SELECT asigna_horario.id_asigna_h as id_ash from asigna_horario where asigna_horario.id_periodo=$Periodo and asigna_horario.id_carrera=$Carrera and asigna_horario.id_semestre=$Semestre;");
sleep(2);
if (mysqli_num_rows($consulta)==0) {
	$insertar=mysqli_query($sql,"INSERT INTO asigna_horario(id_asigna_h,id_periodo,id_carrera,id_semestre) VALUES (Null,'$Periodo','$Carrera','$Semestre') ");
	$res=mysqli_query($sql,$insertar);
	if (!$res) {
			echo "Fatal ";
			// $insertar=mysqli_query($sql,"INSERT INTO asigna_horario(id_asigna_h,id_periodo,id_carrera,id_semestre) VALUES (Null,'$Periodo','$Carrera','$Semestre') ");
			// $res=mysqli_query($sql,$insertar);
			// if (!$res) {
			// 	echo "Fatal ";
			// }
			// else{
			// 	echo "Exite";
			// }
	}
	else{
		//return 'true';
		echo "Exite";
	}
	
}else{
	while($row=mysqli_fetch_array($consulta)){
            $id=$row['id_ash'];
	} 
$_SESSION["asigna_h"]=$id; 
$id=""; 
	echo "Exite";
}
?>