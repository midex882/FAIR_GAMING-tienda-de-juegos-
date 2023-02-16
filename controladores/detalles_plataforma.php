<?php
    if(isset($_GET["details"]))
    {   
        if(session_status() != PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        $admin = "no";
        if(isset($_SESSION["user"]) and $_SESSION["user"] == "admin")
        {
            $admin = "yes";
        }
        require_once "../modelos/juegos.php";
        $matriz = juego::get_n_juegos_plat($_GET["nombre"], 0 , "no",$admin);
        $plat = $_GET["nombre"];

        require_once "../bd/bd.php";
        $con = conectar::conexion();
        $se = "select * from plataformas where id = $_GET[id]";
        $consulta = $con->prepare($se);
        $consulta->bind_result($id,$nombre,$activo,$logo);
        $consulta->execute();
        $consulta->fetch();
        $consulta->close();
        include "../vistas/mostrar_detalles_plataforma.php";
    }
    

?>