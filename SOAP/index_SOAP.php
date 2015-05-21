<?php 

	require_once "lib/nusoap.php";

	$cliente = new nusoap_client("http://localhost:82/php_rest/webservice_SOAP.php?wsdl&debug=0", 'wsdl');

	$planetas = $cliente->call("listarPlanetas");

	$img = $cliente->call("muestraImagen", array("categoria" => "libre") );

	echo "Los planetas";
	echo "<p>". $planetas ."</p>";
	echo "<p>". $img ."</p>";