<?php

include_once('Conexion.php');

class UserModelo extends Conexion
{
    private $myCon;

    public function verifyLogin($user, $pass)
    {
        $found = false;
        $this->myCon = parent::conectar();
        $result = array();
        $querySQL = "SELECT * FROM tbl_user WHERE (username = $user OR email = $user) AND (pwd = $pass)";

        $stm = $this->myCon->prepare($querySQL);
        $stm->execute();

        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        {
            $found = true;
        }



    }
}