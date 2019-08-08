<?php


class ProductoModelo extends Conexion
{
    private $myCon;

    public function crear(Producto $p)
    {
        try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "INSERT INTO tbl_producto (descripcion, precio, impuesto, id_tipoProducto, marca, costo,
			fecha_vencimiento, estado, codigo_barra) VALUES(?,?,?,?,?,?,?,?,?)";

			$this->myCon->prepare($sql)
			->execute(
				array(
					$p->__GET('descripcion'),
					$p->__GET('precio'),
					$p->__GET('impuesto'),
					$p->__GET('id_tipoProducto'),
					$p->__GET('marca'),
					$p->__GET('costo'),
					$p->__GET('fecha_vencimiento'),
					$p->__GET('estado'),
					$p->__GET('codigo_barra')
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

			$stm = $this->myCon->prepare("UPDATE tbl_producto set estado = 3 WHERE id_producto = $id;");
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

    public function actualizar(Producto $p)
    {
        try{
			//$insert = 0;
			$this->myCon = parent::conectar();
		    $sql = "UPDATE tbl_producto SET descripcion = ?, precio = ?, impuesto = ?, id_tipoProducto = ?, marca = ?, 
            costo = ?, fecha_vencimiento = ?, estado = ?, codigo_barra = ? WHERE id_producto = ?;";

			$this->myCon->prepare($sql)
			->execute(
				array(
					$p->__GET('descripcion'),
					$p->__GET('precio'),
					$p->__GET('impuesto'),
					$p->__GET('id_tipoProducto'),
					$p->__GET('marca'),
					$p->__GET('costo'),
					$p->__GET('fecha_vencimiento'),
					$p->__GET('estado'),
					$p->__GET('codigo_barra'),
					$p->__GET('id_producto')
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

    public function getProductos()
    {
        try
		{
            $this->myCon = parent::conectar();
		    $result = array();

			$stm = $this->myCon->prepare("SELECT * FROM vw_productos;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$pro = new VistaProducto();

				//_SET(CAMPOBD, atributoEntidad)			
				$pro->__SET('id_producto', $r->id_producto);
				$pro->__SET('descripcion', $r->descripcion);
				$pro->__SET('costo', $r->costo);
				$pro->__SET('precio', $r->precio);
				$pro->__SET('marca', $r->marca);
				$pro->__SET('tipoProducto', $r->tipoProducto);
				$pro->__SET('fecha_vencimiento', $r->fecha_vencimiento);
                $pro->__SET('codigo_barra', $r->codigo_barra);
                $pro->__SET('id_tipoProducto', $r->id_tipoProducto);		

				$result[] = $pro;

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

    public function getProducto($id)
    {
        try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_productos WHERE id_producto = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$pro = new VistaProducto();

			$pro->__SET('id_producto', $r->id_producto);
			$pro->__SET('descripcion', $r->descripcion);
			$pro->__SET('costo', $r->costo);
			$pro->__SET('marca', $r->marca);
			$pro->__SET('precio', $r->precio);
			$pro->__SET('tipoProducto', $r->tipoProducto);
			$pro->__SET('fecha_vencimiento', $r->fecha_vencimiento);
			$pro->__SET('codigo_barra', $r->codigo_barra);
			$pro->__SET('impuesto', $r->impuesto);
			$pro->__SET('id_tipoProducto', $r->id_tipoProducto);

			return $pro;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }
}