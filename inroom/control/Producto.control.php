<?php

 
include_once('../entidades/Producto.php');
include_once('../modelo/Conexion.php');
include_once('../modelo/Producto.modelo.php');

 $producto = new Producto();
 $productoMod = new ProductoModelo();


 if($_POST)
 {
    $opcion = $_POST["action"];

    switch($opcion)
    {
        case '1':
           $producto->__SET('descripcion', $_POST['descripcion']);
           $producto->__SET('id_tipoProducto', $_POST['tipoProducto']);
           $producto->__SET('costo', $_POST['costo']);
           $producto->__SET('precio', $_POST['precio']);
           $producto->__SET('impuesto', $_POST['impuesto']);
           $producto->__SET('fecha_vencimiento', $_POST['vencimiento']);
           $producto->__SET('marca', $_POST['marca']);
           $producto->__SET('codigo_barra', $_POST['codigoBarras']);
           $producto->__SET('estado', 1);
           $producto->__SET('stock', $_POST['stock']);

           $productoMod->crear($producto);
           header('Location: /inroom/productos.php');

           break;

           case '2':
           $producto->__SET('id_producto', $_POST['id_producto']);
           $producto->__SET('descripcion', $_POST['descripcion']);
           $producto->__SET('id_tipoProducto', $_POST['tipoProducto']);
           $producto->__SET('costo', $_POST['costo']);
           $producto->__SET('precio', $_POST['precio']);
           $producto->__SET('impuesto', $_POST['impuesto']);
           $producto->__SET('marca', $_POST['marca']);
           $producto->__SET('fecha_vencimiento', $_POST['vencimiento']);
           $producto->__SET('codigo_barra', $_POST['codigoBarras']);
           $producto->__SET('estado', 2);
           $producto->__SET('stock', $_POST['stock']);

           $productoMod->actualizar($producto);
           header('Location: /inroom/productos.php');

           break;


    }


    
 }

if($_GET)
{
   $productoMod->eliminar($_GET['user']);
   header("Location: /inroom/productos.php");
}