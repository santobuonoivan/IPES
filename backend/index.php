<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT as JWT;

require_once './vendor/autoload.php';
require_once './clases/AccesoDatos.php';
require_once './clases/usuario.php';
require_once './clases/alumno.php';
require_once './clases/carrera.php';
require_once './clases/entrada.php';
require_once './clases/salida.php';
require_once './clases/caja.php';
require_once './clases/Middleware.php';
require_once './clases/Form.php';



$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*
¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

//*********************************************************************************************//
//INICIALIZO EL APIREST
//*********************************************************************************************//
$app = new \Slim\App(["settings" => $config]);

//*********************************************************************************************//
//CONFIGURO LOS VERBOS GET, POST, PUT Y DELETE
//*********************************************************************************************//
 
    $app->get('[/]', function (Request $request, Response $response) {    
        $url = "../index.php";

        return $response->withRedirect($url);
    });//->add(Middleware::verificarToken ($request,$response,$next));
//*********************************************************************************************//
/*LLAMADA A METODOS DE INSTANCIA DE UNA CLASE*/
//*********************************************************************************************//
    //verificar tokken
        $verificarToken= function ($request, $response, $next) {//verifica token
            
            $respuesta= Middleware::verificarToken($request,$response,$next);       
            $status = $respuesta->getStatusCode();             
            if($status==200){
                    $response = $next($request, $response);            
            }else{
                $response->getBody()->write($respuesta);
            }    
            return $response;
        };
    $app->group('/uss', function () {   

        
        $this->post('/filtro', \Usuario::class . ':traerUno');
        $this->post('/todos',\Usuario::class . ':traerTodos');
        $this->post('/',\Usuario::class . ':CargarUno');
        $this->delete('/', \Usuario::class . ':BorrarUno');
        $this->put('/', \Usuario::class . ':ModificarUno');


    })/*->add($verificarToken)*/;
    $app->group('/forms', function () {   

        
        $this->post('/AltaUsiario', \Form::class . ':AltaUsiario');
        $this->post('/AltaAlumno', \Form::class . ':AltaAlumno');
        $this->post('/AltaCarrera', \Form::class . ':AltaCarrera');
        $this->post('/menuUsuarios', \Form::class . ':MenuUsuarios');
        $this->post('/menuAlumnos', \Form::class . ':MenuAlumnos');
        $this->post('/menuAdministracion', \Form::class . ':MenuAdministracion');
        $this->post('/menuCaja', \Form::class . ':MenuCaja');

    })->add($verificarToken);    
    $app->group('/a', function () {
        
        $this->post('/filtro', \Alumno::class . ':TraerUno');
        $this->post('/todos', \Alumno::class . ':TraerTodos');
        $this->post('/adm', \Alumno::class . ':formAdm');
        $this->post('/admAlumno', \Alumno::class . ':admAlumno');
        $this->post('/divs', \Alumno::class . ':divCuotasPagosAlumno');        
        $this->post('/',\Alumno::class . ':CargarUno');
        $this->post('/deudaAlumno',\Alumno::class . ':deudaAlumno');   
        $this->post('/deudaTotalAlumnos',\Alumno::class . ':deudaTotalAlumnos');
        $this->post('/addCuota',\Alumno::class . ':addCuota');
        $this->post('/addPago',\Alumno::class . ':addPago');
        $this->post('/deleteCuota',\Alumno::class . ':deleteCuota');
        $this->post('/deletePago',\Alumno::class . ':deletePago');
        $this->post('/changeCuota',\Alumno::class . ':changeCuota');
        $this->post('/changePago',\Alumno::class . ':changePago');
        
        $this->delete('/', \Alumno::class . ':BorrarUno');
        $this->put('/', \Alumno::class . ':ModificarUno');
    })->add($verificarToken);
    $app->group('/carreras', function () {
        $this->post('/todos',\Carrera::class . ':TraerCarreras');
        $this->post('/todos/',\Carrera::class . ':TraerCarrerasSimple');
        $this->post('/',\Carrera::class . ':CrearCarrera');
        $this->delete('/', \Carrera::class . ':ElimnarCarrera');
        $this->put('/', \Carrera::class . ':ModificarCarrera');
    })->add($verificarToken);
    $app->group('/entrada', function () {        
        $this->post('/alta',\Entrada::class . ':CargarUno');

    })->add($verificarToken);
    $app->group('/salida', function () {        
        $this->post('/alta',\Salida::class . ':CargarUno');

    })->add($verificarToken);
    $app->group('/caja', function () {
        $this->post('/VerificarCajaAbierta',\Caja::Class . ':VerificarCajaAbierta');
        $this->post('/FormAperturaCaja',\Caja::class . ':FormAperturaCaja');
        $this->post('/Apertura',\Caja::class . ':Apertura');
        $this->post('/Cierre',\Caja::class . ':Cierre');
        $this->post('/Actualizar',\Caja::class . ':Actualizar');
        $this->post('/Estadisticas',\Caja::class . ':Estadisticas');



    })->add($verificarToken);
    /*
    $app->GET('[/]', function (Request $request, Response $response) {    
        //traer cds
        try{
            $esto = $request->getHeader("token");
            $token = $esto[0];
            $datos = JWT::decode($token, "Miclave",array('HS256'));
            echo $datos;

            $newResponse = $response->withJson($datos, 200);
            return $newResponse;
        }catch(Exception $e){
            echo "Error encontrado: ".$e->getMessage();
        }
    
    });*/
    
    $app->group('/login', function(){        
        $this->post('/entrar', function (Request $request, Response $response,$args){
            $parametros = $request->getParsedBody();
            $obj = new stdClass();
            $datos = new stdClass();
            die;
            if(isset($parametros['tokken'])){//valido si está loguin
                try{                    
                    $token = $parametros['tokken'];
                    $datos = JWT::decode($token, "Miclave",array('HS256'));    
                    $parametros["usuario"]=$datos->usuario;
                    $parametros["clave"]=$datos->clave;                    
                }catch(Exception $e){                    
                    $obj->mensajeToken = "Error encontrado: ".$e->getMessage();                    
                }
            }
            $usuario = $parametros["usuario"];
            $clave = $parametros["clave"];
            $objRespuesta = Usuario::VerificarUsuario($usuario,$clave);
            if($objRespuesta !=false){
                $tiempo = time();
                $datos->id=$objRespuesta->id;
                $datos->apellido=$objRespuesta->apellido;
                $datos->nombre=$objRespuesta->nombre;
                $datos->dni=$objRespuesta->dni;
                $datos->email=$objRespuesta->email;
                $datos->turno=$objRespuesta->turno;
                $datos->perfil=$objRespuesta->perfil;

                $token = array(
                    "name"=>"MiToken",
                    "usuario"=>$usuario,
                    "clave"=>$clave,
                    "iat"=>$tiempo,
                    "datos"=>$datos
                );

                $miToken = JWT::encode($token,"Miclave");
                $obj->respuesta = true;
                $obj->token = $miToken;
                //session_start();
                /*session is started if you don't write this line can't use $_Session  global variable*/
                $_SESSION["usuario"]=$usuario;
                $_SESSION["apellido"]=$objRespuesta->apellido;
                $_SESSION["nombre"]=$objRespuesta->nombre;
                $_SESSION["turno"]=$objRespuesta->turno;
                $_SESSION["perfil"]=$objRespuesta->perfil;
                
            }else{
                
                $obj->respuestaVerificacionUser = false;                
            }
            return $response->withJson($obj, 200);            
            
        });        //->add(Middleware::verifcarPerfilAdminDuenio($request,$response,$args))
        $this->post('/salir', function (Request $request, Response $response,$args){
            //session_start();
            //return $response->withJson($_SESSION, 200);
            
            $objRespuesta=new stdClass();
            $nombre = $_SESSION['nombre'];
            $apellido = $_SESSION['apellido'];
            
            if(session_destroy()){//( borró??)
                $objRespuesta->salio = true;//si
                $objRespuesta->nombre = $nombre;
                $objRespuesta->apellido = $apellido;                
            }else {
                $objRespuesta->salio = false;//no
            }
            return $response->withJson($objRespuesta, 200);
        });
        $this->get('/{token}', function(Request $request, Response $response,$args){
            try{
                //$esto = $request->getHeader("token");
                $token = $args["token"];
                $datos = JWT::decode($token, "Miclave",array('HS256'));
    
                $newResponse = $response->withJson($datos, 200);
                return $newResponse;
            }catch(Exception $e){
                echo "Error encontrado: ".$e->getMessage();
            }
            
        });
    });

$app->run();