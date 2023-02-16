<?php
    if(isset($_POST["nuevocom"]))
    {
        if(session_status() != PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        require_once "../bd/bd.php";
        $con = conectar::conexion();


        $se = "SELECT id from usuarios where nick = '$_SESSION[user]'";
        $consulta = $con->prepare($se);
        $consulta->bind_result($user);
        $consulta->execute();
        $consulta->fetch();
        $consulta->close();



        $juego = $_POST["nuevocom"];
        $se = "SELECT count(*) from comentarios where usuario = $user and juego = $juego";
        $consulta = $con->prepare($se);
        $consulta->bind_result($count);
        $consulta->execute();
        $consulta->fetch();
        $consulta->close();
        if($count == 0)
        {
            $fecha = date("Y-m-d");

            require_once "../modelos/comentarios.php";
            $com = new comentario;
        
            $com::nuevo_comentario($user,$_POST["nuevocom"],$_POST["comentario"],$fecha);
        }


        
        $location = "location: detalles_juego.php?id_juego=$_POST[nuevocom]&details=";
        header($location);

    }

?>