<?php
    if(isset($_GET["details"]))
    {
        require_once "../bd/bd.php";
        $con = conectar::conexion();
        $id = $_GET["id_juego"];
        $se = "select j.id,j.nombre,j.descripcion,j.fecha_lanzamiento,
        p.nombre plataforma,j.caratula,j.activo 
        from juegos j, plataformas p 
        where j.plataforma = p.id and j.id = $id";

        $datos = $con->query($se);
        
        $fila = $datos->fetch_array(MYSQLI_ASSOC);

        require_once "../php/funciones.php";
        $fech = fecha_bd_esp($fila["fecha_lanzamiento"]);
        
        if(session_status() != PHP_SESSION_ACTIVE)
        {
            session_start();
        }


        $coms = 0;
        if(isset($_SESSION["user"]))
        {
            require_once "../modelos/comentarios.php";
            $coms = comentario::get_n_comentarios(0,"no",$_GET["id_juego"]);

        }

        $con->close();

        include "../vistas/mostrar_detalles_juego.php";

        
    }

?>