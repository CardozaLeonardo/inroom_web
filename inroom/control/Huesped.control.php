<?php

 
include_once('../entidades/Huesped.php');
include_once('../modelo/Conexion.php');
include_once('../modelo/Huesped.modelo.php');

 $huesped = new Huesped();
 $huespedMod = new HuespedModelo();


 if($_POST)
 {
    $opcion = $_POST["action"];

    switch($opcion)
    {
        case '1':
           $huesped->__SET('nombres', $_POST['nombres']);
           $huesped->__SET('apellidos', $_POST['apellidos']);
           $huesped->__SET('cedula', $_POST['cedula']);
           $huesped->__SET('telefono', $_POST['telefono']);
           $huesped->__SET('email', $_POST['email']);
           $huesped->__SET('estado', 1);

           $huespedMod->crear($huesped);
           header('Location: /inroom_web/inroom/huespedes.php');

           break;

           case '2':
           $huesped->__SET('id_huesped', $_POST['id_huesped']);
           $huesped->__SET('nombres', $_POST['nombres']);
           $huesped->__SET('apellidos', $_POST['apellidos']);
           $huesped->__SET('cedula', $_POST['cedula']);
           $huesped->__SET('telefono', $_POST['telefono']);
           $huesped->__SET('email', $_POST['email']);
           $huesped->__SET('estado', 2);

           $huespedMod->actualizar($huesped);
           header('Location: /inroom_web/inroom/huespedes.php');

           break;


    }


    
 }

if($_GET)
{
   $productoMod->eliminar($_GET['user']);
   header("Location: /inroom_web/inroom/huespedes.php");
}