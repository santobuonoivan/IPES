<?php

    require_once "./../model/pagos.php";
    require_once "./../servicies/cuotas_pagos.php";

    class ControllerPagos
    {
        
        public static function agregarPago($idAlumno){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO pagos(id_alumno)VALUES(:id_alumno)");
            $consulta->bindValue(':id_alumno',$idAlumno, PDO::PARAM_INT);
            $consulta->execute();		
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
        }
        public static function borrarPago($idPago){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM pagos WHERE id=:id");
            $consulta->bindValue(':id',$idPago, PDO::PARAM_INT);
            $consulta->execute();
            return $consulta->rowCount();
        }
        public function modificarPago($pago){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("
            UPDATE 
                pagos 
                    SET                         
                        id_alumno=:id_alumno,
                        concepto=:concepto,
                        fecha=:fecha,
                        importe=:importe                
                    WHERE id=:id");
            //BINDEAMOS VALORES
            $consulta->bindValue(':id',$pago->id, PDO::PARAM_INT);
            $consulta->bindValue(':id_alumno',$pago->id_alumno, PDO::PARAM_INT);
            $consulta->bindValue(':concepto', $pago->concepto, PDO::PARAM_STR);
            $consulta->bindValue(':fecha', $pago->fecha, PDO::PARAM_STR);		
            $consulta->bindValue(':importe',$pago->importe, PDO::PARAM_INT);            
            return $consulta->execute();
        }
        public static function ActualizarPasada($vecPagos){

            $query="UPDATE pagos SET pasada=1 WHERE ";
            for ($i=0; $i < count($vecPagos); $i++) { 
                if($i!=(count($vecPagos)-1)){
                    $query.="id={$vecPagos[$i]->id} OR ";
                }else {
                    $query.="id={$vecPagos[$i]->id}";
                }                
            }//ver el querty
            

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta($query);                    
            return $consulta->execute();
        }           
    }
?>