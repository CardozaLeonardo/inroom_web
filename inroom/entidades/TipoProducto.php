<?php

class TipoProducto
{
    private $id_tipoProducto;
    private $tipoProducto;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}