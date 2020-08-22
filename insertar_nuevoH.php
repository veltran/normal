<?php 
session_start();
	include 'conexion.php';

	$_SESSION["idperiodo"]="";
	 $_SESSION["asigna_h"]="";

	$_SESSION["idperiodo"]=$Periodo=$_POST['Per'];
	$_SESSION["carrera"]=$Carrera=$_POST['Carr'];
	$_SESSION["semestre"]=$Semestre=$_POST['Sem'];
 
$consulta= mysqli_query($sql,"SELECT asigna_horario.id_asigna_h as id_ash from asigna_horario where asigna_horario.id_periodo=$Periodo and asigna_horario.id_carrera=$Carrera and asigna_horario.id_semestre=$Semestre;");
while($row=mysqli_fetch_array($consulta)){
            $id=$row['id_ash'];
	  } 
	
$_SESSION["asigna_h"]=$id; 
$id="";  
if (mysqli_num_rows($consulta)==0) {

	$insertar=mysqli_query($sql,"INSERT INTO asigna_horario(id_asigna_h,id_periodo,id_carrera,id_semestre) VALUES (Null,'$Periodo','$Carrera','$Semestre') ");

	 $res=mysqli_query($sql,$insertar);
	 if (!$res) {
	 		echo "Fatal ";
	 }
	 else{
	 	echo "X)";
	 }
	
}else
{
	echo "Ya existe";
	// $actualiza=mysqli_query($sql," UPDATE asigna_horario set id_periodo=$Periodo, id_carrera=$Carrera,id_semestre=$Semestre   where id_asigna_bh=$id_ash;");
	// if(!$actualiza){
	// 			echo "Error en query";

	// 		}
	// 		else{
	// 			echo " <br>Se actualizo correctamente";
	// 		}
}



 ?>