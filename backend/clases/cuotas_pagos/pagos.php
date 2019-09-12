<?php


    class Pagos
    {
        public $id;
        public $id_alumno;
        public $concepto;
        public $fecha;
        public $importe;
        public $pasada;

        public function __constructor($un_id_alumno,$un_Concepto,$una_fecha,$un_importe,$un_id=null){
            $this->id=$un_id;
            $this->id_alumno=$un_id_alumno;
            $this->concepto=$un_Concepto;
            $this->fecha=$una_fecha;
            $this->importe=$un_importe;
        }
        public static function generarSQLInsertar($vecPagos){//recibe un vector de cuotas o pagos
            $pagos="";
            for ($i=0; $i < count($vecPagos); $i++) { 
                if($i!=(count($vecPagos)-1)){
                    $pagos.="({$vecPagos[$i]->id_alumno},'{$vecPagos[$i]->concepto}','{$vecPagos[$i]->fecha}',{$vecPagos[$i]->importe}),";
                }else {
                    $pagos.="({$vecPagos[$i]->id_alumno},'{$vecPagos[$i]->concepto}','{$vecPagos[$i]->fecha}',{$vecPagos[$i]->importe})";
                }
                
            }
            return $pagos;
        }
        public static function generarDivPagosDeUnAlumno($vecPagos){//recibe un vector de cuotas o pagos
            $grilla="<div class=' table-responsive'>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col'>#</th>
                                    <th scope='col'>Concepto</th>
                                    <th scope='col'>Fecha</th>
                                    <th scope='col'>Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";

                    for($i=0;$i<count($vecPagos);$i++){                    
                        $grilla.=   "<tr>
                                        <th scope='row'>".($i+1)."</th>
                                        <td scope='col'>".$vecPagos[$i]->concepto."</td>";
                        $grilla.=       "<td scope='col'>".$vecPagos[$i]->fecha."</td>";
                        $grilla.=       "<td scope='col'>".$vecPagos[$i]->importe."</td>
                                    </tr>";                    
                    }
                $grilla.=     "
                            </tbody>
                        </table>
                    </div>";
            return $grilla;
        }
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
        public function modificarPago(){
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
            $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
            $consulta->bindValue(':id_alumno',$this->id_alumno, PDO::PARAM_INT);
            $consulta->bindValue(':concepto', $this->concepto, PDO::PARAM_STR);
            $consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);		
            $consulta->bindValue(':importe',$this->importe, PDO::PARAM_INT);            
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