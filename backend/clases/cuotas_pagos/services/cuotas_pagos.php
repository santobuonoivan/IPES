<?php

    function generarDivCuotasDeUnAlumno2($vecCuotas){//recibe un vector de cuotas o pagos grid editable,responsive
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

    function generarDivPagosDeUnAlumno2($vecPagos){//recibe un vector de cuotas o pagos grid editable,responsive
        $div = "<!-- JS -->
                            <script src='https://code.jquery.com/jquery-3.1.1.min.js' ></script>
                            <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
                            <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>
                            <link rel='stylesheet' href='libs/css/style.css'>
                            <!-- AGREGO LA LIBRERIA DE JQUERY -->
                            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                
                            <h1>Pagos</h1>                        
                            <div class='table-responsive ' id='table2'>
                                <table class='table table-sm'>
                                    <thead>
                                        <tr> 
                                            <th scope='col' class='id2'>Id</th>
                                            <th scope='col' class='idAlumno2'>IdAlumno</th>
                                            <th scope='col' class='misTds'>Concepto</th>
                                            <th scope='col' class='misTds'>Fecha</th>
                                            <th scope='col' class='misTds'>Importe</th>
                                            <th scope='col'></th>
                                            <th scope='col'></th>
                                            <th scope='col'></th>
                                            <th><span class='table2-add glyphicon glyphicon-plus'></span></th>
                                        </tr>
                                    </thead>
                                    <tbody>";

        for($i=0;$i<count($vecPagos);$i++){
            $div.=          "<tr>
                                            <td scope='col' class='id2' contenteditable='false'>".$vecPagos[$i]->id."</td>
                                            <td scope='col' class='idAlumno2' contenteditable='false'>".$vecPagos[$i]->id_alumno."</td>
                                                                                             
                                            <td scope='col' contenteditable='true'  class='misTds'>".$vecPagos[$i]->concepto."</td>";
            $div.=      "<td scope='col' contenteditable='true' class='misTds'>".$vecPagos[$i]->fecha."</td>";
            $div.=      "<td scope='col' contenteditable='true' class='misTds'>".$vecPagos[$i]->importe."</td>
                                            <td>
                                                <span class='table2-remove glyphicon glyphicon-remove'></span>
                                            </td>
                                            <td>
                                                <span class='table2-up glyphicon glyphicon-arrow-up'></span>
                                                <span class='table2-down glyphicon glyphicon-arrow-down'></span>
                                            </td>
                                            <td>
                                                <span class='table2-check glyphicon glyphicon glyphicon-ok'></span>                                        
                                            </td>
                                        </tr>";
        }
        $div.=          "<!-- This is our clonable table line -->
                                        <tr class='d-none' id='trClone2'>    
                                            <td scope='col' class='id2' contenteditable='false'></td>
                                            <td scope='col' class='idAlumno2' contenteditable='false'>".$vecPagos[0]->id_alumno."</td>                                               
                                            <td scope='col' class='misTds' contenteditable='true' placeholder='concepto'></td>
                                            <td scope='col' class='misTds' contenteditable='true' placeholder='fecha'></td>
                                            <td scope='col' class='misTds' contenteditable='true' placeholder='improte'></td>
                                            <td>
                                                <span class='table2-remove glyphicon glyphicon-remove'></span>
                                            </td>
                                            <td>
                                                <span class='table2-up glyphicon glyphicon-arrow-up'></span>
                                                <span class='table2-down glyphicon glyphicon-arrow-down'></span>
                                            </td>
                                            <td>
                                                <span class='table2-check glyphicon glyphicon glyphicon-ok'></span>                                        
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                            <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
                            <script src='http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore.js'></script>
                            <script src='libs/js/index2.js'></script>";
        return $div;
    }
    function generarSQLInsertar($vecPagos){//recibe un vector de cuotas o pagos
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

    function generarSQLInsertarModificar($vecCuotas){//recibe un vector de cuotas o pagos
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

    function generarDivCuotasDeUnAlumno($vecCuotas){//recibe un vector de cuotas o pagos
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
                        <tbody>";

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


?>