<?php
    if(isset($_POST["delete"]))
    {
        require_once "../bd/bd.php";
        $con = conectar::conexion();

        $se = "delete from comentarios where usuario = $_POST[usuario] and juego = $_POST[juego] and fecha = '$_POST[fecha]'";
        $consulta = $con->prepare($se);
        $consulta->execute();
        $consulta->close();
        $con->close();

        header("refresh:0; url=http://localhost/videojuegos/controladores/seccion_comentarios.php");
    }

?>