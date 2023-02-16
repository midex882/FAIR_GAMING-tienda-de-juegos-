<?php
    if(session_status() != PHP_SESSION_ACTIVE)
    {
        session_start();
    }

    if(session_status() == PHP_SESSION_ACTIVE)
    {
        session_destroy();
    }

    $_SESSION = [];
    if(isset($_COOKIE["session"]))
    {
        setcookie('session', null, -1, '/');
    }


    
    if($index)
    {
        header("location: index.php?e=1");
    }else{
        header("location: ../index.php?e=1");
    }
    
?>