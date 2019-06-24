<?php
require_once "iPersona.php";


class Usuario implements IPersona{
    public $id;    
    public $apellido;
    public $nombre;
    public $dni;
    public $clave;
    public $usuario;

    //nuevo
    public $fechadecumpleanios;
    public $email;
    public $perfil;
    public $turno;
    public $tel;
    public $celular;
    public $direccion1;
    public $direccion2;
    public $provincia;
    public $ciudad;
    public $codigopostal;


    function ToJSON(){
        return json_encode($this);
    }
/* inicio funciones especiales para slimFramework*/
    public  function TraerUno($request, $response, $args) {
        $argumentos=$request->getParsedBody();
        $filtro=$argumentos['filtro'];
        //echo $filtro;
        $elUsuario=Usuario::TraerUnUsuario($filtro);
        //var_dump($elUsuario);
        
        $newResponse = Usuario::generarDivUsuario($elUsuario);
        return $newResponse;
    }
    public  function TraerTodos($request, $response, $args) { 
        
        $todosLosUsuarios=Usuario::TraerTodoLosUsuarios();
        $newResponse = Usuario::generarDivUsuario($todosLosUsuarios);  
        return $newResponse;
    }
    public  function CargarUno($request, $response, $args) {
        //$response->getBody()->write("<h1>Cargar uno nuevo</h1>");
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);    	
        $miUsuario = new Usuario();
        
        $miUsuario->nombre=$ArrayDeParametros['nombre'];
        $miUsuario->apellido=$ArrayDeParametros['apellido'];
        $miUsuario->clave=$ArrayDeParametros['clave'];
        $miUsuario->usuario=$ArrayDeParametros['usuario'];        
        $miUsuario->dni=$ArrayDeParametros['dni'];

        $miUsuario->fechadecumpleanios=$ArrayDeParametros['fechadecumpleanios'];
        $miUsuario->email=$ArrayDeParametros['email'];
        $miUsuario->perfil=$ArrayDeParametros['perfil'];
        $miUsuario->turno=$ArrayDeParametros['turno'];        
        $miUsuario->tel=$ArrayDeParametros['tel'];
        $miUsuario->celular=$ArrayDeParametros['celular'];
        $miUsuario->direccion1=$ArrayDeParametros['direccion1'];
        $miUsuario->direccion2=$ArrayDeParametros['direccion2'];
        $miUsuario->provincia=$ArrayDeParametros['provincia'];
        $miUsuario->ciudad=$ArrayDeParametros['ciudad'];        
        $miUsuario->codigopostal=$ArrayDeParametros['codigopostal'];      
        

        $resultado =$miUsuario->InsertarElUsuario();
        
        return $resultado;
        
    }
    public  function BorrarUno($request, $response, $args) {
        $ArrayDeParametros = $request->getParsedBody();
        $id=$ArrayDeParametros['id'];
        $Usuario= new Usuario();
        $Usuario->id=$id;
        $cantidadDeBorrados=$Usuario->BorrarUsuario();

        $objDelaRespuesta= new stdclass();
        $objDelaRespuesta->cantidad=$cantidadDeBorrados;
        if($cantidadDeBorrados>0){
            $objDelaRespuesta->resultado=true;
        }else{
            $objDelaRespuesta->resultado=false;
        }
        $newResponse = $response->withJson($objDelaRespuesta, 200);  
        return $newResponse;
    }
    public  function ModificarUno($request, $response, $args) {
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);    	
        $miUsuario = new Usuario();
        $miUsuario->id=$ArrayDeParametros['id'];
        $miUsuario->nombre=$ArrayDeParametros['nombre'];
        $miUsuario->apellido=$ArrayDeParametros['apellido'];
        $miUsuario->clave=$ArrayDeParametros['clave'];
        $miUsuario->usuario=$ArrayDeParametros['usuario'];        
        $miUsuario->dni=$ArrayDeParametros['dni'];
        $miUsuario->fechadecumpleanios=$ArrayDeParametros['fechadecumpleanios'];
        $miUsuario->email=$ArrayDeParametros['email'];
        $miUsuario->perfil=$ArrayDeParametros['perfil'];
        $miUsuario->turno=$ArrayDeParametros['turno'];        
        $miUsuario->tel=$ArrayDeParametros['tel'];
        $miUsuario->celular=$ArrayDeParametros['celular'];
        $miUsuario->direccion1=$ArrayDeParametros['direccion1'];
        $miUsuario->direccion2=$ArrayDeParametros['direccion2'];
        $miUsuario->provincia=$ArrayDeParametros['provincia'];
        $miUsuario->ciudad=$ArrayDeParametros['ciudad'];        
        $miUsuario->codigopostal=$ArrayDeParametros['codigopostal'];

        $resultado =$miUsuario->ModificarUsuario();
        $objDelaRespuesta= new stdclass();
        $objDelaRespuesta->resultado=$resultado;
        return $response->withJson($objDelaRespuesta, 200);		
    }
