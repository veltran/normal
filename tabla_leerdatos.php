	<?php 	

	include "conexion.php";

	$arreglo= array();
	$a= array();
	$mat=array();
	$cont=200;
	$c=0;
	$f=0;
	for ($i=0; $i<55  ; $i++) { 
		$a[$i]=$cont;
		$cont++;
		// echo $a[$i]."<br>";
	}

	$con= mysqli_query($sql,"SELECT id_asigna_m, id_asigna_bh from horarios ORDER BY horarios.id_asigna_bh asc;
	");
	if (mysqli_num_rows($con)==0) {
	echo "No se han agregado materias";
	
	}else{

while($row=mysqli_fetch_array($con)){
					 $id_as=$row["id_asigna_m"];
					$id_as_bh=$row["id_asigna_bh"];
					 $arreglo[]=$id_as_bh;
				}
				 $row_cnt = $con->num_rows;
		for ($l=0; $l <$row_cnt; $l++) { 
		     echo $arreglo[$l]."<br>";
		}

			for ($i=0; $i<50 ; $i++) {
			// echo $i."<br>"; 
				$h=$a[$i];
				if ($arreglo[$c]==$h) {
				$mat[$i]=$arreglo[$c];
				// echo $mat[$i]."<br>";
				if($c<$row_cnt-1){
					$c++;
				}
				}else{

					$mat[$i]="";
					// echo $mat[$i];
				}
				$h="";
				//echo $mat[$i]."<br>";

			}

			for ($q=0; $q <50 ; $q++) { 
				
				if ($mat[$q]=="") {
					
				}
				else{
						$ver=mysqli_query($sql," SELECT horarios.id_horario,bloques_h.h_inicio as Hora,materias.nom_materia as materia,dias.des_dia as Dia, horarios.id_asigna_bh as bl  FROM horarios,asigna_materias,materias,asigna_bloque_h,dias,bloques_h WHERE horarios.id_asigna_m=asigna_materias.id_asigna_m and asigna_materias.id_materia=materias.id_materia and horarios.id_asigna_bh=asigna_bloque_h.id_asigna_bh and asigna_bloque_h.id_dia=dias.id_dia and asigna_bloque_h.id_bloque_h=bloques_h.id_bloque_h and horarios.id_asigna_bh=$mat[$q];");

						while($row=mysqli_fetch_array($ver)){
							$des_mat=$row["materia"];
							 $d=$row["bl"];
								
						}
						echo $d." ".$des_mat."<br>";
					}
			}


	}
		

	?>