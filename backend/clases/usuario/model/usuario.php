<?php

    class Usuario /*implements IPersona*/{

        public $usuario_id;    
        public $apellido;
        public $nombre;
        public $dni;
        public $clave;
        public $usuario;
        public $fechadecumpleanios;
        public $email;
        public $perfil;
        public $turno;
        public $tel;
        public $celular;
        public $direccion1;
        public $direccion2;
        public $provincia;
        public $ciudad;
        public $codigopostal;
        public $is_active;
        public $profile_image;
        public $country;
        

        public function __construct( $arrayDeParametros ){

            isset( $arrayDeParametros['id'] ) ? $this->usuario_id=$arrayDeParametros['id'] : null;
            isset( $arrayDeParametros['nombre'] ) ? $this->nombre=$arrayDeParametros['nombre'] : null;
            isset( $arrayDeParametros['apellido'] ) ? $this->apellido=$arrayDeParametros['apellido'] : null;
            isset( $arrayDeParametros['clave'] ) ? $this->clave=$arrayDeParametros['clave'] : null;
            isset( $arrayDeParametros['usuario'] ) ? $this->usuario=$arrayDeParametros['usuario']: null ;
            isset( $arrayDeParametros['dni'] ) ? $this->dni=$arrayDeParametros['dni'] : null;
            isset( $arrayDeParametros['fechadecumpleanios'] ) ? $this->fechadecumpleanios=$arrayDeParametros['fechadecumpleanios'] : null;
            isset( $arrayDeParametros['email'] ) ? $this->email=$arrayDeParametros['email'] : null;
            isset( $arrayDeParametros['perfil'] ) ? $this->perfil=$arrayDeParametros['perfil'] : null;
            isset( $arrayDeParametros['turno'] ) ? $this->turno=$arrayDeParametros['turno'] : null; 
            isset( $arrayDeParametros['tel'] ) ? $this->tel=$arrayDeParametros['tel'] : null;
            isset( $arrayDeParametros['celular'] ) ? $this->celular=$arrayDeParametros['celular'] : null;
            isset( $arrayDeParametros['direccion1'] ) ? $this->direccion1=$arrayDeParametros['direccion1'] : null;
            isset( $arrayDeParametros['direccion2'] ) ? $this->direccion2=$arrayDeParametros['direccion2'] : null;
            isset( $arrayDeParametros['provincia'] ) ? $this->provincia=$arrayDeParametros['provincia'] : null;
            isset( $arrayDeParametros['ciudad'] ) ? $this->ciudad=$arrayDeParametros['ciudad'] : null; 
            isset( $arrayDeParametros['codigopostal'] ) ? $this->codigopostal=$arrayDeParametros['codigopostal'] : null;

        }
        public function ToJSON(){
            return json_encode($this);
        }
    }

?>