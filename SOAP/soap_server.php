<?php 

	require_once "lib/nusoap.php";

	$host = "localhost";
	$user = 'root';
	$pass = '';

	$cn = mysql_connect($host, $user, $pass) or die("Error");
	$db = mysql_select_db('demo') or die("Error db");

	function listarLibros(){
		
		$resultado = mysql_query("select * from libro");

		while ($row = mysql_fetch_array($resultado)) {
			$all[] = $row;
		}
		return $all;
	}

	if ( !isset( $HTTP_RAW_POST_DATA )) {
		$HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );
	}

	$server = new soap_server();
	$server->register("listarLibros");
	$server->service($HTTP_RAW_POST_DATA);

	exit;
