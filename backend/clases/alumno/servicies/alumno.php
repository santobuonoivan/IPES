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

function formAdm($request, $response, $args) {
    $div = "
					<html lang='en'>
						<link rel='stylesheet' href='libs/css/style.css'>										
						<body>
							<br>		
							<div class='container-fluid opacidad'><!-- contiene a todo y lo alinea -->
								<div class='p-3 mb-2 bg-secondary text-white rounded'>
									<h2>Consulta ADM</h2>
								</div>
								<div class='row opacidad border-1' ><!-- mapea para usarlo como grid -->
										
									<div class='col-5'><!-- div busqueda -->
										<div class='input-group'>
											<div class='input-group-prepend '>
												<span class='input-group-text'>Busque alumno</span>
											</div>
											<input class='form-control' list='inputDataList' id='inputAlumnoSelect' type='text' onchange='Test.cargarDivCuotasPagos()'>
											<datalist id='inputDataList' >											
											</datalist>
										</div>
									</div>
									<div class='col-6 '><!-- div pluss -->
										<span> pluss</span>
										<input type='checkbox' name='checkActivo' id='checkActivo'>
										<input type='button' value='Deuda Alumno' onclick='Test.GenerarDeudaAlumno()'>
										<input type='button' value='Algo2'>
										<div class='modal fade bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true' id='pop'>
											<div class='modal-content'>
												
											</div>
										</div>
									</div>

									<div class='col-12'><!-- div info -->
										<div class='row'>
											<div class='input-group col-sm-2'>
												<div class='input-group-prepend '>
													<span class='input-group-text'>Legajo</span>
												</div>
												<input type='text' class='form-control' id='inputLegajo' placeholder='Legajo'>												
											</div>
											<div class='input-group col-sm-3'>
												<div class='input-group-prepend'>
													<span class='input-group-text'>Trabajo</span>
												</div>
												<input type='text' class='form-control' id='inputTrabajo' placeholder='Trabajo'>												
											</div>
											<div class='input-group col-sm-4'>
												<div class='input-group-prepend'>
													<span class='input-group-text'>Email</span>
												</div>
												<input type='text' class='form-control' id='inputEmail' placeholder='Email'>												
											</div>
																					
											<div class='input-group col-sm-3'>
												<div class='input-group-prepend'>
													<span class='input-group-text'>Tel</span>
												</div>
												<input type='text' class='form-control' id='inputTelefono' placeholder='Tel'>												
											</div>
											<div class='input-group col-sm-2'>
												<div class='input-group-prepend'>
													<span class='input-group-text'>Dni</span>
												</div>
												<input type='text' class='form-control' id='inputDni' placeholder='D.N.I.'>												
											</div>	
											<div class='input-group col-sm-3'>
												<div class='input-group-prepend'>
													<span class='input-group-text'>Cel</span>
												</div>
												<input type='text' class='form-control' id='inputCel' placeholder='Cel'>												
											</div>
											<div class='input-group col-sm-4'>
												<div class='input-group-prepend'>
													<span class='input-group-text'>Direccion</span>
												</div>
												<input type='text' class='form-control' id='inputDir' placeholder='Direccion'>												
											</div>
											<div class='input-group col-sm-3'>
												<div class='input-group-prepend'>
													<span class='input-group-text'>Fech. Nac.</span>
												</div>
												<input type='date' class='form-control' id='inputFech'>												
											</div>											
										</div>
									</div>
									<div class='input-group col-sm-12' id='divDeudas'>

									</div>
									<div class='container-fluid'>
										<div class='row'>
											<div class='col-md-6' id='divCuotas'>
												DIV CUOTAS
											</div>
											<div class='col-md-6' id='divPagos'>
												DIV PAGOS
											</div>
										</div>
									</div>									
								</div>
								<div class='p-3 mb-2 bg-secondary text-white rounded col-12'>
									<span> botones</span>
									<input type='checkbox' name='checkActivo' id='checkActivo'>
									<input type='button' value='Algo'>
									<input type='button' value='Algo2'>
								</div>
							</div>							
						</body>
				</html>";
    return $div;


}

?>