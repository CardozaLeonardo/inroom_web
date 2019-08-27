<?php

class Opcion
{
    private $id_opcion;
    private $opcion;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}