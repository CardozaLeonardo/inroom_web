<?php

class Movimiento
{
    private $id_movimiento;
    private $id_tipoMovimiento;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}