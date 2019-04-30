<?php
    require_once "entrada.php";
    require_once "salida.php";
    class Caja
    {
        public $id_caja;
        public $usuario_id;
        public $importe;
        public $fechayhora;
        public $detalle;
        public $id_comienzo_entrada;
        public $id_fin_entrada;
        public $id_comienzo_salida;
        public $id_fin_salida;
        //apertura
        public function Apertura($request, $response, $args) {
            $argumentos=$request->getParsedBody();
            $caja = new Caja();
            $respuesta = new stdClass();
            $caja->usuario_id=$argumentos['usuario'];
            $caja->importe=$argumentos['importe'];
            $caja->fechayhora=$argumentos['fecha'];
            $caja->detalle=$argumentos['detalle'];
            $caja->id_comienzo_entrada=1;
            $respuesta->resultadoIdCajaAbierta=$caja->AbrirCaja();
            if($respuesta->resultadoIdCajaAbierta>0){
                $respuesta->mensajeAperturaDeCaja="Apertura caja exitosa!!";
                $miEntrada=new Entrada();
                $miEntrada->usuario_id=$argumentos['usuario'];
                $miEntrada->id_caja=$respuesta->resultadoIdCajaAbierta;
                $miEntrada->importe=$argumentos['importe'];
                $miEntrada->fechayhora=$argumentos['fecha'];
                $miEntrada->detalle="apertura de caja";
                $respuesta->resultadoIdEntrada=$miEntrada->CargarUnaEntrada();
                if($respuesta->resultadoIdEntrada>0){
                    $respuesta->mensajeEntrada="Entrada de Caja exitosa!!";
                }else{
                    $respuesta->mensajeEntrada="Entrada de Caja erronea!!";
                }  
            }else{
                $respuesta->mensajeAperturaDeCaja="Apertura caja erronea!!";
            }
            return $response->withJson($respuesta,200);
        }
        //VerificarCajaAbierta
        public function VerificarCajaAbierta($request, $response, $args) {
            $argumentos=$request->getParsedBody();            
            $respuesta = new stdClass();            
            $respuesta->CajaAbierta=Caja::Verificar($argumentos['usuario']);            
            return $response->withJson($respuesta,200);
        }
        //formAltaEntrada
        public function FormAperturaCaja($request, $response, $args) {
            return Caja::generarFormAperturaCaja();
        }        
        //cierre
        public function Cierre($request, $response, $args) {
            $argumentos=$request->getParsedBody();            
            $respuesta = new stdClass();
            $miSalida=new Salida();
            //var_dump($argumentos);         
            $miSalida->usuario_id=$argumentos['usuario'];
            $miSalida->id_caja=$argumentos['idCaja'];
            $miSalida->importe=$argumentos['importe'];
            $miSalida->fechayhora=$argumentos['fecha'];
            $miSalida->detalle=$argumentos['detalle'];
            $respuesta->respuestaSalida=$miSalida->CargarUnaSalida();
            
            if($respuesta->respuestaSalida>0){
                $respuesta->mensajeAltaCorteDeCaja="alta corte de caja exitoso!!";
                $caja = new Caja();
                $caja->usuario_id=$argumentos['usuario'];
                $caja->id_caja=$argumentos['idCaja'];               
                $caja->id_fin_entrada=Caja::UltimoIdEntrada($miSalida->id_caja, $miSalida->usuario_id);
                $caja->id_fin_salida=$respuesta->respuestaSalida;
                if($caja->id_fin_entrada>0 && $caja->id_fin_salida>0){
                    $respuesta->resultadoCierreCaja=$caja->CierreCaja();
                }else{
                    $respuesta->resultadoCierreCaja=false;
                }
                if($respuesta->resultadoCierreCaja){
                    $respuesta->mensajeCierreCaja="Cierre de Caja exitosa!!";
                    $respuesta->importeCajaCierre=$caja->TraerImporte();
                    $imp = number_format($respuesta->importeCajaCierre, 2, ',', '.'); 
                    $respuesta->div="<div class='container opacidad'>
                                        <div class='p-3 mb-2 bg-secondary text-white rounded container'>
                                            <div class='input-group row'>
                                                <div class='col-8' >
                                                    <span id='spanTitelCaja'>Monto al cierre</span>
                                                </div>                            								
                                            </div>							
                                        </div>
                                        <div class='form-row'>                                
                                            <div class='form-group col-md-4'>
                                                <label for='inputImporteAperturCaja'>Importe</label>
                                                <input type='text' class='form-control' value={$imp} id='inputImporteAperturCaja' disabled>
                                            </div>
                                        </div>
                                    </div>";
                }else{
                    $respuesta->mensajeCierreCaja="Cierre de Caja erronea!!";
                }  
            }else{
                $respuesta->mensajeAltaCorteDeCaja="lta corte de caja erronea!!";
            }
            
            return $response->withJson($respuesta,200);
        }
        public function Actualizar($request, $response, $args) {
            $argumentos=$request->getParsedBody();            
            $obj=Alumno::TraerTodosPagosNoActualizados();//trae los pagos no actualizados
            $respuesta = new stdClass();
            if(count($obj->pagosNoActualizadas)>0){
                //apertura
                $caja = new Caja();
                $respuesta->cantidadDeRegistros = count($obj->pagosNoActualizadas);
                $caja->usuario_id=$argumentos['usuario'];
                $caja->importe=$argumentos['importe'];
                $caja->fechayhora=$argumentos['fecha'];
                $caja->detalle=$argumentos['detalle'];
                $caja->id_comienzo_entrada=1;
                $respuesta->resultadoIdCajaAbierta=$caja->AbrirCaja();
                if($respuesta->resultadoIdCajaAbierta>0){
                    $respuesta->mensajeAperturaDeCaja="Apertura caja exitosa!!";
                    $miEntrada=new Entrada();
                    $miEntrada->usuario_id=$argumentos['usuario'];
                    $miEntrada->id_caja=$respuesta->resultadoIdCajaAbierta;
                    $miEntrada->importe=$argumentos['importe'];
                    $miEntrada->fechayhora=$argumentos['fecha'];
                    $miEntrada->detalle="apertura de caja";
                    $respuesta->resultadoIdEntrada=$miEntrada->CargarUnaEntrada();
                    if($respuesta->resultadoIdEntrada>0){
                        $respuesta->mensajeEntrada="Entrada de Caja exitosa!!";
                    }else{
                        $respuesta->mensajeEntrada="Entrada de Caja erronea!!";
                    }  
                }else{
                    $respuesta->mensajeAperturaDeCaja="Apertura caja erronea!!";
                }
                if ($respuesta->resultadoIdCajaAbierta>0 && $respuesta->resultadoIdEntrada>0 ) {//apertura exitosa
                    
                    $response->getBody()->write("apertura caja exitosa");
                    //generar todas las entradas respetando la fecha de pago como fecha de entrada
                    $respuesta->SubidaPagosAEntrdas = Entrada::generarSQLInsertar($argumentos['usuario'],$respuesta->resultadoIdCajaAbierta,$obj->pagosNoActualizadas);
                    //actualizar por id del array una vez actualizada cambiar el null en "pasada"
                    if ($respuesta->SubidaPagosAEntrdas) {
                        $respuesta->ActualizacionPagosPasada = Pagos::ActualizarPasada($obj->pagosNoActualizadas);
                    }
                    //cerrar caja especial
                    $miSalida=new Salida();
                    //var_dump($argumentos);         
                    $miSalida->usuario_id=$argumentos['usuario'];
                    $miSalida->id_caja=$respuesta->resultadoIdCajaAbierta;
                    $miSalida->importe=0;
                    $miSalida->fechayhora=$argumentos['fecha'];
                    $miSalida->detalle=$argumentos['detalle'];
                    $respuesta->respuestaSalida=$miSalida->CargarUnaSalida();
                    
                    if($respuesta->respuestaSalida>0){
                        $respuesta->mensajeAltaCorteDeCaja="alta corte de caja exitoso!!";
                        $caja = new Caja();
                        $caja->usuario_id=$argumentos['usuario'];
                        $caja->id_caja=$respuesta->resultadoIdCajaAbierta;              
                        $caja->id_fin_entrada=Caja::UltimoIdEntrada($miSalida->id_caja, $miSalida->usuario_id);
                        $caja->id_fin_salida=$respuesta->respuestaSalida;
                        if($caja->id_fin_entrada>0 && $caja->id_fin_salida>0){
                            $respuesta->resultadoCierreCaja=$caja->CierreCaja();
                        }else{
                            $respuesta->resultadoCierreCaja=false;
                        }
                        if($respuesta->resultadoCierreCaja){
                            $respuesta->mensajeCierreCaja="Cierre de Caja exitosa!!";
                            $respuesta->importeCajaCierre=$caja->TraerImporte();
                            $imp = number_format($respuesta->importeCajaCierre, 2, ',', '.'); 
                            $respuesta->div="<div class='p-3 mb-2 bg-secondary text-white rounded container'>
                                                <div class='input-group row'>
                                                    <div class='col-8' >
                                                        <span id='spanTitelCaja'>Monto al cierre</span>
                                                    </div>                            								
                                                </div>							
                                            </div>
                                            <div class='form-row'>                                
                                                <div class='form-group col-md-4'>
                                                    <label for='inputImporteAperturCaja'>Importe</label>
                                                    <input type='text' class='form-control' value={$imp} id='inputImporteAperturCaja' disabled>
                                                </div>
                                            </div>";
                        }else{
                            $respuesta->mensajeCierreCaja="Cierre de Caja erronea!!";
                        }  
                    }else{
                        $respuesta->mensajeAltaCorteDeCaja="Alta corte de caja erronea!!";
                    }            
                }else{//apertura fallida
                    $respuesta->$mensajeAperturaFallida = $respuesta->mensajeAperturaDeCaja+" o "+$respuesta->mensajeEntrada;
                }
            }else{
                $respuesta->cantidadDeRegistros = 0;
            }
            
            return $response->withJson($respuesta,200);
        }
        public function Estadisticas($request, $response, $args) {
            $ArrayCajas =Caja::TraerCajas();
            return $response->withJson($ArrayCajas,200);
        }
        public function TraerTodoDeUnaCaja($request, $response, $args) {
            $argumentos=$request->getParsedBody();
            $ArrayCajas =Caja::TraerTodoDeCaja($argumentos['idCaja']);
            return $response->withJson($ArrayCajas,200);
        }

/******************************************************************************************************* */
        public function CargarUnaEntrada(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta(
                "INSERT INTO entradas
                (
                    usuario_id,
                    id_caja,
                    importe,
                    fechayhora,
                    detalle
                )
                    values
                (
                    :usuario_id,
                    :id_caja,
                    :importe,
                    :fechayhora,
                    :detalle                    
                )");            
            $consulta->bindValue(':usuario_id', $this->usuario_id, PDO::PARAM_INT);
            $consulta->bindValue(':importe', $this->importe, PDO::PARAM_INT);
            $consulta->bindValue(':id_caja', $this->id_caja, PDO::PARAM_INT);	
            $consulta->bindValue(':fechayhora',$this->fechayhora, PDO::PARAM_STR);
            $consulta->bindValue(':detalle', $this->detalle, PDO::PARAM_STR);
    
            $consulta->execute();		
            return $objetoAccesoDato->RetornarUltimoIdInsertado();
        }
        public function AbrirCaja(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta(
                "INSERT INTO caja
                ( 
                    usuario_id,
                    importe, 
                    fechayhora, 
                    detalle, 
                    id_comienzo_entrada
                )
                    values
                (
                    :usuario_id,
                    :importe,
                    :fechayhora,
                    :detalle, 
                    :id_comienzo_entrada                   
                )");            
            $consulta->bindValue(':usuario_id', $this->usuario_id, PDO::PARAM_INT);
            $consulta->bindValue(':importe', $this->importe, PDO::PARAM_INT);		
            $consulta->bindValue(':fechayhora',$this->fechayhora, PDO::PARAM_STR);
            $consulta->bindValue(':detalle', $this->detalle, PDO::PARAM_STR);
            $consulta->bindValue(':id_comienzo_entrada', $this->id_comienzo_entrada, PDO::PARAM_INT);
    
            $consulta->execute();		
            return $objetoAccesoDato->RetornarUltimoIdInsertado();
        }
        public static function UltimoIdEntrada($idCaja,$idUsuario){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT MAX(id_entrada) AS id FROM entradas WHERE (id_caja=:id_caja) AND (usuario_id=:usuario_id)");
            $consulta->bindValue(':id_caja', $idCaja, PDO::PARAM_INT);
            $consulta->bindValue(':usuario_id', $idUsuario, PDO::PARAM_INT);
            $consulta->execute();
            $obj= $consulta->fetch(PDO::FETCH_LAZY);
            return $obj->id;
        }
        public function CierreCaja(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta(
            "UPDATE caja SET id_fin_entrada=:id_fin_entrada, id_fin_salida=:id_fin_salida WHERE (usuario_id=:usuario_id) AND (id_caja=:id_caja)");
            $consulta->bindValue(':id_fin_entrada', $this->id_fin_entrada, PDO::PARAM_INT);
            $consulta->bindValue(':id_fin_salida', $this->id_fin_salida, PDO::PARAM_INT);
            $consulta->bindValue(':usuario_id', $this->usuario_id, PDO::PARAM_INT);
            $consulta->bindValue(':id_caja', $this->id_caja, PDO::PARAM_INT);
            return $consulta->execute();
        }
        public function TraerImporte(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta(
            "SELECT importe FROM caja WHERE (id_caja=:id_caja)");            
            $consulta->bindValue(':id_caja', $this->id_caja, PDO::PARAM_INT);    
            $consulta->execute();
            $objImporte = $consulta->fetch(PDO::FETCH_LAZY);//retorna obj->importe
            return $objImporte->importe;
        }
        public static function generarFormAperturaCaja(){
            $form=  "<br>
                <div class='container-fluid opacidad '>
                    <br>
                    <div class='pt-1 pb-1 bg-secondary text-white rounded container fullWidth'>
                        <div class='input-group row'>
                            <div class='col-8'  >
                                <span id='spanTitelCaja'></span>
                            </div>                            								
                        </div>							
                    </div>
                    <div class='form-row'>
                        <div class='form-group col-md-4'hidden>
                            <label for='inputFechaYHoraAperturaCaja'>Feha y Hora</label>
                            <input type='datetime-local' class='form-control' id='inputFechaYHoraAperturaCaja' disabled >
                        </div>
                        <div class='form-group col-md-4'>
                            <label for='inputImporteAperturCaja'>Importe</label>
                            <input type='text' class='form-control' id='inputImporteAperturCaja' placeholder=':importe'>
                        </div>
                        <div class='form-group col-md-8'>
                            <label for='textAreaDetalle'>Detalle</label>
                            <textarea  type='textarea' class='form-control' rows='1' id='textAreaDetalle' placeholder=':detalle'></textarea>
                        </div>
                        <div class='form-group col-md-4' hidden>
                            <label for='inputUsuario'>Usuario</label>
                            <input type='text' class='form-control' id='inputUsuario' placeholder='':usuario' disabled>
                        </div>
                        <div class='form-group col-md-4'>
                            <button type='botton' onclick='Test.AperturaCaja()' id='btnFormCaja' class='btn btn-secondary text-white rounded'>abrir</button>
                        </div>
                        <br>                       
                    </div>                    
                </div>";

            return $form;
        }
        public static function Verificar($id){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta(
            "SELECT * FROM caja WHERE (usuario_id=:usuario_id) AND (id_fin_entrada IS NULL)AND (id_fin_salida IS NULL)");            
            $consulta->bindValue(':usuario_id', $id, PDO::PARAM_INT);    
            $consulta->execute(); 
            return $consulta->fetchObject('Caja'); //retorna caja abierta
        }
        public static function TraerCajas(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM caja WHERE 1");            
            $consulta->execute(); 
            return $consulta->fetchAll(PDO::FETCH_CLASS, "Caja"); 
        }
        public static function TraerTodoDeCaja($id){
            $respuesta= new stdClass();
            //entradas
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM entradas WHERE id_caja = :id");
            $consulta->bindValue(':id', $id, PDO::PARAM_INT);           
            $consulta->execute(); 
            $respuesta->entradas=$consulta->fetchAll(PDO::FETCH_CLASS, "Entrada");
            //salidas
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM salidas WHERE id_caja = :id");
            $consulta->bindValue(':id', $id, PDO::PARAM_INT);           
            $consulta->execute(); 
            $respuesta->salidas=$consulta->fetchAll(PDO::FETCH_CLASS, "Salida");
            return $respuesta;
        }
    }
?>