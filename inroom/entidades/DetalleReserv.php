<?php

class DetalleReserv
{
    private $id_detalleReserv;
    private $id_reservacion;
    private $id_habitacion;
    private $numeroHab;
    private $descripcion;
    private $fechaEntrada;
    private $fechaSalida;
    private $horaEntrada;
    private $horaSalida;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}