/* final funciones especiales para slimFramework*/
    public static function generarDivUsuario($usuarios){
        
        //  ARMO SOLAPAS        
            $grilla2='<div class="container-fluid opacidad" >
                    <h2>Usuarios</h2>
                    

                    <ul class="nav nav-tabs" id="myTab" role="tablist">';
                        
                    //CARGO TAGS O SOLAPAS DE LA LISTA AGRUPADOS DE A 10
                    if(is_array($usuarios)){
                        $totalDeRegistros=count($usuarios);
                        $cantDeAgrupamiento=10;
                        $cantidadDeTabs=intdiv($totalDeRegistros,$cantDeAgrupamiento);
                        $resto=$totalDeRegistros%$cantDeAgrupamiento;
                        

                        if(count($usuarios)%10 > 0){
                            $cantidadDeTabs++;
                        }
                        for ($i=0; $i < $cantidadDeTabs; $i++) {
                            if($i==0){
                                $grilla2.=  "<li class='nav-item'>
                                                <a class='nav-link active' id='".($i+1)."-tab' data-toggle='tab' href='#".($i+1)."' role='tab' aria-controls='home' aria-selected='true'>".($i+1)."</a>
                                            </li>";
                            }else{
                                $grilla2.=  '<li class="nav-item">
                                                <a class="nav-link" id="'.($i+1).'-tab" data-toggle="tab" href="#'.($i+1).'" role="tab" aria-controls="profile" aria-selected="false">'.($i+1).'</a>
                                            </li>';                                
                            }
                        }
                    }                       
                    $grilla2.='</ul>';
        //  CIERRE SOLAPAS
        //  CARGO CONTENIDO DE HOJAS                
                    $grilla2.=  '<div class="tab-content" id="myTabContent">';

                    $encabezado=   '<table class="table table-responsive table-hover">
                                        <thead class="bg-info">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">APELLIDO</th>
                                                <th scope="col">NOMBRE</th>
                                                <th scope="col">DNI</th>
                                                <th scope="col">USUARIO</th>
                                                <th scope="col">CLAVE</th>
                                                <th scope="col">FECHA DE CUMPLEAÑOS</th>
                                                <th scope="col">EMAIL</th>
                                                <th scope="col">PERFIL</th>
                                                <th scope="col">TURNO</th>
                                                <th scope="col">TEL</th>
                                                <th scope="col">CELULAR</th>
                                                <th scope="col">DIRECCION 1</th>
                                                <th scope="col">DIRECCION 2</th>
                                                <th scope="col">PROVINCIA</th>
                                                <th scope="col">CIUDAD</th>
                                                <th scope="col">CODIGO POSTAL</th>     
                                                <th scope="col">ACCION</th>
                                            </tr>
                                        </thead>
                                        <tbody>';   
        
        
            if(is_array($usuarios)){
            
                for ($i=0; $i < $cantidadDeTabs; $i++) { 
                    
                    if($i==0){                    
                        $grilla2.='<div id="'.($i+1).'" class="tab-pane fade show active" role="tabpanel" aria-labelledby="'.($i+1).'-tab">';
                            
                    }else{
                        $grilla2.='<div id="'.($i+1).'" class="tab-pane fade" role="tabpanel" aria-labelledby="'.($i+1).'-tab">';                                                       
                    }
                    
                    $grilla2.=$encabezado;
                    //  CARGAR TABLAS
                        if($i==$cantidadDeTabs-1 && $resto>0){
                            for ($j=10*$i; $j <10*$i+$resto ; $j++){
                                //$valor= $usuarios[$j];
                                //var_dump($usuarios[101]);                            
                                
                            
                                $valorE = json_encode($usuarios[$j]);
                                $valorM = json_encode($usuarios[$j]);

                                $grilla2.=  "<tr>
                                                <th scope='row'>".($j+1)."</th>
                                                <td>{$usuarios[$j]->id}</td>
                                                <td>{$usuarios[$j]->apellido}</td>
                                                <td>{$usuarios[$j]->nombre}</td>
                                                <td>{$usuarios[$j]->dni}</td>
                                                <td>{$usuarios[$j]->usuario}</td>
                                                <td>{$usuarios[$j]->clave}</td>
                                                <td>{$usuarios[$j]->fechadecumpleanios}</td>
                                                <td>{$usuarios[$j]->email}</td>
                                                <td>{$usuarios[$j]->perfil}</td>
                                                <td>{$usuarios[$j]->turno}</td>
                                                <td>{$usuarios[$j]->tel}</td>
                                                <td>{$usuarios[$j]->celular}</td>
                                                <td>{$usuarios[$j]->direccion1}</td>
                                                <td>{$usuarios[$j]->direccion2}</td>
                                                <td>{$usuarios[$j]->provincia}</td>
                                                <td>{$usuarios[$j]->ciudad}</td>
                                                <td>{$usuarios[$j]->codigopostal}</td>
                                                <td>
                                                    <div class='btn-group' role='group' aria-label='Basic example'>
                                                        <button type='button' class='btn btn-alert' onclick='Test.agregarUsuario({$valorM})'>MODIFICAR</button>
                                                        <button type='button' class='btn btn-warning' onclick='Test.eliminarUsuario({$valorE})'>ELIMINAR</button>                                                        
                                                    </div>
                                                </td>
                                            </tr>";
                            continue;   
                            }
                        }else{
                            for ($j=10*$i; $j <10*($i+1) ; $j++){
                                //$valor= $usuarios[$j];
                                //var_dump($usuarios[101]);                            
                                
                            
                                $valorE = json_encode($usuarios[$j]);
                                $valorM = json_encode($usuarios[$j]);

                                $grilla2.=  "<tr>
                                                <th scope='row'>".($j+1)."</th>
                                                <td>{$usuarios[$j]->id}</td>
                                                <td>{$usuarios[$j]->apellido}</td>
                                                <td>{$usuarios[$j]->nombre}</td>
                                                <td>{$usuarios[$j]->dni}</td>
                                                <td>{$usuarios[$j]->usuario}</td>
                                                <td>{$usuarios[$j]->clave}</td>
                                                <td>{$usuarios[$j]->fechadecumpleanios}</td>
                                                <td>{$usuarios[$j]->email}</td>
                                                <td>{$usuarios[$j]->perfil}</td>
                                                <td>{$usuarios[$j]->turno}</td>
                                                <td>{$usuarios[$j]->tel}</td>
                                                <td>{$usuarios[$j]->celular}</td>
                                                <td>{$usuarios[$j]->direccion1}</td>
                                                <td>{$usuarios[$j]->direccion2}</td>
                                                <td>{$usuarios[$j]->provincia}</td>
                                                <td>{$usuarios[$j]->ciudad}</td>
                                                <td>{$usuarios[$j]->codigopostal}</td>
                                                <td>
                                                    <div class='btn-group' role='group' aria-label='Basic example'>
                                                        <button type='button' class='btn btn-alert' onclick='Test.agregarUsuario({$valorM})'>MODIFICAR</button>
                                                        <button type='button' class='btn btn-warning' onclick='Test.eliminarUsuario({$valorE})'>ELIMINAR</button>
                                                    </div>
                                                </td>
                                            </tr>";
                                
                            }
                        }   
                        $grilla2.="</tbody>
                        </table>";
                    $grilla2.="</div>";

                }
                                
                
                        
            }else{  
                if($usuarios!=false){// encontró 1 solo usuario 
                    $valorE = json_encode($usuarios);
                    $valorM = json_encode($usuarios);
                    $grilla2.='<div id="1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="1-tab">';
                    $grilla2.=$encabezado;

                    $grilla2.=   "<tbody>
                                    <tr>
                                    <th scope='row'>1</th>
                                    <td>$usuarios->id</td>
                                    <td>$usuarios->apellido</td>
                                    <td>$usuarios->nombre</td>
                                    <td>$usuarios->dni</td>
                                    <td>$usuarios->usuario</td>
                                    <td>$usuarios->clave</td>
                                    <td>$usuarios->fechadecumpleanios</td>
                                    <td>$usuarios->email</td>
                                    <td>$usuarios->perfil</td>
                                    <td>$usuarios->turno</td>
                                    <td>$usuarios->tel</td>
                                    <td>$usuarios->celular</td>
                                    <td>$usuarios->direccion1</td>
                                    <td>$usuarios->direccion2</td>
                                    <td>$usuarios->provincia</td>
                                    <td>$usuarios->ciudad</td>
                                    <td>$usuarios->codigopostal</td>
                                    <td>
                                        <div class='btn-group' role='group' aria-label='Basic example'>
                                            <button type='button' class='btn btn-alert' onclick='Test.agregarUsuario({$valorM})'>MODIFICAR</button>
                                            <button type='button' class='btn btn-warning' onclick='Test.eliminarUsuario({$valorE})'>ELIMINAR</button>                                                       
                                        </div>
                                    </td>
                                </tr>";                                    
                    $grilla2.=   "</tbody>
                            </table></div>";
                }else{//si no encontró ningun usuario con el filtro
                    return false;
                }
            }
            $grilla2.="</div></div>";
            //var_dump($grilla);
            return $grilla2;       

    }
    public function BorrarUsuario(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("
            delete 
            from usuarios 				
            WHERE id=:id");	
        $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
        $consulta->execute();
        return $consulta->rowCount();
    }   
    public function ModificarUsuario(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("
            update usuarios 
            set 
                apellido=:apellido,
                nombre=:nombre,                
                dni=:dni,
                clave=:clave,
                usuario=:usuario,
                fechadecumpleanios= :fechadecumpleanios,
                email= :email,
                perfil= :perfil,
                turno= :turno,
                tel= :tel,
                celular= :celular,
                direccion1= :direccion1,
                direccion2= :direccion2,
                provincia= :provincia,
                ciudad= :ciudad,
                codigopostal= :codigopostal                

            WHERE id=:id");
        $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':dni', $this->dni, PDO::PARAM_INT);
        $consulta->bindValue(':clave',$this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':usuario', $this->usuario, PDO::PARAM_STR);
        //ver los param ??
        //$statement->bindParam (":date", strtotime (date ("Y-m-d H:i:s")), PDO::PARAM_STR);
        $consulta->bindValue(':fechadecumpleanios',$this->fechadecumpleanios, PDO::PARAM_STR);
        $consulta->bindValue(':email',$this->email, PDO::PARAM_STR);
        $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
        $consulta->bindValue(':turno', $this->turno, PDO::PARAM_STR);
        $consulta->bindValue(':tel',$this->tel, PDO::PARAM_STR);
        $consulta->bindValue(':celular', $this->celular, PDO::PARAM_STR);
        $consulta->bindValue(':direccion1',$this->direccion1, PDO::PARAM_STR);
        $consulta->bindValue(':direccion2',$this->direccion2, PDO::PARAM_STR);
        $consulta->bindValue(':provincia', $this->provincia, PDO::PARAM_STR);
        $consulta->bindValue(':ciudad', $this->ciudad, PDO::PARAM_STR);
        $consulta->bindValue(':codigopostal',$this->codigopostal, PDO::PARAM_STR);
        

        return $consulta->execute();
    }
    public function InsertarElUsuario(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta(
            "INSERT INTO usuarios 
            (
                apellido,
                nombre,
                dni, 
                clave, 
                usuario, 
                fechadecumpleanios, 
                email, 
                perfil, 
                turno, 
                tel, 
                celular, 
                direccion1, 
                direccion2, 
                provincia, 
                ciudad, 
                codigopostal
                
            )
        values
            (
                :apellido,
                :nombre,
                :dni,
                :clave,
                :usuario,
                :fechadecumpleanios,
                :email,
                :perfil,
                :turno,
                :tel,
                :celular,
                :direccion1,
                :direccion2,
                :provincia,
                :ciudad,
                :codigopostal
            )");
        
        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':dni', $this->dni, PDO::PARAM_INT);
        $consulta->bindValue(':clave',$this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':usuario', $this->usuario, PDO::PARAM_STR);
        //ver los param ??
        //$statement->bindParam (":date", strtotime (date ("Y-m-d H:i:s")), PDO::PARAM_STR);
        $consulta->bindValue(':fechadecumpleanios',$this->fechadecumpleanios, PDO::PARAM_STR);
        $consulta->bindValue(':email',$this->email, PDO::PARAM_STR);
        $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
        $consulta->bindValue(':turno', $this->turno, PDO::PARAM_STR);
        $consulta->bindValue(':tel',$this->tel, PDO::PARAM_STR);
        $consulta->bindValue(':celular', $this->celular, PDO::PARAM_STR);
        $consulta->bindValue(':direccion1',$this->direccion1, PDO::PARAM_STR);
        $consulta->bindValue(':direccion2',$this->direccion2, PDO::PARAM_STR);
        $consulta->bindValue(':provincia', $this->provincia, PDO::PARAM_STR);
        $consulta->bindValue(':ciudad', $this->ciudad, PDO::PARAM_STR);
        $consulta->bindValue(':codigopostal',$this->codigopostal, PDO::PARAM_STR);
        
        $consulta->execute();		
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }    
    public static function TraerTodoLosUsuarios(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
                    
            //$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuarios");            
        
        $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuarios");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");	
    }
    public static function TraerUnUsuario($filt){
        //var_dump($filt);
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios WHERE dni=:dni OR nombre= :nombre OR apellido= :apellido");
        $consulta->bindValue(':dni',$filt, PDO::PARAM_INT);
        $consulta->bindValue(':nombre',$filt, PDO::PARAM_STR);
        $consulta->bindValue(':apellido',$filt, PDO::PARAM_STR);
        $consulta->execute();
        $UsuarioBuscado= $consulta->fetchAll(PDO::FETCH_CLASS,'Usuario');
        return $UsuarioBuscado;            
    }
    public static function VerificarUsuario($unUsuario,$unaClave){
        $usuarios=Usuario::TraerTodoLosUsuarios();
        foreach ($usuarios as $uss)
            if($uss->clave == $unaClave && $uss->usuario ==$unUsuario){
                return $uss; 
            }      
        return FALSE;            
    }

}