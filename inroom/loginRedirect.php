<?php

if(!isset($_COOKIE["inroom_session"]))
{
    header('Location: /inroom/login.php');
}else{
    if(isset($_GET['salir']))
    {
        setcookie('inroom_session',"",time() - 30);
        header('Location: /inroom');
    }
}