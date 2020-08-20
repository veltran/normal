<?php 	
	include_once 'db.php';

	class Docente extends DB{
		function obtenerDocentes(){
			$query = $this->connect()->query('SELECT * FROM categorias');

			return $query;

		}
	}

 ?>