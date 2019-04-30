<?php
require_once "iPersona.php";
require_once "cuotas.php";
require_once "pagos.php";

class Alumno implements IPersona
{
	public $id;
 	public $dni;
  	public $nombre;
	public $apellido;
	public $sexo;
	public $legajo;
	public $idcarrera;
	public $fechadeinscripcion;
	public $modalidad;
	public $turno;
	public $anio_carrera;
	public $activo;
	public $fechadenacimiento;
	public $direccion;
	public $tel;
	public $celular;
	public $estadocivil;
	public $secundario;
	public $email;
	public $facebook;
	public $trabajo;
	public $id_documentacion;
	public $conocio;
	public $promo;

	


/* inicio funciones especiales para slimFramework*/

	public function TraerUno($request, $response, $args) {
		$argumentos=$request->getParsedBody();
		$filtro=$argumentos['filtro'];
		//echo $filtro;
		$elAlumno=Alumno::TraerUnAlumno($filtro);
		//$cuotasPagos=$elAlumno->TraerCuotasPagos();
		//$cuotas=is_array($cuotasPagos->cuotas);		
		//$newResponse = $response->withJson($cuotas, 200);  
		//return $newResponse;		
		//vardump($elAlumno);		
		//generamos html para mostrar cuotas y pagos		
		$newResponse = Alumno::generarDivAlumno($elAlumno);		
		return $newResponse;
	}	
	public function TraerTodos($request, $response, $args) {
		$todosLosAlumnos=Alumno::TraerTodoLosAlumnos();		
		$newResponse = Alumno::generarDivAlumno($todosLosAlumnos);  
		return $newResponse;
		/*
		$newResponse = $response->withJson($todosLosAlumnos, 200);  
		return $newResponse;*/
	}
	public function formAdm($request, $response, $args) {
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
	public function admAlumno($request, $response, $args) {
		$todosLosAlumnos=Alumno::TraerTodoLosAlumnos();
		$todosLosAlumnosOrdenados= Alumno::sort_by_orden($todosLosAlumnos);  
		return $response->withJson($todosLosAlumnosOrdenados, 200);		
	}
	public static function divCuotasPagosAlumno($request, $response, $args){
		$argumentos=$request->getParsedBody();		
		$alumno = new Alumno();
        $alumno->id=$argumentos['id'];
		$cuotasPagos= $alumno->TraerCuotasPagos();
		$respuesta= new stdClass();
		$respuesta->alumno= $alumno->TraerUnAlumnoId();
		$respuesta->divCuotas=Cuotas::generarDivCuotasDeUnAlumno2($cuotasPagos->cuotas);
		$respuesta->divPagos=Pagos::generarDivPagosDeUnAlumno2($cuotasPagos->pagos);
		return $response->withJson($respuesta, 200);
	}	
    public function CargarUno($request, $response, $args) {		
		$ArrayDeParametros = $request->getParsedBody();
	    //var_dump($ArrayDeParametros);    	
		$miAlumno = new Alumno();		
	    $miAlumno->dni=$ArrayDeParametros['dni'];
	    $miAlumno->nombre=$ArrayDeParametros['nombre'];
		$miAlumno->apellido=$ArrayDeParametros['apellido'];
		$miAlumno->sexo=$ArrayDeParametros['sexo'];
	    $miAlumno->legajo=$ArrayDeParametros['legajo'];
		$miAlumno->idcarrera=$ArrayDeParametros['idcarrera'];
		$miAlumno->fechadeinscripcion=$ArrayDeParametros['fechadeinscripcion'];
	    $miAlumno->modalidad=$ArrayDeParametros['modalidad'];
		$miAlumno->turno=$ArrayDeParametros['turno'];
		$miAlumno->anio_carrera=$ArrayDeParametros['anio_carrera'];
	    $miAlumno->activo=$ArrayDeParametros['activo'];
		$miAlumno->fechadenacimiento=$ArrayDeParametros['fechadenacimiento'];
		$miAlumno->direccion=$ArrayDeParametros['direccion'];
	    $miAlumno->tel=$ArrayDeParametros['tel'];
		$miAlumno->celular=$ArrayDeParametros['celular'];
		$miAlumno->estadocivil=$ArrayDeParametros['estadocivil'];
	    $miAlumno->secundario=$ArrayDeParametros['secundario'];
		$miAlumno->email=$ArrayDeParametros['email'];
		$miAlumno->facebook=$ArrayDeParametros['facebook'];
		$miAlumno->trabajo=$ArrayDeParametros['trabajo'];
		$miAlumno->conocio =  $ArrayDeParametros['conocio'];
		$miAlumno->promo = $ArrayDeParametros['promo'];
		//documentacion
		$documentacion= new stdClass();
		
		if($ArrayDeParametros['documentacion']['titulo']!=null){
			$documentacion->titulo=$ArrayDeParametros['documentacion']['titulo'];
		}else{
			$documentacion->titulo=0;
		}
		if($ArrayDeParametros['documentacion']['dni']!=null){
			$documentacion->dni=$ArrayDeParametros['documentacion']['dni'];
		}else{
			$documentacion->dni=0;
		}
		if($ArrayDeParametros['documentacion']['fotos']!=null){
			$documentacion->fotos=$ArrayDeParametros['documentacion']['fotos'];
		}else{
			$documentacion->fotos=0;
		}
		$documentacion->cert_salud=0;
		if($ArrayDeParametros['supago']['comprende']["esmatricula"]!=null){
			$documentacion->esmatricula=$ArrayDeParametros['supago']['comprende']["esmatricula"];
		}else{
			$documentacion->esmatricula=0;
		}
		if($ArrayDeParametros['supago']['comprende']["escuota"]!=null){
			$documentacion->escuota=$ArrayDeParametros['supago']['comprende']["escuota"];
		}else{
			$documentacion->escuota=0;
		}
		if($ArrayDeParametros['supago']['comprende']["escertificacion"]!=null){
			$documentacion->escertificacion=$ArrayDeParametros['supago']['comprende']["escertificacion"];
		}else{
			$documentacion->escertificacion=0;
		}		
		
		$miAlumno->id_documentacion=Alumno::InsertarDocumentacion($documentacion);
		$resultadoAlumno = $miAlumno->InsertarElAlumno();
		//cuotas pagos
		$datos= new stdClass();
		$datos->id=$resultadoAlumno;
		$datos->pago=$ArrayDeParametros['supago']["pago"];
		$datos->valores=$ArrayDeParametros['valores'];
		//genera obj de cuotas y pagos automatico
		$vectores = Cuotas::generarArrayCuotasPagos($datos);
		//var_dump($vectores);		
		$resultadoCuotas=Alumno::insertarCuotasYPagos($vectores);		
	   	$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultadoAlumno=$resultadoAlumno;
		$objDelaRespuesta->resultadoCuotas=$resultadoCuotas;
		/*
		var_dump($miAlumno);
		var_dump($documentacion);
		var_dump($datos);*/
		return $response->withJson($objDelaRespuesta, 200);
      	
    }
	public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$Alumno= new Alumno();
     	$Alumno->id=$id;
     	$cantidadDeBorrados=$Alumno->BorrarAlumno();

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
	public function ModificarUno($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();
	    //var_dump($ArrayDeParametros);    	
	    $miAlumno = new Alumno();
		// CARGO OBJETO ALUMNO PARA PODER UPDATEAR
		$miAlumno->id=$ArrayDeParametros['id'];
		$miAlumno->dni=$ArrayDeParametros['dni'];
	    $miAlumno->nombre=$ArrayDeParametros['nombre'];
		$miAlumno->apellido=$ArrayDeParametros['apellido'];
		$miAlumno->sexo=$ArrayDeParametros['sexo'];
	    $miAlumno->legajo=$ArrayDeParametros['legajo'];
		$miAlumno->idcarrera=$ArrayDeParametros['idcarrera'];
		$miAlumno->fechadeinscripcion=$ArrayDeParametros['fechadeinscripcion'];
	    $miAlumno->modalidad=$ArrayDeParametros['modalidad'];
		$miAlumno->turno=$ArrayDeParametros['turno'];
		$miAlumno->anio_carrera=$ArrayDeParametros['anio_carrera'];
	    $miAlumno->activo=$ArrayDeParametros['activo'];
		$miAlumno->fechadenacimiento=$ArrayDeParametros['fechadenacimiento'];
		$miAlumno->direccion=$ArrayDeParametros['direccion'];
	    $miAlumno->tel=$ArrayDeParametros['tel'];
		$miAlumno->celular=$ArrayDeParametros['celular'];
		$miAlumno->estadocivil=$ArrayDeParametros['estadocivil'];
	    $miAlumno->secundario=$ArrayDeParametros['secundario'];
		$miAlumno->email=$ArrayDeParametros['email'];
		$miAlumno->facebook=$ArrayDeParametros['facebook'];
	    $miAlumno->trabajo=$ArrayDeParametros['trabajo'];
	    $miAlumno->id_documentacion=$ArrayDeParametros['id_documentacion'];
		//var_dump($miAlumno);
	   	$resultado =$miAlumno->ModificarAlumno();
	   	$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultado=$resultado;
		return $response->withJson($objDelaRespuesta, 200);		
	}
	public function deudaAlumno($request, $response, $args) {
		$argumentos=$request->getParsedBody();		
		$alumno = new Alumno();
        $alumno->id=$argumentos['id'];
		$todasLasCuotasPagosAlumno=$alumno->TraerCuotasPagos();
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
		$div='';

		$div.="	<h1>Deuda</h1>                    
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
		return $div;
	}
	public function deudaTotalAlumnos($request, $response, $args) {
		$todosLosAlumnos=Alumno::TraerTodoLosAlumnos();
		$respuesta = Alumno::DivsDeuda($todosLosAlumnos);
		return $respuesta;
	}
	public function addCuota($request, $response, $args){
		$argumentos=$request->getParsedBody();
		$idAlumno=$argumentos['id'];
		$respuesta=new StdClass();
		$respuesta->idCuota=Cuotas::agregarCuota($idAlumno);
		return $response->withJson($respuesta, 200);  
	}
	public function addPago($request, $response, $args){
		$argumentos=$request->getParsedBody();
		$idAlumno=$argumentos['id'];
		$respuesta=new StdClass();
		$respuesta->idPago=Pagos::agregarPago($idAlumno);
		return $response->withJson($respuesta, 200);  
	}
	public function deleteCuota($request, $response, $args){
		$argumentos=$request->getParsedBody();
		$idCuota=$argumentos['id'];
		$objDelaRespuesta=new StdClass();
		$respuesta=Cuotas::borrarCuota($idCuota);
		if($respuesta>0)
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
	public function deletePago($request, $response, $args){
		$argumentos=$request->getParsedBody();
		$idPago=$argumentos['id'];
		$objDelaRespuesta=new StdClass();
		$respuesta=Pagos::borrarPago($idPago);
		if($respuesta>0)
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
	public function changeCuota($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();	       	
	    $miCuota = new Cuotas();
		// CARGO OBJETO ALUMNO PARA PODER UPDATEAR
		$miCuota->id=$ArrayDeParametros['id'];
		$miCuota->id_alumno=$ArrayDeParametros['id_alumno'];
	    $miCuota->concepto=$ArrayDeParametros['concepto'];
		$miCuota->fecha=$ArrayDeParametros['fecha'];
		$miCuota->importe=$ArrayDeParametros['importe'];
	   	$resultado =$miCuota->modificarCuota();
	   	$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultado=$resultado;
		return $response->withJson($objDelaRespuesta, 200);		
	}
	public function changePago($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();	       	
	    $miPago = new Pagos();		
		$miPago->id=$ArrayDeParametros['id'];
		$miPago->id_alumno=$ArrayDeParametros['id_alumno'];
	    $miPago->concepto=$ArrayDeParametros['concepto'];
		$miPago->fecha=$ArrayDeParametros['fecha'];
		$miPago->importe=$ArrayDeParametros['importe'];
	   	$resultado =$miPago->modificarPago();
	   	$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultado=$resultado;
		return $response->withJson($objDelaRespuesta, 200);		
	}


/* final funciones especiales para slimFramework*/  	
	/****************************************************************************************************/
	/***************************************      LISTO     *********************************************/
	/****************************************************************************************************/
		//FUNCIONES ALUMNO
			public function BorrarAlumno(){
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("
					delete 
					from alumnos 				
					WHERE id=:id");	
					$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
					$consulta->execute();
				return $consulta->rowCount();
			}	
			public function ModificarAlumno(){
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("
				UPDATE alumnos 
					SET 
						dni=:dni,
						nombre=:nombre,
						apellido=:apellido,
						sexo=:sexo,
						legajo=:legajo,
						idcarrera=:idcarrera,
						fechadeinscripcion=:fechadeinscripcion,
						modalidad=:modalidad,
						turno=:turno,
						anio_carrera=:anio_carrera,
						activo=:activo,
						fechadenacimiento=:fechadenacimiento,
						direccion=:direccion,
						tel=:tel,
						celular=:celular,
						estadocivil=:estadocivil,
						secundario=:secundario,
						email=:email,
						facebook=:facebook,
						trabajo=:trabajo,
						id_documentacion=:id_documentacion
					
					WHERE id=:id");
				//BINDEAMOS VALORES
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':dni', $this->dni, PDO::PARAM_INT);
				$consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);		
				$consulta->bindValue(':sexo',$this->sexo, PDO::PARAM_STR);
				$consulta->bindValue(':legajo', $this->legajo, PDO::PARAM_INT);
				$consulta->bindValue(':idcarrera', $this->idcarrera, PDO::PARAM_INT);
				$consulta->bindValue(':fechadeinscripcion',$this->fechadeinscripcion, PDO::PARAM_STR);
				$consulta->bindValue(':modalidad', $this->modalidad, PDO::PARAM_STR);
				$consulta->bindValue(':turno', $this->turno, PDO::PARAM_STR);
				$consulta->bindValue(':anio_carrera',$this->anio_carrera, PDO::PARAM_INT);
				$consulta->bindValue(':activo', $this->activo, PDO::PARAM_INT);
				$consulta->bindValue(':fechadenacimiento', $this->fechadenacimiento, PDO::PARAM_STR);
				$consulta->bindValue(':direccion',$this->direccion, PDO::PARAM_STR);
				$consulta->bindValue(':tel', $this->tel, PDO::PARAM_STR);
				$consulta->bindValue(':celular', $this->celular, PDO::PARAM_STR);
				$consulta->bindValue(':estadocivil', $this->estadocivil, PDO::PARAM_STR);
				$consulta->bindValue(':secundario', $this->secundario, PDO::PARAM_STR);
				$consulta->bindValue(':email', $this->email, PDO::PARAM_STR);
				$consulta->bindValue(':facebook', $this->facebook, PDO::PARAM_STR);
				$consulta->bindValue(':trabajo', $this->trabajo, PDO::PARAM_STR);
				$consulta->bindValue(':id_documentacion', $this->id_documentacion, PDO::PARAM_INT);
				return $consulta->execute();
			}
			public function InsertarElAlumno(){
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta(
					"INSERT into alumnos 
					( 
						dni,
						nombre,
						apellido,
						sexo,
						legajo,
						idcarrera,
						fechadeinscripcion,
						modalidad,
						turno,
						anio_carrera,
						activo,
						fechadenacimiento,
						direccion,
						tel,
						celular,
						estadocivil,
						secundario,
						email,
						facebook,
						trabajo,
						id_documentacion,
						conocio,
						promo
					)
						values
					(
						:dni,
						:nombre,
						:apellido,
						:sexo,
						:legajo,
						:idcarrera,
						:fechadeinscripcion,
						:modalidad,
						:turno,
						:anio_carrera,
						:activo,
						:fechadenacimiento,
						:direccion,
						:tel,
						:celular,
						:estadocivil,
						:secundario,
						:email,
						:facebook,
						:trabajo,
						:id_documentacion,
						:conocio,
						:promo
					)");
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':dni', $this->dni, PDO::PARAM_INT);
				$consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);		
				$consulta->bindValue(':sexo',$this->sexo, PDO::PARAM_STR);
				$consulta->bindValue(':legajo', $this->legajo, PDO::PARAM_INT);
				$consulta->bindValue(':idcarrera', $this->idcarrera, PDO::PARAM_INT);
				$consulta->bindValue(':fechadeinscripcion',$this->fechadeinscripcion, PDO::PARAM_STR);
				$consulta->bindValue(':modalidad', $this->modalidad, PDO::PARAM_STR);
				$consulta->bindValue(':turno', $this->turno, PDO::PARAM_STR);
				$consulta->bindValue(':anio_carrera',$this->anio_carrera, PDO::PARAM_INT);
				$consulta->bindValue(':activo', $this->activo, PDO::PARAM_INT);
				$consulta->bindValue(':fechadenacimiento', $this->fechadenacimiento, PDO::PARAM_STR);
				$consulta->bindValue(':direccion',$this->direccion, PDO::PARAM_STR);
				$consulta->bindValue(':tel', $this->tel, PDO::PARAM_STR);
				$consulta->bindValue(':celular', $this->celular, PDO::PARAM_STR);
				$consulta->bindValue(':estadocivil', $this->estadocivil, PDO::PARAM_STR);
				$consulta->bindValue(':secundario', $this->secundario, PDO::PARAM_STR);
				$consulta->bindValue(':email', $this->email, PDO::PARAM_STR);
				$consulta->bindValue(':facebook', $this->facebook, PDO::PARAM_STR);
				$consulta->bindValue(':trabajo', $this->trabajo, PDO::PARAM_STR);
				$consulta->bindValue(':id_documentacion', $this->id_documentacion, PDO::PARAM_INT);
				$consulta->bindValue(':conocio', $this->conocio, PDO::PARAM_STR);
				$consulta->bindValue(':promo', $this->promo, PDO::PARAM_STR);
		
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
			}		
			public static function generarDivAlumno($alumnos){
					
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
		
			}
			public static function sort_by_orden($array){
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
			
			/*************public function modificarCuotasYPagos($cuotasPagos){}******************************************/
			
			public static function generarModalCuotasYPagos($cuotasPagos,$nombre,$apellido){
				$modal="				
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h4 class='modal-title'>Cuotas y Pagos de: ".$apellido.", ".$nombre."</h4>
									<button type='button' class='close' data-dismiss='modal'>&times;</button>                                
								</div>
								<div class='modal-body'>
									<div class='container-fluid'>
										<div class='row'>
											<div class='col-md-6'>";
												$modal.=Cuotas::generarDivCuotasDeUnAlumno($cuotasPagos->cuotas).
											"</div>
											<div class='col-md-6'>";
												$modal.=Pagos::generarDivPagosDeUnAlumno($cuotasPagos->pagos).
											"</div>
										</div>
									</div>								
								</div>
								<div class='modal-footer'>
									<button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
								</div>
							</div>
						</div>";
				return $modal;
						
			}
			public static function TraerTodoLosAlumnos(){
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("select * from alumnos");
				$consulta->execute();			
				return $consulta->fetchAll(PDO::FETCH_CLASS, "Alumno");		
			}
			public static function TraerUnAlumno($filt){
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM alumnos WHERE dni=:dni OR nombre= :nombre OR apellido= :apellido");
				$consulta->bindValue(':dni',$filt, PDO::PARAM_INT);
				$consulta->bindValue(':nombre',$filt, PDO::PARAM_STR);
				$consulta->bindValue(':apellido',$filt, PDO::PARAM_STR);
				$consulta->execute();
				$alumnoBuscado= $consulta->fetchObject('Alumno');
				return $alumnoBuscado;      			
			}
			public function TraerUnAlumnoId(){
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM alumnos WHERE id=:id");
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);				
				$consulta->execute();
				$alumnoBuscado= $consulta->fetchObject('Alumno');
				return $alumnoBuscado;      			
			}
			public static function InsertarDocumentacion($doc){
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta(
					
					"INSERT into documentacion 
					( 
						titulo,
						dni,
						fotos,
						cert_salud,
						esmatricula,
						escuota,
						escertificacion
					)
						values
					(
						:titulo,
						:dni,
						:fotos,
						:cert_salud,
						:esmatricula,
						:escuota,
						:escertificacion
					)");
				$consulta->bindValue(':titulo',$doc->titulo, PDO::PARAM_INT);
				$consulta->bindValue(':dni', $doc->dni, PDO::PARAM_INT);
				$consulta->bindValue(':fotos', $doc->fotos, PDO::PARAM_INT);
				$consulta->bindValue(':cert_salud',$doc->cert_salud, PDO::PARAM_INT);
				$consulta->bindValue(':esmatricula', $doc->esmatricula, PDO::PARAM_INT);
				$consulta->bindValue(':escuota', $doc->escuota, PDO::PARAM_INT);
				$consulta->bindValue(':escertificacion',$doc->escertificacion, PDO::PARAM_INT);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
			}
			
		//FIN FUNCIONES ALUMNO
		//FUNCIONES ADMINISTRACION
			public static function insertarCuotasYPagos($cuotasPagos){//recibe un obj con 2 arrays 'cuotas' y 'pagos'
				$resultado=new stdClass();
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
				if( $cuotasPagos->cuotas != ""){
					$cuotas=Cuotas::generarSQLInsertar($cuotasPagos->cuotas);
					//cuotas
					$qwery="INSERT INTO cuotas 	(id_alumno,concepto,fecha,importe) VALUES".$cuotas;
					//var_dump($qwery);
					$consulta =$objetoAccesoDato->RetornarConsulta($qwery);					
					$consulta->execute();					
					$resultado->insertoCuotas=$objetoAccesoDato->RetornarUltimoIdInsertado();
				}else{
					$resultado->insertoCuotas=0;
				}
				if( $cuotasPagos->pagos != ""){
					$pagos=Pagos::generarSQLInsertar($cuotasPagos->pagos);
					//pagos
					$qweryp= "INSERT INTO pagos (id_alumno,concepto,fecha,importe) VALUES ".$pagos;
					//var_dump($qweryp);
					$consulta =$objetoAccesoDato->RetornarConsulta($qweryp);					
					$consulta->execute();					
					$resultado->insertoPagos=$objetoAccesoDato->RetornarUltimoIdInsertado();
				}else{
					$resultado->insertoPagos=0;
				}	
				return $resultado;
			}
			public function TraerCuotasPagos(){
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM cuotas WHERE  id_alumno = :id");
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
				$consulta->execute();
				$cuotasAlumnoBuscado= $consulta->fetchAll(PDO::FETCH_CLASS,'Cuotas');

				//$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM pagos WHERE  id_alumno = :id");
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
				$consulta->execute();
				$pagosAlumnoBuscado= $consulta->fetchAll(PDO::FETCH_CLASS,'Pagos');

				$resultado=new stdClass();
				$resultado->cuotas=$cuotasAlumnoBuscado;
				$resultado->pagos=$pagosAlumnoBuscado;

				return $resultado;
			}
			public static function TraerTodosPagosNoActualizados(){
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
				$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM pagos WHERE  pasada IS NULL");
				$consulta->execute();
				$pagosNoActualizadas= $consulta->fetchAll(PDO::FETCH_CLASS,'Pagos');
				$resultado=new stdClass();
				$resultado->pagosNoActualizadas=$pagosNoActualizadas;
				return $resultado;
			}
			public static function DivsDeuda($Alumnos){
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
		//FIN FUNCIONES ADMINISTRACION	
	/****************************************************************************************************/
}