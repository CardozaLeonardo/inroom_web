<?php
class TipoHabitacion 
{
    private $id_tipoHabitacion;
    private $descripcion;
    private $estado;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
