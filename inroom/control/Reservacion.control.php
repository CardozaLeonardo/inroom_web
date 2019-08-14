<?php

include_once('../modelo/Conexion.php');
include_once('../entidades/Reservacion.php');
include_once('../entidades/DetalleReserv.php');
include_once('../modelo/Reservacion.modelo.php');
include_once('../modelo/DetalleReserv.modelo.php');

$reserv = new Reservacion();
$detalleReserv = new DetalleReserv();
$reservMod = new ReservacionModelo();
$detalleMod = new DetalleReservModelo();


if($_POST)
{
    $opcion = $_POST["action"];
    
    switch($opcion)
    {
        case '1':
        
           $reserv->__SET('num_reserv', $_POST['numberReserv']);
           $reserv->__SET('id_huesped', $_POST['huespedID']);
           $reserv->__SET('estado', 1);

           $reservMod->crear($reserv);
           $dt = json_decode($_POST['listaHab'], true);
           //$detalleMod->crear()

           header('Location: /inroom/reservaciones.php');

           break;

        case '2':
           $habitacion->__SET('id_habitacion', $_POST['id_habitacion']);
           $habitacion->__SET('numero', $_POST['numero']);
           $habitacion->__SET('id_tipoHabitacion', $_POST['descripcion']);
           $habitacion->__SET('estado', 2);

           $habitacionMod->actualizar($habitacion);
           header('Location: /inroom_web/inroom/habitaciones.php');

           break;


    }
}