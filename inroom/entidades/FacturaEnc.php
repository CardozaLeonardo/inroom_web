<?php

class FacturaEnc
{
    private $id_factura;
    private $id_hotel;
    private $numero_factura;
    private $fecha;
    private $id_user;
    private $id_reservacion;
    private $id_huesped;
    private $identificacion;
    private $subtotal;
    private $impuesto;
    private $descuento;
    private $total;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}