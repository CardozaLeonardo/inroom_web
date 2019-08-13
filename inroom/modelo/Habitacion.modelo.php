<?php


class HabitacionModelo extends Conexion
{
    private $myCon;

    public function crear(Habitacion $h)
    {
        try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "INSERT INTO tbl_habitacion (numero,estado,id_tipoHabitacion, id_habitacion ) VALUES(?,?,?,?)";

			$this->myCon->prepare($sql)
			->execute(
				array(
					$h->__GET('numero'),
					$h->__GET('estado'),
					$h->__GET('id_tipoHabitacion'),
					$h->__GET('id_habitacion')
				)
			);

			$this->myCon = parent::desconectar();
            //$insert = 1;
            //return true;
			//return $insert;
		}
		catch(Exception $e){
			// return false;
			die($e->getMessage());
		}
	}
	

    public function eliminar($id)
    {
        try
		{
            $this->myCon = parent::conectar();
			$stm = $this->myCon->prepare("UPDATE tbl_habitacion set estado = 3 WHERE id_habitacion = $id;");
			$stm->execute();

			$this->myCon = parent::desconectar();
			
			// return true;
		}
		catch(Exception $e)
		{
            die($e->getMessage());
            // return false;
		}
    }

    public function actualizar(Habitacion $h)
    {
        try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "UPDATE tbl_habitacion SET numero = ?, estado = ?, id_tipoHabitacion = ? WHERE id_habitacion = ?;";

			$this->myCon->prepare($sql)
			->execute(
				array(
					$h->__GET('numero'),
					$h->__GET('estado'),
					$h->__GET('id_tipoHabitacion'),
					$h->__GET('id_habitacion')
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

    public function getHabitaciones()
    {
        try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("SELECT * FROM vw_habitaciones;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$hab = new VistaHabitacion();

				//_SET(CAMPOBD, atributoEntidad)			
				$hab->__SET('id_habitacion', $r->id_habitacion);
                $hab->__SET('numero', $r->numero);
				$hab->__SET('descripcion', $r->descripcion);
				// $hab->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
                // $hab->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
                	
				$result[] = $hab;

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

    public function getHabitacion($id)
    {
        try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_habitaciones WHERE id_habitacion = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$hab = new VistaHabitacion();

			$hab->__SET('id_habitacion', $r->id_habitacion);
            $hab->__SET('numero', $r->numero);
			$hab->__SET('descripcion', $r->descripcion);
			
			// $hab->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
			
			return $hab;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }
}