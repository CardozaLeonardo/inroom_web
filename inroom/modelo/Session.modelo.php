<?php


class SessionModelo extends Conexion
{
	private $myCon;

    public function crear(Session $ss)
    {
        try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "INSERT INTO tbl_session (id_user, token, estado) VALUES(?, ?, ?);";

			$this->myCon->prepare($sql)
			->execute(
				array(
					$ss->__GET('id_user'),
					$ss->__GET('token'),
					$ss->__GET('estado')
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

			$stm = $this->myCon->prepare("INSERT INTO tbl_session WHERE id_session = $id;");
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

	public function getSession($token)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM tbl_session WHERE token = ? AND estado <> 3;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($token));
			$tk = new Session();
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			//$id = $r->id_session;
			$tk->__SET('id_session', $r->id_session);
			$tk->__SET('id_user', $r->id_user);
			$tk->__SET('token', $r->token);
			// $hab->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
			
			return $tk;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function getToken($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM tbl_session WHERE id_session = ? AND estado <> 3;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$token = $r->token;
			// $hab->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
			
			return $token;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    
}