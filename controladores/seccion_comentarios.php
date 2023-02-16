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

        if(isset($_POST["delete"]))
        {
            require_once "../bd/bd.php";
            $con = conectar::conexion();
    
            $se = "delete from comentarios where usuario = (select id from usuarios where nick = '$_POST[usuario]')
             and juego = $_POST[juego] and fecha = '$_POST[delete]'";
            $consulta = $con->prepare($se);
            $consulta->execute();
            $consulta->close();
            $con->close();
            
            echo"<h2 class=\"alerta success\">Comentario eliminado con éxito</h2>";
            header("refresh:2; url=http://localhost/videojuegos/controladores/seccion_comentarios.php");
        }

        if(isset($_GET["buscar"]))
        {   
            require_once "../modelos/usuarios.php";
            $usuario = new usuario();
            $resultados = $usuario->buscar_usuarios($_GET["palabras"]);
        }

        include "../vistas/mostrar_seccion_comentarios.php";
        
    }

?>