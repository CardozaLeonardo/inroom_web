<?php 

class Habitacion
{
    private $id_tipoHabitacion;
    private $id_habitacion;
    private $numero;
    private $estado;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
