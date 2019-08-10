<?php

class DetalleReservModelo extends Conexion
{
    public function crear(DetalleReserv $dr)
    {
        try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "INSERT INTO tbl_detalleReserv (id_reservacion, id_habitacion, descripcion, fechaEntrada, fechaSalida, horaEntrada,
			, horaSalida) VALUES(?,?,?,?,?,?,?);";

			$this->myCon->prepare($sql)
			->execute(
				array(
					$dr->__GET('id_reservacion'),
					$dr->__GET('id_habitacion'),
					$dr->__GET('descripcion'),
					$dr->__GET('fechaEntrada'),
					$dr->__GET('fechaSalida'),
					$dr->__GET('horaEntrada'),
					$dr->__GET('horaSalida')
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
	
	public function actualizar(DetalleReserv $dr)
	{
		try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "UPDATE tbl_detalleReserv SET id_reservacion = ?, id_habitacion = ?, descripcion = ?, fechaEntrada = ?, fechaSalida = ?, 
            horaEntrada = ?, horaSalida = ? WHERE id_detalleReserv = ?;";

			$this->myCon->prepare($sql)
			->execute(
				array(
					
					$dr->__GET('id_reservacion'),
					$dr->__GET('id_habitacion'),
					$dr->__GET('descripcion'),
					$dr->__GET('fechaEntrada'),
					$dr->__GET('fechaSalida'),
					$dr->__GET('horaEntrada'),
					$dr->__GET('horaSalida'),
					$dr->__GET('id_detalleReserv')
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

	public function listar($id_reservacion)
	{
		try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("SELECT * FROM tbl_detalleReserv WHERE id_reservacion = $id_reservacion;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$dr = new DetalleReserv();

				//_SET(CAMPOBD, atributoEntidad)			
				$dr->__GET('id_reservacion', $r->id_reservacion);
				$dr->__GET('id_habitacion', $r->id_habitacion);
				$dr->__GET('descripcion', $r->id_habitacion);
				$dr->__GET('fechaEntrada', $r->fechaEntrada);
				$dr->__GET('fechaSalida', $r->fechaSalida);
				$dr->__GET('horaEntrada', $r->horaEntrada);
				$dr->__GET('horaSalida', $r->horaSalida);
				$dr->__GET('id_detalleReserv', $r->id_detalleReserv);	

				$result[] = $dr;

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


	public function eliminar($id)
	{
		try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("DELETE FROM tbl_detalleReserv WHERE id_detalleReserv = $id;");
			$stm->execute();

            
            $this->myCon = parent::desconectar();
			
			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
}