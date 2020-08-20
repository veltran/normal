<?php 	
	include_once 'docente.php';

	class ApiDocentes{

		function getAll(){
			$docente = new Docente();
			$docentes = array();
			$docentes["items"]= array();

			$res = $docente->obtenerDocentes();

			if ($res->rowCount()) {
				while($row = $res->fetch(PDO::FETCH_ASSOC)){
					$item = array(
						'id'=>$row['id_cat'],
						'carrera'=>$row['des_cat']
					);
					array_push($docentes['items'], $item);
				}
				echo json_encode($docentes);
			}else
			{
				echo json_encode(array('mensaje' => 'No hay registros'));
			}
		}
	}

 ?>