<?php

class Rol
{
    private $rol_id;
    private $rol;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}