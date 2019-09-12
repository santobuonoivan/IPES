<?php
//require_once "./../../iPersona.php";
require_once "./../../cuotas.php";
require_once "./../../pagos.php";

class Alumno /*implements IPersona*/
{
    public $id;
    public $dni;
    public $nombre;
    public $apellido;
    public $sexo;
    public $legajo;
    public $idcarrera;
    public $fechadeinscripcion;
    public $modalidad;
    public $turno;
    public $anio_carrera;
    public $activo;
    public $fechadenacimiento;
    public $direccion;
    public $tel;
    public $celular;
    public $estadocivil;
    public $secundario;
    public $email;
    public $facebook;
    public $trabajo;
    public $id_documentacion;
    public $conocio;
    public $promo;

    public function __construct( Array $ArrayDeParametros = null )
    {
        isset($ArrayDeParametros['id']) ? $this->id=$ArrayDeParametros['id'] : null;
        isset($ArrayDeParametros['dni']) ? $this->dni=$ArrayDeParametros['dni'] : null;
        isset($ArrayDeParametros['nombre']) ? $this->nombre=$ArrayDeParametros['nombre'] : null;
        isset($ArrayDeParametros['apellido']) ? $this->apellido=$ArrayDeParametros['apellido'] : null;
        isset($ArrayDeParametros['sexo']) ? $this->sexo=$ArrayDeParametros['sexo'] : null;
        isset($ArrayDeParametros['legajo']) ? $this->legajo=$ArrayDeParametros['legajo'] : null;
        isset($ArrayDeParametros['idcarrera']) ? $this->idcarrera=$ArrayDeParametros['idcarrera'] : null;
        isset($ArrayDeParametros['fechadeinscripcion']) ? $this->fechadeinscripcion=$ArrayDeParametros['fechadeinscripcion'] : null;
        isset($ArrayDeParametros['modalidad']) ? $this->modalidad=$ArrayDeParametros['modalidad'] : null;
        isset($ArrayDeParametros['turno']) ? $this->turno=$ArrayDeParametros['turno'] : null;
        isset($ArrayDeParametros['anio_carrera']) ? $this->anio_carrera=$ArrayDeParametros['anio_carrera'] : null;
        isset($ArrayDeParametros['activo']) ? $this->activo=$ArrayDeParametros['activo'] : null;
        isset($ArrayDeParametros['fechadenacimiento']) ? $this->fechadenacimiento=$ArrayDeParametros['fechadenacimiento'] : null;
        isset($ArrayDeParametros['direccion']) ? $this->direccion=$ArrayDeParametros['direccion'] : null;
        isset($ArrayDeParametros['tel']) ? $this->tel=$ArrayDeParametros['tel'] : null;
        isset($ArrayDeParametros['celular']) ? $this->celular=$ArrayDeParametros['celular'] : null;
        isset($ArrayDeParametros['estadocivil']) ? $this->estadocivil=$ArrayDeParametros['estadocivil'] : null;
        isset($ArrayDeParametros['secundario']) ? $this->secundario=$ArrayDeParametros['secundario'] : null;
        isset($ArrayDeParametros['email']) ? $this->email=$ArrayDeParametros['email'] : null;
        isset($ArrayDeParametros['facebook']) ? $this->facebook=$ArrayDeParametros['facebook'] : null;
        isset($ArrayDeParametros['trabajo']) ? $this->trabajo=$ArrayDeParametros['trabajo'] : null;
        isset($ArrayDeParametros['conocio']) ? $this->conocio =  $ArrayDeParametros['conocio'] : null;
        isset($ArrayDeParametros['promo']) ? $this->promo = $ArrayDeParametros['promo'] : null;
    }
};