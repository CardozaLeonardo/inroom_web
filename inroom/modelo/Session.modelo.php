<?php


class SessionModelo extends Conexion
{
    private $myCon;

    public function findSession($token)
    {
        try
		{
			$this->myCon = parent::conectar();

			$result = array();
			$querySQL = "SELECT * FROM departments";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$dept = new Departamento();

				//_SET(CAMPOBD, atributoEntidad)			
				$dept->__SET('department_id', $r->department_id);
				$dept->__SET('department_name', $r->department_name);
			

				$result[] = $dept;

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