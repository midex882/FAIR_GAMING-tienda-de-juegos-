<?php

//FUNCIONES GLOBALES

function fecha_bd_esp($fecha){
    setlocale(LC_ALL, "es-ES.UTF-8");
    $mk = strtotime($fecha);
    $return = strftime("%e %b %Y",$mk);
    return $return;
}

//HEADER Y NAV DE ADMINISTRADOR

function admin_header()
{
    echo'<header class="sticky-top container-fluid d-flex align-items-center justify-content-between ">
            <div class="logo-header">
                <img src="../assets/img/logo.png">
            </div>';
            admin_nav();
    echo'   <a href="../controladores/cerrar_sesion.php" class="salir">cerrar sesión</a>';
    echo'</header>';
}

function admin_header_index()
{
    echo'<header class="sticky-top container-fluid d-flex align-items-center justify-content-between ">
            <div class="logo-header">
                <img src="assets/img/logo.png">
            </div>';
            admin_nav_index();
    echo'   <a href="controladores/cerrar_sesion.php" class="salir">cerrar sesión</a>';
    echo'</header>';
}

function admin_nav()
{
    echo'<nav class="d-flex flex-wrap justify-content-center">
            <a href="../index.php">inicio</a>
            <a href="../controladores/seccion_juegos.php">juegos</a>
            <a href="../controladores/seccion_plataformas.php">plataformas</a>
            <a href="../controladores/seccion_usuarios.php">usuarios</a>
            <a href="../controladores/seccion_comentarios.php">comentarios</a>
        </nav>';
}


function admin_nav_index()
{
    echo'<nav class="d-flex flex-wrap justify-content-center">
            <a href="index.php">inicio</a>
            <a href="controladores/seccion_juegos.php">juegos</a>
            <a href="controladores/seccion_plataformas.php">plataformas</a>
            <a href="controladores/seccion_usuarios.php">usuarios</a>
            <a href="controladores/seccion_comentarios.php">comentarios</a>
        </nav>';
}


//HEADER DE USUARIO

function usu_header()
{
    echo'<header class="sticky-top container-fluid d-flex align-items-center justify-content-between">
            <div class="logo-header">
                <img src="../assets/img/logo.png">
            </div>';
            usu_unreg_nav();
    echo'   <a href="../controladores/cerrar_sesion.php" class="salir">cerrar sesión</a>';
    echo'</header>';
}

function usu_header_index()
{
    echo'<header class="sticky-top container-fluid d-flex align-items-center justify-content-between">
            <div class="logo-header">
                <img src="assets/img/logo.png">
            </div>';
            usu_unreg_nav_index();
    echo'   <a href="controladores/cerrar_sesion.php" class="salir">cerrar sesión</a>';
    echo'</header>';
}



//HEADER Y NAV DE UNREGISTERED

function unreg_header()
{
    echo'<header class="sticky-top container-fluid d-flex align-items-center justify-content-between">
            <div class="logo-header">
                <img src="../assets/img/logo.png">
            </div>';
            usu_unreg_nav();
    echo'   <a href="../vistas/iniciar.php" class="salir">iniciar sesión</a>';
    echo'</header>';
}

function unreg_header_index()
{
    echo'<header class="sticky-top container-fluid d-flex align-items-center justify-content-between ">
            <div class="logo-header">
                <img src="assets/img/logo.png">
            </div>';
            usu_unreg_nav_index();
    echo'   <a href="vistas/iniciar.php" class="salir">iniciar sesión</a>';
    echo'</header>';
}

function usu_unreg_nav()
{
    echo'<nav class="d-flex flex-wrap justify-content-center">
            <a href="../index.php">inicio</a>
            <a href="../controladores/seccion_juegos.php">juegos</a>
            <a href="../controladores/seccion_plataformas.php">plataformas</a>
        </nav>';
}

function usu_unreg_nav_index()
{
    echo'<nav class="d-flex flex-wrap justify-content-center" > 
            <a href="index.php">inicio</a>
            <a href="controladores/seccion_juegos.php">juegos</a>
            <a href="controladores/seccion_plataformas.php">plataformas</a>
        </nav>';
}

//IMPRIMIR EL HEADER QUE TOCA

function check_header()
{
    if(session_status() != PHP_SESSION_ACTIVE)
    {
        session_start();
    }

    if(isset($_SESSION["user"]))
    {
        if($_SESSION["user"] == "admin")
        {
            admin_header();
        }else{
            usu_header();
        }
    }else{
        unreg_header();
    }

}

function check_header_index()
{
    if(session_status() != PHP_SESSION_ACTIVE)
    {
        session_start();
    }

    if(isset($_SESSION["user"]))
    {
        if($_SESSION["user"] == "admin")
        {
            admin_header_index();
        }else{
            usu_header_index();
        }
    }else{
        unreg_header_index();
    }

}


function alertar($mensaje, $tipo)
{
    echo"<h3 class=\"alerta $tipo\">$mensaje</h3>";
}



?>