$(document).ready(function(){

	$("#libros").click( function(){
		$('#resultadosLibro ul').html('');
		$.getJSON("http://localhost:82/php_rest/API/biblioteca/titulos/lista")
		.done(function(datos_ws){
			$.each(datos_ws, function(indice, valor){
				$('#resultadosLibro ul').append('<li>'+valor.titulo+'</li>');
			})
		});
	});

});