///<reference path="../libs/jqueryTS/index.d.ts"/>
///<reference path="../libs/chartsTS/charts.d.ts"/>

namespace Test{
    
    
    /********************************************** GRILLAS *************************************************/    
        export function grillaUsuarios():void {
            let pagina = "backend/uss/todos";
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {
                                "tokken" : tokken
                             };        

            //LIMPIO EL CONTENIDO DEL DIV    
            $("#divResultado").html("");

            $.ajax({
                type: 'POST',
                url: pagina,
                data: datoObjeto,
                dataType: "html"
            })
            .done(function (objHTML:any) {
                
                
                $("#divResultado").html(objHTML);
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function grillaAlumnos():void {
            let pagina = "backend/a/todos";
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {"tokken": tokken};        

            //LIMPIO EL CONTENIDO DEL DIV    
            $("#divResultado").html("");

            $.ajax({
                type: 'POST',
                url: pagina,
                data: datoObjeto,
                dataType: "html"
            })
            .done(function (objHTML:any) {
                //console.log(objHTML);
                
                $("#divResultado").html(objHTML);
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function grillaCarreras():void {
            let pagina = "backend/carreras/todos";                 
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {"tokken": tokken};     
            //LIMPIO EL CONTENIDO DEL DIV    
            $("#divResultado").html("");

            $.ajax({
                type: 'POST',
                url: pagina,
                data: datoObjeto,
                dataType: "html"
            })
            .done(function (objHTML:any) {
                
                
                $("#divResultado").html(objHTML);
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
    /********************************************* FORMS ALTAS **********************************************/
        export function formAltaUsuario():void {
            let pagina = "backend/forms/AltaUsiario";
            //LIMPIO EL CONTENIDO DEL DIV    
            $("#divResultado").html("");
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {"tokken": tokken};     
            $.ajax({
                type: 'POST',
                url: pagina,
                data: datoObjeto,
                dataType: "html",
                async: false
            })
            .done(function (objHTML:any) {
                $("#divResultado").html(objHTML);
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });            
        }
        export function formAltaAlumno():void {            
            let pagina = "backend/forms/AltaAlumno";
            //LIMPIO EL CONTENIDO DEL DIV    
            $("#divResultado").html("");
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {"tokken": tokken};     
            $.ajax({
                type: 'POST',
                url: pagina,
                data: datoObjeto,
                dataType: "html"
            })
            .done(function (objHTML:any) {
                $("#divResultado").html(objHTML);
                Test.cargarCarreras(); 
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function formAltaCarrera():void {

            let pagina = "backend/forms/AltaCarrera";
            //LIMPIO EL CONTENIDO DEL DIV    
            $("#divResultado").html("");
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {"tokken": tokken};     
            $.ajax({
                type: 'POST',
                url: pagina,
                data: datoObjeto,
                dataType: "html"
            })
            .done(function (objHTML:any) {
                $("#divResultado").html(objHTML);
                Test.cargarCarreras(); 
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });                
        }
        export function formAdm():void {
            let pagina = "backend/a/adm";                 

            //LIMPIO EL CONTENIDO DEL DIV    
            $("#divResultado").html("");
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {"tokken": tokken};     
            $.ajax({
                type: 'POST',
                url: pagina,
                data: datoObjeto,
                dataType: "html"
            })
            .done(function (objHTML:any) {
                //console.log(objHTML);                
                $("#divResultado").html(objHTML);
                Test.cargarDatalist();
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
            
            

        }
    /************************************************ MENUS *************************************************/
        
    /************************************************ MENUS *************************************************/
    
        export function home():void {            
            $("#divResultado").html("");    
            $("#divMenu").html("");
            /* 
            let pagina = "backend/";
            let tokken = localStorage.getItem('tokken');                              
            let datoObjeto ={  
                                "tokken" : tokken
                            };                
            $.ajax({
                type: 'GET',            
                url: pagina,
                dataType: "html",
                data : datoObjeto,
                async: true
            })                
            .done(function (obj):void {
                console.log("todo bien");                    
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });*/
        }
        export function menuUsuarios():void {
            $("#divMenu").html("");
            $("#divResultado").html("");
            let pagina = "backend/forms/menuUsuarios"; 
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {
                                "tokken" : tokken
                             };           
            $.ajax({
                type: 'POST',
                url: pagina,
                data: datoObjeto,
                dataType: "html"
            })
            .done(function (objHTML:any) {
                $("#divMenu").html(objHTML);                
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }        
        export function menuAlumnos():void {
            $("#divMenu").html("");
            $("#divResultado").html("");
            let pagina = "backend/forms/menuAlumnos";
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {
                                "tokken" : tokken
                             };          
            $.ajax({
                type: 'POST',
                url: pagina,
                data: datoObjeto,
                dataType: "html"
            })
            .done(function (objHTML:any) {
                $("#divMenu").html(objHTML);                
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });            
        }    
        export function menuAdministracion():void {
            $("#divMenu").html("");
            $("#divResultado").html("");
            let pagina = "backend/forms/menuAdministracion";
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {
                                "tokken" : tokken
                             };        
            $.ajax({
                type: 'POST',
                url: pagina,
                data: datoObjeto,
                dataType: "html"
            })
            .done(function (objHTML:any) {
                $("#divMenu").html(objHTML);                
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }    
        export function menuCaja():void {
            $("#divMenu").html("");
            $("#divResultado").html("");
            let pagina = "backend/forms/menuCaja"; 
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {
                                "tokken" : tokken
                             };           
            $.ajax({
                type: 'POST',
                url: pagina,
                data: datoObjeto,
                dataType: "JSON"
            })
            .done(function (objHTML:any) {
                $("#divMenu").html(objHTML.menu);
                $("#divResultado").html(objHTML.cuerpo);
                VerificarCajaAbierta();            
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
    //LINKS BUTONS
        //USUARIO
        export function modals(id:number):void{
            let myModal="'#myModal"+id+"'";
            (<any>$(myModal)).modal('show');
            console.log("click"+id);
        }
        export function buscarPorDniApellidoCarrera():void{
            
            let pagina = "backend/uss/filtro";
            let filtro = $('#txtSearch').val();
            let tokken = localStorage.getItem('tokken');
            let datoObjeto ={
                                "filtro" : filtro,                                
                                "tokken" : tokken                                
                            };        

            //LIMPIO EL CONTENIDO DEL DIV    
            $("#divResultado").html("");

            $.ajax({
                type: 'POST',            
                url: pagina,
                dataType: "html",
                data : datoObjeto,
                async: true
            })
            .done(function (objHTML:any) {
                //$("#divResultado").html('');
                if( objHTML!=false){
                    //console.log(objHTML);
                    $("#divResultado").html(objHTML);
                }else{
                    alert("No se encontró ingun usuario con el filtro:  "+filtro+" !!!")
                }
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });

        }
        
        
        //voy por aca con el tokken



        
        export function agregarUsuario(usuario?:any):void{

            if (usuario!=undefined) {//viene del modificar 
                 
                
                console.log(usuario.id);
                formAltaUsuario();                
                $('#idUsuario').val(usuario.id);
                $('#inputApellido').val(usuario.apellido);
                $('#inputNombre').val(usuario.nombre);
                $('#inputDni').val(usuario.dni)
                $('#inputPassword').val(usuario.clave);
                $('#inputUsuario').val(usuario.usuario);
                $('#inputCumpleanios').val(usuario.fechadecumpleanios);
                $('#inputEmail').val(usuario.email);
                $('#inputPerfil').val(usuario.perfil);
                $('#inputTurno').val(usuario.turno);
                $('#inputTel').val(usuario.tel);
                $('#inputCel').val(usuario.celular);
                $('#inputAddress').val(usuario.direccion1);
                $('#inputAddress2').val(usuario.direccion2);
                $('#inputState').val(usuario.provincia);
                $('#inputCity').val(usuario.ciudad);
                $('#inputZip').val(usuario.codigopostal);
                $("#btnAgregar").attr("onclick",'Test.validarTodoFormModificarUsiario()');                
                $('#btnAgregar').text('Modificar');             


            }else{// viene del agregar            
                let pagina = "backend/uss/";
                let tokken = localStorage.getItem('tokken');
                let datoObjeto = {
                                    
                                    "apellido" : $('#inputApellido').val(),
                                    "nombre" : $('#inputNombre').val(),
                                    "dni" : $('#inputDni').val(),
                                    "clave" : $('#inputPassword').val(),
                                    "usuario" : $('#inputUsuario').val(),
                                    "fechadecumpleanios" : $('#inputCumpleanios').val(),
                                    "email" : $('#inputEmail').val(),
                                    "perfil" : $('#inputPerfil').val(),
                                    "turno" : $('#inputTurno').val(),
                                    "tel" : $('#inputTel').val(),
                                    "celular" : $('#inputCel').val(),
                                    "direccion1" : $('#inputAddress').val(),
                                    "direccion2" : $('#inputAddress2').val(),
                                    "provincia" : $('#inputState').val(),
                                    "ciudad" : $('#inputCity').val(),
                                    "codigopostal" : $('#inputZip').val(),
                                    "tokken" : tokken
                                };        

                //LIMPIO EL CONTENIDO DEL DIV    
                $("#divResultado").html("");

                $.ajax({
                    type: 'POST',            
                    url: pagina,
                    dataType: "text",
                    data : datoObjeto,
                    async: true
                })
                .done(function (resultado) {
                    //$("#divResultado").html('');
                    //console.log(objJSON);
                    
                    if (resultado!=null) {
                        
                        $("#divResultado").html("");
                        alert("Usuario Agregado Con Exito!!!");
                    }
                    
                })
                .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                    alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
                });
            }

        }
        export function eliminarUsuario(usuario:any):void{
            
            let opcion = confirm("Está seguro que desea eliminar a "+usuario.apellido+", "+usuario.nombre+"?");
            if (opcion == true) {
                let pagina = "backend/uss/";
                let tokken = localStorage.getItem('tokken');
                let datoObjeto = {
                                    "id" : usuario.id,
                                    "tokken" : tokken                                
                                };        

                //LIMPIO EL CONTENIDO DEL DIV    
                //

                $.ajax({
                    type: 'DELETE',            
                    url: pagina,
                    dataType: "text",
                    data : datoObjeto,
                    async: true
                })
                .done(function (resultado) {
                    //$("#divResultado").html('');
                    //console.log(objJSON);
                    
                    if (resultado!=false){                        
                        alert("Usuario Eliminado Con Exito!!!");
                        $("#divResultado").html("");
                        grillaUsuarios();
                    }else{
                        console.log("no borro nada");
                    }
                    
                })
                .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                    alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
                });

            } else {
                
            }
            
        }
        export function modificarUsuario():void{

                let pagina = "backend/uss/";
                let tokken = localStorage.getItem('tokken');
                let datoObjeto = {  
                                    "id" : $('#idUsuario').val(),
                                    "apellido" : $('#inputApellido').val(),
                                    "nombre" : $('#inputNombre').val(),
                                    "dni" : $('#inputDni').val(),
                                    "clave" : $('#inputPassword').val(),
                                    "usuario" : $('#inputUsuario').val(),
                                    "fechadecumpleanios" : $('#inputCumpleanios').val(),
                                    "email" : $('#inputEmail').val(),
                                    "perfil" : $('#inputPerfil').val(),
                                    "turno" : $('#inputTurno').val(),
                                    "tel" : $('#inputTel').val(),
                                    "celular" : $('#inputCel').val(),
                                    "direccion1" : $('#inputAddress').val(),
                                    "direccion2" : $('#inputAddress2').val(),
                                    "provincia" : $('#inputState').val(),
                                    "ciudad" : $('#inputCity').val(),
                                    "codigopostal" : $('#inputZip').val(),
                                    "tokken" : tokken                              
                                };                

                $.ajax({
                    type: 'PUT',            
                    url: pagina,
                    dataType: "text",
                    data : datoObjeto,
                    async: true
                })
                .done(function (resultado) {
                    
                    
                    if (resultado!=false){                        
                        alert("Usuario Modificado Con Exito!!!");
                        grillaUsuarios();
                    }else{
                        alert(resultado);
                        console.log("no modifico nada ");
                    }
                    
                })
                .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                    alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
                });

            
            
        }
        //ALUMNO
        export function buscarPorDniApellidoNombreAlumno():void{
            
            let pagina = "backend/a/filtro";
            let filtro = $('#txtSearch').val();
            let tokken = localStorage.getItem('tokken');
            let datoObjeto ={
                                "filtro" : filtro,
                                "tokken" : tokken
                            };

            //LIMPIO EL CONTENIDO DEL DIV    
            $("#divResultado").html("");

            $.ajax({
                type: 'POST',            
                url: pagina,
                dataType: "html",
                data : datoObjeto,
                async: true
            })
            .done(function (objHTML:any) {
                //$("#divResultado").html('');
                if( objHTML!=false){
                    //console.log(objHTML);
                    $("#divResultado").html(objHTML);
                }else{
                    alert("No se encontró ingun usuario con el filtro:  "+filtro+" !!!")
                }
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });

        }
        export function agregarAlumno(unAlumno?:any):void{

            if (unAlumno!=undefined) {//viene del modificar 
                
                /*formAltaAlumno();
                $('#inputDni').val(),
                                    "nombre" : $('#inputNombre').val(),
                                    "apellido" : $('#inputApellido').val(),
                                    "sexo" : $('#inputSexo').val(),
                                    "legajo" : $('#inputLegajo').val(),
                                    "idcarrera" : $('#inputCursoCarrera').val(),
                                    "fechadeinscripcion" : $('#inputInscripcion').val(),
                                    "modalidad" : $('#inputModalidad').val(),
                                    "turno" : $('#inputTurno').val(),
                                    "anio_carrera" : $('#inputAnio').val(),                                    
                                    "activo" : $('#checkActivo:checked').val(),
                                    "fechadenacimiento" : $('#inputCumpleanios').val(),
                                    "direccion" : $('#inputAddress').val(),
                                    "tel" : $('#inputTel').val(),
                                    "celular" : $('#inputCel').val(),
                                    "estadocivil" : $('#inputEstadoCivil').val(),
                                    "secundario" : $('#inputSecundario').val(),
                                    "email" : $('#inputEmail').val(),
                                    "facebook" : $('#inputFacebook').val(),
                                    "trabajo" : $('#checkTrabajo').val(),
                                    "id_documentacion" : "",
                                    "conocio" : $('#inputConocer').val(),
                                    "promo" : $('#inputPromo').val(),
                                    "documentacion":{  
                                                            "titulo" : $('#checkTitulo:checked').val(),
                                                            "dni" : $('#checkDNI:checked').val(),
                                                            "fotos" : $('#checkFoto:checked').val()
                                                    },
                                    "supago" :  {  
                                                    "pago" : $('#inputPago').val(),
                                                    "comprende" : {
                                                                    "esmatricula" : $('#checkMatricula:checked').val(),
                                                                    "escuota" : $('#checkCuotas:checked').val(),
                                                                    "escertificacion" : $('#checkCertificacion:checked').val()
                                                                }
                                                },
                                    "valores" : {  
                                                    "matricula" : $('#inputMat').val(),
                                                    "cuota" : $('#inputCuota').val(),
                                                    "cantcuotas" : $('#inputCantCuota').val(),
                                                    "descuento" : $('#inputDescuento').val(),
                                                    "total" : $('#inputTotal').val()
                                                }
                $("#btnAgregar").attr("onclick",'Test.modificarUsuario()');                
                $('#btnAgregar').text('Modificar');*/

                

            }else{// viene del agregar           
                let pagina = "backend/a/";
                let tokken = localStorage.getItem('tokken');
                let datoObjeto ={                    
                                    "tokken" : tokken,
                                    "dni" : $('#inputDni').val(),
                                    "nombre" : $('#inputNombre').val(),
                                    "apellido" : $('#inputApellido').val(),
                                    "sexo" : $('#inputSexo').val(),
                                    "legajo" : $('#inputLegajo').val(),
                                    "idcarrera" : $('#inputCursoCarrera').val(),
                                    "fechadeinscripcion" : $('#inputInscripcion').val(),
                                    "modalidad" : $('#inputModalidad').val(),
                                    "turno" : $('#inputTurno').val(),
                                    "anio_carrera" : $('#inputAnio').val(),                                    
                                    "activo" : $('#checkActivo:checked').val(),
                                    "fechadenacimiento" : $('#inputCumpleanios').val(),
                                    "direccion" : $('#inputAddress').val(),
                                    "tel" : $('#inputTel').val(),
                                    "celular" : $('#inputCel').val(),
                                    "estadocivil" : $('#inputEstadoCivil').val(),
                                    "secundario" : $('#inputSecundario').val(),
                                    "email" : $('#inputEmail').val(),
                                    "facebook" : $('#inputFacebook').val(),
                                    "trabajo" : $('#checkTrabajo').val(),
                                    "id_documentacion" : "",
                                    "conocio" : $('#inputConocer').val(),
                                    "promo" : $('#inputPromo').val(),
                                    "documentacion":{  
                                                            "titulo" : $('#checkTitulo:checked').val(),
                                                            "dni" : $('#checkDNI:checked').val(),
                                                            "fotos" : $('#checkFoto:checked').val()
                                                    },
                                    "supago" :  {  
                                                    "pago" : $('#inputPago').val(),
                                                    "comprende" : {
                                                                    "esmatricula" : $('#checkMatricula:checked').val(),
                                                                    "escuota" : $('#checkCuotas:checked').val(),
                                                                    "escertificacion" : $('#checkCertificacion:checked').val()
                                                                }
                                                },
                                    "valores" : {  
                                                    "matricula" : $('#inputMat').val(),
                                                    "cuota" : $('#inputCuota').val(),
                                                    "cantcuotas" : $('#inputCantCuota').val(),
                                                    "descuento" : $('#inputDescuento').val(),
                                                    "total" : $('#inputTotal').val()
                                                }
                                };
                          
                $.ajax({
                    type: 'POST',            
                    url: pagina,
                    dataType: "text",
                    data : datoObjeto,
                    async: true
                })
                .done(function (resultado) {                    
                    if (resultado!=null) {                        
                        $("#divResultado").html("");
                        alert("Alumno Agregado Con Exito!!!");
                        console.log(resultado);
                    }                    
                })
                .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                    alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
                });
                
            }

        }          
            //eliminar Alumno eliminarAlumno()
            //modificar Alumno modificarAlumno()

    //CARRERAS
        //DEVOLVER CARRERAS ACTVAS
        export function cargarCarreras():void{
        
            let pagina = "backend/carreras/todos/"; 
            let tokken = localStorage.getItem('tokken'); 
            let datoObjeto ={                    
                                "tokken" : tokken,
                            }; 
            $.ajax({
                type: 'POST',            
                url: pagina,
                data: datoObjeto,
                dataType: "JSON",
                async: true
            })
            .done(function (objHTML:any) {                    
                if( objHTML!=false){                        
                    for (let index = 0; index < objHTML.length; index++) {
                        const element = objHTML[index];
                        $("#inputCursoCarrera").append("<option value=" + element.id + ">" + element.nombre + "</option>");
                        
                        $('#idHiddenCarrera').val(JSON.stringify(objHTML));
                    }
                    //console.log(objHTML);
                    //console.log(objHTML[0].turns);                      
                }else{
                    alert("No devuelve nada !!!")
                }
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });    
        }
        export function cargarModalidades():void{
            let CarreraSeleccionada = $('#inputCursoCarrera').val();
            let carreras = JSON.parse(<any>$('#idHiddenCarrera').val());
            $("#inputModalidad").empty();
            $("#inputTurno").empty();
            $("#inputModalidad").append("<option>Seleccione...</option>");
            $("#inputTurno").append("<option>Seleccione...</option>");
            for (let i = 0; i < carreras.length; i++) {
                let carrera = carreras[i];
                if (carrera.id == CarreraSeleccionada) {
                    if (carrera.mods['p']==1) {
                        $("#inputModalidad").append("<option value='1'>P</option>");                            
                    }
                    if (carrera.mods['sp']==1) {
                        $("#inputModalidad").append("<option value='1'>SP</option>");                            
                    }
                    if (carrera.mods['v']==1) {
                        $("#inputModalidad").append("<option value='1'>V</option>");                            
                    }
                    if (carrera.turns['m']==1) {
                        $("#inputTurno").append("<option value='1'>TM</option>");                            
                    }
                    if (carrera.turns['t']==1) {
                        $("#inputTurno").append("<option value='1'>TT</option>");                            
                    }
                    if (carrera.turns['n']==1) {
                        $("#inputTurno").append("<option value='1'>TN</option>");                            
                    }                    
                }                    
            }
        }            
        export function agregarCarrera(aux:any):void{

            if (aux!=undefined) {//viene del modificar 

                formAltaCarrera();
                $('#idCarrera').val(aux.Carrera.id);
                $('#idModalidades').val(aux.Carrera.modalidades);
                $('#idTurnos').val(aux.Carrera.turnos);
                $('#inputNombre').val(aux.Carrera.nombre);
                //MODS                 
                if(aux.mods["p"]==1){
                    (<any>$('#inlineCheckbox0')).attr('checked', true);    
                }
                if(aux.mods["sp"]==1){
                    (<any>$('#inlineCheckbox1')).attr('checked', true);    
                }
                if(aux.mods["v"]==1){
                    (<any>$('#inlineCheckbox2')).attr('checked', true);    
                }
                //TURNS                    
                if(aux.turns["m"]==1){
                    (<any>$('#inlineCheckboxTurnos0')).attr('checked', true);    
                }
                if(aux.turns["t"]==1){
                    (<any>$('#inlineCheckboxTurnos1')).attr('checked', true);    
                }
                if(aux.turns["n"]==1){
                    (<any>$('#inlineCheckboxTurnos2')).attr('checked', true);    
                }
                
                $('#inputDuración').val(aux.Carrera.cantidadanios);

                $("#btnAgregar").attr("onclick",'Test.modificarCarrera()');                
                $('#btnAgregar').text('Modificar');



            }else{// viene del agregar            
                let pagina = "backend/carreras/";
                let tokken = localStorage.getItem('tokken');
                let mod1 = $('#inlineCheckbox0:checked').val();
                if(mod1==undefined){mod1=0;}

                let mod2 = $('#inlineCheckbox1:checked').val();
                if(mod2==undefined){mod2=0;}

                let mod3 = $('#inlineCheckbox2:checked').val();
                if(mod3==undefined){mod3=0;}

                let turn1 = $('#inlineCheckboxTurnos0:checked').val();
                if(turn1==undefined){turn1=0;}

                let turn2 = $('#inlineCheckboxTurnos1:checked').val();
                if(turn2==undefined){turn2=0;}

                let turn3 = $('#inlineCheckboxTurnos2:checked').val();
                if(turn3==undefined){turn3=0;}

                let datoObjeto = {
                                    "tokken" : tokken,
                                    "nombre" : $('#inputNombre').val(),                                        
                                    "mods" : [mod1,mod2,mod3],
                                    "turns" : [turn1,turn2,turn3],
                                    "cantidadanios" : $('#inputDuración').val()
                                };                                                        
                $.ajax({
                    type: 'POST',            
                    url: pagina,
                    dataType: "text",
                    data : datoObjeto,
                    async: true
                })
                .done(function (resultado) {                                                
                    if (resultado!=null) {                            
                        $("#divResultado").html("");
                        alert("Carrera Agregada Con Exito!!!");
                    }                        
                })
                .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                    alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
                });

            }

        }
        export function modificarCarrera():void{

            let pagina = "backend/carreras/";
            let tokken = localStorage.getItem('tokken');
            let mod1 = $('#inlineCheckbox0:checked').val();
                if(mod1==undefined){mod1=0;}

                let mod2 = $('#inlineCheckbox1:checked').val();
                if(mod2==undefined){mod2=0;}

                let mod3 = $('#inlineCheckbox2:checked').val();
                if(mod3==undefined){mod3=0;}

                let turn1 = $('#inlineCheckboxTurnos0:checked').val();
                if(turn1==undefined){turn1=0;}

                let turn2 = $('#inlineCheckboxTurnos1:checked').val();
                if(turn2==undefined){turn2=0;}

                let turn3 = $('#inlineCheckboxTurnos2:checked').val();
                if(turn3==undefined){turn3=0;}
            let datoObjeto = { 
                                "tokken" : tokken, 
                                "id" : $('#idCarrera').val(),
                                "nombre" : $('#inputNombre').val(),                                        
                                "modalidades" : $('#idModalidades').val(),                                    
                                "turnos" : $('#idTurnos').val(),
                                "cantidadanios" : $('#inputDuración').val(),
                                "mods" : [mod1,mod2,mod3],
                                "turns" : [turn1,turn2,turn3]                       
                            };            

            $.ajax({
                type: 'PUT',            
                url: pagina,
                dataType: "text",
                data : datoObjeto,
                async: true
            })
            .done(function (resultado) {
                
                
                if (resultado!=false){                        
                    alert("Carrera Modificada Con Exito!!!");
                    grillaCarreras();
                    //console.log(resultado);
                }else{
                    alert(resultado);
                    console.log("no modifico nada ");
                }
                
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });

        
        
        }
        export function eliminarCarrera(Carrera:any):void{
        
            let opcion = confirm("Está seguro que desea eliminar la carrera "+Carrera.nombre+" ?");
            if (opcion == true) {
                let pagina = "backend/carreras/";
                let tokken = localStorage.getItem('tokken');
                let datoObjeto = {
                                    "tokken" : tokken,
                                    "id" : Carrera.id,                                
                                };        

                //LIMPIO EL CONTENIDO DEL DIV    
                //

                $.ajax({
                    type: 'DELETE',            
                    url: pagina,
                    dataType: "text",
                    data : datoObjeto,
                    async: true
                })
                .done(function (resultado) {
                    //$("#divResultado").html('');
                    //console.log(objJSON);
                    
                    if (resultado!=false){                        
                        alert("carrera Eliminado Con Exito!!!");
                        $("#divResultado").html("");
                        grillaUsuarios();
                    }else{
                        console.log("no borro nada");
                    }
                    
                })
                .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                    alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
                });

            } else {
                
            }
            
        }
        export function cargarTotal():void{
            let matricula :any = $('#inputMat').val();
            let cuota:any = $('#inputCuota').val();
            let cantcuotas:any = $('#inputCantCuota').val();
            let descuentos:any = $('#inputDescuento').val();
            let total:any = $('#inputTotal').val();
            let tokken = localStorage.getItem('tokken');
            let datos = {
                            "tokken" : tokken,
                            'matricula' : matricula,
                            'cuota' : cuota,
                            'cant' : cantcuotas,
                            'descuento' : descuentos,
                            'total' : total
                        }
            if(matricula!="" && cuota!="" && cantcuotas!="" && descuentos!=""){
                let resultado = ((datos.cuota * datos.cant)-datos.descuento)+ parseInt(datos.matricula);
                $('#inputTotal').val(resultado);
            }                          
            //console.log(datos);
        }
        export function cargarDatalist():void{
            let pagina = "backend/a/admAlumno"; 
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {
                                "tokken" : tokken
                            };
            $.ajax({
                type: 'POST',            
                url: pagina,
                data: datoObjeto,
                dataType: "JSON",
                async: true
            })
            .done(function (objHTML:any) {                    
                if( objHTML!=false){                        
                    for (let index = 0; index < objHTML.length; index++) {                            
                        const element = objHTML[index];
                        let val =element.apellido+", "+element.nombre;
                        $("#inputDataList").append("<option data-id="+element.id+" >"+val+"</option>");
                        
                        //$('#idHiddenCarrera').val(JSON.stringify(objHTML));
                    }
                    //console.log(objHTML);
                    //console.log(objHTML[0].turns);                      
                }else{
                    alert("No devuelve nada !!!")
                }
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
    //CUOTAS PAGOS
        export function cargarDivCuotasPagos():void{
            
            let val=$('#inputAlumnoSelect').val();
            let ejemplo = $('#inputDataList option:contains('+val+')').data('id');
            //let ejemplo = $('#inputDataList').find('option').data('id');
            //console.log(ejemplo);
            let pagina = "backend/a/divs";
            let tokken = localStorage.getItem('tokken');              
            let datoObjeto ={  
                                "tokken" : tokken,
                                "id" : ejemplo
                            };
            $.ajax({
                type: 'POST',            
                url: pagina,
                dataType: "JSON",
                data : datoObjeto,
                async: true
            })                
            .done(function (div:any) { 
                                 
                $('#divCuotas').html('');
                $('#divPagos').html(''); 
                $('#divCuotas').html(div.divCuotas);                       
                $('#divPagos').html(div.divPagos);
                $('#inputLegajo').val(div.alumno.legajo);
                $('#inputTrabajo').val(div.alumno.trabajo);
                $('#inputEmail').val(div.alumno.email);
                $('#inputTelefono').val(div.alumno.tel);
                $('#inputCel').val(div.alumno.celular);
                $('#inputDir').val(div.alumno.direccion);
                $('#inputDni').val(div.alumno.dni);
                $('#inputFech').val(div.alumno.fechadenacimiento);
                
                //console.log(div.alumno);
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function addCuota():void{

            let val=$('#inputAlumnoSelect').val();
            let id = $('#inputDataList option:contains('+val+')').data('id');
            let pagina = "backend/a/addCuota";
            let tokken = localStorage.getItem('tokken');                          
            let datoObjeto ={  
                                "tokken" : tokken,
                                "id" : id
                            };                
            $.ajax({
                type: 'POST',            
                url: pagina,
                dataType: "JSON",
                data : datoObjeto,
                async: true
            })                
            .done(function (obj):void {
                /*                 
                $('#hidden1').val(obj.idCuota);                    
                let $TABLE1 = $('#table1');
                let $clone1 = $TABLE1.find('tr.d-none').clone(true).removeClass('d-none table-line');
                $clone1.find('td:nth-child(1)').text(obj.idCuota);          
                $TABLE1.find('table').append($clone1);*/
                cargarDivCuotasPagos();

            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });                
        }
        export function addPago():void{
            let val=$('#inputAlumnoSelect').val();
            let id = $('#inputDataList option:contains('+val+')').data('id');
            let pagina = "backend/a/addPago";
            let tokken = localStorage.getItem('tokken');                          
            let datoObjeto ={  
                                "tokken" : tokken,
                                "id" : id
                            };                
            $.ajax({
                type: 'POST',            
                url: pagina,
                dataType: "JSON",
                data : datoObjeto,
                async: true
            })                
            .done(function (obj):void {
                cargarDivCuotasPagos();
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function deleteCuota(id:any):void{
            //console.log("eliminado Cuota exitoso. "+id);
            let pagina = "backend/a/deleteCuota";
            let tokken = localStorage.getItem('tokken');                         
            let datoObjeto ={  
                                "tokken" : tokken,
                                "id" : id
                            };                
            $.ajax({
                type: 'POST',            
                url: pagina,
                dataType: "JSON",
                data : datoObjeto,
                async: true
            })                
            .done(function (obj):void {
                console.log(obj.resultado);                    
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });              
        }
        export function deletePago(id:any):void{
            let pagina = "backend/a/deletePago";
            let tokken = localStorage.getItem('tokken');                           
            let datoObjeto ={  
                                "tokken" : tokken,
                                "id" : id
                            };                
            $.ajax({
                type: 'POST',            
                url: pagina,
                dataType: "JSON",
                data : datoObjeto,
                async: true
            })                
            .done(function (obj):void {
                console.log(obj.resultado);                    
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function changeCuota(cuota:any):void{
            let pagina = "backend/a/changeCuota";
            let tokken = localStorage.getItem('tokken');                            
            let datoObjeto ={  
                                "tokken" : tokken,
                                "id" : cuota.id,
                                "id_alumno" : cuota.id_alumno,
                                "concepto" : cuota.concepto,
                                "fecha" : cuota.fecha,
                                "importe" : cuota.importe
                            };                
            $.ajax({
                type: 'POST',            
                url: pagina,
                dataType: "JSON",
                data : datoObjeto,
                async: true
            })                
            .done(function (obj):void {
                console.log(obj.resultado);                    
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function changePago(cuota:any):void{
            let pagina = "backend/a/changePago";
            let tokken = localStorage.getItem('tokken');                           
            let datoObjeto ={ 
                                "tokken" : tokken, 
                                "id" : cuota.id,
                                "id_alumno" : cuota.id_alumno,
                                "concepto" : cuota.concepto,
                                "fecha" : cuota.fecha,
                                "importe" : cuota.importe
                            };                
            $.ajax({
                type: 'POST',            
                url: pagina,
                dataType: "JSON",
                data : datoObjeto,
                async: true
            })                
            .done(function (obj):void {
                console.log(obj.resultado);                    
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function GenerarDeudaAlumno():void{
            let val=$('#inputAlumnoSelect').val();
            let id = $('#inputDataList option:contains('+val+')').data('id');
            let pagina = "backend/a/deudaAlumno";
            let tokken = localStorage.getItem('tokken');            
            let datoObjeto ={  
                                "tokken" : tokken,
                                "id" : id
                            };                
            $.ajax({
                type: 'POST',            
                url: pagina,
                dataType: "html",
                data : datoObjeto,
                async: true
            })                
            .done(function (div):void {                    
                //console.log(objCuotasPagos);                    
                $('#divDeudas').html(div);                       
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
                
            });
                        
        }
        export function GenerarDeudaTotalAlumnos():void{
            let pagina = "backend/a/deudaTotalAlumnos";
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {
                                "tokken" : tokken,
                            };
            $.ajax({
                type: 'POST',
                url: pagina,
                data:datoObjeto,
                dataType: "html",
                async: true
            })
            .done(function (div):void {
                //console.log(objCuotasPagos);
                $('#divResultado').html(div);
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        /*
        export function Imprimir(nombreDiv:any):void{
            var contenido= (<HTMLDivElement>document.getElementById(nombreDiv)).innerHTML;
            var contenidoOriginal= document.body.innerHTML;            
            document.body.innerHTML = contenido;            
            window.print();            
            document.body.innerHTML = contenidoOriginal;            
        }*/
    //Caja
        export function GenerarFormAperturaCaja():void{
            let pagina = "backend/caja/FormAperturaCaja";
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {
                "tokken" : tokken,
            };
            $.ajax({
                type: 'POST',
                url: pagina,
                data:datoObjeto,
                dataType: "html",
                async: true
            })
            .done(function (div):void {
                //console.log(objCuotasPagos);
                let fecha = new Date().toJSON().slice(0,19);
                let usuario = <string>localStorage.getItem('usuario');
                //console.log(fecha);
                $('#divFormularioCaja').html(div);
                $('#spanTitelCaja').text('Apertura de Caja');
                $('#inputFechaYHoraAperturaCaja').val(fecha);
                $('#inputUsuario').val(usuario);
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function GenerarFormEntradaDeCaja():void{
            let pagina = "backend/caja/FormAperturaCaja";
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {
                "tokken" : tokken,
            };
            $.ajax({
                type: 'POST',
                url: pagina,
                data:datoObjeto,
                dataType: "html",
                async: true
            })
            .done(function (div):void {
                
                $("#divFormularioCaja").html("");
                let fecha = new Date().toJSON().slice(0,19);
                let usuario = <string>localStorage.getItem('usuario');                
                $('#divFormularioCaja').html(div);
                $('#spanTitelCaja').text('Entrada de Caja');
                $('#inputFechaYHoraAperturaCaja').val(fecha);
                $('#inputUsuario').val(usuario);
                $("#btnFormCaja").attr("onclick",'Test.EntradaCaja()');                
                $('#btnFormCaja').text('Entrada'); 
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function GenerarFormSalidaDeCaja():void{
            let pagina = "backend/caja/FormAperturaCaja";
            let tokken = localStorage.getItem('tokken');
            let datoObjeto = {
                "tokken" : tokken,
            };
            $.ajax({
                type: 'POST',
                url: pagina,
                data:datoObjeto,
                dataType: "html",
                async: true
            })
            .done(function (div):void {
                //console.log(objCuotasPagos);
                $("#divFormularioCaja").html("");
                let fecha = new Date().toJSON().slice(0,19);
                let usuario = <string>localStorage.getItem('usuario');                
                $('#divFormularioCaja').html(div);
                $('#spanTitelCaja').text('Salida de Caja');
                $('#inputFechaYHoraAperturaCaja').val(fecha);
                $('#inputUsuario').val(usuario);
                $("#btnFormCaja").attr("onclick",'Test.SalidaCaja()');                
                $('#btnFormCaja').text('Salida'); 
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function AperturaCaja():void{
            let pagina = "backend/caja/Apertura";
            let tokken = localStorage.getItem('tokken');
            let fecha = $('#inputFechaYHoraAperturaCaja').val();
            let usuario = $('#inputUsuario').val();
            let importe = $('#inputImporteAperturCaja').val();
            let detalle = $('#textAreaDetalle').val();
            
            
            let datoObjeto ={  
                                "tokken":tokken,
                                "fecha" : fecha,
                                "usuario" : usuario,
                                "importe" : importe,
                                "detalle" : detalle
                            }; 

            $.ajax({
                type: 'POST',
                url: pagina,
                dataType: "JSON",
                data : datoObjeto,
                async: true
            })
            .done(function (objJSON):void {
                //console.log(objCuotasPagos);
                let id= objJSON.resultadoIdCajaAbierta;
                localStorage.setItem('idCaja',id);
                //console.log("id caja: "+objJSON.resultadoIdCajaAbierta);
                //console.log("id entrada: "+objJSON.resultadoIdEntrada);
                
                $("#divFormularioCaja").html("");
                $('#btnApertura').prop('disabled', true);
                $('#btnEntrada').prop('disabled', false);
                $('#btnSalida').prop('disabled', false);
                $('#btnCierre').prop('disabled', false);
                $('#btnActualizar').prop('disabled', false);

            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function EntradaCaja():void{
            let pagina = "backend/entrada/alta";
            let idCaja = localStorage.getItem('idCaja');
            let fecha = $('#inputFechaYHoraAperturaCaja').val();
            let usuario = $('#inputUsuario').val();
            let importe = $('#inputImporteAperturCaja').val();
            let detalle = $('#textAreaDetalle').val();            
            let tokken = localStorage.getItem('tokken');
            let datoObjeto ={   
                                "tokken":tokken,
                                "idCaja" :idCaja,
                                "fecha" : fecha,
                                "usuario" : usuario,
                                "importe" : importe,
                                "detalle" : detalle
                            };
            $.ajax({
                type: 'POST',
                url: pagina,
                dataType: "JSON",
                data : datoObjeto,
                async: true
            })
            .done(function (objJSON):void {
                //console.log(objCuotasPagos);
                if(objJSON.respuestaModificacionCaja==true && objJSON.respuestaEntrada>0){
                    console.log("entrada de caja con éxito");
                    alert("entrada de caja con éxito");
                    $("#divFormularioCaja").html(""); 
                }else{
                    console.log("entrada de caja con error");
                    alert("entrada de caja con error");
                    $("#divFormularioCaja").html("");
                }
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function SalidaCaja():void{
            let pagina = "backend/salida/alta";
            let idCaja = localStorage.getItem('idCaja');
            let fecha = $('#inputFechaYHoraAperturaCaja').val();
            let usuario = $('#inputUsuario').val();
            let importe = $('#inputImporteAperturCaja').val();
            let detalle = $('#textAreaDetalle').val();
            let tokken = localStorage.getItem('tokken');
            
            let datoObjeto ={
                                "tokken":tokken,
                                "idCaja" :idCaja,
                                "fecha" : fecha,
                                "usuario" : usuario,
                                "importe" : importe,
                                "detalle" : detalle
                            }; 

            $.ajax({
                type: 'POST',
                url: pagina,
                dataType: "JSON",
                data : datoObjeto,
                async: true
            })
            .done(function (objJSON):void {
                if(objJSON.respuestaModificacionCaja==true && objJSON.respuestaSalida>0){
                    console.log("salida de caja con éxito");
                    alert("salida de caja con éxito");
                    $("#divFormularioCaja").html("");
                }else{
                    console.log("salida de caja con error");
                    alert("salida de caja con error");
                    $("#divFormularioCaja").html(""); 
                }
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function CierreCaja():void{
            let pagina = "backend/caja/Cierre";
            let fecha = new Date().toJSON().slice(0,19);
            let usuario = <string>localStorage.getItem('usuario');
            let idCaja = localStorage.getItem('idCaja');
            let importe = 0;
            let detalle = "cierre de caja";
            //console.log();
            let tokken = localStorage.getItem('tokken');
            
            let datoObjeto ={  
                                "tokken":tokken,
                                "idCaja" :idCaja,
                                "fecha" : fecha,
                                "usuario" : usuario,
                                "importe" : importe,
                                "detalle" : detalle
                            }; 

            $.ajax({
                type: 'POST',
                url: pagina,
                dataType: "JSON",
                data : datoObjeto,
                async: true
            })
            .done(function (objJSON):void {
                //console.log(objJSON);
                if(objJSON.resultadoCierreCaja==true && objJSON.respuestaSalida>0){
                    //console.log(objJSON);
                    console.log("importe al cierre de caja: "+objJSON.importeCajaCierre);
                    alert(objJSON.mensajeCierreCaja);                    
                    $("#divFormularioCaja").html(objJSON.div);
                    $("#divFormularioCaja").html('');            
                    $('#btnApertura').prop('disabled', false);
                    $('#btnEntrada').prop('disabled', true);
                    $('#btnSalida').prop('disabled', true);
                    $('#btnCierre').prop('disabled', true);
                    $('#btnActualizar').prop('disabled', true);
                    localStorage.removeItem('idCaja');
                }else{
                    //console.log(objJSON.mensajeEntrada);
                    alert(objJSON.mensajeCierreCaja);
                    $("#divFormularioCaja").html(""); 
                }           
                
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function VerificarCajaAbierta():void{
            let pagina = "backend/caja/VerificarCajaAbierta";
            let idCaja = localStorage.getItem('idCaja');
            let usuario = localStorage.getItem('usuario');

            //console.log(idCaja);
            if(idCaja==null || idCaja=="undefined"){   // si es igual a null verificar 
                let tokken = localStorage.getItem('tokken');            
                let datoObjeto ={
                    "tokken":tokken,
                    "usuario" : usuario,
                };
                $.ajax({
                    type: 'POST',
                    url: pagina,
                    dataType: "JSON",
                    data : datoObjeto,
                    async: true
                })
                .done(function (objJSON):void {
                    //console.log("respuesta de verificacion: "+JSON.stringify(objJSON));
                    if(objJSON !=null && objJSON.CajaAbierta !=false){
                        localStorage.setItem('idCaja',objJSON.CajaAbierta.id_caja);
                        alert("Ya existe una caja que se encuentra abierta para este Usuario: "+objJSON.CajaAbierta.usuario_id);               
                        $("#divFormularioCaja").html("");
                        $('#btnApertura').prop('disabled', true);
                        $('#btnEntrada').prop('disabled', false);
                        $('#btnSalida').prop('disabled', false);
                        $('#btnCierre').prop('disabled', false);
                        $('#btnActualizar').prop('disabled', false);
                    }
                })
                .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                    alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
                });
            }else{
                $('#btnApertura').prop('disabled', true);
                $('#btnEntrada').prop('disabled', false);
                $('#btnSalida').prop('disabled', false);
                $('#btnCierre').prop('disabled', false);
                $('#btnActualizar').prop('disabled', false);
            }
               
        }
        export function GenerarActualizar():void{
            let pagina = "backend/caja/Actualizar";
            let fecha = new Date().toJSON().slice(0,19);
            let usuario = localStorage.getItem('usuario');            
            let importe = 0;
            let detalle = "Actualizar";
            let tokken = localStorage.getItem('tokken');                     
            let datoObjeto ={    
                                "tokken":tokken,                            
                                "fecha" : fecha,
                                "usuario" : usuario,
                                "importe" : importe,
                                "detalle" : detalle
            };
            $.ajax({
                type: 'POST',
                url: pagina,
                dataType: "JSON",
                data : datoObjeto,
                async: true
            })
            .done(function (objJSON):void {
                //console.log("respuesta de verificacion: "+JSON.stringify(objJSON));
                if(objJSON !=null && objJSON.cantidadDeRegistros >0){
                    alert("caja actualizada correctamente!!!");               
                    $("#divResultado").html("");                        
                }else{
                    alert("no hay registros que actualizar!!!");               
                    $("#divResultado").html("");
                }
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });            
        }
        export function Login():void{
            let pagina = "backend/login/entrar";            
            //let fecha = new Date().toJSON().slice(0,19);
            let usuario = $('#inputUsuario').val();
            let clave = $('#inputPassword').val();
            let tokken = localStorage.getItem('tokken');
            let detalle = "Login";  // crear registro de logn y de control                     
            let datoObjeto ={
                                "usuario" : usuario,
                                "clave" : clave,
                                "tokken": tokken,
                                "detalle" : detalle
            };
            $.ajax({
                type: 'POST',
                url: pagina,
                dataType: "json",
                data : datoObjeto,
                async: true
            })
            .done(function (objJSON):void {
                console.log(objJSON);
                if(objJSON.respuesta){
                    localStorage.setItem('tokken',objJSON.token);
                    location.href ="/tp/v2/asd/";//carpetas que uso
                }                
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        export function Logout():void{
            let pagina = "backend/login/salir";            
            let fecha = new Date().toJSON().slice(0,19);
            let usuario = $('#inputUsuario').val();
            let clave = $('#inputPassword').val();
            let detalle = "Logout";  // crear registro de logn y de control  
            let tokken = localStorage.getItem('tokken');                   
            let datoObjeto ={   
                                "tokken":tokken,                           
                                "fecha" : fecha,
                                "usuario" : usuario,
                                "clave" : clave,
                                "detalle" : detalle
            };
            $.ajax({
                type: 'POST',
                url: pagina,
                dataType: "json",
                data : datoObjeto,
                async: true
            })
            .done(function (objJSON):void {
                console.log(objJSON);
                
                if(objJSON.salio){
                    localStorage.removeItem('tokken');
                    alert("Adios "+objJSON.apellido+", "+ objJSON.nombre+"!!");
                    location.href ="/tp/v2/asd/";//carpetas que uso
                }              
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        // traer tdo de una caja entradas y salidas
        //export function TraerTodoParaUnaCajaPor
        //yapa
        export function Estadisticas():void{
            $('#divRespuesta').html("");
            let pagina = "backend/caja/Estadisticas";
            let detalle = "Logout";  // crear registro de logn y de control  
            let tokken = localStorage.getItem('tokken');
            let datoObjeto ={
                "tokken":tokken,
                "detalle" : detalle
                };
            $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "json",
            data : datoObjeto,
            async: true
            })
            .done(function (objJSON):void {
                
                var ctx = (<any>document).getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                        datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 3, 5, 2, 3],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                                ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                                ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
                myChart.update();                       
                //$('#divRespuesta').html(myChart);
            
            console.log(myChart);               
                        
            })
            .fail(function (jqXHR:any, textStatus:any, errorThrown:any) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        /******validaciones********************************/
        export function validarInputs(params:any) {
            let fieldType = params.type;
            //console.log( "tipo: "+params.type);
            switch(fieldType){                
                case 'text': 
                case 'password':                
                    validateText($(params));
                    break;
                case 'textarea':
                    validateTextArea($(params));
                    break;
                case 'number':
                    validateNumber($(params));
                    break;
                case 'date':
                    validateFecha($(params));
                    break;
                case 'email':
                    validateEmail($(params));
                    break;
                case 'checkbox':
                    validateCheckBox($(params));
                    break;
                case 'select-one':
                    validateSelectOne($(params));
                    break;
                case 'select-multiple':
                    validateSelectMultiple($(params));
                    break;
                default:
                    break;
            }
        }
        // Validate Text and password
        export function validateText(thisObj:any) {
            let fieldValue = thisObj.val();
            if((fieldValue.length >= 4 && fieldValue.length<20)||(validateCampPrice(thisObj.attr('id')) && fieldValue ==0)||(thisObj.attr('id')=="inputLegajo" && fieldValue>=1)) {
                $(thisObj).addClass('is-valid');
            } else {
                $(thisObj).addClass('is-invalid');
            }        
        }
        //validar campos de precios
        export function validateCampPrice(thisObj:any):boolean {
            if(thisObj=="inputPago"||thisObj=="inputMat"||thisObj=="inputCuota"||thisObj=="inputCantCuota"||thisObj=="inputDescuento"||thisObj=="inputTotal"){
                return true;
            }else{
                return false;
            }
        }
        // Validate Text and textarea
        export function validateTextArea(thisObj:any) {
            let fieldValue = thisObj.val();
            if(fieldValue.length >= 4) {
                $(thisObj).addClass('is-valid');
            } else {
                $(thisObj).addClass('is-invalid');
            }        
        }
        // Validate DNI
        export function validateNumber(thisObj:any) {
            let fieldValue = thisObj.val();
            let pattern = /^[1-9][0-9]{6,7}$/i;
            //console.log("resultado: "+pattern.test(fieldValue))
            //fieldValue.length >= 7 && fieldValue.length<9 && fieldValue>4000000 && fieldValue<100000000
            if(pattern.test(fieldValue)) {
                $(thisObj).addClass('is-valid');
            } else {
                $(thisObj).addClass('is-invalid');
            }
        }
        // Validate fecha
        export function validateFecha(thisObj:any) { 
            let fieldValue = thisObj.val();        
            //console.log("resultado: "+fieldValue);
            //fieldValue.length >= 7 && fieldValue.length<9 && fieldValue>4000000 && fieldValue<100000000
            if(existeFecha(fieldValue)&&fieldValue!='') {
                if(validarFechaMenorActual(fieldValue)){
                    $(thisObj).addClass('is-valid');
                }else{
                    $(thisObj).addClass('is-invalid');
                }            
            } else {
                if (fieldValue=='') {
                    //console.log("fecha: vacio");
                }
                $(thisObj).addClass('is-invalid'); 
            }
        }
        // Validate Email
        export function validateEmail(thisObj:any) {
            let fieldValue = thisObj.val();        
            let pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
            if(pattern.test(fieldValue)) {
                $(thisObj).addClass('is-valid');
            } else {
                $(thisObj).addClass('is-invalid');
            }
        }
        // Validate CheckBox
        export function validateCheckBox(thisObj:any) {            
            if($(':checkbox:checked').length > 0) {
                $(thisObj).addClass('is-valid');
            } else {
                $(thisObj).addClass('is-invalid');
            }
        }
        // Validate Select One Tag
        export function validateSelectOne(thisObj:any) {

            let fieldValue = thisObj.val();
            //console.log(fieldValue);
            if(fieldValue != null && fieldValue != '' && fieldValue != 'Choose...') {
                $(thisObj).addClass('is-valid');
            } else {
                if(fieldValue == ''&&fieldValue == 'Choose...'){
                    //console.log('select vacio');
                }
                $(thisObj).addClass('is-invalid');
            }
        }
        // Validate Select Multiple Tag
        export function validateSelectMultiple(thisObj:any) {

            let fieldValue = thisObj.val();
            
            if(fieldValue.length > 0) {
                $(thisObj).addClass('is-valid');
            } else {
                $(thisObj).addClass('is-invalid');
            }
        }
        // Validar si la fecha introducida es real:
        export function existeFecha(fecha:any){
            
            var fechaf = fecha.split("-");
            var day = fechaf[2];
            var month = fechaf[1];
            var year = fechaf[0];
            var date = new Date(year,month,0);
            if((day-0)>(date.getDate()-0)){            
                console.log('la fecha no existe');
                return false;
            }
            return true;
        }
        //Validar si la fecha introducida es anterior o menor a la actual:
        export function validarFechaMenorActual(date:any){
            var x=new Date();
            var fecha = date.split("-");
            x.setFullYear(fecha[0],fecha[1]-1,fecha[2]);
            var today = new Date();   
            if (x >= today){
                console.log('la fecha supera la actual');
                return false;
            }else            
                return true;
        }
        export function validarTodoFormAltaUsiario() {
            let form = $('.bootstrap-form');
            //console.log("checar que todo esté validado");        
            let listInputs = form.find('input');
            let listselects = form.find('select');
            for(let j = 0; j < listselects.length; j++){
                validarInputs(listselects[j]);
            }            
            for (let i = 0; i < listInputs.length; i++) {            
                validarInputs(listInputs[i]);
                //console.log("tipo: "+listInputs[i].type);
                //console.log("id: "+listInputs[i].id);
            }       
            listInputs = form.find('.is-valid');
            
            //console.log(listInputs);
            //console.log('cantidad(lenght) : '+listInputs.length);          
            
            if (listInputs.length==16)
            {
                agregarUsuario();
            } else {
                alert("Complete los campos requeridos del formulario!!");
            }                      
        }
        export function validarTodoFormModificarUsiario() {
            let form = $('.bootstrap-form');
            console.log("checar que todo esté validado");        
            let listInputs = form.find('input');
            let listselects = form.find('select');
            for(let j = 0; j < listselects.length; j++){
                validarInputs(listselects[j]);
            }            
            for (let i = 0; i < listInputs.length; i++) {            
                validarInputs(listInputs[i]);
                //console.log("tipo: "+listInputs[i].type);
                //console.log("id: "+listInputs[i].id);
            }       
            listInputs = form.find('.is-valid');
            //console.log(listInputs);
            //console.log('cantidad(lenght) : '+listInputs.length);          
            
            if (listInputs.length==16)
            {
                modificarUsuario();
            } else {
                alert("Complete los campos requeridos del formulario!!");
            }
        }
        export function validarTodoFormAltaAlumno() {
            let form = $('.bootstrap-form');
                   
            let listInputs = form.find(':input');//:visible
            //console.log(listInputs.length);
            let listselects = form.find('select');
            //console.log(listselects.length);
            
            for(let j = 0; j < listselects.length; j++){
                validarInputs(listselects[j]);
            }            
            for (let i = 0; i < listInputs.length; i++) {            
                validarInputs(listInputs[i]);
                //console.log("tipo: "+listInputs[i].type);
                //console.log("id: "+listInputs[i].id);
            }       
            listInputs = form.find('.is-valid');
            console.log(listInputs.length);
            //console.log('cantidad(lenght) : '+listInputs.length);          
            
            if (listInputs.length==35)
            {
                agregarAlumno();
            } else {
                alert("Complete los campos requeridos del formulario!!");
            }
        }
            
        
        
}   