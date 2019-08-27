<?php

include_once('../modelo/Conexion.php');
include_once('../modelo/User.modelo.php');
include_once('../entidades/Session.php');
include_once('../modelo/Session.modelo.php');

$userMod = new UserModelo();
$session = new Session();
$sesMod = new SessionModelo();


if($_POST)
{
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $id_user = $userMod->comprobarLogin($user, $pass);

    if($id_user != 0)
    {
        $token = bin2hex(random_bytes(64));
        $session->__SET('token', $token);
        $session->__SET('id_user', $id_user);
        $session->__SET('estado', 1);
        $sesMod->crear($session);

        $ss = $sesMod->getSession($token);
        $id_session = $ss->__GET('id_session');


        header('Location: /inroom/index.php?start='. $id_session);
    }else{
        header('Location: /inroom/login.php?status=1');
    }
    echo "El id vale $id_user";
}else{
    echo "Algo ha fallado";
}


