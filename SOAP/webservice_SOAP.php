<?php 

	require_once "lib/nusoap.php";

	function listarPlanetas(){
		$planetas = "Segun la definicion mencionada";

		return $planetas;
	}

	function muestraImagen($categoria){

		if ( $categoria == 'espacio') {
			$imagen = 'planeta.jpg';
		}else{
			$imagen = 'planeta2.jpg';
		}

		$resultado = "<img src='img/". $imagen ."' >";

		return $resultado;

	}

	if ( !isset( $HTTP_RAW_POST_DATA )) {
		$HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );
	}

	$server = new soap_server();

	// para que el usuario sepa como consumir datos
	$server->configureWSDL("Info blog", "urn:infoBlog");

	$server->register("listarPlanetas",
			array(), // paramentro
			array('return' => 'xsd:string'), //respuesta
			'urn:infoBlog#listarPlanetas', // accion
			'rpc', // estilo
			'encoded', // uso
			'Muestra el contenido para el blog'
		);

	$server->register("muestraImagen",
			array('category' => 'xsd:string'), // paramentro
			array('return' => 'xsd:string'), //respuesta
			'urn:infoBlog#listarPlanetas', // accion
			'rpc', // estilo
			'encoded', // uso
			'Muestra una imagen variable'
		);

	$server->register("listarPlanetas");
	$server->register("muestraImagen");

	$server->service($HTTP_RAW_POST_DATA);

