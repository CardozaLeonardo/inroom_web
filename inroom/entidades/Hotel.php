<?php

class Hotel
{
    private $id_hotel;
    private $nombre;
    private $direccion;
    private $telefono;
    private $website;
    private $pieDeImprenta;
    private $RUC;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}