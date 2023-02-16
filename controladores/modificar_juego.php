<?php
    if(isset($_POST["submit"]))
    {
        require_once "../modelos/juegos.php";
        $juego = new juego();

        $juego->modificar_juego($_POST["submit"],$_POST["nombre"],
                            $_POST["descripcion"],
                            $_POST["plataforma"],
                            $_POST["caratula"],
                            date("Y-m-d",strtotime($_POST["fecha"])),
                            1);
        echo"<h2 class=\"alerta success\">Juego modificado con éxito</h2>";

        header("refresh:2;url=http://localhost/videojuegos/controladores/detalles_juego.php?id_juego=$_POST[submit]&details=");
    }

    include "../vistas/mostrar_modificar_juego.php";

?>