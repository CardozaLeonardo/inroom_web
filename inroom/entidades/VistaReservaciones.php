<?php

class VistaReservaciones
{
    private $id_reservacion;
    private $num_reserv;
    private $fecha;
    private $nombres;
    private $apellidos;
    private $cedula;
    private $habitaciones;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}