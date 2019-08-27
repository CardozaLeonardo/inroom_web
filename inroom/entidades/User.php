<?php

class User
{
    private $id_user;
    private $user;
    private $email;
    private $pwd;
    private $nombres;
    private $apellidos;
    private $pwd_temp;
    private $photo_url;
    private $estado;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}