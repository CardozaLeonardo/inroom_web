<?php

class VistaHuesped
{
    private $id_huesped;
    private $nombres;
    private $apellidos;
    private $cedula;
    private $telefono;
    private $email;
    private $estado;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}