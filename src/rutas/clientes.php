<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app= new \Slim\App;


//obtener todos los clientes

$app->get('/api/clientes', function(Request $request, Response $response){
	$conculta = "SELECT * FROM puntobol_noticias_elmer";
	try {
		$db = new db();

		//conexion
		$db = $db->conectar();

		$ejecutar
	} catch (PDOException $e) {
		echo '{"error": {¨text}: '.$e->getMessage().'}';
	}
});