<?php

class UserRolModelo extends Conexion
{
    private $myCon;

    public function crear($rolesLista, $id_user)
    {
        try{
            //$insert = 0;
            $roles = json_decode($rolesLista, true);
            $this->myCon = parent::conectar();

            $sql = "";

            foreach($roles as $rol)
            {
                $sql = $sql . "INSERT INTO tbl_UserRol(id_user, id_rol) VALUES($id_user,$rol);";
            }

            echo $sql;
            //die();

		    //$sql = "INSERT INTO tbl_user (user,pwd,nombres,apellidos,email,estado) VALUES(?,?,?,?,?,?)";

			$this->myCon->prepare($sql)
			->execute();

			$this->myCon = parent::desconectar();
            //$insert = 1;
            return true;
			//return $insert;
		}
		catch(Exception $e){
            return false;
		}
    }


    public function listarRolesUsuario($id_user)
    {
        try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("SELECT d.id_UserRol as id_UserRol, d.id_rol as id_rol, d.id_user as id_user, r.rol as rol FROM tbl_UserRol d INNER JOIN tbl_rol r ON d.id_rol =
            r.id_rol WHERE d.id_user = $id_user;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$usrRol = new UserRol();

				//_SET(CAMPOBD, atributoEntidad)			
				$usrRol->__SET('id_UserRol', $r->id_UserRol);
				$usrRol->__SET('id_rol', $r->id_rol);
				$usrRol->__SET('id_user', $r->id_user);
				$usrRol->__SET('rol', $r->rol);
                // $hab->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
                	
				$result[] = $usrRol;

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