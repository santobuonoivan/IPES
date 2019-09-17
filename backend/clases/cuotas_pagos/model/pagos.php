<?php

    class Pagos{
        public $id;
        public $id_alumno;
        public $concepto;
        public $fecha;
        public $importe;
        public $pasada;

        public function __constructor($un_id_alumno,$un_Concepto,$una_fecha,$un_importe,$un_id=null){
            $this->id=$un_id;
            $this->id_alumno=$un_id_alumno;
            $this->concepto=$un_Concepto;
            $this->fecha=$una_fecha;
            $this->importe=$un_importe;
        }
    }
?>