<?php

    if(session_status() != PHP_SESSION_ACTIVE)
    {
        session_start();
    }
    $admin = "no";
    if(isset($_SESSION["user"]) and $_SESSION["user"] == "admin")
    {
        $admin = "yes";
    }
    require_once "../modelos/plataformas.php";
    $plats = plataforma::imprimir_plats($admin);

    if(isset($_GET["insertar"]))
    {
        header("location: ../controladores/anadir_plataforma.php");
    }

    if(isset($_GET["buscar"]))
    {   
        require_once "../modelos/plataformas.php";
        $plataforma = new plataforma();
        $resultados = $plataforma->buscar_plataformas($_GET["palabras"]);
    }

    include "../vistas/mostrar_seccion_plataformas.php";

?>