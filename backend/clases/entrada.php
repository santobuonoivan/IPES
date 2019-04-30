<?php

    class Entrada{
        public $id_entrada;
        public $usuario_id;
        public $id_caja;
        public $importe;
        public $fechayhora;
        public $detalle;

        //alta
        public function CargarUno($request, $response, $args) {
            $argumentos=$request->getParsedBody();
            $miEntrada=new Entrada();
            $obj=new stdClass();
            $miEntrada->usuario_id=$argumentos['usuario'];
            $miEntrada->id_caja=$argumentos['idCaja'];
            $miEntrada->importe=$argumentos['importe'];
            $miEntrada->fechayhora=$argumentos['fecha'];
            $miEntrada->detalle=$argumentos['detalle'];
            $obj->respuestaEntrada=$miEntrada->CargarUnaEntrada();            		
            if($obj->respuestaEntrada>0){
                $obj->mensajeEntrada="Alta exitosa!!";
                $obj->respuestaModificacionCaja=$miEntrada->ModificarImporteDeCaja();
                if($obj->respuestaModificacionCaja>0){
                    $obj->mensajeModificacionCaja="modificacion Caja exitosa!!";
                }else{
                    $obj->mensajeModificacionCaja="modificacion Caja erronea!!";
                }  
            }else{
                $obj->mensajeEntrada="Alta erronea!!";
            }		
            return $response->withJson($obj,200);
        }
        //formAltaEntrada
        public function formAltaEntrada($request, $response, $args) {
            //$argumentos=$request->getParsedBody();            
            return Entrada::generarFormAltaEntrada();
        }

        /****************************************************************************************************/
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
            $consulta->bindValue(':id_caja', $this->id_caja, PDO::PARAM_INT);
            $consulta->bindValue(':importe', $this->importe, PDO::PARAM_INT);		
            $consulta->bindValue(':fechayhora',$this->fechayhora, PDO::PARAM_STR);
            $consulta->bindValue(':detalle', $this->detalle, PDO::PARAM_STR);    
            $consulta->execute();

            return $objetoAccesoDato->RetornarUltimoIdInsertado();
        }
        public static function generarSQLInsertar($usuario_id,$id_caja,$vecPagos){//recibe un vector de cuotas o pagos
            $pagos="INSERT INTO entradas ( usuario_id,id_caja,importe,fechayhora,detalle) values";
            for ($i=0; $i < count($vecPagos); $i++) { 
                if($i!=(count($vecPagos)-1)){
                    $pagos.="({$usuario_id},'{$id_caja}',{$vecPagos[$i]->importe},'{$vecPagos[$i]->fecha}','{$vecPagos[$i]->concepto} de alumno id: {$vecPagos[$i]->id_alumno}'),";
                }else {
                    $pagos.="({$usuario_id},'{$id_caja}',{$vecPagos[$i]->importe},'{$vecPagos[$i]->fecha}','{$vecPagos[$i]->concepto} de alumno id: {$vecPagos[$i]->id_alumno}')";
                }
                
            }
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta($pagos);
            return $consulta->execute();
        }
        public function ModificarImporteDeCaja(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta(
            "UPDATE caja SET importe=importe+:importe WHERE (usuario_id=:usuario_id) AND (id_caja=:id_caja)");
            $consulta->bindValue(':usuario_id', $this->usuario_id, PDO::PARAM_INT);
            $consulta->bindValue(':id_caja', $this->id_caja, PDO::PARAM_INT);
            $consulta->bindValue(':importe', $this->importe, PDO::PARAM_INT);
    
            return $consulta->execute();
        }
        public static function generarFormAltaEntrada(){
            $form="";
            return $form;
        }
    }
?>