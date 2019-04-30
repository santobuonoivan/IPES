<?php

//*********************************************************************************************//
//RUTEOS
//*********************************************************************************************//
/*
    $app->get('/ruteo/', function (Request $request, Response $response) {    
        $response->getBody()->write("Ruteo, sin params");
        return $response;

    });

    $app->get('/ruteo/{param}', function (Request $request, Response $response) {    
        $response->getBody()->write("Ruteo, con params");
        return $response;

    });

    $app->get('/ruteoOpcional[/]', function (Request $request, Response $response) {    
        $response->getBody()->write("Ruteo, sin params y / opcional");
        return $response;

    });

    $app->get('/ruteoOpcional/{param}', function (Request $request, Response $response) {    
        $response->getBody()->write("Ruteo, con params opcional");
        return $response;

    });
*/
//*********************************************************************************************//
//ATENDER TODOS LOS VERBOS DE HTTP
//*********************************************************************************************//
/*    
    $app->any('/cualquiera/[{id}]', function ($request, $response, $args) {
        
        var_dump($request->getMethod());
        $id=$args['id'];
        $response->getBody()->write("Cualquier verbo de HTTP. Parametro: {$id} - ");
        return $response;
    });
*/
//*********************************************************************************************//
//ATENDER ALGUNOS VERBOS DE HTTP
//*********************************************************************************************//
/* 
    $app->map(['GET', 'POST'], '/mapeado', function ($request, $response, $args) {

        var_dump($request->getMethod());
        $response->getBody()->write("Solo POST y GET - ");
    });
*/
//*********************************************************************************************//
//AGRUPACION DE RUTAS
//*********************************************************************************************//
/*
    $app->group('/saludo', function () {

        $this->get('/', function ($request, $response, $args) {
            $response->getBody()->write("HOLA, Bienvenido a la apirest... ingresá tu nombre");
        });

        $this->get('/{nombre}', function ($request, $response, $args) {
            $nombre=$args['nombre'];
            $response->getBody()->write("HOLA, Bienvenido <h1>$nombre</h1> a la apirest");
        });
    
        $this->post('/', function ($request, $response, $args) {      
            $response->getBody()->write("HOLA, Bienvenido a la apirest por post");
        });
        
    });
*/
//*********************************************************************************************//
//AGRUPACION DE RUTAS Y MAPEO
//*********************************************************************************************//
/*
    $app->group('/usuario/{id:[0-9]+}', function () {

        $this->map(['POST', 'DELETE'], '', function ($request, $response, $args) {
            $response->getBody()->write("Accedo al usuario por ID (con POST o DELETE) ");
        });

        $this->get('/nombre', function ($request, $response, $args) {
            $response->getBody()->write("Accedo al usuario por ID y retorno el nombre (con GET) ");
        });

    });
*/
//*********************************************************************************************//
//PARAMETROS 
//*********************************************************************************************//
/*
    $app->get('/datos/', function (Request $request, Response $response) {     
        $datos = array('nombre' => 'rogelio','apellido' => 'agua', 'edad' => 40);
        $newResponse = $response->withJson($datos, 200);  
        return $newResponse;
    });

    $app->post('/datos/', function (Request $request, Response $response) {    
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $objeto= new stdclass();
        $objeto->nombre=$ArrayDeParametros['nombre'];
        $objeto->apellido=$ArrayDeParametros['apellido'];
        $objeto->edad=$ArrayDeParametros['edad'];
        $newResponse = $response->withJson($objeto, 200);  
        return $newResponse;

    });

    $app->put('/datos/', function (Request $request, Response $response) {    
        $ArrayDeParametros = $request->getParsedBody();
        $obj = json_decode(($ArrayDeParametros["cadenaJson"]));
        var_dump($obj);
    });

*/
//*********************************************************************************************//
//SUBIDA DE ARCHIVOS (SE PUEDEN TENER FUNCIONES DEFINIDAS)
//*********************************************************************************************//
/*
    $this->post('/', function (Request $request, Response $response) {
            
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $titulo= $ArrayDeParametros['titulo'];
        $cantante= $ArrayDeParametros['cantante'];
        $año= $ArrayDeParametros['anio'];
        
        $micd = new cd();
        $micd->titulo=$titulo;
        $micd->cantante=$cantante;
        $micd->año=$año;
        $micd->InsertarElCdParametros();

        $archivos = $request->getUploadedFiles();
        $destino="./fotos/";
        //var_dump($archivos);
        //var_dump($archivos['foto']);

        $nombreAnterior=$archivos['foto']->getClientFilename();
        $extension= explode(".", $nombreAnterior)  ;
        //var_dump($nombreAnterior);
        $extension=array_reverse($extension);

        $archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
        $response->getBody()->write("cd");

        return $response;

    });
*/   