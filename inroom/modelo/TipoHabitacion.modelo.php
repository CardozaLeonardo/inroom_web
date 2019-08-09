<?php


class TipoHabitacionModelo extends Conexion
{
    private $myCon;

    public function listarTipoHab()
    {
        try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("SELECT * FROM tbl_tipoHabitacion;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$th = new TipoHabitacion();

				//_SET(CAMPOBD, atributoEntidad)			
				$th->__SET('id_tipoHabitacion', $r->id_tipoHabitacion);
				$th->__SET('descripcion', $r->descripcion);
						

				$result[] = $th;

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