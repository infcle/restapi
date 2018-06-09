# REST con Slim framework
**Archivos que se deben modificar**
/src/rutas
*en esta ruta se encuentra todas los web service que podremos crear deacuerdo a la logica*

`Codigo para generar una ruta para el webService`
```
$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});
```
**Archivo en el que se encuentra las consultas**
/src/rutas/noticias.php

**Configuracion con la base de datos**
/public/src/config/db.php

**Sector donde tienen acceso el cliente**
/public/
*Esta estructura la maneja slim framwork*