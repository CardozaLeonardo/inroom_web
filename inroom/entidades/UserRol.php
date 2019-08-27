<?php

class UserRol
{
    private $id_UserRol;
    private $id_user;
    private $id_rol;
    private $rol;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}