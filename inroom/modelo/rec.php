<?php

include_once('Conexion.php');


class Test extends Conexion
{
    private $myCon;

    public function crear($value)
    {
        try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "INSERT INTO test (valor) VALUES(?)";

			$this->myCon->prepare($sql)
			->execute(
				array(
					$value
					
				)
			);

			$this->myCon = parent::desconectar();
            //$insert = 1;
            return true;
			//return $insert;
		}
		catch(Exception $e){
            return false;
		}
    }

}


$user = $_POST['user'];
 
//Decode the JSON string and convert it into a PHP associative array.
$decoded = json_decode($user, true);

$t = new Test();

$t->crear($decoded['name']);



