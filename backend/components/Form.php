<?php
    session_start();

    class Form{
        
        
    /* inicio funciones especiales para slimFramework*/
        public  function AltaUsiario($request, $response, $args) {            
            return Form::FormAltaUsiario();
        }
        public  function AltaAlumno($request, $response, $args) {            
            return Form::FormAltaAlumno();
        }
        public  function AltaCarrera($request, $response, $args) {            
            return Form::FormAltaCarrera();
        }
        public  function MenuUsuarios($request, $response, $args) {            
            return Form::FormMenuUsuario();
        }
        public  function MenuAlumnos($request, $response, $args) {
            return Form::FormMenuAlumnos();
        }
        public  function MenuAdministracion($request, $response, $args) {
            return Form::FormMenuAdministracion();
        }
        public  function MenuCaja($request, $response, $args) {
            $respuesta=Form::FormMenuCaja();
            return $response->withJson($respuesta, 200);
        }
        /************************************************************************* */
//
        public static function FormAltaUsiario(){
            $hoy = date("Y-m-d");
            $fechaMinima = date("Y-m-d", mktime(0, 0, 0, date('d'), date('m'), date('Y')-90));
            
            $grilla ="<script src='./js/validator.js' ></script>
                    <div class='container opacidad'>
                        <input type='text' id='idUsuario' name='idUsuario' style='visibility:hidden'>
                        <div class='container bootstrap-form' id='AltaUsiario'>            
                            <div class='row'>
                                <div class='form-group col-md-3'>
                                    <label for='inputNombre' class='control-label'>Nombre</label>
                                    <input type='text' class='form-control'  maxlength='20'  id='inputNombre' placeholder='Nombre' required>
                                    
                                    <div class='invalid-feedback'>                                    
                                        revisar no puede estar vacio y minimo 4 letras!                                    
                                    </div>
                                </div>
                                <div class='form-group col-md-3'>
                                    <label for='inputApellido'>Apellido</label>
                                    <input type='text' class='form-control' id='inputApellido' placeholder='Apellido' required>
                                    
                                    <div class='invalid-feedback'>                                    
                                        revisar no puede estar vacio y minimo 4 letras!                                    
                                    </div>
                                </div>
                                <div class='form-group col-md-3'>
                                    <label for='inputDni'>DNI</label>
                                    <input type='number' class='form-control'id='inputDni'  min='4000000' max='100000000' placeholder='D.N.I.' required>
                                    
                                    <div class='invalid-feedback'>                                    
                                        revisar!                                    
                                    </div>
                                </div>
                                <div class='form-group col-md-3'>
                                    <label for='inputCumpleanios'>Fecha de Cumpleaños</label>
                                    <input type='date' class='form-control' id='inputCumpleanios' min='{$fechaMinima}' max='{$hoy}'  required>
                                    
                                    <div class='invalid-feedback'>                                    
                                        revisar!                                    
                                    </div>
                                </div>
                                <div class='form-group col-md-3'>
                                    <label for='inputEmail'>Email</label>
                                    <input type='email' class='form-control' id='inputEmail' placeholder='Email' data-error='Bruh, Ingrese email valido' required>
                                    
                                    <div class='invalid-feedback'>                                    
                                        revisar!                                    
                                    </div>
                                </div>
                                <div class='form-group col-md-3'>
                                    <label for='inputUsuario'>Usuario</label>
                                    <input type='text' class='form-control' id='inputUsuario' placeholder='Usuario' required>
                                    
                                    <div class='invalid-feedback'>                                    
                                        revisar!                                    
                                    </div>
                                </div>
                                <div class='form-group col-md-3'>
                                    <label for='inputPassword'>Password</label>
                                    <input type='password' class='form-control' id='inputPassword' placeholder='Password' required>
                                    
                                    <div class='invalid-feedback'>                                    
                                        revisar!                                    
                                    </div>
                                </div>
                                <div class='form-group col-md-3'>
                                    <label for='inputPerfil'>Perfil</label>
                                    <select id='inputPerfil' class='form-control' required>
                                        <option value=''>seleccione uno</option>
                                        <option value='Empleado'>Empleado</option>
                                        <option value='Jefe'>Jefe</option>
                                        <option value='WebMaster'>WebMaster</option>                        
                                    </select>
                                   
                                    <div class='invalid-feedback'>                                    
                                        revisar!                                    
                                    </div>
                                </div>
                                <div class='form-group col-md-3'>
                                    <label for='inputTurno'>Turno</label>
                                    <input type='text' class='form-control' id='inputTurno' required>
                                    
                                    <div class='invalid-feedback'>                                    
                                        revisar!                                    
                                    </div>
                                </div>
                                <div class='form-group col-md-3'>
                                    <label for='inputTel'>TEL</label>
                                    <input type='text' class='form-control' id='inputTel' required>
                                    
                                    <div class='invalid-feedback'>                                    
                                        revisar!                                    
                                    </div>
                                </div>
                            
                                <div class='form-group col-md-3'>
                                    <label for='inputCel'>Celular</label>
                                    <input type='text' class='form-control' id='inputCel'>
                                </div>
                                <div class='form-group col-md-3'>
                                    <label for='inputAddress'>Direccion</label>
                                    <input type='text' class='form-control' id='inputAddress' placeholder='Direccion 1' required>
                                    
                                    <div class='invalid-feedback'>                                    
                                        revisar!                                    
                                    </div>
                                </div>
                                <div class='form-group col-md-3'>
                                    <label for='inputAddress2'>Direccion 2</label>
                                    <input type='text' class='form-control' id='inputAddress2' placeholder='Direccion 2'>
                                </div>
                                
                                <div class='form-group col-md-3'>
                                    <label for='inputCity'>Ciudad</label>
                                    <input type='text' class='form-control' id='inputCity' required>
                                </div>
                                <div class='form-group col-md-3'>
                                    <label for='inputState'>Provincia</label>
                                    <select id='inputState' class='form-control'>
                                        <option selected>Choose...</option>
                                        <option value='BuenosAires'>Buenos Aires</option>
                                        <option value='Catamarca'>Catamarca</option>
                                        <option value='Chaco'>Chaco</option>
                                    </select>
                                    
                                    <div class='invalid-feedback'>                                    
                                        revisar!                                    
                                    </div>
                                </div>
                                <div class='form-group col-md-3'>
                                    <label for='inputZip'>Zip</label>
                                    <input type='text' class='form-control' id='inputZip' required>
                                    
                                    <div class='invalid-feedback'>                                    
                                        revisar!                                    
                                    </div>
                                </div>
                                               
                                <button id='btnAgregar' class='btn btn-primary btn-submit' onclick='Test.validarTodoFormAltaUsiario();'>Agregar</button>
                                <button type='reset'>Limpiar</button>
                            </div>            
                        </div>
                    </div>";
                    return $grilla;
        }
        public static function FormAltaAlumno(){
            $grilla =   "<script src='./js/validator.js' ></script>
                    <div class='container opacidad'>
                        <input type='text' id='idAlumno' name='idAlumno' style='visibility:hidden'>
                        <input type='text' id='idHiddenCarrera' name='idHiddenCarrera' style='visibility:hidden'>
                        <div class='container bootstrap-form'>
                            <h2> FICHA DE INSCRIPCIÓN </h2>
                            <hr/>                                                   
                            <div class='container' >
                                <div class='row'>
                                    <div class='form-group col-md-1'>
                                        <label for='inputLegajo'>Legajo</label>
                                        <input type='text' class='form-control' id='inputLegajo' placeholder='Legajo'>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>                                
                                    <div class='form-group col-md-3'>
                                        <label for='inputCursoCarrera'>Curso/Carrera</label>
                                        <select class='custom-select' id='inputCursoCarrera' onchange='Test.cargarModalidades();'>
                                            <option value=''>Seleccione...</option>
                                        </select>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>
                                    <div class='form-group col-md-1'>
                                        <div class='checkbox'>
                                            <label><input id='checkActivo' type='checkbox' value='1' checked>Activo</label>
                                        </div>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label for='inputInscripcion'>Fecha de Inscripción</label>
                                        <input type='date' class='form-control' id='inputInscripcion' placeholder='Fecha de Inscripción'>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>
                                    <div class='form-group col-md-1'>
                                        <label for='inputModalidad'>Modalidad</label>
                                        <select class='custom-select' id='inputModalidad'>
                                        </select>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>
                                    <div class='form-group col-md-1'>
                                        <label for='inputTurno'>Turno</label>
                                        <select class='custom-select' id='inputTurno' >
                                        </select>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>
                                    <div class='form-group col-md-1'>
                                        <label for='inputAnio'>Año</label>
                                        <input type='text' class='form-control' id='inputAnio' placeholder='Año'>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>
                                    <div class='form-group col-md-2'>
                                        <label for='inputDni'>DNI</label>
                                        <input type='text' class='form-control' id='inputDni' placeholder='D.N.I.'>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label for='inputApellido'>Apellido</label>
                                        <input type='text' class='form-control' id='inputApellido' placeholder='Apellido'>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label for='inputNombre'>Nombre</label>
                                        <input type='text' class='form-control' id='inputNombre' placeholder='Nombre'>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>
                                    <div class='form-group col-md-1'>
                                        <label for='inputSexo'>Sexo</label>                            
                                        <select class='custom-select' id='inputSexo' >
                                        <option value='' checked >...</option>
                                        <option value='1'>M/a</option>
                                        <option value='2'>F/a</option>
                                        </select>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>                                                        
                                    <div class='form-group col-md-3'>
                                        <label for='inputCumpleanios'>Fecha de Cumpleaños</label>
                                        <input type='date' class='form-control' id='inputCumpleanios' placeholder='Fecha de Cumpleaños'>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label for='inputAddress'>Direccion</label>
                                        <input type='text' class='form-control' id='inputAddress' placeholder='Direccion'>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>
                                    <div class='form-group col-md-2'>
                                        <label for='inputTel'>TEL</label>
                                        <input type='text' class='form-control' id='inputTel'>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>                    
                                    <div class='form-group col-md-2'>
                                        <label for='inputCel'>Celular</label>
                                        <input type='text' class='form-control' id='inputCel'>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>
                                    <div class='form-group col-md-2'>
                                        <label for='inputEstadoCivil'>Estado Civil</label>
                                        <select class='custom-select' id='inputEstadoCivil' >
                                        <option value='' checked>Seleccione...</option>
                                        <option value='1'>Soltero/a</option>
                                        <option value='2'>Casado/a</option>
                                        <option value='3'>Divorciado/a</option>
                                        <option value='4'>Viudo/a</option>      
                                        </select>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>                    
                                    <div class='form-group col-md-3'>
                                        <label for='inputSecundario'>Secundario</label>
                                        <input type='text' class='form-control' id='inputSecundario'>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label for='inputEmail'>Email</label>
                                        <input type='email' class='form-control' id='inputEmail' placeholder='Email'>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label for='inputFacebook'>Facebook</label>
                                        <input type='text' class='form-control' id='inputFacebook' placeholder='Facebook'>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>                                
                                    <div class='form-group col-md-3'>
                                        <label for='checkTrabajo'>¿Trabaja?</label>
                                        <input type='text' class='form-control' id='checkTrabajo' placeholder='trabajo'>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>                                
                                    <div class='form-group col-md-3'>
                                        <label for='inputConocer'>¿Cómo nos conoció?</label>
                                        <select id='inputConocer' class='form-control'>
                                            <option value='' selected>Choose...</option>
                                            <option value=1>Internet</option>
                                            <option value=2>Recomendado</option>
                                            <option value=3>Pasacalle</option>
                                            <option value=4>Otro</option>                              
                                        </select>
                                        <div class='invalid-feedback'>                                    
                                            revisar!                                    
                                        </div>
                                    </div>

                                    <div class='form-group col-md-6'>
                                        <label for='inputPromo'>Promo Actual</label>
                                        <textarea id='inputPromo' class='form-control'></textarea>
                                    </div>
                                </div>
                                <hr/>                                
                                <div class='row'>
                                    <div class='form-group col-md-4' >
                                        <label for='divDoc'>Documentación Entregada</label>
                                        <div class='checkbox' id='divDoc'>
                                            <label><input id='checkTitulo' type='checkbox' value=1>Titulo Secundario</label>
                                        </div>
                                        <div class='checkbox'>
                                            <label><input id='checkDNI' type='checkbox' value=1>Fotocopia DNI</label>
                                        </div>
                                        <div class='checkbox'>
                                            <label><input id='checkFoto' type='checkbox' value=1>2 Foto</label>
                                        </div>

                                        <div class='form-group row'>
                                            <label for='inputPago' class='col-sm-2 col-form-label'>Pago</label>
                                            <div>
                                                <input type='text' class='form-control' id='inputPago'>
                                            </div>
                                        </div>

                                        <label for='checkMatricula'>Comprende</label>
                                        <div class='checkbox'>
                                            <label><input id='checkMatricula' type='checkbox' value=1>Matricula</label>
                                        </div>
                                        <div class='checkbox'>
                                            <label><input id='checkCuotas' type='checkbox' value=1>Cuotas( )</label>
                                        </div>
                                        <div class='checkbox'>
                                            <label><input id='checkCertificacion' type='checkbox' value=1>Certificacion</label>
                                        </div>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <form>                                        
                                            <div class='form-group row'>
                                                <label for='inputMat' class='col-sm-3 col-form-label'>Matricula</label>
                                                <div class='col-sm-3'>
                                                    <input type='text' class='form-control'  id='inputMat' placeholder='Matricula' onchange='Test.cargarTotal();'>
                                                </div>
                                            </div>                                        
                                            <div class='form-group row'>
                                                <label for='inputCuota' class='col-sm-3 col-form-label'>Cuota</label>
                                                <div class='col-sm-3'>
                                                    <input type='text' class='form-control'  id='inputCuota' placeholder='precio' onchange='Test.cargarTotal();'>
                                                </div>
                                            </div>                                        
                                            <div class='form-group row'>
                                                <label for='inputCantCuota' class='col-sm-3 col-form-label'>Cant. Cuotas</label>
                                                <div class='col-sm-3'>
                                                    <input type='text' class='form-control'  id='inputCantCuota' placeholder='cantidad' onchange='Test.cargarTotal();'>
                                                </div>
                                            </div>                                        
                                            <div class='form-group row'>
                                                <label for='inputDescuento' class='col-sm-3 col-form-label'>Descuento</label>
                                                <div class='col-sm-3'>
                                                    <input type='text' class='form-control'  id='inputDescuento' placeholder='valor' onchange='Test.cargarTotal();'>
                                                </div>
                                            </div>                                    
                                            <div class='form-group row'>
                                                <label for='inputTotal' class='col-sm-3 col-form-label'>Total</label>
                                                <div class='col-sm-3'>
                                                    <input type='text' class='form-control'  id='inputTotal'  placeholder='valor' disabled onchange='Test.cargarTotal();'>
                                                </div>
                                            </div>
                                        </form>                                                      
                                    </div>
                                    <div class='form-group col-md-12'>
                                        <label for='inputObservaciones'>Observaciones</label>
                                        <textarea id='inputObservaciones' class='form-control'></textarea>
                                    </div>
                                </div>                                                               
                                <hr/>
                                            
                                <button id='btnAgregar' class='btn btn-primary' onclick='Test.validarTodoFormAltaAlumno()'>Agregar</button>
                            </div>            
                        </div>
                    </div>";
                return $grilla;
           
        }
        public static function FormAltaCarrera(){//border border-primary
            $grilla ="<div class='container opacidad'>
                        <input type='text' id='idCarrera' name='idCarrera' style='visibility:hidden'>
                        <input type='text' id='idModalidades' name='idModalidades' style='visibility:hidden'>
                        <input type='text' id='idTurnos' name='idTurnos' style='visibility:hidden'>
                        <div class='container'>            
                            <div class='row'>                    
                                <div class='form-group col-md-3'>
                                    <label for='inputNombre'>Nombre</label>
                                    <input type='text' class='form-control' id='inputNombre' placeholder='Nombre'>
                                </div>                    
                                <div class='form-group col-md-3'>
                                    <label for='divModalidades'>Modalidades</label>
                                    <div id='divModalidades'>
                                        <div class='form-check form-check-inline'>
                                            <label class='form-check-label'>
                                                <input class='form-check-input' type='checkbox' id='inlineCheckbox0' value='1'>P
                                            </label>
                                        </div>
                                        <div class='form-check form-check-inline'>
                                            <label class='form-check-label'>
                                                <input class='form-check-input' type='checkbox' id='inlineCheckbox1' value='1'> SP
                                            </label>
                                        </div>
                                        <div class='form-check form-check-inline'>
                                            <label class='form-check-label'>
                                                <input class='form-check-input' type='checkbox' id='inlineCheckbox2' value='1' > V
                                            </label>
                                        </div>
                                    </div>
                                </div>                    
                                <div class='form-group col-md-3'>
                                    <label for='divTurnos'>Modalidades</label>
                                    <div id='divTurnos'>
                                        <div class='form-check form-check-inline'>
                                            <label class='form-check-label'>
                                                <input class='form-check-input' type='checkbox' id='inlineCheckboxTurnos0' value='1'>M
                                            </label>
                                        </div>
                                        <div class='form-check form-check-inline'>
                                            <label class='form-check-label'>
                                                <input class='form-check-input' type='checkbox' id='inlineCheckboxTurnos1' value='1'> T
                                            </label>
                                        </div>
                                        <div class='form-check form-check-inline '>
                                            <label class='form-check-label'>
                                                <input class='form-check-input' type='checkbox' id='inlineCheckboxTurnos2' value='1' > N
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group col-md-3'>
                                    <label for='inputDuración'>duración</label>
                                    <input type='text' class='form-control' id='inputDuración' placeholder='Duración'>
                                </div>
                                <button id='btnAgregar' class='btn btn-primary' onclick='Test.agregarCarrera()'>Agregar</button>
                            </div>            
                        </div>
                    </div>";
            return $grilla;         
        }
        public static function FormMenuUsuario(){
            $grilla="<div class='float-sm-left'>
                        <div class='row'>
                            <div class='btn-group-vertical'>
                                <input class='form-control mr-sm-2 ' id='txtSearch'  placeholder='DNI, Apellido, Nombre' aria-label='Search'>
                                <button class='btn btn-outline-success my-2 my-sm-0 ' onclick='Test.buscarPorDniApellidoCarrera()'>Buscar</button>               
                                <button type='button' class='btn btn-secondary' onclick='Test.formAltaUsuario()' >Agregar Usuario</button>
                                <button type='button' onclick='Test.grillaUsuarios()' class='btn btn-secondary'>Lista Usuarios</button>                
                            </div>                                    
                        </div>
                    </div>";
            return $grilla;
            
        }
        public static function FormMenuAlumnos(){
            $grilla="<div class='row'>
                    <div class='btn-group-vertical'>
                        <input class='form-control mr-sm-2' id='txtSearch' placeholder='DNI, Apellido, Carrera' aria-label='Search'>
                        <button class='btn btn-outline-success my-2 my-sm-0' onclick='Test.buscarPorDniApellidoNombreAlumno()'>Buscar Alumno</button>               
                        <button type='button' class='btn btn-secondary' onclick='Test.formAltaAlumno()'>Agregar Alumno</button>
                        <button type='button' onclick='Test.grillaAlumnos()' class='btn btn-secondary'>Lista Alumno</button>
                        <button type='button' onclick='Test.grillaCarreras()' class='btn btn-secondary'>Listar cursos</button>
                        <button type='button' onclick='Test.formAltaCarrera()' class='btn btn-secondary'>Cargar cursos</button>                
                        
                    </div>                                    
                </div>";
            return $grilla;
           
        }
        public static function FormMenuAdministracion(){            
            $grilla="<div class='row'>
                        <div class='btn-group-vertical '>
                            <input class='form-control mr-sm-2' id='txtSearch' placeholder='DNI, Apellido, Carrera' aria-label='Search'>
                            <button class='btn btn-outline-success my-2 my-sm-0' onclick=''>Buscar Alumno</button>                      
                            <button type='button' onclick='Test.formAdm()' class='btn btn-secondary'>Consultar</button>              
                            <button type='button' onclick='Test.GenerarDeudaTotalAlumnos()' class='btn btn-secondary' >Deuda</button>";
                        if(isset($_SESSION['perfil']) && ( $_SESSION['perfil']=='WebMaster' || $_SESSION['perfil']=='Jefe')){
            $grilla.=       "<button type='button' onclick='' class='btn btn-secondary' disabled>FLUJO</button>                
                            <button type='button' onclick='' class='btn btn-secondary' disabled>Registro</button>";
                        }                        
            $grilla.=   "</div>                                    
                    </div>";
            return $grilla;
           
        }
        public static function FormMenuCaja(){// continuar haciendo grid para registro de la caja
            
            $respuesta= new stdClass();           
            $grilla="<div class='row'>
                        <div class='btn-group-vertical'>
                            <input class='form-control mr-sm-2' id='txtImporte' placeholder='Importe' style='text-align:center' disabled>
                            <button type='button' id='btnApertura' onclick='Test.GenerarFormAperturaCaja()' class='btn btn-secondary' style='width: 100%;'>Abrir</button>
                            <button type='button' id='btnEntrada' onclick='Test.GenerarFormEntradaDeCaja()' class='btn btn-secondary ' style='width: 100%;' disabled>Entrada</button>               
                            <button type='button' id='btnSalida' onclick='Test.GenerarFormSalidaDeCaja()' class='btn btn-secondary ' style='width: 100%;' disabled>Salida</button>
                            <button type='button' id='btnCierre' onclick='Test.CierreCaja()' class='btn btn-secondary' style='width: 100%;' disabled>Cerrar</button>
                            <button type='button' id='btnActualizar' onclick='Test.GenerarActualizar()' class='btn btn-secondary' style='width: 100%;' disabled>Actualizar</button>";
                        if(isset($_SESSION['perfil']) && ( $_SESSION['perfil']=='WebMaster' || $_SESSION['perfil']=='Jefe')){
            $grilla.=      "<button type='button' id='btnEstadistica' onclick='Test.Estadisticas()' class='btn btn-secondary' style='width: 100%;'>Estadisticas</button>";
                        }              
            $grilla.=   "</div>                                  
                    </div>";
            $formCaja=  "<div class='row'>
                            <div class='col-md-6'>
                                <div class='p-2 mb-1 bg-secondary text-white rounded'>
                                    <h2>Movimientos</h2>
                                </div>
                                <div id='divFormularioCaja'></div>
                            </div>
                            <div class='col-md-6' id='divMovimientos'>
                                <div class='p-2 mb-1 bg-secondary text-white rounded'>
                                    <h2>Movimientos</h2>
                                </div>
                            </div>
                        </div>";
            $respuesta->menu=$grilla;
            $respuesta->cuerpo=$formCaja;
            return $respuesta;
        }
    }
?>