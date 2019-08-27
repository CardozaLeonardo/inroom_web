<?php


class RolModelo extends Conexion
{
    private $myCon;

    public function crear(Rol $rol)
    {
        try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "INSERT INTO tbl_rol (rol) VALUES(?);";

			$this->myCon->prepare($sql)
			->execute(
				array(
					$rol->__GET('rol')
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

    public function eliminar($id)
    {
        try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("DELETE FROM tbl_rol WHERE id_rol = $id;");
			$stm->execute();

			$this->myCon = parent::desconectar();
			
			return true;
		}
		catch(Exception $e)
		{
            die($e->getMessage());
            return false;
		}
    }

    public function actualizar(User $user)
    {
        try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "UPDATE tbl_rol SET rol = ? WHERE id_rol = ?;";

			$this->myCon->prepare($sql)
			->execute(
				array(
					$user->__GET('rol'),
					$user->__GET('id_rol')
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

    public function getRoles()
    {
        try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("SELECT * FROM tbl_rol;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$rol = new Rol();

				//_SET(CAMPOBD, atributoEntidad)			
				$rol->__SET('id_rol', $r->id_rol);
				$rol->__SET('rol', $r->rol);
                // $hab->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
                	
				$result[] = $rol;

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