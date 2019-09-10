<?php
require_once "./AccesoDatos.php";

try {

    $gbd = AccesoDatos::dameUnObjetoAcceso();
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}

?>

