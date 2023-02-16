<?php
    require_once "bd/bd.php";
    $con = conectar::conexion();
    $se = "select nombre from plataformas where activo = 1";
    $consulta = $con->prepare($se);
    $consulta->bind_result($plat);
    $consulta->execute();
    $plats = [];
    while($consulta->fetch())
    {
        $plataformas[] = $plat;
    }
    $consulta->close();
    $con->close();
    $cubo_plataformas_con_juegos = [];

    for($i = 0; $i < count($plataformas); $i++)
    {
        require_once "modelos/plataformas.php";
        if(plataforma::tiene_juegos($plataformas[$i], "yes"))
        {
            require_once "modelos/juegos.php";
            $cubo_plataformas_con_juegos[] = juego::get_n_juegos_plat($plataformas[$i], 4,"yes","no");
        }


    }
    include "vistas/mostrar_juegos_plataforma.php";

?>