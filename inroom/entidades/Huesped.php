<?php

class Huesped
{
    private $id_huesped;
    private $cedula;
    private $nombres;
    private $apellidos;
    private $telefono;
    private $email;
    private $estado;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}