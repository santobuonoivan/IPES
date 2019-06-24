<?php

    class Salida{
        public $id_entrada;
        public $usuario_id;
        public $id_caja;
        public $importe;
        public $fechayhora;
        public $detalle;
    
        public function CargarUno($request, $response, $args) {
            $argumentos=$request->getParsedBody();
            $miSalida=new Salida();
            $obj=new stdClass();
            $miSalida->usuario_id=$argumentos['usuario'];
            $miSalida->id_caja=$argumentos['idCaja'];
            $miSalida->importe=$argumentos['importe'];
            $miSalida->fechayhora=$argumentos['fecha'];
            $miSalida->detalle=$argumentos['detalle'];
            $obj->respuestaSalida=$miSalida->CargarUnaSalida();            		
            $elPrimero=$miSalida->EsPrimerSalida();

            if($obj->respuestaSalida>0){
                $obj->mensajeSalida="Alta exitosa!!";
                if($elPrimero){
                    $obj->respuestaModificacionCaja=$miSalida->ModificarImporteDeCaja($obj->respuestaSalida);
                }else{
                    $obj->respuestaModificacionCaja=$miSalida->ModificarImporteDeCaja();
                }                
                if($obj->respuestaModificacionCaja){
                    $obj->mensajeModificacionCaja="modificacion Caja exitosa!!";
                }else{
                    $obj->mensajeModificacionCaja="modificacion Caja erronea!!";
                }  
            }else{
                $obj->mensajeSalida="Alta erronea!!";
            }		
            return $response->withJson($obj,200);
        }
        //formAltaEntrada
        public function formAltaSalida($request, $response, $args) {
            //$argumentos=$request->getParsedBody();            
            return Salida::generarFormAltaSalida();
        } 
        /****************************************************************************************************/
        public function CargarUnaSalida(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta(
                "INSERT INTO salidas
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
            $consulta->bindValue(':id_caja', $this->id_caja, PDO::PARAM_INT);
            $consulta->bindValue(':importe', $this->importe, PDO::PARAM_INT);		
            $consulta->bindValue(':fechayhora',$this->fechayhora, PDO::PARAM_STR);
            $consulta->bindValue(':detalle', $this->detalle, PDO::PARAM_STR);    
            $consulta->execute();		
            return $objetoAccesoDato->RetornarUltimoIdInsertado();
        }
        public function ModificarImporteDeCaja($id_comienzo_salida = NULL){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            if($id_comienzo_salida == NULL){//no es el primero
                $consulta =$objetoAccesoDato->RetornarConsulta(
                "UPDATE caja SET importe=importe-:importe WHERE (usuario_id=:usuario_id) AND (id_caja=:id_caja)");
                $consulta->bindValue(':usuario_id', $this->usuario_id, PDO::PARAM_INT);
                $consulta->bindValue(':id_caja', $this->id_caja, PDO::PARAM_INT);
                $consulta->bindValue(':importe', $this->importe, PDO::PARAM_INT);
            }else{//es el primero
                $consulta =$objetoAccesoDato->RetornarConsulta(
                "UPDATE caja SET importe=importe-:importe, id_comienzo_salida=:id_comienzo_salida WHERE (usuario_id=:usuario_id) AND (id_caja=:id_caja)");
                $consulta->bindValue(':usuario_id', $this->usuario_id, PDO::PARAM_INT);
                $consulta->bindValue(':id_comienzo_salida', $id_comienzo_salida, PDO::PARAM_INT);
                $consulta->bindValue(':id_caja', $this->id_caja, PDO::PARAM_INT);
                $consulta->bindValue(':importe', $this->importe, PDO::PARAM_INT);
            }            
            return $consulta->execute();
        }
        public function EsPrimerSalida(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta(
            "SELECT * FROM caja WHERE (usuario_id=:usuario_id) AND (id_caja=:id_caja) AND (id_comienzo_salida IS NULL)");
            $consulta->bindValue(':usuario_id', $this->usuario_id, PDO::PARAM_INT);
            $consulta->bindValue(':id_caja', $this->id_caja, PDO::PARAM_INT);            
            $consulta->execute();
            $respuesta= $consulta->fetchObject('Salida');
            return is_object($respuesta);
        }
        public static function generarFormAltaSalida(){
            $form="";
            return $form;
        }
    }
?>