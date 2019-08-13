<?php


class HuespedModelo extends Conexion
{
    private $myCon;

    public function crear(Huesped $hu)
    {
        try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "INSERT INTO tbl_huesped (nombres,apellidos,cedula,telefono,email,estado,id_huesped) VALUES(?,?,?,?,?,?,?)";

			$this->myCon->prepare($sql)
			->execute(
				array(
					$hu->__GET('nombres'),
					$hu->__GET('apellidos'),
					$hu->__GET('cedula'),
					$hu->__GET('telefono'),
					$hu->__GET('email'),
					$hu->__GET('estado'),
					$hu->__GET('id_huesped')
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

			$stm = $this->myCon->prepare("DELETE FROM tbl_huesped set estado = 3 WHERE id_huesped = $id;");
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

    public function actualizar(Huesped $hu)
    {
        try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "UPDATE tbl_huesped SET apellidos = ?, cedula = ?, email = ?, estado = ?, nombres = ?, telefono = ? WHERE id_huesped = ?;";

			$this->myCon->prepare($sql)
			->execute(
				array(
					$hu->__GET('apellidos'),
					$hu->__GET('cedula'),
					$hu->__GET('email'),
					$hu->__GET('estado'),
					$hu->__GET('nombres'),
					$hu->__GET('telefono'),
					$hu->__GET('id_huesped')
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

    public function getHuespedes()
    {
        try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("SELECT * FROM tbl_huesped;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$huesp = new VistaHabitacion();

				//_SET(CAMPOBD, atributoEntidad)			
				$huesp->__SET('id_huesped', $r->id_huesped);
				$huesp->__SET('nombres', $r->nombres);
				$huesp->__SET('apellidos', $r->apellidos);
				$huesp->__SET('cedula', $r->cedula);
				$huesp->__SET('telefono', $r->telefono);
                $huesp->__SET('email', $r->email);
                // $hab->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
                	
				$result[] = $huesp;

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

    public function getHuesped($id)
    {
        try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM tbl_huesped WHERE id_huesped = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$huesp = new VistaHuesped();

			$huesp->__SET('id_huesped', $r->id_huesped);
            $huesp->__SET('nombres', $r->nombres);
			$huesp->__SET('apellidos', $r->apellidos);
			$huesp->__SET('cedula', $r->cedula);
			$huesp->__SET('telefono', $r->telefono);
            $huesp->__SET('email', $r->email);
			// $hab->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
			
			return $huesp;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }
}