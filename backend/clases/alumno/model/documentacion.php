<?php

class Documentacion {

    public $id;
    public $titulo;
    public $dni;
    public $fotos;
    public $esmatricula;
    public $cert_salud;
    public $escuota;
    public $escertificacion;


    public function __construct($ArrayDeParametros)
    {
        $this->titulo = isset($ArrayDeParametros['documentacion']['titulo']) ? $ArrayDeParametros['documentacion']['titulo'] : 0;
        $this->dni = isset($ArrayDeParametros['documentacion']['dni']) ? $ArrayDeParametros['documentacion']['dni'] : 0;
        $this->fotos = isset($ArrayDeParametros['documentacion']['fotos']) ? $ArrayDeParametros['documentacion']['fotos'] : 0;
        $this->cert_salud = 0;
        $this->esmatricula = isset($ArrayDeParametros['supago']['comprende']["esmatricula"]) ? $ArrayDeParametros['supago']['comprende']["esmatricula"] : 0;
        $this->escuota = isset($ArrayDeParametros['supago']['comprende']["escuota"]) ? $ArrayDeParametros['supago']['comprende']["escuota"] : 0;
        $this->escertificacion = isset($ArrayDeParametros['supago']['comprende']["escertificacion"]) ? $ArrayDeParametros['supago']['comprende']["escertificacion"] : 0;
    }
}