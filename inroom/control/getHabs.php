<?php

include_once('../modelo/Conexion.php');
include_once('../entidades/Habitacion.php');
include_once('../modelo/Habitacion.modelo.php');

$habMod = new HabitacionModelo();

if($_POST)
{
    $valor = $_POST['type'];

    $cad = json_decode($valor, true);
    $resul = $habMod->getHabitacionPorTipo($cad['id']);

    echo $resul;
}
