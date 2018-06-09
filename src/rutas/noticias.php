<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app= new \Slim\App;


//obtener todos los Noicias

$app->get('/api/noticias', function(Request $request, Response $response){
	$consulta = "SELECT id_puntobolnoticias,
					titulo,
					detalle,
					fuente,
					fecha,
					img_media,
					img_mini,
					mime,
					nombrefile,
					importancia,
					prioridad
					FROM puntobol_noticias_elmer";
	try {
		$db = new db();

		//conexion
		$db = $db->conectar();
        $ejecutar = $db->query($consulta);
        $noticias = $ejecutar->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $nnoticias=array();
        foreach ($noticias as $minoticia) {
        	//echo "<pre>"; print_r(base64_encode ($minoticia->img_media)); echo "</pre>";	
        	$row['id_puntobolnoticias']=($minoticia->id_puntobolnoticias);
        	$row['titulo']=($minoticia->titulo);
        	$row['detalle']=($minoticia->detalle);
        	$row['fuente']=($minoticia->fuente);
        	$row['fecha']=($minoticia->fecha);
        	$row['mime']=($minoticia->mime);
        	$row['nombrefile']=($minoticia->nombrefile);
        	$row['importancia']=($minoticia->importancia);
        	$row['prioridad']=($minoticia->prioridad);
        	$row['img_media']=(base64_encode ($minoticia->img_media));
        	$row['img_mini']=(base64_encode ($minoticia->img_mini));
        	array_push($nnoticias, $row);
        }

        //Exportar y mostrar en formato JSON
        
        //echo "<pre>"; var_dump($noticias); echo "</pre>";
        echo json_encode($nnoticias);
	} catch (PDOException $e) {
		echo '{"error": {¨text}: '.$e->getMessage().'}';
	}
});