<?php

class Reservacion
{
    private $reservacion_id;
    private $num_reserv;
    private $fecha;
    private $factura_id;
    private $huesped_id;
    private $estado;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}