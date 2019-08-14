<?php

// include_once('../entidades/Reservacion.php');
// include_once('../entidades/VistaReservaciones.php');

class ReservacionModelo extends Conexion
{
    public function create(Reservacion $res)
    {
        try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "INSERT INTO tbl_reservacion (num_reserv, fecha, id_factura, id_huesped,estado) VALUES(?,?,?,?,?);";

			$this->myCon->prepare($sql)
			->execute(
				array(
					$res->__GET('num_reserv'),
					$res->__GET('fecha'),
					$res->__GET('id_factura'),
					$res->__GET('id_huesped'),
					$res->__GET('estado')
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
	
	public function actualizar(Reservacion $res)
	{
		try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "UPDATE tbl_reservacion SET num_reserv = ?, fecha = ?, id_factura = ?, id_huesped = ?, estado = ?, 
            WHERE id_reservacion = ?;";

			$this->myCon->prepare($sql)
			->execute(
				array(
					
					$res->__GET('num_reserv'),
					$res->__GET('fecha'),
					$res->__GET('id_factura'),
					$res->__GET('id_huesped'),
					$res->__GET('estado'),
					$res->__GET('id_reservacion')
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

	public function listar()
	{
		try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("SELECT * FROM vw_reservaciones;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$vr = new VistaReservaciones();

				//_SET(CAMPOBD, atributoEntidad)			
				$vr->__SET('id_reservacion', $r->id_reservacion);
				$vr->__SET('num_reserv', $r->num_reserv);
				$vr->__SET('fecha', $r->fecha);
				$vr->__SET('nombres', $r->nombres);
				$vr->__SET('apellidos', $r->apellidos);
				$vr->__SET('cedula', $r->cedula);
				$vr->__SET('habitaciones', $r->habs);

				$result[] = $vr;

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

	public function getNewNumber()
	{
		try
		{
            $this->myCon = parent::conectar();
			$result = array();
			$value = 0;

			$stm = $this->myCon->prepare("SELECT max(num_reserv) as num_reserv FROM tbl_reservacion WHERE estado <> 3;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$vr = new VistaReservaciones();

				//_SET(CAMPOBD, atributoEntidad)			
				
				$vr->__SET('num_reserv', $r->num_reserv);
				$value = $r->num_reserv;

				$result[] = $vr;

				//var_dump($result);
            }
            
            $this->myCon = parent::desconectar();
			$value++;
			return $value;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function anular($id)
	{
		try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("UPDATE tbl_reservacion SET estado = 3 WHERE id_reservacion = $id;");
			$stm->execute();

            
            $this->myCon = parent::desconectar();
			
			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function finalizar($id)
	{
		try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("UPDATE tbl_reservacion SET estado = 4 WHERE id_reservacion = $id;");
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