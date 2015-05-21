<?php 
	
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

	$host = "localhost";
	$user = 'root';
	$pass = '';

	$cn = mysql_connect($host, $user, $pass) or die("Error");
	$db = mysql_select_db('demo') or die("Error db");

	function mostrar_titulos($detalle){
		if ($detalle == "lista") {
			$resultados = mysql_query("select * from libro");
		}else{
			$resultados = mysql_query("select * from libro where id=".$detalle);
		}

		while( $fila = mysql_fetch_array($resultados)){
			$titulos[] = $fila;
		}
		return $titulos;
	}

	function mostrar_autores($detalle){
		if ($detalle == "lista") {
			$resultados = mysql_query("select autor from libro");
		}else{
			$resultados = mysql_query("select autor from libro where id=".$detalle);
		}

		while( $fila = mysql_fetch_array($resultados)){
			$titulos[] = $fila;
		}
		return $titulos;
	}

	function guardar_nuevo_autor(){
		mysql_query("insert into libro(autor, titulo) values('".$_POST['autor']."','".$_POST['titulo']."')");

		header('Location: http://localhost:82/php_rest/REST/index_rest.php');
		exit;
	}

	if ( $_GET['peticion'] == 'titulos') {
		$resultados = mostrar_titulos( $_GET['detalle']);
	}else if ( $_GET['peticion'] == 'autor') {

		if($_GET['detalle'] == "nuevo"){
			guardar_nuevo_autor();
		}else{
			$resultados = mostrar_autores( $_GET['detalle']);
		}

	}else{
		header('HTTP/1.1 405 Method Not Allowed');
		exit;
	}

	echo json_encode( $resultados );
