<?php
require_once "AccesoDatos.php";
use \Firebase\JWT\JWT as JWT;
class MW
{   
    /*1.- (instancia) Verifique que estén “seteados” el correo y la clave. 
    Si no existe alguno de los dos (o los dos) retorne un JSON con el mensaje
    de error correspondiente (y estado 409).*/
    public function MW1($request, $response, $args) {//verifica SETEO
        $response->getBody()->write('antes mw1 <br>');
        $ArrayDeParametros = $request->getParsedBody();
        if(isset($ArrayDeParametros['correo']) && isset($ArrayDeParametros['clave'])){
            //llamar MW2
            $response->getBody()->write('pasó mw1 antes mw2 <br>');
            $newResponse = MW::MW2($request, $response, $args);
        }else{
            $response->getBody()->write(' no pasó mw1 <br>');            
            $texto="El correo o clave no estan seteados!!! verifique.";            
            $newResponse = $response->withJson($texto, 409);
        }          
        return $newResponse;
    }
    public static function MW2($request, $response, $args) {//verifica VACIO
        $ArrayDeParametros = $request->getParsedBody();
        if($ArrayDeParametros['correo']!="" && $ArrayDeParametros['clave']!=""){
            //llamar MW3
            $response->getBody()->write('pasó mw2 antes mw3 <br>');
            $miMW3=new MW();
            $newResponse= $miMW3->MW3($request, $response, $args);
        }else{
            $response->getBody()->write('no pasó mw2 <br>');           
            $respuesta= new StdClass();
            $respuesta->mensaje="El correo o clave está vacio!!! verifique.";            
            $respuesta->estado=409;
            $newResponse = json_encode($respuesta);
        }
        return $newResponse;
    }
    /*3.- (instancia) Verificar que el correo y clave no existan en la base de datos.  
    Si no existen, retornar un JSON con el mensaje de error correspondiente (y estado 409). 
    Caso contrario, acceder al verbo de la API.*/
    public function MW3($request, $response, $args) {//verifica que el usuario EXISTA
        $ArrayDeParametros = $request->getParsedBody();
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();        
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios WHERE correo = :correo and clave= :clave ");
        $consulta->bindValue(':correo', $ArrayDeParametros['correo'], PDO::PARAM_STR);
        $consulta->bindValue(':clave', $ArrayDeParametros['clave'], PDO::PARAM_STR);                      
        $consulta->execute();                
        $UsuarioBuscado= $consulta->fetchAll(PDO::FETCH_CLASS,'Usuario');               

        if(!empty($UsuarioBuscado)){
            $response->getBody()->write('pasó mw3 <br>');            
            $texto="El correo y clave son correctos!!!";         
            $newResponse = $response->withJson($texto, 200);
        }else{
            $response->getBody()->write('no pasó mw3 <br>');            
            $texto="Las credenciales proporcionadas no estan registradas!!! verifique.";            
            $newResponse = $response->withJson($texto, 409);
        }          
        return $newResponse;
    }
    public function MW4($request, $response, $args) {//verifica TOKENT VALIDO
        $ArrayDeParametros = $request->getParsedBody();
        try {
            $jwt=$ArrayDeParametros['token'];                
            $key="miClaveSecreta";               
            $decoded=JWT::decode($jwt,$key,array('HS256'));
            $newResponse = $response->withJson($decoded, 200);  
            return $newResponse;

        } catch (Exception $e) {
            $texto='Excepción capturada: Tokken no incorrecto';
            $newResponse = $response->withJson($texto, 409);
            
        }            
        return $newResponse; 
    }
    public static function MW5($request, $response, $args) {//verifica SEA PROPIETARIO
        $ArrayDeParametros = $request->getParsedBody();
        try {
            $jwt=$ArrayDeParametros['token'];                
            $key="miClaveSecreta";               
            $decoded=JWT::decode($jwt,$key,array('HS256'));
            //var_dump($decoded);
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();        
            $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios WHERE correo = :correo and clave= :clave ");
            $consulta->bindValue(':correo', $decoded->datos->correo, PDO::PARAM_STR);
            $consulta->bindValue(':clave', $decoded->datos->clave, PDO::PARAM_STR);                      
            $consulta->execute();                
            $UsuarioBuscado= $consulta->fetchAll(PDO::FETCH_CLASS,'Usuario');
            //var_dump($UsuarioBuscado);
            if($UsuarioBuscado[0]->perfil=="propietario"){
                $newResponse = $response->withJson("es propietario", 200);
            }else {
                $newResponse = $response->withJson("no es propietario", 409);
                } 
            return $newResponse;

        } catch (Exception $e) {
            $texto='Excepción capturada: Tokken no incorrecto';
            $newResponse = $response->withJson($texto, 409);
            
        }            
        return $newResponse; 
    }
    public static function MW6($request, $response, $args) {//verifica SEA ENCARGADO
        $ArrayDeParametros = $request->getParsedBody();
        try {
            $jwt=$ArrayDeParametros['token'];                
            $key="miClaveSecreta";               
            $decoded=JWT::decode($jwt,$key,array('HS256'));
            //var_dump($decoded);
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();        
            $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios WHERE correo = :correo and clave= :clave ");
            $consulta->bindValue(':correo', $decoded->datos->correo, PDO::PARAM_STR);
            $consulta->bindValue(':clave', $decoded->datos->clave, PDO::PARAM_STR);                      
            $consulta->execute();                
            $UsuarioBuscado= $consulta->fetchAll(PDO::FETCH_CLASS,'Usuario');
            if($UsuarioBuscado[0]->perfil=="encargado"||$UsuarioBuscado[0]->perfil=="propietario"){
                $newResponse = $response->withJson("es encargado o propietario", 200);
            }else {
                $newResponse = $response->withJson("no es encargado ni propietario", 409);
                } 
            return $newResponse;

        } catch (Exception $e) {
            $texto='Excepción capturada: Tokken no incorrecto';
            $newResponse = $response->withJson($texto, 409);
            
        }            
        return $newResponse; 
    }
}