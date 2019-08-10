<?php

class Reservacion
{
    private $id_reservacio;
    private $num_reserv;
    private $fecha;
    private $id_factura;
    private $id_huesped;
    private $estado;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}