<?php

class UserRol
{
    private $userRol_id;
    private $user_id;
    private $rol_id;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}