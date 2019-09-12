<?php
    require_once "./../model/cuotas.php";
    require_once "./../servicies/cuotas_pagos.php";

    class ControllerCuotas
    {
        public static function generarArrayCuotasPagos($obj){
            //cuotas
                $cuotas=array();
                $fecha_actual = date("Y-m-d");                              
                $id = $obj->id;
                $matricula=$obj->valores['matricula'];
                $cuota=$obj->valores['cuota'];
                

                $a = new Cuotas();
                $a->id_alumno =$id;
                $a->concepto="Matricula";
                $a->fecha =$fecha_actual;
                $a->importe = $matricula;
                //var_dump($a);
                array_push($cuotas,$a);
                //usar gestionarDescuento();
                for ($i=0; $i < $obj->valores['cantcuotas']; $i++) {
                    $a = new Cuotas();
                    $a->id_alumno =$id;
                    $a->concepto="Cuota".($i+1);
                    $a->fecha =$fecha_actual;
                    $a->importe = $cuota;
                    array_push($cuotas,$a);
                }
            //pagos
                $pagos=array();
                $pago = $obj->pago;
                if($pago >= $obj->valores['matricula']){
                    $b = new Cuotas();
                    $b->id_alumno =$id;
                    $b->concepto="Matricula";
                    $b->fecha =$fecha_actual;
                    $b->importe = $matricula;
                    array_push($pagos,$b);
                    $pago=$pago - $obj->valores['matricula']; 
                }
                $i=0;
                while ($pago >= $obj->valores['cuota']) {
                    $b = new Cuotas();
                    $b->id_alumno =$id;
                    $b->concepto="Cuota".($i+1);
                    $b->fecha =$fecha_actual;
                    $b->importe = $cuota;
                    array_push($pagos,$b);
                    $pago=$pago - $cuota;
                    $i++;
                }
                if($pago >0){//sobrante
                    $b = new Cuotas();
                    $b->id_alumno =$id;
                    $b->concepto="Cuota".($i+1);
                    $b->fecha =$fecha_actual;
                    $b->importe = $pago;
                    array_push($pagos,$b);                    
                }
            //respuesta
                $respuesta= new stdClass();
                $respuesta->cuotas=$cuotas;
                $respuesta->pagos=$pagos;
            return $respuesta;
        }
        public static function gestionarDescuento($unaCuota,$unDescuento,$argumento){
            //generar descuentos
        }
        public static function agregarCuota($idAlumno){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO cuotas(id_alumno)VALUES(:id_alumno)");
            $consulta->bindValue(':id_alumno',$idAlumno, PDO::PARAM_INT);
            $consulta->execute();		
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
        }
        public static function borrarCuota($idCuota){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM cuotas WHERE id =:id");
            $consulta->bindValue(':id',$idCuota, PDO::PARAM_INT);
            $consulta->execute();
            return $consulta->rowCount();
        }
        public static function modificarCuota($cuota){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("
            UPDATE 
                cuotas 
                    SET                         
                        id_alumno=:id_alumno,
                        concepto=:concepto,
                        fecha=:fecha,
                        importe=:importe                
                    WHERE id=:id");
            //BINDEAMOS VALORES
            $consulta->bindValue(':id',$cuota->id, PDO::PARAM_INT);
            $consulta->bindValue(':id_alumno',$cuota->id_alumno, PDO::PARAM_INT);
            $consulta->bindValue(':concepto', $cuota->concepto, PDO::PARAM_STR);
            $consulta->bindValue(':fecha', $cuota->fecha, PDO::PARAM_STR);
            $consulta->bindValue(':importe',$cuota->importe, PDO::PARAM_INT);
            return $consulta->execute();
        }
    }