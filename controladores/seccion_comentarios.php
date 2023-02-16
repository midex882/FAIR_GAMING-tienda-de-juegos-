<?php
    if(session_status() != PHP_SESSION_ACTIVE)
    {
        session_start();
    }
    if(isset($_SESSION) and $_SESSION["user"] == "admin")
    {
        require_once "../modelos/comentarios.php";
        $comentario = new comentario();
        $matriz = $comentario->get_n_comentarios(-1, "no", null);


        if(isset($_GET["buscar"]))
        {   
            require_once "../modelos/usuarios.php";
            $usuario = new usuario();
            $resultados = $usuario->buscar_usuarios($_GET["palabras"]);
        }

        include "../vistas/mostrar_seccion_usuarios.php";
        
    }

?>