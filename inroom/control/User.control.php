<?php
include_once('../entidades/User.php');
include_once('../entidades/UserRol.php');
include_once('../modelo/Conexion.php');
include_once('../modelo/User.modelo.php');
include_once('../modelo/UserRol.modelo.php');

$user = new User();
$userMod = new UserModelo();
$rolMod = new UserRolModelo();

if($_POST)
{
    $option = $_POST["action"];

    switch($option)
    {
        case '1':
          $user->__SET('user',$_POST["username"]);
          $user->__SET('nombres',$_POST["nombres"]);
          $user->__SET('apellidos',$_POST["apellidos"]);
          $user->__SET('email',$_POST["email"]);
          $user->__SET('pwd',$_POST["password"]);
          $user->__SET('estado',1);

          $userMod->crear($user);
          $id_user = $userMod->getIdUser($user->__GET('user'));
          if($_POST['rolesList'])
          {
            $rolMod->crear($_POST['rolesList'], $id_user);
          }
          header('Location: /inroom/usuarios.php');
          break;
        
        case '2':
            $user->__SET('id_user',$_POST["id_user"]);
            
            $user->__SET('user',$_POST["user"]);
            $user->__SET('nombres',$_POST["nombres"]);
            $user->__SET('apellidos',$_POST["apellidos"]);
            $user->__SET('email',$_POST["email"]);
            $user->__SET('estado',$_POST["user"]);

            $userMod->actualizar($user);
            header('Location: /inroom/usuarios.php');
            break;
    }


    if($_GET)
    {
        $userMod->eliminar($_GET['user']);
        header("Location: /inroom/usuarios.php");
    }
}