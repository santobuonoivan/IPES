<?php


    class Cuotas
    {
        public $id;
        public $id_alumno;
        public $concepto;
        public $fecha;
        public $importe;
        public $pasada;
        
        

        public static function generarSQLInsertar($vecCuotas){//recibe un vector de cuotas o pagos
            $cuotas="";
            for ($i=0; $i < count($vecCuotas); $i++) { 
                if($i!=(count($vecCuotas)-1)){
                    $cuotas.="({$vecCuotas[$i]->id_alumno},'{$vecCuotas[$i]->concepto}','{$vecCuotas[$i]->fecha}',{$vecCuotas[$i]->importe}),";
                }else {
                    $cuotas.="({$vecCuotas[$i]->id_alumno},'{$vecCuotas[$i]->concepto}','{$vecCuotas[$i]->fecha}',{$vecCuotas[$i]->importe})";
                }
                
            }            
            return $cuotas;
        }
        public static function generarSQLModificar($vecCuotas){//recibe un vector de cuotas o pagos
            $cuotas="";
            for ($i=0; $i < count($vecCuotas); $i++) { 
                if($i!=(count($vecCuotas)-1)){
                    $cuotas.="({$vecCuotas[$i]->id_alumno},'{$vecCuotas[$i]->concepto}','{$vecCuotas[$i]->fecha}',{$vecCuotas[$i]->importe}),";
                }else {
                    $cuotas.="({$vecCuotas[$i]->id_alumno},'{$vecCuotas[$i]->concepto}','{$vecCuotas[$i]->fecha}',{$vecCuotas[$i]->importe})";
                }
                
            }
            return $cuotas;
        }
        public static function generarDivCuotasDeUnAlumno($vecCuotas){//recibe un vector de cuotas o pagos
            $grilla="<div class='table-responsive'>
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

                    for($i=0;$i<count($vecCuotas);$i++){
                        $grilla.=   "<tr>
                                        <th scope='row'>".($i+1)."</th>";                   
                        $grilla.=       "<td scope='col'>".$vecCuotas[$i]->concepto."</td>";
                        $grilla.=       "<td scope='col'>".$vecCuotas[$i]->fecha."</td>";
                        $grilla.=       "<td scope='col'>".$vecCuotas[$i]->importe."</td>
                                    </tr>";                    
                    }
                $grilla.=   "</tbody>
                        </table>
                    </div>";
            return $grilla;
        }
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
        public static function generarDivCuotasDeUnAlumno2($vecCuotas){//recibe un vector de cuotas o pagos grid editable,responsive
            $div = "
                        <!-- JS -->
                        <script src='https://code.jquery.com/jquery-3.1.1.min.js' ></script>
                        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
                        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>
                        <link rel='stylesheet' href='libs/css/style.css'>
                        
                        <!-- AGREGO LA LIBRERIA DE JQUERY -->
                        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                        
                        
                    <h1>Cuotas</h1>                    
                    <div class='table-responsive ' id='table1'>
                        <table class='table table-sm'>
                            <thead>
                                <tr> 
                                    <th scope='col' class='id'>Id</th> 
                                    <th scope='col' class='idAlumno'>IdAlumno</th>                                   
                                    <th scope='col' class='misTds'>Concepto</th>
                                    <th scope='col' class='misTds'>Fecha</th>
                                    <th scope='col' class='misTds'>Importe</th>
                                    <th scope='col'></th>
                                    <th scope='col'></th>
                                    <th scope='col'></th>
                                    <th><span class='table1-add glyphicon glyphicon-plus'></span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- This is our clonable table line -->
                                <tr class='d-none' id='trClone1'>
                                    <td scope='col' class='id' contenteditable='false' placeholder='id'></td>  
                                    <td scope='col' class='idAlumno' contenteditable='false'>".$vecCuotas[0]->id_alumno."</td>                                                
                                    <td scope='col' class='misTds' contenteditable='true' placeholder='concepto'></td>
                                    <td scope='col' class='misTds' contenteditable='true' placeholder='fecha'>0000-00-00</td>
                                    <td scope='col' class='misTds' contenteditable='true' placeholder='improte'>0</td>
                                    <td>
                                        <span class='table1-remove glyphicon glyphicon-remove'></span>
                                    </td>
                                    <td>
                                        <span class='table1-up glyphicon glyphicon-arrow-up'></span>
                                        <span class='table1-down glyphicon glyphicon-arrow-down'></span>
                                    </td>
                                    <td>
                                        <span class='table1-check glyphicon glyphicon glyphicon-ok'></span>                                        
                                    </td>
                                </tr>";

                    for($i=0;$i<count($vecCuotas);$i++){                    
                        $div.=  "<tr>
                                    <td scope='col' class='id' contenteditable='false'>".$vecCuotas[$i]->id."</td>
                                    <td scope='col' class='idAlumno' contenteditable='false'>".$vecCuotas[$i]->id_alumno."</td>                                                
                                    <td scope='col' class='misTds' contenteditable='true'>".$vecCuotas[$i]->concepto."</td>";
                        $div.=      "<td scope='col' class='misTds' contenteditable='true'>".$vecCuotas[$i]->fecha."</td>";
                        $div.=      "<td scope='col' class='misTds' contenteditable='true'>".$vecCuotas[$i]->importe."</td>
                                    <td>
                                        <span class='table1-remove glyphicon glyphicon-remove'></span>
                                    </td>
                                    <td>
                                        <span class='table1-up glyphicon glyphicon-arrow-up'></span>
                                        <span class='table1-down glyphicon glyphicon-arrow-down'></span>
                                    </td>
                                    <td>
                                        <span class='table1-check glyphicon glyphicon glyphicon-ok'></span>                                        
                                    </td>
                                </tr>";                    
                    }
                    $div.=  "</tbody>
                        </table>
                    </div>
                    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
                    <script src='http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore.js'></script>
                    <script src='libs/js/index.js'></script>";
                    
            return $div;
            
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
        public function modificarCuota(){
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
            $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
            $consulta->bindValue(':id_alumno',$this->id_alumno, PDO::PARAM_INT);
            $consulta->bindValue(':concepto', $this->concepto, PDO::PARAM_STR);
            $consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);		
            $consulta->bindValue(':importe',$this->importe, PDO::PARAM_INT);            
            return $consulta->execute();
        }
        
    }