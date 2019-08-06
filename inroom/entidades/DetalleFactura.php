<?php

class DetalleFactura
{
    private $id_detalleFactura;
    private $id_producto;
    private $id_factura;
    private $descripcion;
    private $cantidad;
    private $precio;
    private $subtotal;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}