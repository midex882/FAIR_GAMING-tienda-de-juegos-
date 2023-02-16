<?php
    require_once "../bd/bd.php";
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

    if(isset($_GET["insertar"]))
    {
        header("location: ../controladores/anadir_juego.php");
    }

    if(isset($_GET["buscar"]))
    {   
        require_once "../modelos/juegos.php";
        $juego = new juego();
        $resultados = $juego->buscar_juegos($_GET["palabras"]);
    }


    $con->close();
    $cubo_plataformas_con_juegos = [];
    $admin = "no";

    if(session_status() != PHP_SESSION_ACTIVE)
    {
        session_start();
    }
    if(isset($_SESSION["user"]) and $_SESSION["user"] == "admin")
    {
        $admin = "yes";
    }
    for($i = 0; $i < count($plataformas); $i++)
    {   
        require_once "../modelos/plataformas.php";
        if(plataforma::tiene_juegos($plataformas[$i],"no"))
        {
            require_once "../modelos/juegos.php";
            $cubo_plataformas_con_juegos[] = juego::get_n_juegos_plat($plataformas[$i],-1,"no", $admin);
        }


    }
    include "../vistas/mostrar_seccion_juegos.php";

?>