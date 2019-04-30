<?php
    require_once "../clases/iPersona.php";
    require_once "../clases/usuario.php";    
   

    //var_dump($_POST);
    $uss=isset($_POST['usuario'])? $_POST['usuario'] : NULL;
    $clave=isset($_POST['clave'])? $_POST['clave'] : NULL;
    $Usuario =Usuario::VerificarUsuario($usuario,$clave);    
    
    if ($Usuario!=false) {
        //echo "Usuario logueado!!";
        session_start();
		$_SESSION['DNIEmpleado'] = $respuesta->GetDni();
        header('Location: ../login.html');
    }else {
        echo "<br> El D.N.I. y/o Apellido son incorrectos <br>";
        echo '<a href="../login.html">Volver a Loguear</a>';
    }