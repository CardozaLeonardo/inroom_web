<?php


class OpcionModelo extends Conexion
{
    private $myCon;

    public function crear(Opcion $op)
    {
        try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "INSERT INTO tbl_opcion (opcion) VALUES(?);";

			$this->myCon->prepare($sql)
			->execute(
				array(
					$op->__GET('opcion')
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


    public function getOpciones()
    {
        try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("SELECT * FROM tbl_opcion;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$op = new Opcion();

				//_SET(CAMPOBD, atributoEntidad)			
				$op->__SET('id_opcion', $r->id_opcion);
				$op->__SET('opcion', $r->opcion);
                // $hab->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
                	
				$result[] = $op;

				//var_dump($result);
            }
            
            $this->myCon = parent::desconectar();
			
			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    public function getOpcionesUsuario($id_user)
    {
        try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("SELECT * FROM tbl_ o INNER JOIN tbl_user");
			$stm->execute(array(
                $id_user
            ));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$op = new Opcion();

				//_SET(CAMPOBD, atributoEntidad)			
				$op->__SET('id_opcion', $r->id_opcion);
				$op->__SET('opcion', $r->opcion);
                // $hab->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
                	
				$result[] = $op;

				//var_dump($result);
            }
            
            $this->myCon = parent::desconectar();
			
			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }
}