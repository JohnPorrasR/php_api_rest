<?php 

	require_once "lib/nusoap.php";

	$cliente = new nusoap_client("http://localhost:82/php_rest/soap_server.php");

	$libros = $cliente->call("listarLibros");

	echo "<h2> Mis libros </h2>";
	echo "<ul>";
	foreach ($libros as $l) {
		echo "<li>";
		echo "<strong>". $l['autor'] ."</strong> <br>";
		echo $l['titulo'];
		echo "</li>";
	}
	echo "</ul>";