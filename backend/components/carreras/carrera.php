<?php


class Carrera
{
    public $id;
    public $nombre;
    public $modalidades;
    public $turnos;
	public $cantidadanios;
	public $mods;
	public $turns;

    public  function TraerCarreras($request, $response, $args) {
		$todasLasCarreras=Carrera::TraerTodasLasCarreras();
		$newResponse= Carrera::generarDivCarreras($todasLasCarreras);	
		return $newResponse;		
	}
	public  function TraerCarrerasSimple($request, $response, $args) {
		$todasLasCarreras=Carrera::TraerTodasLasCarrerasJson();
			
		return $response->withJson($todasLasCarreras, 200);		
    }
    public  function CrearCarrera($request, $response, $args) {
        $ArrayDeParametros = $request->getParsedBody();
	    //var_dump($ArrayDeParametros);    	
		$miCarrera = new Carrera();
		
	    $miCarrera->nombre=$ArrayDeParametros['nombre'];
	    $miCarrera->modalidades= Carrera::altaModalidad($ArrayDeParametros['mods']);
		$miCarrera->turnos= Carrera::altaTurno($ArrayDeParametros['turns']);
		$miCarrera->cantidadanios=$ArrayDeParametros['cantidadanios'];
	    
		$resultado = $miCarrera->cargarCarrera();		   	
	   	$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultado=$resultado;
		
		return $response->withJson($objDelaRespuesta, 200);
    }
    public  function ModificarCarrera($request, $response, $args) {
        $ArrayDeParametros = $request->getParsedBody();
	    //var_dump($ArrayDeParametros);    	
		$miCarrera = new Carrera();
		$mods = $ArrayDeParametros['mods'];
		//var_dump($mods);
		$turns = $ArrayDeParametros['turns'];
        $miCarrera->id=$ArrayDeParametros['id'];
	    $miCarrera->nombre=$ArrayDeParametros['nombre'];
	    $miCarrera->modalidades= $ArrayDeParametros['modalidades'];
		$miCarrera->turnos= $ArrayDeParametros['turnos'];
		$miCarrera->cantidadanios=$ArrayDeParametros['cantidadanios'];
		//var_dump($miAlumno);
	   	$resultado =$miCarrera->modificarCarreraExistente($mods,$turns);
	   	$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultado=$resultado;
		return $response->withJson($objDelaRespuesta, 200);		
    }
    public  function ElimnarCarrera($request, $response, $args) {
        $ArrayDeParametros = $request->getParsedBody();     	
     	$Carrera= new Carrera();
     	$Carrera->id=$ArrayDeParametros['id'];
     	$cantidadDeBorrados=$Carrera->ElimnarCarreraExistente();

     	$objDelaRespuesta= new stdclass();
	    $objDelaRespuesta->cantidad=$cantidadDeBorrados;
	    if($cantidadDeBorrados>0)
	    	{
	    		 $objDelaRespuesta->resultado="Borrado!!!";
	    	}
	    	else
	    	{
	    		$objDelaRespuesta->resultado="Algo salió mal!!!";
	    	}
	    $newResponse = $response->withJson($objDelaRespuesta, 200);  
      	return $newResponse;
    }
    public  function cargarCarrera() {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta(
			"INSERT into carreras 
			( 
				nombre,
				modalidades,
				turnos,
				cantidadanios
			)
				values
			(
				:nombre,
				:modalidades,
				:turnos,
				:cantidadanios
			)");
		$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
		$consulta->bindValue(':modalidades', $this->modalidades, PDO::PARAM_INT);
		$consulta->bindValue(':turnos', $this->turnos, PDO::PARAM_INT);		
		$consulta->bindValue(':cantidadanios',$this->cantidadanios, PDO::PARAM_STR);
		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
    public  function modificarCarreraExistente($mods,$turns) {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		UPDATE carreras 
			SET 				
				nombre=:nombre,				
				cantidadanios=:cantidadanios			
			WHERE id=:id");
		//BINDEAMOS VALORES
		$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
		$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);				
		$consulta->bindValue(':cantidadanios',$this->cantidadanios, PDO::PARAM_STR);		
		$consulta->execute();

		$consulta =$objetoAccesoDato->RetornarConsulta("
		UPDATE modalidades 
			SET 				
				p=:p,
				sp=:sp,
				v=:v							
			WHERE id=:idMods");
		//BINDEAMOS VALORES
		$consulta->bindValue(':idMods',$this->modalidades, PDO::PARAM_INT);
		$consulta->bindValue(':p',$mods[0], PDO::PARAM_INT);
		$consulta->bindValue(':sp',$mods[1], PDO::PARAM_INT);
		$consulta->bindValue(':v',$mods[2], PDO::PARAM_INT);				
		$consulta->execute();

		$consulta =$objetoAccesoDato->RetornarConsulta("
		UPDATE turnos 
			SET 				
				m=:m,
				t=:t,
				n=:n							
			WHERE id=:idTurnos");
		//BINDEAMOS VALORES
		$consulta->bindValue(':idTurnos',$this->turnos, PDO::PARAM_INT);
		$consulta->bindValue(':m',$turns[0], PDO::PARAM_INT);
		$consulta->bindValue(':t',$turns[1], PDO::PARAM_INT);
		$consulta->bindValue(':n',$turns[2], PDO::PARAM_INT);				
		$consulta->execute();

		return $objetoAccesoDato->RetornarUltimoIdInsertado(); 
	}
    public  function ElimnarCarreraExistente() {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
			delete 
			from carreras 				
			WHERE id=:id");	
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
			$consulta->execute();
		return $consulta->rowCount();
	}
    public static function TraerTodasLasCarreras(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select * from carreras");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Carrera");		
	}		
	public static function TraerTodasLasCarrerasJson(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select * from carreras");
        $consulta->execute();			
		$carreras = $consulta->fetchAll(PDO::FETCH_CLASS, "Carrera");		
		foreach($carreras as $carrera){
			$carrera->mods=Carrera::traerModalidadesCarrera($carrera->modalidades);
			$carrera->turns=Carrera::traerTurnosCarrera($carrera->turnos);			
		}
		return $carreras;
	}
	public static function generarDivCarreras($carreras){
		/************************************************************************************************/
		/******************************************  ARMO SOLAPAS  **************************************/
		$modales="";   
		$grilla2='<div class="container-fluid opacidad" >
				<h2>Carreras</h2>
				<ul class="nav nav-tabs" id="myTab" role="tablist">';
					
				//CARGO TAGS O SOLAPAS DE LA LISTA AGRUPADOS DE A 10
				if(is_array($carreras)){
					$totalDeRegistros=count($carreras);
					$cantDeAgrupamiento=10;
					$cantidadDeTabs=intdiv($totalDeRegistros,$cantDeAgrupamiento);
					$resto=$totalDeRegistros%$cantDeAgrupamiento;
					

					if(count($carreras)%10 > 0){
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
											<th scope="col">NOMBRE</th>
											<th scope="col">MODALIDADES</th>
											<th scope="col">TURNOS</th>
											<th scope="col">DURACION MESES</th>											
											<th scope="col">ACCION</th>
										</tr>
									</thead>
								<tbody>';
	
	
		if(is_array($carreras)){
		
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

							$mods=Carrera::traerModalidadesCarrera($carreras[$j]->modalidades);
							$turns=Carrera::traerTurnosCarrera($carreras[$j]->turnos);
							
							$aux = new stdClass();
							$aux->Carrera=$carreras[$j];
							$aux->mods=$mods;
							$aux->turns=$turns;	
							$valorE = json_encode($carreras[$j]);
							$valorM = json_encode($aux);
							
								$grilla2.="<tr>
																													
								<th scope='row'>".($j+1)."</th>																						
								<td>{$carreras[$j]->id}</td>
								<td>{$carreras[$j]->nombre}</td>
								<td>".Carrera::generarComboModalidades($mods)."</td>
								<td>".Carrera::generarComboTurnos($turns)."</td>
								<td>{$carreras[$j]->cantidadanios}</td>														
								<td>
									<div class='btn-group' role='group' aria-label='Basic example'>
										<button type='button' class='btn btn-alert' onclick='Test.agregarCarrera({$valorM})'>MODIFICAR</button>
										<button type='button' class='btn btn-warning' onclick='Test.eliminarCarrera({$valorE})'>ELIMINAR</button>                                                        
									</div>
								</td>
							</tr>";												
						continue;   
						}
					}else{
						for ($j=10*$i; $j <10*($i+1) ; $j++){								
						
							$mods=Carrera::traerModalidadesCarrera($carreras[$j]->modalidades);
							$turns=Carrera::traerTurnosCarrera($carreras[$j]->turnos);

							$aux = new stdClass();
							$aux->Carrera=$carreras[$j];
							$aux->mods=$mods;
							$aux->turns=$turns;	
							$valorE = json_encode($carreras[$j]);
							$valorM = json_encode($aux);

								$grilla2.="<tr>
																													
								<th scope='row'>".($j+1)."</th>																						
								<td>{$carreras[$j]->id}</td>
								<td>{$carreras[$j]->nombre}</td>
								<td>".Carrera::generarComboModalidades($mods)."</td>
								<td>".Carrera::generarComboTurnos($turns)."</td>
								<td>{$carreras[$j]->cantidadanios}</td>														
								<td>
									<div class='btn-group' role='group' aria-label='Basic example'>
										<button type='button' class='btn btn-alert' onclick='Test.agregarCarrera({$valorM})'>MODIFICAR</button>
										<button type='button' class='btn btn-warning' onclick='Test.eliminarCarrera({$valorE})'>ELIMINAR</button>                                                        
									</div>
								</td>
							</tr>";	
							
						}
					}   
					$grilla2.="</tbody>";

					$grilla2.=	"</table>";
				$grilla2.="</div>";

			}
							
			
					
		}else{  
			if($carreras!=false){// encontró 1 solo usuario 
				$mods=Carrera::traerModalidadesCarrera($carreras[$j]->modalidades);
				$turns=Carrera::traerTurnosCarrera($carreras[$j]->turnos);

				$aux = new stdClass();
				$aux->Carrera=$carreras;
				$aux->mods=$mods;
				$aux->turns=$turns;	
				$valorE = json_encode($carreras);
				$valorM = json_encode($aux);
				$grilla2.=	'<div id="1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="1-tab">';
				$grilla2.=$encabezado;
				
				$grilla2.=   		"<tbody>  
										<tr>																													
											<th scope='row'>".($j+1)."</th>																						
											<td>{$carreras->id}</td>
											<td>{$carreras->nombre}</td>
											<td>".Carrera::generarComboModalidades($mods)."</td>
											<td>".Carrera::generarComboTurnos($turns)."</td>
											<td>{$carreras->cantidadanios}</td>														
											<td>
												<div class='btn-group' role='group' aria-label='Basic example'>
													<button type='button' class='btn btn-alert' onclick='Test.agregarCarrera({$valorM})'>MODIFICAR</button>
													<button type='button' class='btn btn-warning' onclick='Test.eliminarCarrera({$valorE})'>ELIMINAR</button>                                                       
												</div>
											</td>
										</tr>
										
																				
									</tbody>										
								</table>								
							</div>";//
			}else{//si no encontró ningun carrera con el filtro
				return false;
			}
		}
		$grilla2.="</div></div>";
		//var_dump($grilla);	

		return $grilla2;       

	}
	public static function generarComboModalidades($modalidades){
		$combo='';		 
		$combo.="	
						<div class='form-check form-check-inline'>
							<label class='form-check-label'>";
							if($modalidades["p"]==1){
								$combo.="<input class='form-check-input' type='checkbox' id='inlineCheckbox0' value='1' checked>P";
							}else{
								$combo.="<input class='form-check-input' type='checkbox' id='inlineCheckbox0' value='1'>P";
							}								
					$combo.="</label>
						</div>
						<div class='form-check form-check-inline'>
							<label class='form-check-label'>";
							if($modalidades["sp"]==1){
								$combo.="<input class='form-check-input' type='checkbox' id='inlineCheckbox1' value='1' checked>SP";
							}else{
								$combo.="<input class='form-check-input' type='checkbox' id='inlineCheckbox1' value='1'>SP";
							}								
					$combo.="</label>
						</div>
						<div class='form-check form-check-inline '>
							<label class='form-check-label'>";
								if($modalidades["v"]==1){
									$combo.="<input class='form-check-input' type='checkbox' id='inlineCheckbox2' value='1' checked>V";
								}else{
									$combo.="<input class='form-check-input' type='checkbox' id='inlineCheckbox2' value='1' >V";
								}								
						$combo.="</label>
						</div>";

		return $combo;		
	}
	public static function generarComboTurnos($turnos){
		$combo='';
		$combo.="
					
						<div class='form-check form-check-inline'>
							<label class='form-check-label'>";
							if($turnos["m"]==1){
								$combo.="<input class='form-check-input' type='checkbox' id='inlineCheckboxTurnos0' value='1' checked>M";
							}else{
								$combo.="<input class='form-check-input' type='checkbox' id='inlineCheckboxTurnos0' value='1'>M";
							}								
					$combo.="</label>
						</div>
						<div class='form-check form-check-inline'>
							<label class='form-check-label'>";
							if($turnos["t"]==1){
								$combo.="<input class='form-check-input' type='checkbox' id='inlineCheckboxTurnos1' value='1' checked>T";
							}else{
								$combo.="<input class='form-check-input' type='checkbox' id='inlineCheckboxTurnos1' value='1'>T";
							}
								
					$combo.="</label>
						</div>
						<div class='form-check form-check-inline '>
							<label class='form-check-label'>";
							if($turnos["n"]==1){
								$combo.="<input class='form-check-input' type='checkbox' id='inlineCheckboxTurnos2' value='1' checked>N";
							}else{
								$combo.="<input class='form-check-input' type='checkbox' id='inlineCheckboxTurnos2' value='1' >N";
							}								
					$combo.="</label>
						</div>";
		
		return $combo;		
	}
	public static function altaModalidad($lasModalidades){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta(
			"INSERT into modalidades 
			( 
				p,
				sp,
				v
			)
				values
			(
				:p,
				:sp,
				:v
			)");
		$consulta->bindValue(':p',$lasModalidades[0], PDO::PARAM_INT);
		$consulta->bindValue(':sp', $lasModalidades[1], PDO::PARAM_INT);
		$consulta->bindValue(':v', $lasModalidades[2], PDO::PARAM_INT);
		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
	public static function altaTurno($losTurnos){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta(
			"INSERT into turnos 
			( 
				m,
				t,
				n
			)
				values
			(
				:m,
				:t,
				:n
			)");
		$consulta->bindValue(':m',$losTurnos[0], PDO::PARAM_INT);
		$consulta->bindValue(':t', $losTurnos[1], PDO::PARAM_INT);
		$consulta->bindValue(':n', $losTurnos[2], PDO::PARAM_INT);
		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
	public static function traerModalidadesCarrera($elId){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT p,sp,v FROM modalidades WHERE id=:id");
		$consulta->bindValue(':id',$elId, PDO::PARAM_INT);
		$consulta->execute();			
        return $consulta->fetch(PDO::FETCH_ASSOC);	
	}
	public static function traerTurnosCarrera($elId){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT m,t,n FROM turnos WHERE id=:id");
		$consulta->bindValue(':id',$elId, PDO::PARAM_INT);
        $consulta->execute();			
        return $consulta->fetch(PDO::FETCH_ASSOC);		
	}

}