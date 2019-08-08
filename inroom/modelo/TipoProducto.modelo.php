<?php


class TipoProductoModelo extends Conexion
{
    private $myCon;

    public function listarTipoPro()
    {
        try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("SELECT * FROM tbl_tipoProducto;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$tp = new TipoProducto();

				//_SET(CAMPOBD, atributoEntidad)			
				$tp->__SET('id_tipoProducto', $r->id_tipoProducto);
				$tp->__SET('tipoProducto', $r->tipoProducto);
						

				$result[] = $tp;

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