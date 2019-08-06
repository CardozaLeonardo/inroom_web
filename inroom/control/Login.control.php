<?php

include_once('../modelo/User.modelo.php');


if($_POST)
{
    try{
        $user = $_POST["username"];
        $pass = $_POST["password"];

        // if()
    }catch(Exception $e)
    {
        header('../error-404.php');
    }
}