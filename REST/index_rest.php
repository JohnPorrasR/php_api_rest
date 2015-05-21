<?php 

	$autorUrl 	= "http://localhost:82/php_rest/API/biblioteca/autor/lista";
	$titulosUrl = "http://localhost:82/php_rest/API/biblioteca/titulos/lista";

	$autorJson = file_get_contents($autorUrl);
	$titulosJson = file_get_contents($titulosUrl);

	$autorRes = json_decode($autorJson);
	$titulosRes = json_decode($titulosJson);

	/*echo "<h1>Autores</h1>";
	echo '<ul>';
	foreach ($autorRes as $a) {
		echo "<li>".$a->autor."</li>";
	}
	echo '</ul>';
	echo "<br><br>";*/

	echo "<h1>Autores / libros</h1>";
	echo '<ul>';
	foreach ($titulosRes as $t) {
		echo "<li>".$t->autor."<br>";
		echo $t->titulo;
		echo "</li>";
	}
	echo '</ul>';
?>

<form action="http://localhost:82/php_rest/API/biblioteca/autor/nuevo" method="POST">
	<h1>Agregar</h1>
	<label for="">Autor</label>
	<input type="text" name="autor">
	<label for="">Libro</label>
	<input type="text" name="titulo">
	<input type="submit" value="enviar">
</form>