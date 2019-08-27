<?php
include('../entidades/User.php');
include('../modelo/Conexion.php');
include('../modelo/User.modelo.php');

if($_POST)
{
    $username = $_POST["type"];
    $cad = json_decode($username, true);

    $userMod = new UserModelo();

    if($cad['op'] == "user")
    {

        echo $userMod->existsUsername($cad['text']);
    }else{
        echo $userMod->existsEmail($cad['text']);
    }

    //echo $userMod->existsUsername("leoc");
    
}