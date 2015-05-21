<?php 

	header('Content-type: application/json');

	function listarAlumnos(){

		$alumno = array(
				"nombre" 	=> "John",
				"apellido" 	=> "Porras",
				"pais"		=> "Peru",
				"cursos"	=> "5",
				"usuario"	=> "zthanly"
		);
		return $alumno;
	}

?>

<?= json_encode( listarAlumnos() ) ?>