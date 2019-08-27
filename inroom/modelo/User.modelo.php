<?php


class UserModelo extends Conexion
{
    private $myCon;

    public function crear(User $usr)
    {
        try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "INSERT INTO tbl_user (user,pwd,nombres,apellidos,email,estado) VALUES(?,?,?,?,?,?)";

			$this->myCon->prepare($sql)
			->execute(
				array(
					$usr->__GET('user'),
					$usr->__GET('pwd'),
					$usr->__GET('nombres'),
					$usr->__GET('apellidos'),
					$usr->__GET('email'),
					$usr->__GET('estado'),
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

			$stm = $this->myCon->prepare("UPDATE tbl_user set estado = 3 WHERE id_user = $id;");
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
		    $sql = "UPDATE tbl_user SET user = ?, nombres = ?, apellidos = ?, email = ?, estado = ? WHERE id_user = ?;";

			$this->myCon->prepare($sql)
			->execute(
				array(
					$user->__GET('user'),
					$user->__GET('nombres'),
					$user->__GET('apellidos'),
					$user->__GET('email'),
					$user->__GET('estado'),
					$user->__GET('id_user')
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

    public function getUsers()
    {
        try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("SELECT * FROM tbl_user;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$usr = new User();

				//_SET(CAMPOBD, atributoEntidad)			
				$usr->__SET('id_user', $r->id_user);
				$usr->__SET('user', $r->user);
				$usr->__SET('nombres', $r->nombres);
				$usr->__SET('apellidos', $r->apellidos);
				$usr->__SET('email', $r->email);
                // $hab->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
                	
				$result[] = $usr;

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

    public function getUser($id)
    {
        try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM tbl_user WHERE id_user = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
		
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$usr = new User();

			$usr->__SET('id_user', $r->id_user);
            $usr->__SET('user', $r->user);
			$usr->__SET('nombres', $r->nombres);
			$usr->__SET('apellidos', $r->apellidos);
			$usr->__SET('email', $r->email);
			$usr->__SET('photo_url', $r->photo_url);
			// $hab->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
			
			return $usr;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function getIdUser($username)
    {
        try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM tbl_user WHERE (user = ? OR email = ?) AND estado <> 3;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($username, $username));
		
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$usr = new User();

			$usr->__SET('id_user', $r->id_user);
			// $hab->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
			
			return $usr->__GET('id_user');
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
	public function buscarUsuario($data)
	{
		try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("SELECT * FROM tbl_huesped WHERE nombres LIKE '%$data%' OR apellidos LIKE
			 '%$data%' OR cedula LIKE '%$data%';");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$huesp = new Huesped();

				//_SET(CAMPOBD, atributoEntidad)			
				$huesp->__SET('id_huesped', $r->id_huesped);
				$huesp->__SET('nombres', $r->nombres);
				$huesp->__SET('apellidos', $r->apellidos);
				$huesp->__SET('cedula', $r->cedula);
				$huesp->__SET('telefono', $r->telefono);
                $huesp->__SET('email', $r->email);
				// $hab->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
				$nombre = 'nombre';
                	
				$result[] = array( $nombre => $r->nombres, 'apellidos' => $r->apellidos);

				//var_dump($result);
            }
            
			$this->myCon = parent::desconectar();
			
			$json = json_encode($result);
			
			return $json;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function comprobarLogin($user, $pass)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM tbl_user WHERE ((user = ? OR email = ?) AND pwd = ?) AND estado <> 3;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($user, $user, $pass));

			$val = 0;

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$val = $r->id_user;
			}

			return $val;

			
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function existsUsername($username)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM tbl_user WHERE user = ? AND estado <> 3;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($username));

			$val = 0;

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$val = $r->id_user;
			}

			$result = array('id_user' => $val);
			return json_encode($result);

			
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function existsEmail($username)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM tbl_user WHERE email = ? AND estado <> 3;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($username));

			$val = 0;

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$val = $r->id_user;
			}

			$result = array('id_user' => $val);
			return json_encode($result);

			
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}