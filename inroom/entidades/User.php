<?php

class User
{
    private $user_id;
    private $user;
    private $email;
    private $pwd;
    private $nombres;
    private $apellidos;
    private $pwd_temp;
    private $estado;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}