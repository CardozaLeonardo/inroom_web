<?php

class Opcion
{
    private $opcion_id;
    private $opcion;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}