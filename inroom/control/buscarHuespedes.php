<?php

include_once('../entidades/Huesped.php');

include_once('../modelo/Conexion.php');

include_once('../modelo/Huesped.modelo.php');

$huespedMod = new HuespedModelo();



    $value = $_POST['str'];
    $cad = json_decode($value, true);

    $resul = $huespedMod->buscarHuesped($cad['info']);

    //echo $resul[0]->__GET("nombres");
    echo $resul;
