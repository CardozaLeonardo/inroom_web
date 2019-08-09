<?php

 
include_once('../entidades/Habitacion.php');
include_once('../modelo/Conexion.php');
include_once('../modelo/Habitacion.modelo.php');

 $habitacion = new Habitacion();
 $habitacionMod = new HabitacionModelo();


 if($_POST)
 {
    $opcion = $_POST["action"];

    switch($opcion)
    {
        case '1':
           $habitacion->__SET('numero', $_POST['numero']);
           $habitacion->__SET('id_tipoHabitacion', $_POST['descripcion']);
           $habitacion->__SET('estado', 1);

           $habitacionMod->crear($habitacion);
           header('Location: /inroom/habitacion.php');

           break;

           case '2':
           $habitacion->__SET('id_habitacion', $_POST['id_habitacion']);
           $habitacion->__SET('numero', $_POST['numero']);
           $habitacion->__SET('id_tipoHabitacion', $_POST['descripcion']);
           $habitacion->__SET('estado', 2);

           $habitacionMod->actualizar($habitacion);
           header('Location: /inroom/habitaciones.php');

           break;


    }


    
 }

if($_GET)
{
   $habitacionMod->eliminar($_GET['user']);
   header("Location: /inroom/habitaciones.php");
}