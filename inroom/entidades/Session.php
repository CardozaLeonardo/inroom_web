<?php


class Session
{
    private $id;
    private $id_user;
    private $tolken;

    public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}