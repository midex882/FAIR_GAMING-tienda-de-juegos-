<?php
    if(isset($_GET["activacion"]))
    {
        require_once "../bd/bd.php";
        $con = conectar::conexion();

        $se = "update juegos set activo = $_GET[activacion] where id = $_GET[id]";
        $consulta = $con->prepare($se);
        $consulta->execute();
        $consulta->close();
        $con->close();

        header("refresh:0; url=http://localhost/videojuegos/controladores/detalles_juego.php?id_juego=$_GET[id]&details=");
    }
?>