<?php
    if(session_status() != PHP_SESSION_ACTIVE)
    {
        session_start();
    }
    if(isset($_SESSION) and $_SESSION["user"] == "admin")
    {
        require_once "../modelos/usuarios.php";
        $usuario = new usuario();
        $matriz = $usuario->get_usuarios("yes");

        include "../vistas/mostrar_seccion_usuarios.php";
    }
?>