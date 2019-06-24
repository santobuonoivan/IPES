<?php
    use Firebase\JWT\JWT as JWT;
    require_once "IMiddleware.php";
    require_once "AccesoDatos.php";
class Middleware implements IMiddleware{    

    public static function verificarToken($request,$response,$next){

        $parametros=$request->getParsedBody();
        $objRespuesta = new stdClass();
        if(isset($parametros['tokken'])){//valido si está loguin
            try{                    
                $token = $parametros['tokken'];
                $datos = JWT::decode($token, "Miclave",array('HS256'));    
                $objRespuesta->datos =$datos;
                $objRespuesta->resultado=1;
                $objRespuesta->mensaje = "todo bien";
                return $response->withJson($objRespuesta, 200);
            }catch(Exception $e){
               
                $objRespuesta->resultado=0;
                $objRespuesta->mensaje = "Error encontrado: ".$e->getMessage();
                return $response->withJson($objRespuesta, 504);
            }
        }//elizabethziaugra56@gmail.com        fede capo
    }
    public static function verifcarPerfilAdminDuenio($request,$response,$next){
        $verificarToken = Middleware::verificarToken($request,$response,$next);
        if($verificarToken->resultado>0){
            if($verificarToken->datos->perfil == "WebMaster" || $verificarToken->datos->perfil == "duenio"){
                $response = $next($request, $response);
            }else{
                $response->getBody()->write("error no posees las credenciales necesarias <br>");
            }
        }else{//no pasa credenciales  y no ejecuto api.
            $response->getBody()->write("error usuario no logueado <br>");
        }
        return $response;
    }
}