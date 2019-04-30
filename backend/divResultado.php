<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        <!--CSS-->
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></link>
        
        
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css">
        <link rel="stylesheet" href="../libs/css/style.css">
    </head>
    <body>
        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <!-- AGREGO LA LIBRERIA DE JQUERY -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        
        
        <?php
            require_once "clases/pagos.php";
            require_once "clases/cuotas.php";
            require_once "clases/alumno.php";
            require_once "clases/AccesoDatos.php";


            $alumno = new Alumno();
            $alumno->id=1;
            $cuotasPagos= $alumno->TraerCuotasPagos();
        ?>
    
        <div class="container-fluid"><!-- contiene a todo y lo alinea -->
            <span> Test adm </span>
            <span class="glyphicon glyphicon-name"></span>
            <div class="row border border-success" ><!-- mapea para usarlo como grid -->

                <div class="col-6 border border-danger"><!-- div busqueda -->
                    <span>Busque alumno</span>
                    <select class="col-6" name="selectAlumno" id="selectAlumno">
                        <option value="0">Seleccione...</option>
                    </select>
                </div>
                <div class="col-6 border border-danger"><!-- div pluss -->
                    <span> pluss</span>
                    <input type="checkbox" name="checkActivo" id="checkActivo">
                    <input type="button" value="Algo">
                    <input type="button" value="Algo2">
                </div>
                <div class='container-fluid'>
                    <div class='row'>
                        <div class='col-md-6'>
                            <?php echo Cuotas::generarDivCuotasDeUnAlumno2($cuotasPagos->cuotas); ?>
                        </div>
                        <div class='col-md-6'>
                            <?php echo Pagos::generarDivPagosDeUnAlumno2($cuotasPagos->pagos); ?>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 border border-danger"><!-- div botones -->
                    <span> botones</span>
                    <input type="checkbox" name="checkActivo" id="checkActivo">
                    <input type="button" value="Algo">
                    <input type="button" value="Algo2">
                </div>


            </div>            
        </div>
        
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
        
        <script src='http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore.js'></script>

        

        <script  src="../libs/js/index.js"></script>

    
    
</body>
</html>

