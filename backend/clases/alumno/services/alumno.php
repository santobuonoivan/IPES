<?php

function generarDivAlumno($alumnos){

    /************************************************************************************************/
    /******************************************  ARMO SOLAPAS  **************************************/
    $modales="";
    $grilla2=   '<div class="container-fluid opacidad" >
							<h2>Alumnos</h2>
							<ul class="nav nav-tabs" id="myTab" role="tablist">';

    //CARGO TAGS O SOLAPAS DE LA LISTA AGRUPADOS DE A 10
    if(is_array($alumnos)){
        $totalDeRegistros=count($alumnos);
        $cantDeAgrupamiento=10;
        $cantidadDeTabs=intdiv($totalDeRegistros,$cantDeAgrupamiento);
        $resto=$totalDeRegistros%$cantDeAgrupamiento;


        if(count($alumnos)%10 > 0){
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
    /************************************************************************************************/


    //  CARGO CONTENIDO DE HOJAS
    $grilla2.=  '<div class="tab-content" id="myTabContent">';

    $encabezado=   '<table class="table table-responsive table-hover">
												<thead class="bg-info">
													<tr>
																									
														<th scope="col">#</th>												
														<th scope="col">ID</th>
														<th scope="col">DNI</th>
														<th scope="col">NOMBRE</th>
														<th scope="col">APELLIDO</th>
														<th scope="col">SEXO</th>
														<th scope="col">LEGAJO</th>
														<th scope="col">ID CARRERA</th>
														<th scope="col">FECHA DE INSCRIPCION</th>
														<th scope="col">MODALIDAD</th>
														<th scope="col">TURNO</th>
														<th scope="col">AÑO CARRERA</th>
														<th scope="col">ACTIVO</th>
														<th scope="col">FECHA DE NACIMIENTO</th>
														<th scope="col">DIRECCION</th>
														<th scope="col">TEL</th>
														<th scope="col">CELULAR</th>
														<th scope="col">EST CIVIL</th>
														<th scope="col">SECUNDARIO</th>												
														<th scope="col">EMAIL</th>
														<th scope="col">FACEBOOK</th>
														<th scope="col">TRABAJO</th>
														<th scope="col">ID DOCUMENTACION</th>
														<th scope="col">ACCION</th>
													</tr>
												</thead>
												<tbody>';


    if(is_array($alumnos)){

        for ($i=0; $i < $cantidadDeTabs; $i++) {

            if($i==0){
                $grilla2.='<div id="'.($i+1).'" class="tab-pane fade show active" role="tabpanel" aria-labelledby="'.($i+1).'-tab">';

            }else{
                $grilla2.='<div id="'.($i+1).'" class="tab-pane fade" role="tabpanel" aria-labelledby="'.($i+1).'-tab">';
            }

            $grilla2.=$encabezado;
            //  CARGAR TABLAS
            /*********************************************************************************** */
            /************************************solo el primera tanda ******************************** */
            /*********************************************************************************** */
            if($i==$cantidadDeTabs-1 && $resto>0){
                for ($j=10*$i; $j <10*$i+$resto ; $j++){
                    //$valor= $usuarios[$j];
                    //var_dump($usuarios[101]);


                    $valorE = json_encode($alumnos[$j]);
                    $valorM = json_encode($alumnos[$j]);

                    $grilla2.=  		"<tr>																																	
																		<th scope='row'>".($j+1)."</th>																						
																		<td>{$alumnos[$j]->id}</td>
																		<td>{$alumnos[$j]->dni}</td>
																		<td>{$alumnos[$j]->nombre}</td>
																		<td>{$alumnos[$j]->apellido}</td>
																		<td>{$alumnos[$j]->sexo}</td>
																		<td>{$alumnos[$j]->legajo}</td>
																		<td>{$alumnos[$j]->idcarrera}</td>
																		<td>{$alumnos[$j]->fechadeinscripcion}</td>
																		<td>{$alumnos[$j]->modalidad}</td>
																		<td>{$alumnos[$j]->turno}</td>
																		<td>{$alumnos[$j]->anio_carrera}</td>
																		<td>{$alumnos[$j]->activo}</td>
																		<td>{$alumnos[$j]->fechadenacimiento}</td>
																		<td>{$alumnos[$j]->direccion}</td>
																		<td>{$alumnos[$j]->tel}</td>
																		<td>{$alumnos[$j]->celular}</td>
																		<td>{$alumnos[$j]->estadocivil}</td>
																		<td>{$alumnos[$j]->secundario}</td>
																		<td>{$alumnos[$j]->email}</td>
																		<td>{$alumnos[$j]->facebook}</td>
																		<td>{$alumnos[$j]->trabajo}</td>
																		<td>{$alumnos[$j]->id_documentacion}</td>
																		<td>
																			<div class='btn-group' role='group' aria-label='Basic example'>".
                        //<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal".$alumnos[$j]->id."'>Consulta rapida</button>
                        "<button type='button' class='btn btn-alert'>MODIFICAR</button>
																				<button type='button' class='btn btn-warning'>ELIMINAR</button>                                                        
																			</div>
																		</td>
																	</tr>";
                    /*
                    $modales.=	"<div id='myModal".$alumnos[$j]->id."' class='modal fade bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='myModal".$alumnos[$j]->id."' aria-hidden='true'>".
                                    Alumno::generarModalCuotasYPagos($alumnos[$j]->TraerCuotasPagos(),$alumnos[$j]->nombre,$alumnos[$j]->apellido).
                                "</div>";*/


                    continue;
                }
            }else{
                for ($j=10*$i; $j <10*($i+1) ; $j++){

                    $valorE = json_encode($alumnos[$j]);
                    $valorM = json_encode($alumnos[$j]);

                    $grilla2.=  "<tr >													
															<th scope='row'>".($j+1)."</th>																						
															<td>{$alumnos[$j]->id}</td>
															<td>{$alumnos[$j]->dni}</td>
															<td>{$alumnos[$j]->nombre}</td>
															<td>{$alumnos[$j]->apellido}</td>
															<td>{$alumnos[$j]->sexo}</td>
															<td>{$alumnos[$j]->legajo}</td>
															<td>{$alumnos[$j]->idcarrera}</td>
															<td>{$alumnos[$j]->fechadeinscripcion}</td>
															<td>{$alumnos[$j]->modalidad}</td>
															<td>{$alumnos[$j]->turno}</td>
															<td>{$alumnos[$j]->anio_carrera}</td>
															<td>{$alumnos[$j]->activo}</td>
															<td>{$alumnos[$j]->fechadenacimiento}</td>
															<td>{$alumnos[$j]->direccion}</td>
															<td>{$alumnos[$j]->tel}</td>
															<td>{$alumnos[$j]->celular}</td>
															<td>{$alumnos[$j]->estadocivil}</td>
															<td>{$alumnos[$j]->secundario}</td>
															<td>{$alumnos[$j]->email}</td>
															<td>{$alumnos[$j]->facebook}</td>
															<td>{$alumnos[$j]->trabajo}</td>
															<td>{$alumnos[$j]->id_documentacion}</td>
															<td>
																<div class='btn-group' role='group' aria-label='Basic example'>".
                        //<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal".$alumnos[$j]->id."'>Consulta rapida</button>
                        "<button type='button' class='btn btn-warning'>MODIFICAR</button>
																	<button type='button' class='btn btn-danger'>ELIMINAR</button>                                                        
																</div>
															</td>
														</tr>";
                    /*$modales.=	"<div id='myModal".$alumnos[$j]->id."' class='modal fade bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>".
                                    Alumno::generarModalCuotasYPagos($alumnos[$j]->TraerCuotasPagos(),$alumnos[$j]->nombre,$alumnos[$j]->apellido).
                                "</div>";*/

                }
            }
            $grilla2.=  "</tbody>";

            $grilla2.=	"</table>";//.
            //$modales;
            $grilla2.="</div>";

        }



    }else{
        if($alumnos!=false){// encontró 1 solo usuario
            $valorE = json_encode($alumnos);
            $valorM = json_encode($alumnos);
            $grilla2.=	'<div id="1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="1-tab">';
            $grilla2.=$encabezado;
            $cuotasPagos= $alumnos->TraerCuotasPagos();
            $grilla2.=   		"<tbody>  
													<tr>														
														<th scope='row'>1</th>
														<td>{$alumnos->id}</td>
														<td>{$alumnos->dni}</td>
														<td>{$alumnos->nombre}</td>
														<td>{$alumnos->apellido}</td>
														<td>{$alumnos->sexo}</td>
														<td>{$alumnos->legajo}</td>
														<td>{$alumnos->idcarrera}</td>
														<td>{$alumnos->fechadeinscripcion}</td>
														<td>{$alumnos->modalidad}</td>
														<td>{$alumnos->turno}</td>
														<td>{$alumnos->anio_carrera}</td>
														<td>{$alumnos->activo}</td>
														<td>{$alumnos->fechadenacimiento}</td>
														<td>{$alumnos->direccion}</td>
														<td>{$alumnos->tel}</td>
														<td>{$alumnos->celular}</td>
														<td>{$alumnos->estadocivil}</td>
														<td>{$alumnos->secundario}</td>
														<td>{$alumnos->email}</td>
														<td>{$alumnos->facebook}</td>
														<td>{$alumnos->trabajo}</td>
														<td>{$alumnos->id_documentacion}</td>
														<td>
															<div class='btn-group' role='group' aria-label='Basic example'>".
                //<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal".$alumnos[$j]->id."'>Consulta rapida</button>
                "<button type='button' class='btn btn-warning'>MODIFICAR</button>
																<button type='button' class='btn btn-danger'>ELIMINAR</button>                                                        
															</div>
														</td>
													</tr>
													
																							
												</tbody>										
											</table>".
                /*
                <div id='myModal1' class='modal fade bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>".
                    Alumno::generarModalCuotasYPagos($cuotasPagos,$alumnos->nombre,$alumnos->apellido).
                "</div>*/

                "</div>";//
        }else{//si no encontró ningun ALUMNO con el filtro
            return false;
        }
    }
    $grilla2.="</div></div>";
    //var_dump($grilla);
    /*
    $a=fopen('test.html','w');
    fwrite($a,$grilla2);
    fclose($a);*/



    return $grilla2;



};

function sort_by_orden($array){
    for($i=1;$i<count($array);$i++)
    {
        for($j=0;$j<count($array)-$i;$j++)
        {
            if($array[$j]->apellido >$array[$j+1]->apellido)
            {
                $k=$array[$j+1];
                $array[$j+1]=$array[$j];
                $array[$j]=$k;
            }
        }
    }
    return $array;
}

function generarDivDeuda($todasLasCuotasPagosAlumno){
    $saldoAFavor=0;
    $fechaHoy= date("Y-m-d");
    $deuda=0;
    $arrayDeuda = array();
    for ($i = 0; $i < count($todasLasCuotasPagosAlumno->cuotas); $i++) {
        $cuota = $todasLasCuotasPagosAlumno->cuotas[$i];
        if($cuota->fecha < $fechaHoy){
            $importe = $cuota->importe;
            for ($j = 0; $j < count($todasLasCuotasPagosAlumno->pagos); $j++) {
                $pago = $todasLasCuotasPagosAlumno->pagos[$j];
                if ($cuota->concepto == $pago->concepto){
                    $importe=$importe-$pago->importe;
                }
            }
            if($importe>0){
                $cuota->importe=$importe;
                array_push($arrayDeuda,$cuota);
                $deuda=$deuda+$importe;
            }else{
                $saldoAFavor=$saldoAFavor+$importe;
            }
        }
    }
    $div="	<h1>Deuda</h1>                    
				<div class='table table-responsive table-sm' id='table1'>
					<table class='table'>
						<thead>
							<tr>
								<th scope='col'>Estado</th>
								<th scope='col'>Concepto</th>
								<th scope='col'>Fecha</th>
								<th scope='col'>Importe</th>								
							</tr>
						</thead>
						<tbody>";
    for($i=0;$i<count($arrayDeuda);$i++){
        $div.=  "<tr>
								<td scope='col' contenteditable='false'>Vencida</td>
								<td scope='col' contenteditable='false'>".$arrayDeuda[$i]->concepto."</td>
								<td scope='col' contenteditable='false'>".$arrayDeuda[$i]->fecha."</td>                                                
								<td scope='col' contenteditable='false'>".$arrayDeuda[$i]->importe."</td>
							</tr>";
    }
    $div.=  "</tbody>
					</table>
				</div>
				<div class='row'>
					<div class='input-group mb-3 col-sm-4'>
						<div class='input-group-prepend'>
							<span class='input-group-text'>Deuda</span>
						</div>
						<input type='text' class='form-control' value='{$deuda}'>
					</div>
					<div class='input-group mb-3 col-sm-4'>
						<div class='input-group-prepend'>
							<span class='input-group-text'>Saldo a favor</span>
						</div>
						<input type='text' class='form-control' value='{$saldoAFavor}'>
					</div>
				</div>";
}

function generarDivsDeuda($Alumnos){
    $fechaHoy= date("Y-m-d");
    $div=	"<br>
					<div class='container opacidad'>
						<div class='p-3 mb-2 bg-secondary text-white rounded container '>

							<div class='input-group row'>
								<div class='col-8' >
									<span> Consulta Deuda Total </span>
								</div>
								<div class='col-8' >							
									<button type='button' class='btn btn-default btn-sm' onclick='Test.Imprimir(\"divResultado\")'>
										<span class='glyphicon glyphicon-print'></span>
									</button>
								</div>								
							</div>							
						</div>";
    $deudaTotal=0;
    foreach ($Alumnos as $alumno){//recorre alumnos
        //TODO modificar o crear un nuevo que traiga todos los alums con las cuotas y pagos
        
        $todasLasCuotasPagosAlumno=$alumno->TraerCuotasPagos();
        $saldoAFavor=0;
        $deuda=0;
        $arrayDeuda = array();
        for ($i = 0; $i < count($todasLasCuotasPagosAlumno->cuotas); $i++) {// recoore cuotas alum
            $cuota = $todasLasCuotasPagosAlumno->cuotas[$i];
            if($cuota->fecha < $fechaHoy){//chequea vencimiento
                $importe = $cuota->importe;
                for ($j = 0; $j < count($todasLasCuotasPagosAlumno->pagos); $j++) { //recorre pagos
                    $pago = $todasLasCuotasPagosAlumno->pagos[$j];
                    if ($cuota->concepto == $pago->concepto){//resta imporets
                        $importe=$importe-$pago->importe;
                    }
                }
                if($importe>0){//acumula si hay deuda
                    $cuota->importe=$importe;
                    array_push($arrayDeuda,$cuota);
                    $deuda=$deuda+$importe;
                }else{
                    $saldoAFavor=$saldoAFavor+$importe;
                }
            }
        }
        if(empty($arrayDeuda)){

        }else{
            $div.="	<div class='p-1 mb-2 bg-secondary text-white rounded container'>
									Deuda {$alumno->apellido},{$alumno->nombre},-----Email:{$alumno->email},-----tel:{$alumno->tel}/{$alumno->celular}</span></h5>                  
								</div>
								<div class='table table-responsive table-sm '>
									<table class='table miTable'>
										<thead>
											<tr>
												<th scope='col' class='misTds'>Estado</th>
												<th scope='col' class='misTds'>Concepto</th>
												<th scope='col' class='misTds'>Fecha</th>
												<th scope='col' class='misTds'>Importe</th>								
											</tr>
										</thead>
										<tbody>";
            for($i=0;$i<count($arrayDeuda);$i++){
                $div.=  "<tr>
												<td scope='col' class='misTds' contenteditable='false'>Vencida</td>
												<td scope='col' class='misTds' contenteditable='false'>".$arrayDeuda[$i]->concepto."</td>
												<td scope='col' class='misTds' contenteditable='false'>".$arrayDeuda[$i]->fecha."</td>                                                
												<td scope='col' class='misTds' contenteditable='false'>".$arrayDeuda[$i]->importe."</td>
											</tr>";
                $deudaTotal+=$arrayDeuda[$i]->importe;
            }
            if($saldoAFavor>0){
                $div.=  	"<tr>												
												<th scope='col' class='misTds' contenteditable='false'>Saldo a favor</th>
												<th scope='col' class='misTds' contenteditable='false'>{$saldoAFavor}</th>												
												<th scope='col' class='misTds' contenteditable='false'>Deuda</th>
												<th scope='col' class='misTds' contenteditable='false'>{$deuda}</th>												
											</tr>";
            }else{

                $div.=  	"<tr>
												<th></th>
												<th></th>
												<th scope='col' class='misTds' contenteditable='false'>Deuda</th>
												<th scope='col' class='misTds' contenteditable='false'>{$deuda}</th>												
											</tr>";
            }
            $div.=  "</tbody>										
									</table>
								</div>";
        }
        unset($arrayDeuda);
    }
    $div.=  "<div class='input-group mb-3 col-sm-12'>									
							<span class='input-group-text'>Total Deuda {$deudaTotal}</span>									
						</div>
					</div>";
    return $div;
}

?>