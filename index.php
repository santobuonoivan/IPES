<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> HOME </title>
    <!-- css  4.0 -->
    <link rel="stylesheet" href="libs/bootstrap/dist/css/bootstrap.min.css">
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></link-->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" href="libs/css/style.css">
    <!--validaciones bstp-->
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.1.3/dist/bootstrap-validate.js" ></script>
    
</head>
<body background="./fotos/Tu-escritorio-de-trabajo.jpg">
    <!-- JS -->
    <script src="./libs/jquery/dist/jquery.slim.min.js"></script>
    <script src="./libs/bootstrap/dist/js/bootstrap.min.js"></script>

    <!--script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script-->
    
    <!-- AGREGO LA LIBRERIA DE JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./js/funciones.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <?php 
        require_once "./backend/clases/validarSesion.php";
    ?>
    <div class="btn-toolbar justify-content-between " role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group" role="group" aria-label="First group">
            <button type="button" class="btn btn-secondary" onclick="Test.home()">Home</button>
            <?php  
                if(isset($_SESSION['perfil']) && ( $_SESSION['perfil']=='WebMaster' || $_SESSION['perfil']=='Jefe')){
                    echo "<button type='button' class='btn btn-secondary' onclick='Test.menuUsuarios()' >Gestion Usuarios</button>";
                }
            ?>            
            <button type="button" class="btn btn-secondary" onclick="Test.menuAlumnos()" >Gestion Alumnos</button>
            <button type="button" class="btn btn-secondary "  onclick="Test.menuAdministracion()"  >Administracion</button>
            <button type="button" class="btn btn-secondary "  onclick="Test.menuCaja()" >Caja</button>
            <button type="button" class="btn btn-alert"  onclick="Test.Logout()" >Salir</button>

        </div>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <div class="container-fluid" >
        <div class="row">    
            <div class="col-md-2 "  id="divMenu"></div>

            <div class='col-md-10 '  id='divResultado'></div>
        </div>
    </div>
    <div class='col-md-5'>
        
        <canvas id='myChart' width='400' height='400'></canvas>        
    </div>
    
</body>
</html>