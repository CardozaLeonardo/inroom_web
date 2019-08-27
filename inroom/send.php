<?php

// $content = http_build_query (array (
//     'field1' => 'Value1',
//     'field2' => 'Value2',
//     'field3' => 'Value3'
//     ));
     
//     $context = stream_context_create (array (
//     'http' => array (
//     'method' => 'POST',
//     'content' => $content,
//     )
//     ));
     
//     $result = file_get_contents('catch.php', null, $context);
//     header('catch.php');


// if(isset($_COOKIE['inroom_session']))
// {
//     echo "Ya esta la cookie";
// }

print_r($_COOKIE);

include('includes.php');
   $sm = new SessionModelo();

//    if(isset($_COOKIE['inroom_session']))
//    {
//        //echo "LOL";
//        $userMod = new UserModelo();
//        $ss = $sm->getSession($_COOKIE['inroom_session']);
//        $id_user = $ss->__GET('id_user');
//        $logged = new User();
//        $logged = $userMod->getUser($id_user);
//        echo $logged->__GET('user');
//        //echo $id_user;
//    }else{
//        if(isset($_GET['start']))
//        {
//            $ck = $sm->getToken($_GET['start']);
            //setcookie('inroom_session', $ck, time() + 3600);

//            header('Location: /inroom/index.php');
//        }
//    }

    $usr = new User();
    $userMod = new UserModelo();
    $usr = $userMod->getUser(1);

    echo $usr->__GET('user');

   

 $ck = "bf4d7013d7c8fbc30ff73363410eb9eb189e39d76d400005e1482d15c50c4f35f5d590d554b6af4a9c730e49c5499cda1b4b0e9ec593935eec9c6dcf6d37336f";

//setcookie('inroom_session', $ck, time() + 3600);