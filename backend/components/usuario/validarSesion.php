<?php
session_start();
//echo "qwerty";
    if(isset($_SESSION['usuario'])){            
        //var_dump($_SESSION);
    }else {
        header('Location: ./login.html');
    }
?>