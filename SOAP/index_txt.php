<?php 
	
	// ruta completa de larchivo
	$curl = curl_init("http://localhost:82/php_rest/base.txt");

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$respuesta = curl_exec($curl);
	$info = curl_getinfo($curl);

	if ( $info['http_code'] == 200) {

		$datos = explode(",", $respuesta);

		echo "<h1>Title</h1>";

		foreach ($datos as $d) {
			echo "-> ". $d . "<br>";
		}
		
	}else{
		echo "Error" . curl_error($curl);
	}


