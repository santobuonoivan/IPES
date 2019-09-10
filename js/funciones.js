/// <reference path="./../node_modules/@types/jquery/index.d.ts"/>
var Test;
(function (Test) {
    /********************************************** GRILLAS *************************************************/
    function grillaUsuarios() {
        var pagina = "backend/uss/todos";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken
        };
        //LIMPIO EL CONTENIDO DEL DIV    
        $("#divResultado").html("");
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "html"
        })
            .done(function (objHTML) {
            $("#divResultado").html(objHTML);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.grillaUsuarios = grillaUsuarios;
    function grillaAlumnos() {
        var pagina = "backend/a/todos";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = { "tokken": tokken };
        //LIMPIO EL CONTENIDO DEL DIV    
        $("#divResultado").html("");
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "html"
        })
            .done(function (objHTML) {
            //console.log(objHTML);
            $("#divResultado").html(objHTML);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.grillaAlumnos = grillaAlumnos;
    function grillaCarreras() {
        var pagina = "backend/carreras/todos";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = { "tokken": tokken };
        //LIMPIO EL CONTENIDO DEL DIV    
        $("#divResultado").html("");
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "html"
        })
            .done(function (objHTML) {
            $("#divResultado").html(objHTML);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.grillaCarreras = grillaCarreras;
    /********************************************* FORMS ALTAS **********************************************/
    function formAltaUsuario() {
        var pagina = "backend/forms/AltaUsiario";
        //LIMPIO EL CONTENIDO DEL DIV    
        $("#divResultado").html("");
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = { "tokken": tokken };
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "html",
            async: false
        })
            .done(function (objHTML) {
            $("#divResultado").html(objHTML);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.formAltaUsuario = formAltaUsuario;
    function formAltaAlumno() {
        var pagina = "backend/forms/AltaAlumno";
        //LIMPIO EL CONTENIDO DEL DIV    
        $("#divResultado").html("");
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = { "tokken": tokken };
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "html"
        })
            .done(function (objHTML) {
            $("#divResultado").html(objHTML);
            Test.cargarCarreras();
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.formAltaAlumno = formAltaAlumno;
    function formAltaCarrera() {
        var pagina = "backend/forms/AltaCarrera";
        //LIMPIO EL CONTENIDO DEL DIV    
        $("#divResultado").html("");
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = { "tokken": tokken };
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "html"
        })
            .done(function (objHTML) {
            $("#divResultado").html(objHTML);
            Test.cargarCarreras();
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.formAltaCarrera = formAltaCarrera;
    function formAdm() {
        var pagina = "backend/a/adm";
        //LIMPIO EL CONTENIDO DEL DIV    
        $("#divResultado").html("");
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = { "tokken": tokken };
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "html"
        })
            .done(function (objHTML) {
            //console.log(objHTML);                
            $("#divResultado").html(objHTML);
            Test.cargarDatalist();
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.formAdm = formAdm;
    /************************************************ MENUS *************************************************/
    /************************************************ MENUS *************************************************/
    function home() {
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
    Test.home = home;
    function menuUsuarios() {
        $("#divMenu").html("");
        $("#divResultado").html("");
        var pagina = "backend/forms/menuUsuarios";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "html"
        })
            .done(function (objHTML) {
            $("#divMenu").html(objHTML);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.menuUsuarios = menuUsuarios;
    function menuAlumnos() {
        $("#divMenu").html("");
        $("#divResultado").html("");
        var pagina = "backend/forms/menuAlumnos";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "html"
        })
            .done(function (objHTML) {
            $("#divMenu").html(objHTML);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.menuAlumnos = menuAlumnos;
    function menuAdministracion() {
        $("#divMenu").html("");
        $("#divResultado").html("");
        var pagina = "backend/forms/menuAdministracion";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "html"
        })
            .done(function (objHTML) {
            $("#divMenu").html(objHTML);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.menuAdministracion = menuAdministracion;
    function menuCaja() {
        $("#divMenu").html("");
        $("#divResultado").html("");
        var pagina = "backend/forms/menuCaja";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "JSON"
        })
            .done(function (objHTML) {
            $("#divMenu").html(objHTML.menu);
            $("#divResultado").html(objHTML.cuerpo);
            VerificarCajaAbierta();
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.menuCaja = menuCaja;
    //LINKS BUTONS
    //USUARIO
    function modals(id) {
        var myModal = "'#myModal" + id + "'";
        $(myModal).modal('show');
        console.log("click" + id);
    }
    Test.modals = modals;
    function buscarPorDniApellidoCarrera() {
        var pagina = "backend/uss/filtro";
        var filtro = $('#txtSearch').val();
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "filtro": filtro,
            "tokken": tokken
        };
        //LIMPIO EL CONTENIDO DEL DIV    
        $("#divResultado").html("");
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "html",
            data: datoObjeto,
            async: true
        })
            .done(function (objHTML) {
            //$("#divResultado").html('');
            if (objHTML != false) {
                //console.log(objHTML);
                $("#divResultado").html(objHTML);
            }
            else {
                alert("No se encontró ingun usuario con el filtro:  " + filtro + " !!!");
            }
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.buscarPorDniApellidoCarrera = buscarPorDniApellidoCarrera;
    //voy por aca con el tokken
    function agregarUsuario(usuario) {
        if (usuario != undefined) { //viene del modificar 
            console.log(usuario.id);
            formAltaUsuario();
            $('#idUsuario').val(usuario.id);
            $('#inputApellido').val(usuario.apellido);
            $('#inputNombre').val(usuario.nombre);
            $('#inputDni').val(usuario.dni);
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
            $("#btnAgregar").attr("onclick", 'Test.validarTodoFormModificarUsiario()');
            $('#btnAgregar').text('Modificar');
        }
        else { // viene del agregar            
            var pagina = "backend/uss/";
            var tokken = localStorage.getItem('tokken');
            var datoObjeto = {
                "apellido": $('#inputApellido').val(),
                "nombre": $('#inputNombre').val(),
                "dni": $('#inputDni').val(),
                "clave": $('#inputPassword').val(),
                "usuario": $('#inputUsuario').val(),
                "fechadecumpleanios": $('#inputCumpleanios').val(),
                "email": $('#inputEmail').val(),
                "perfil": $('#inputPerfil').val(),
                "turno": $('#inputTurno').val(),
                "tel": $('#inputTel').val(),
                "celular": $('#inputCel').val(),
                "direccion1": $('#inputAddress').val(),
                "direccion2": $('#inputAddress2').val(),
                "provincia": $('#inputState').val(),
                "ciudad": $('#inputCity').val(),
                "codigopostal": $('#inputZip').val(),
                "tokken": tokken
            };
            //LIMPIO EL CONTENIDO DEL DIV    
            $("#divResultado").html("");
            $.ajax({
                type: 'POST',
                url: pagina,
                dataType: "text",
                data: datoObjeto,
                async: true
            })
                .done(function (resultado) {
                //$("#divResultado").html('');
                //console.log(objJSON);
                if (resultado != null) {
                    $("#divResultado").html("");
                    alert("Usuario Agregado Con Exito!!!");
                }
            })
                .fail(function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
    }
    Test.agregarUsuario = agregarUsuario;
    function eliminarUsuario(usuario) {
        var opcion = confirm("Está seguro que desea eliminar a " + usuario.apellido + ", " + usuario.nombre + "?");
        if (opcion == true) {
            var pagina = "backend/uss/";
            var tokken = localStorage.getItem('tokken');
            var datoObjeto = {
                "id": usuario.id,
                "tokken": tokken
            };
            //LIMPIO EL CONTENIDO DEL DIV    
            //
            $.ajax({
                type: 'DELETE',
                url: pagina,
                dataType: "text",
                data: datoObjeto,
                async: true
            })
                .done(function (resultado) {
                //$("#divResultado").html('');
                //console.log(objJSON);
                if (resultado != false) {
                    alert("Usuario Eliminado Con Exito!!!");
                    $("#divResultado").html("");
                    grillaUsuarios();
                }
                else {
                    console.log("no borro nada");
                }
            })
                .fail(function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        else {
        }
    }
    Test.eliminarUsuario = eliminarUsuario;
    function modificarUsuario() {
        var pagina = "backend/uss/";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "id": $('#idUsuario').val(),
            "apellido": $('#inputApellido').val(),
            "nombre": $('#inputNombre').val(),
            "dni": $('#inputDni').val(),
            "clave": $('#inputPassword').val(),
            "usuario": $('#inputUsuario').val(),
            "fechadecumpleanios": $('#inputCumpleanios').val(),
            "email": $('#inputEmail').val(),
            "perfil": $('#inputPerfil').val(),
            "turno": $('#inputTurno').val(),
            "tel": $('#inputTel').val(),
            "celular": $('#inputCel').val(),
            "direccion1": $('#inputAddress').val(),
            "direccion2": $('#inputAddress2').val(),
            "provincia": $('#inputState').val(),
            "ciudad": $('#inputCity').val(),
            "codigopostal": $('#inputZip').val(),
            "tokken": tokken
        };
        $.ajax({
            type: 'PUT',
            url: pagina,
            dataType: "text",
            data: datoObjeto,
            async: true
        })
            .done(function (resultado) {
            if (resultado != false) {
                alert("Usuario Modificado Con Exito!!!");
                grillaUsuarios();
            }
            else {
                alert(resultado);
                console.log("no modifico nada ");
            }
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.modificarUsuario = modificarUsuario;
    //ALUMNO
    function buscarPorDniApellidoNombreAlumno() {
        var pagina = "backend/a/filtro";
        var filtro = $('#txtSearch').val();
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "filtro": filtro,
            "tokken": tokken
        };
        //LIMPIO EL CONTENIDO DEL DIV    
        $("#divResultado").html("");
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "html",
            data: datoObjeto,
            async: true
        })
            .done(function (objHTML) {
            //$("#divResultado").html('');
            if (objHTML != false) {
                //console.log(objHTML);
                $("#divResultado").html(objHTML);
            }
            else {
                alert("No se encontró ingun usuario con el filtro:  " + filtro + " !!!");
            }
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.buscarPorDniApellidoNombreAlumno = buscarPorDniApellidoNombreAlumno;
    function agregarAlumno(unAlumno) {
        if (unAlumno != undefined) { //viene del modificar 
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
        }
        else { // viene del agregar           
            var pagina = "backend/a/";
            var tokken = localStorage.getItem('tokken');
            var datoObjeto = {
                "tokken": tokken,
                "dni": $('#inputDni').val(),
                "nombre": $('#inputNombre').val(),
                "apellido": $('#inputApellido').val(),
                "sexo": $('#inputSexo').val(),
                "legajo": $('#inputLegajo').val(),
                "idcarrera": $('#inputCursoCarrera').val(),
                "fechadeinscripcion": $('#inputInscripcion').val(),
                "modalidad": $('#inputModalidad').val(),
                "turno": $('#inputTurno').val(),
                "anio_carrera": $('#inputAnio').val(),
                "activo": $('#checkActivo:checked').val(),
                "fechadenacimiento": $('#inputCumpleanios').val(),
                "direccion": $('#inputAddress').val(),
                "tel": $('#inputTel').val(),
                "celular": $('#inputCel').val(),
                "estadocivil": $('#inputEstadoCivil').val(),
                "secundario": $('#inputSecundario').val(),
                "email": $('#inputEmail').val(),
                "facebook": $('#inputFacebook').val(),
                "trabajo": $('#checkTrabajo').val(),
                "id_documentacion": "",
                "conocio": $('#inputConocer').val(),
                "promo": $('#inputPromo').val(),
                "documentacion": {
                    "titulo": $('#checkTitulo:checked').val(),
                    "dni": $('#checkDNI:checked').val(),
                    "fotos": $('#checkFoto:checked').val()
                },
                "supago": {
                    "pago": $('#inputPago').val(),
                    "comprende": {
                        "esmatricula": $('#checkMatricula:checked').val(),
                        "escuota": $('#checkCuotas:checked').val(),
                        "escertificacion": $('#checkCertificacion:checked').val()
                    }
                },
                "valores": {
                    "matricula": $('#inputMat').val(),
                    "cuota": $('#inputCuota').val(),
                    "cantcuotas": $('#inputCantCuota').val(),
                    "descuento": $('#inputDescuento').val(),
                    "total": $('#inputTotal').val()
                }
            };
            $.ajax({
                type: 'POST',
                url: pagina,
                dataType: "text",
                data: datoObjeto,
                async: true
            })
                .done(function (resultado) {
                if (resultado != null) {
                    $("#divResultado").html("");
                    alert("Alumno Agregado Con Exito!!!");
                    console.log(resultado);
                }
            })
                .fail(function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
    }
    Test.agregarAlumno = agregarAlumno;
    //eliminar Alumno eliminarAlumno()
    //modificar Alumno modificarAlumno()
    //CARRERAS
    //DEVOLVER CARRERAS ACTVAS
    function cargarCarreras() {
        var pagina = "backend/carreras/todos/";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "JSON",
            async: true
        })
            .done(function (objHTML) {
            if (objHTML != false) {
                for (var index = 0; index < objHTML.length; index++) {
                    var element = objHTML[index];
                    $("#inputCursoCarrera").append("<option value=" + element.id + ">" + element.nombre + "</option>");
                    $('#idHiddenCarrera').val(JSON.stringify(objHTML));
                }
                //console.log(objHTML);
                //console.log(objHTML[0].turns);                      
            }
            else {
                alert("No devuelve nada !!!");
            }
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.cargarCarreras = cargarCarreras;
    function cargarModalidades() {
        var CarreraSeleccionada = $('#inputCursoCarrera').val();
        var carreras = JSON.parse($('#idHiddenCarrera').val());
        $("#inputModalidad").empty();
        $("#inputTurno").empty();
        $("#inputModalidad").append("<option>Seleccione...</option>");
        $("#inputTurno").append("<option>Seleccione...</option>");
        for (var i = 0; i < carreras.length; i++) {
            var carrera = carreras[i];
            if (carrera.id == CarreraSeleccionada) {
                if (carrera.mods['p'] == 1) {
                    $("#inputModalidad").append("<option value='1'>P</option>");
                }
                if (carrera.mods['sp'] == 1) {
                    $("#inputModalidad").append("<option value='1'>SP</option>");
                }
                if (carrera.mods['v'] == 1) {
                    $("#inputModalidad").append("<option value='1'>V</option>");
                }
                if (carrera.turns['m'] == 1) {
                    $("#inputTurno").append("<option value='1'>TM</option>");
                }
                if (carrera.turns['t'] == 1) {
                    $("#inputTurno").append("<option value='1'>TT</option>");
                }
                if (carrera.turns['n'] == 1) {
                    $("#inputTurno").append("<option value='1'>TN</option>");
                }
            }
        }
    }
    Test.cargarModalidades = cargarModalidades;
    function agregarCarrera(aux) {
        if (aux != undefined) { //viene del modificar 
            formAltaCarrera();
            $('#idCarrera').val(aux.Carrera.id);
            $('#idModalidades').val(aux.Carrera.modalidades);
            $('#idTurnos').val(aux.Carrera.turnos);
            $('#inputNombre').val(aux.Carrera.nombre);
            //MODS                 
            if (aux.mods["p"] == 1) {
                $('#inlineCheckbox0').attr('checked', true);
            }
            if (aux.mods["sp"] == 1) {
                $('#inlineCheckbox1').attr('checked', true);
            }
            if (aux.mods["v"] == 1) {
                $('#inlineCheckbox2').attr('checked', true);
            }
            //TURNS                    
            if (aux.turns["m"] == 1) {
                $('#inlineCheckboxTurnos0').attr('checked', true);
            }
            if (aux.turns["t"] == 1) {
                $('#inlineCheckboxTurnos1').attr('checked', true);
            }
            if (aux.turns["n"] == 1) {
                $('#inlineCheckboxTurnos2').attr('checked', true);
            }
            $('#inputDuración').val(aux.Carrera.cantidadanios);
            $("#btnAgregar").attr("onclick", 'Test.modificarCarrera()');
            $('#btnAgregar').text('Modificar');
        }
        else { // viene del agregar            
            var pagina = "backend/carreras/";
            var tokken = localStorage.getItem('tokken');
            var mod1 = $('#inlineCheckbox0:checked').val();
            if (mod1 == undefined) {
                mod1 = 0;
            }
            var mod2 = $('#inlineCheckbox1:checked').val();
            if (mod2 == undefined) {
                mod2 = 0;
            }
            var mod3 = $('#inlineCheckbox2:checked').val();
            if (mod3 == undefined) {
                mod3 = 0;
            }
            var turn1 = $('#inlineCheckboxTurnos0:checked').val();
            if (turn1 == undefined) {
                turn1 = 0;
            }
            var turn2 = $('#inlineCheckboxTurnos1:checked').val();
            if (turn2 == undefined) {
                turn2 = 0;
            }
            var turn3 = $('#inlineCheckboxTurnos2:checked').val();
            if (turn3 == undefined) {
                turn3 = 0;
            }
            var datoObjeto = {
                "tokken": tokken,
                "nombre": $('#inputNombre').val(),
                "mods": [mod1, mod2, mod3],
                "turns": [turn1, turn2, turn3],
                "cantidadanios": $('#inputDuración').val()
            };
            $.ajax({
                type: 'POST',
                url: pagina,
                dataType: "text",
                data: datoObjeto,
                async: true
            })
                .done(function (resultado) {
                if (resultado != null) {
                    $("#divResultado").html("");
                    alert("Carrera Agregada Con Exito!!!");
                }
            })
                .fail(function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
    }
    Test.agregarCarrera = agregarCarrera;
    function modificarCarrera() {
        var pagina = "backend/carreras/";
        var tokken = localStorage.getItem('tokken');
        var mod1 = $('#inlineCheckbox0:checked').val();
        if (mod1 == undefined) {
            mod1 = 0;
        }
        var mod2 = $('#inlineCheckbox1:checked').val();
        if (mod2 == undefined) {
            mod2 = 0;
        }
        var mod3 = $('#inlineCheckbox2:checked').val();
        if (mod3 == undefined) {
            mod3 = 0;
        }
        var turn1 = $('#inlineCheckboxTurnos0:checked').val();
        if (turn1 == undefined) {
            turn1 = 0;
        }
        var turn2 = $('#inlineCheckboxTurnos1:checked').val();
        if (turn2 == undefined) {
            turn2 = 0;
        }
        var turn3 = $('#inlineCheckboxTurnos2:checked').val();
        if (turn3 == undefined) {
            turn3 = 0;
        }
        var datoObjeto = {
            "tokken": tokken,
            "id": $('#idCarrera').val(),
            "nombre": $('#inputNombre').val(),
            "modalidades": $('#idModalidades').val(),
            "turnos": $('#idTurnos').val(),
            "cantidadanios": $('#inputDuración').val(),
            "mods": [mod1, mod2, mod3],
            "turns": [turn1, turn2, turn3]
        };
        $.ajax({
            type: 'PUT',
            url: pagina,
            dataType: "text",
            data: datoObjeto,
            async: true
        })
            .done(function (resultado) {
            if (resultado != false) {
                alert("Carrera Modificada Con Exito!!!");
                grillaCarreras();
                //console.log(resultado);
            }
            else {
                alert(resultado);
                console.log("no modifico nada ");
            }
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.modificarCarrera = modificarCarrera;
    function eliminarCarrera(Carrera) {
        var opcion = confirm("Está seguro que desea eliminar la carrera " + Carrera.nombre + " ?");
        if (opcion == true) {
            var pagina = "backend/carreras/";
            var tokken = localStorage.getItem('tokken');
            var datoObjeto = {
                "tokken": tokken,
                "id": Carrera.id
            };
            //LIMPIO EL CONTENIDO DEL DIV    
            //
            $.ajax({
                type: 'DELETE',
                url: pagina,
                dataType: "text",
                data: datoObjeto,
                async: true
            })
                .done(function (resultado) {
                //$("#divResultado").html('');
                //console.log(objJSON);
                if (resultado != false) {
                    alert("carrera Eliminado Con Exito!!!");
                    $("#divResultado").html("");
                    grillaUsuarios();
                }
                else {
                    console.log("no borro nada");
                }
            })
                .fail(function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        else {
        }
    }
    Test.eliminarCarrera = eliminarCarrera;
    function cargarTotal() {
        var matricula = $('#inputMat').val();
        var cuota = $('#inputCuota').val();
        var cantcuotas = $('#inputCantCuota').val();
        var descuentos = $('#inputDescuento').val();
        var total = $('#inputTotal').val();
        var tokken = localStorage.getItem('tokken');
        var datos = {
            "tokken": tokken,
            'matricula': matricula,
            'cuota': cuota,
            'cant': cantcuotas,
            'descuento': descuentos,
            'total': total
        };
        if (matricula != "" && cuota != "" && cantcuotas != "" && descuentos != "") {
            var resultado = ((datos.cuota * datos.cant) - datos.descuento) + parseInt(datos.matricula);
            $('#inputTotal').val(resultado);
        }
        //console.log(datos);
    }
    Test.cargarTotal = cargarTotal;
    function cargarDatalist() {
        var pagina = "backend/a/admAlumno";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "JSON",
            async: true
        })
            .done(function (objHTML) {
            if (objHTML != false) {
                for (var index = 0; index < objHTML.length; index++) {
                    var element = objHTML[index];
                    var val = element.apellido + ", " + element.nombre;
                    $("#inputDataList").append("<option data-id=" + element.id + " >" + val + "</option>");
                    //$('#idHiddenCarrera').val(JSON.stringify(objHTML));
                }
                //console.log(objHTML);
                //console.log(objHTML[0].turns);                      
            }
            else {
                alert("No devuelve nada !!!");
            }
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.cargarDatalist = cargarDatalist;
    //CUOTAS PAGOS
    function cargarDivCuotasPagos() {
        var val = $('#inputAlumnoSelect').val();
        var ejemplo = $('#inputDataList option:contains(' + val + ')').data('id');
        //let ejemplo = $('#inputDataList').find('option').data('id');
        //console.log(ejemplo);
        var pagina = "backend/a/divs";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken,
            "id": ejemplo
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "JSON",
            data: datoObjeto,
            async: true
        })
            .done(function (div) {
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
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.cargarDivCuotasPagos = cargarDivCuotasPagos;
    function addCuota() {
        var val = $('#inputAlumnoSelect').val();
        var id = $('#inputDataList option:contains(' + val + ')').data('id');
        var pagina = "backend/a/addCuota";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken,
            "id": id
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "JSON",
            data: datoObjeto,
            async: true
        })
            .done(function (obj) {
            /*
            $('#hidden1').val(obj.idCuota);
            let $TABLE1 = $('#table1');
            let $clone1 = $TABLE1.find('tr.d-none').clone(true).removeClass('d-none table-line');
            $clone1.find('td:nth-child(1)').text(obj.idCuota);
            $TABLE1.find('table').append($clone1);*/
            cargarDivCuotasPagos();
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.addCuota = addCuota;
    function addPago() {
        var val = $('#inputAlumnoSelect').val();
        var id = $('#inputDataList option:contains(' + val + ')').data('id');
        var pagina = "backend/a/addPago";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken,
            "id": id
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "JSON",
            data: datoObjeto,
            async: true
        })
            .done(function (obj) {
            cargarDivCuotasPagos();
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.addPago = addPago;
    function deleteCuota(id) {
        //console.log("eliminado Cuota exitoso. "+id);
        var pagina = "backend/a/deleteCuota";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken,
            "id": id
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "JSON",
            data: datoObjeto,
            async: true
        })
            .done(function (obj) {
            console.log(obj.resultado);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.deleteCuota = deleteCuota;
    function deletePago(id) {
        var pagina = "backend/a/deletePago";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken,
            "id": id
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "JSON",
            data: datoObjeto,
            async: true
        })
            .done(function (obj) {
            console.log(obj.resultado);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.deletePago = deletePago;
    function changeCuota(cuota) {
        var pagina = "backend/a/changeCuota";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken,
            "id": cuota.id,
            "id_alumno": cuota.id_alumno,
            "concepto": cuota.concepto,
            "fecha": cuota.fecha,
            "importe": cuota.importe
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "JSON",
            data: datoObjeto,
            async: true
        })
            .done(function (obj) {
            console.log(obj.resultado);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.changeCuota = changeCuota;
    function changePago(cuota) {
        var pagina = "backend/a/changePago";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken,
            "id": cuota.id,
            "id_alumno": cuota.id_alumno,
            "concepto": cuota.concepto,
            "fecha": cuota.fecha,
            "importe": cuota.importe
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "JSON",
            data: datoObjeto,
            async: true
        })
            .done(function (obj) {
            console.log(obj.resultado);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.changePago = changePago;
    function GenerarDeudaAlumno() {
        var val = $('#inputAlumnoSelect').val();
        var id = $('#inputDataList option:contains(' + val + ')').data('id');
        var pagina = "backend/a/deudaAlumno";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken,
            "id": id
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "html",
            data: datoObjeto,
            async: true
        })
            .done(function (div) {
            //console.log(objCuotasPagos);                    
            $('#divDeudas').html(div);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.GenerarDeudaAlumno = GenerarDeudaAlumno;
    function GenerarDeudaTotalAlumnos() {
        var pagina = "backend/a/deudaTotalAlumnos";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "html",
            async: true
        })
            .done(function (div) {
            //console.log(objCuotasPagos);
            $('#divResultado').html(div);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.GenerarDeudaTotalAlumnos = GenerarDeudaTotalAlumnos;
    /*
    export function Imprimir(nombreDiv:any):void{
        var contenido= (<HTMLDivElement>document.getElementById(nombreDiv)).innerHTML;
        var contenidoOriginal= document.body.innerHTML;
        document.body.innerHTML = contenido;
        window.print();
        document.body.innerHTML = contenidoOriginal;
    }*/
    //Caja
    function GenerarFormAperturaCaja() {
        var pagina = "backend/caja/FormAperturaCaja";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "html",
            async: true
        })
            .done(function (div) {
            //console.log(objCuotasPagos);
            var fecha = new Date().toJSON().slice(0, 19);
            var usuario = localStorage.getItem('usuario');
            //console.log(fecha);
            $('#divFormularioCaja').html(div);
            $('#spanTitelCaja').text('Apertura de Caja');
            $('#inputFechaYHoraAperturaCaja').val(fecha);
            $('#inputUsuario').val(usuario);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.GenerarFormAperturaCaja = GenerarFormAperturaCaja;
    function GenerarFormEntradaDeCaja() {
        var pagina = "backend/caja/FormAperturaCaja";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "html",
            async: true
        })
            .done(function (div) {
            $("#divFormularioCaja").html("");
            var fecha = new Date().toJSON().slice(0, 19);
            var usuario = localStorage.getItem('usuario');
            $('#divFormularioCaja').html(div);
            $('#spanTitelCaja').text('Entrada de Caja');
            $('#inputFechaYHoraAperturaCaja').val(fecha);
            $('#inputUsuario').val(usuario);
            $("#btnFormCaja").attr("onclick", 'Test.EntradaCaja()');
            $('#btnFormCaja').text('Entrada');
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.GenerarFormEntradaDeCaja = GenerarFormEntradaDeCaja;
    function GenerarFormSalidaDeCaja() {
        var pagina = "backend/caja/FormAperturaCaja";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            data: datoObjeto,
            dataType: "html",
            async: true
        })
            .done(function (div) {
            //console.log(objCuotasPagos);
            $("#divFormularioCaja").html("");
            var fecha = new Date().toJSON().slice(0, 19);
            var usuario = localStorage.getItem('usuario');
            $('#divFormularioCaja').html(div);
            $('#spanTitelCaja').text('Salida de Caja');
            $('#inputFechaYHoraAperturaCaja').val(fecha);
            $('#inputUsuario').val(usuario);
            $("#btnFormCaja").attr("onclick", 'Test.SalidaCaja()');
            $('#btnFormCaja').text('Salida');
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.GenerarFormSalidaDeCaja = GenerarFormSalidaDeCaja;
    function AperturaCaja() {
        var pagina = "backend/caja/Apertura";
        var tokken = localStorage.getItem('tokken');
        var fecha = $('#inputFechaYHoraAperturaCaja').val();
        var usuario = $('#inputUsuario').val();
        var importe = $('#inputImporteAperturCaja').val();
        var detalle = $('#textAreaDetalle').val();
        var datoObjeto = {
            "tokken": tokken,
            "fecha": fecha,
            "usuario": usuario,
            "importe": importe,
            "detalle": detalle
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "JSON",
            data: datoObjeto,
            async: true
        })
            .done(function (objJSON) {
            //console.log(objCuotasPagos);
            var id = objJSON.resultadoIdCajaAbierta;
            localStorage.setItem('idCaja', id);
            //console.log("id caja: "+objJSON.resultadoIdCajaAbierta);
            //console.log("id entrada: "+objJSON.resultadoIdEntrada);
            $("#divFormularioCaja").html("");
            $('#btnApertura').prop('disabled', true);
            $('#btnEntrada').prop('disabled', false);
            $('#btnSalida').prop('disabled', false);
            $('#btnCierre').prop('disabled', false);
            $('#btnActualizar').prop('disabled', false);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.AperturaCaja = AperturaCaja;
    function EntradaCaja() {
        var pagina = "backend/entrada/alta";
        var idCaja = localStorage.getItem('idCaja');
        var fecha = $('#inputFechaYHoraAperturaCaja').val();
        var usuario = $('#inputUsuario').val();
        var importe = $('#inputImporteAperturCaja').val();
        var detalle = $('#textAreaDetalle').val();
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken,
            "idCaja": idCaja,
            "fecha": fecha,
            "usuario": usuario,
            "importe": importe,
            "detalle": detalle
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "JSON",
            data: datoObjeto,
            async: true
        })
            .done(function (objJSON) {
            //console.log(objCuotasPagos);
            if (objJSON.respuestaModificacionCaja == true && objJSON.respuestaEntrada > 0) {
                console.log("entrada de caja con éxito");
                alert("entrada de caja con éxito");
                $("#divFormularioCaja").html("");
            }
            else {
                console.log("entrada de caja con error");
                alert("entrada de caja con error");
                $("#divFormularioCaja").html("");
            }
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.EntradaCaja = EntradaCaja;
    function SalidaCaja() {
        var pagina = "backend/salida/alta";
        var idCaja = localStorage.getItem('idCaja');
        var fecha = $('#inputFechaYHoraAperturaCaja').val();
        var usuario = $('#inputUsuario').val();
        var importe = $('#inputImporteAperturCaja').val();
        var detalle = $('#textAreaDetalle').val();
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken,
            "idCaja": idCaja,
            "fecha": fecha,
            "usuario": usuario,
            "importe": importe,
            "detalle": detalle
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "JSON",
            data: datoObjeto,
            async: true
        })
            .done(function (objJSON) {
            if (objJSON.respuestaModificacionCaja == true && objJSON.respuestaSalida > 0) {
                console.log("salida de caja con éxito");
                alert("salida de caja con éxito");
                $("#divFormularioCaja").html("");
            }
            else {
                console.log("salida de caja con error");
                alert("salida de caja con error");
                $("#divFormularioCaja").html("");
            }
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.SalidaCaja = SalidaCaja;
    function CierreCaja() {
        var pagina = "backend/caja/Cierre";
        var fecha = new Date().toJSON().slice(0, 19);
        var usuario = localStorage.getItem('usuario');
        var idCaja = localStorage.getItem('idCaja');
        var importe = 0;
        var detalle = "cierre de caja";
        //console.log();
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken,
            "idCaja": idCaja,
            "fecha": fecha,
            "usuario": usuario,
            "importe": importe,
            "detalle": detalle
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "JSON",
            data: datoObjeto,
            async: true
        })
            .done(function (objJSON) {
            //console.log(objJSON);
            if (objJSON.resultadoCierreCaja == true && objJSON.respuestaSalida > 0) {
                //console.log(objJSON);
                console.log("importe al cierre de caja: " + objJSON.importeCajaCierre);
                alert(objJSON.mensajeCierreCaja);
                $("#divFormularioCaja").html(objJSON.div);
                $("#divFormularioCaja").html('');
                $('#btnApertura').prop('disabled', false);
                $('#btnEntrada').prop('disabled', true);
                $('#btnSalida').prop('disabled', true);
                $('#btnCierre').prop('disabled', true);
                $('#btnActualizar').prop('disabled', true);
                localStorage.removeItem('idCaja');
            }
            else {
                //console.log(objJSON.mensajeEntrada);
                alert(objJSON.mensajeCierreCaja);
                $("#divFormularioCaja").html("");
            }
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.CierreCaja = CierreCaja;
    function VerificarCajaAbierta() {
        var pagina = "backend/caja/VerificarCajaAbierta";
        var idCaja = localStorage.getItem('idCaja');
        var usuario = localStorage.getItem('usuario');
        //console.log(idCaja);
        if (idCaja == null || idCaja == "undefined") { // si es igual a null verificar 
            var tokken = localStorage.getItem('tokken');
            var datoObjeto = {
                "tokken": tokken,
                "usuario": usuario
            };
            $.ajax({
                type: 'POST',
                url: pagina,
                dataType: "JSON",
                data: datoObjeto,
                async: true
            })
                .done(function (objJSON) {
                //console.log("respuesta de verificacion: "+JSON.stringify(objJSON));
                if (objJSON != null && objJSON.CajaAbierta != false) {
                    localStorage.setItem('idCaja', objJSON.CajaAbierta.id_caja);
                    alert("Ya existe una caja que se encuentra abierta para este Usuario: " + objJSON.CajaAbierta.usuario_id);
                    $("#divFormularioCaja").html("");
                    $('#btnApertura').prop('disabled', true);
                    $('#btnEntrada').prop('disabled', false);
                    $('#btnSalida').prop('disabled', false);
                    $('#btnCierre').prop('disabled', false);
                    $('#btnActualizar').prop('disabled', false);
                }
            })
                .fail(function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
        else {
            $('#btnApertura').prop('disabled', true);
            $('#btnEntrada').prop('disabled', false);
            $('#btnSalida').prop('disabled', false);
            $('#btnCierre').prop('disabled', false);
            $('#btnActualizar').prop('disabled', false);
        }
    }
    Test.VerificarCajaAbierta = VerificarCajaAbierta;
    function GenerarActualizar() {
        var pagina = "backend/caja/Actualizar";
        var fecha = new Date().toJSON().slice(0, 19);
        var usuario = localStorage.getItem('usuario');
        var importe = 0;
        var detalle = "Actualizar";
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken,
            "fecha": fecha,
            "usuario": usuario,
            "importe": importe,
            "detalle": detalle
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "JSON",
            data: datoObjeto,
            async: true
        })
            .done(function (objJSON) {
            //console.log("respuesta de verificacion: "+JSON.stringify(objJSON));
            if (objJSON != null && objJSON.cantidadDeRegistros > 0) {
                alert("caja actualizada correctamente!!!");
                $("#divResultado").html("");
            }
            else {
                alert("no hay registros que actualizar!!!");
                $("#divResultado").html("");
            }
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.GenerarActualizar = GenerarActualizar;
    function Login() {
        var pagina = "backend/login/entrar";
        //let fecha = new Date().toJSON().slice(0,19);
        var usuario = $('#inputUsuario').val();
        var clave = $('#inputPassword').val();
        var tokken = localStorage.getItem('tokken');
        var detalle = "Login"; // crear registro de logn y de control                     
        var datoObjeto = {
            "usuario": usuario,
            "clave": clave,
            "tokken": tokken,
            "detalle": detalle
        };
        if (usuario === '' && clave === '' && tokken === null) {
            return;
        }
        else {
            $.ajax({
                type: 'POST',
                url: pagina,
                dataType: "json",
                data: datoObjeto,
                async: true
            })
                .done(function (objJSON) {
                console.log(objJSON);
                if (objJSON.respuesta) {
                    localStorage.setItem('tokken', objJSON.token);
                    location.href = "/IPES"; //carpetas que uso
                }
            })
                .fail(function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            });
        }
    }
    Test.Login = Login;
    function Logout() {
        var pagina = "backend/login/salir";
        var fecha = new Date().toJSON().slice(0, 19);
        var usuario = $('#inputUsuario').val();
        var clave = $('#inputPassword').val();
        var detalle = "Logout"; // crear registro de logn y de control  
        var tokken = localStorage.getItem('tokken');
        var datoObjeto = {
            "tokken": tokken,
            "fecha": fecha,
            "usuario": usuario,
            "clave": clave,
            "detalle": detalle
        };
        $.ajax({
            type: 'POST',
            url: pagina,
            dataType: "json",
            data: datoObjeto,
            async: true
        })
            .done(function (objJSON) {
            console.log(objJSON);
            if (objJSON.salio) {
                localStorage.removeItem('tokken');
                alert("Adios " + objJSON.apellido + ", " + objJSON.nombre + "!!");
                location.href = "/tp/v2/asd/"; //carpetas que uso
            }
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }
    Test.Logout = Logout;
    // traer tdo de una caja entradas y salidas
    //export function TraerTodoParaUnaCajaPor
    //yapa
    /*
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
    */
    /******validaciones********************************/
    function validarInputs(params) {
        var fieldType = params.type;
        //console.log( "tipo: "+params.type);
        switch (fieldType) {
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
    Test.validarInputs = validarInputs;
    // Validate Text and password
    function validateText(thisObj) {
        var fieldValue = thisObj.val();
        if ((fieldValue.length >= 4 && fieldValue.length < 20) || (validateCampPrice(thisObj.attr('id')) && fieldValue == 0) || (thisObj.attr('id') == "inputLegajo" && fieldValue >= 1)) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');
        }
    }
    Test.validateText = validateText;
    //validar campos de precios
    function validateCampPrice(thisObj) {
        if (thisObj == "inputPago" || thisObj == "inputMat" || thisObj == "inputCuota" || thisObj == "inputCantCuota" || thisObj == "inputDescuento" || thisObj == "inputTotal") {
            return true;
        }
        else {
            return false;
        }
    }
    Test.validateCampPrice = validateCampPrice;
    // Validate Text and textarea
    function validateTextArea(thisObj) {
        var fieldValue = thisObj.val();
        if (fieldValue.length >= 4) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');
        }
    }
    Test.validateTextArea = validateTextArea;
    // Validate DNI
    function validateNumber(thisObj) {
        var fieldValue = thisObj.val();
        var pattern = /^[1-9][0-9]{6,7}$/i;
        //console.log("resultado: "+pattern.test(fieldValue))
        //fieldValue.length >= 7 && fieldValue.length<9 && fieldValue>4000000 && fieldValue<100000000
        if (pattern.test(fieldValue)) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');
        }
    }
    Test.validateNumber = validateNumber;
    // Validate fecha
    function validateFecha(thisObj) {
        var fieldValue = thisObj.val();
        //console.log("resultado: "+fieldValue);
        //fieldValue.length >= 7 && fieldValue.length<9 && fieldValue>4000000 && fieldValue<100000000
        if (existeFecha(fieldValue) && fieldValue != '') {
            if (validarFechaMenorActual(fieldValue)) {
                $(thisObj).addClass('is-valid');
            }
            else {
                $(thisObj).addClass('is-invalid');
            }
        }
        else {
            if (fieldValue == '') {
                //console.log("fecha: vacio");
            }
            $(thisObj).addClass('is-invalid');
        }
    }
    Test.validateFecha = validateFecha;
    // Validate Email
    function validateEmail(thisObj) {
        var fieldValue = thisObj.val();
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        if (pattern.test(fieldValue)) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');
        }
    }
    Test.validateEmail = validateEmail;
    // Validate CheckBox
    function validateCheckBox(thisObj) {
        if ($(':checkbox:checked').length > 0) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');
        }
    }
    Test.validateCheckBox = validateCheckBox;
    // Validate Select One Tag
    function validateSelectOne(thisObj) {
        var fieldValue = thisObj.val();
        //console.log(fieldValue);
        if (fieldValue != null && fieldValue != '' && fieldValue != 'Choose...') {
            $(thisObj).addClass('is-valid');
        }
        else {
            if (fieldValue == '' && fieldValue == 'Choose...') {
                //console.log('select vacio');
            }
            $(thisObj).addClass('is-invalid');
        }
    }
    Test.validateSelectOne = validateSelectOne;
    // Validate Select Multiple Tag
    function validateSelectMultiple(thisObj) {
        var fieldValue = thisObj.val();
        if (fieldValue.length > 0) {
            $(thisObj).addClass('is-valid');
        }
        else {
            $(thisObj).addClass('is-invalid');
        }
    }
    Test.validateSelectMultiple = validateSelectMultiple;
    // Validar si la fecha introducida es real:
    function existeFecha(fecha) {
        var fechaf = fecha.split("-");
        var day = fechaf[2];
        var month = fechaf[1];
        var year = fechaf[0];
        var date = new Date(year, month, 0);
        if ((day - 0) > (date.getDate() - 0)) {
            console.log('la fecha no existe');
            return false;
        }
        return true;
    }
    Test.existeFecha = existeFecha;
    //Validar si la fecha introducida es anterior o menor a la actual:
    function validarFechaMenorActual(date) {
        var x = new Date();
        var fecha = date.split("-");
        x.setFullYear(fecha[0], fecha[1] - 1, fecha[2]);
        var today = new Date();
        if (x >= today) {
            console.log('la fecha supera la actual');
            return false;
        }
        else
            return true;
    }
    Test.validarFechaMenorActual = validarFechaMenorActual;
    function validarTodoFormAltaUsiario() {
        var form = $('.bootstrap-form');
        //console.log("checar que todo esté validado");        
        var listInputs = form.find('input');
        var listselects = form.find('select');
        for (var j = 0; j < listselects.length; j++) {
            validarInputs(listselects[j]);
        }
        for (var i = 0; i < listInputs.length; i++) {
            validarInputs(listInputs[i]);
            //console.log("tipo: "+listInputs[i].type);
            //console.log("id: "+listInputs[i].id);
        }
        listInputs = form.find('.is-valid');
        //console.log(listInputs);
        //console.log('cantidad(lenght) : '+listInputs.length);          
        if (listInputs.length == 16) {
            agregarUsuario();
        }
        else {
            alert("Complete los campos requeridos del formulario!!");
        }
    }
    Test.validarTodoFormAltaUsiario = validarTodoFormAltaUsiario;
    function validarTodoFormModificarUsiario() {
        var form = $('.bootstrap-form');
        console.log("checar que todo esté validado");
        var listInputs = form.find('input');
        var listselects = form.find('select');
        for (var j = 0; j < listselects.length; j++) {
            validarInputs(listselects[j]);
        }
        for (var i = 0; i < listInputs.length; i++) {
            validarInputs(listInputs[i]);
            //console.log("tipo: "+listInputs[i].type);
            //console.log("id: "+listInputs[i].id);
        }
        listInputs = form.find('.is-valid');
        //console.log(listInputs);
        //console.log('cantidad(lenght) : '+listInputs.length);          
        if (listInputs.length == 16) {
            modificarUsuario();
        }
        else {
            alert("Complete los campos requeridos del formulario!!");
        }
    }
    Test.validarTodoFormModificarUsiario = validarTodoFormModificarUsiario;
    function validarTodoFormAltaAlumno() {
        var form = $('.bootstrap-form');
        var listInputs = form.find(':input'); //:visible
        //console.log(listInputs.length);
        var listselects = form.find('select');
        //console.log(listselects.length);
        for (var j = 0; j < listselects.length; j++) {
            validarInputs(listselects[j]);
        }
        for (var i = 0; i < listInputs.length; i++) {
            validarInputs(listInputs[i]);
            //console.log("tipo: "+listInputs[i].type);
            //console.log("id: "+listInputs[i].id);
        }
        listInputs = form.find('.is-valid');
        console.log(listInputs.length);
        //console.log('cantidad(lenght) : '+listInputs.length);          
        if (listInputs.length == 35) {
            agregarAlumno();
        }
        else {
            alert("Complete los campos requeridos del formulario!!");
        }
    }
    Test.validarTodoFormAltaAlumno = validarTodoFormAltaAlumno;
})(Test || (Test = {}));
