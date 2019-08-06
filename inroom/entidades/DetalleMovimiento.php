<?php

class DetalleMovimiento
{
    private $id_detalleMov;
    private $id_movimiento;
    private $id_producto;
    private $cant_inical;
    private $cant_nueva;
    private $stock;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}