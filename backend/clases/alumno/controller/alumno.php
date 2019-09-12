<?php
require_once "./../model/alumno.php";
require_once "./../servicies/alumno.php";
require_once "./../../cuotas_pagos/servicies/cuotas_pagos.php";


class ControllerAlumno
{
    private $alum;

	public function __construct( Alumno $alumno )
    {
        $this->alum = $alumno;
    }


    /* inicio funciones especiales para slimFramework*/

	public function TraerUno($request, $response, $args) {
		$argumentos=$request->getParsedBody();
		$filtro=$argumentos['filtro'];
		$elAlumno=Alumno::TraerUnAlumno($filtro);
		$newResponse = generarDivAlumno($elAlumno);
		return $newResponse;
	}	
	public function TraerTodos($request, $response, $args) {
		$todosLosAlumnos=Alumno::TraerTodoLosAlumnos();		
		$newResponse = generarDivAlumno($todosLosAlumnos);
		return $newResponse;
	}
    public function admAlumno($request, $response, $args) {
		$todosLosAlumnos=Alumno::TraerTodoLosAlumnos();
		$todosLosAlumnosOrdenados= sort_by_orden($todosLosAlumnos);
		return $response->withJson($todosLosAlumnosOrdenados, 200);		
	}
	// TODO debería sacarse por ser una vista
	public static function divCuotasPagosAlumno($request, $response, $args){
		$argumentos=$request->getParsedBody();
		$alumno = new Alumno();
        $alumno->id=$argumentos['id'];
		$cuotasPagos= $alumno->TraerCuotasPagos();
		$respuesta= new stdClass();
		$respuesta->alumno= $alumno->TraerUnAlumnoId();
		$respuesta->divCuotas=generarDivCuotasDeUnAlumno2($cuotasPagos->cuotas);
		$respuesta->divPagos=generarDivPagosDeUnAlumno2($cuotasPagos->pagos);
		return $response->withJson($respuesta, 200);
	}
    public function CargarUno($request, $response, $args) {

		$ArrayDeParametros = $request->getParsedBody();
	    //var_dump($ArrayDeParametros);    	
		$miAlumno = new Alumno($ArrayDeParametros);
		//documentacion
		$documentacion= new stdClass($ArrayDeParametros);
		$miAlumno->id_documentacion=Alumno::InsertarDocumentacion($documentacion);
		$resultadoAlumno = $miAlumno->InsertarElAlumno();
		//cuotas pagos
		$datos= new stdClass();
		$datos->id=$resultadoAlumno;
		$datos->pago=$ArrayDeParametros['supago']["pago"];
		$datos->valores=$ArrayDeParametros['valores'];
		//genera obj de cuotas y pagos automatico
		$vectores = Cuotas::generarArrayCuotasPagos($datos);
		$resultadoCuotas=Alumno::insertarCuotasYPagos($vectores);
	   	$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultadoAlumno=$resultadoAlumno;
		$objDelaRespuesta->resultadoCuotas=$resultadoCuotas;

		return $response->withJson($objDelaRespuesta, 200);
    }
	public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$Alumno= new Alumno($ArrayDeParametros);
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
	    $miAlumno = new Alumno($ArrayDeParametros);
	   	$resultado =$miAlumno->ModificarAlumno();
	   	$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultado=$resultado;
		return $response->withJson($objDelaRespuesta, 200);		
	}
	public function deudaAlumno($request, $response, $args) {
		$argumentos=$request->getParsedBody();		
		$alumno = new Alumno($argumentos);
		$todasLasCuotasPagosAlumno=$alumno->TraerCuotasPagos();
		$div=generarDivDeuda($todasLasCuotasPagosAlumno);
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
		//FIN FUNCIONES ADMINISTRACION
	/****************************************************************************************************/
}