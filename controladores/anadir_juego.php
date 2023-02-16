<?php
    if(isset($_POST["submit"]))
    {
        require_once "../modelos/juegos.php";
        $juego = new juego();

        $juego->nuevo_juego($_POST["nombre"],
                            $_POST["descripcion"],
                            $_POST["plataforma"],
                            $_POST["caratula"],
                            date("Y-m-d",strtotime($_POST["fecha"])),
                            1);
        echo"<h2 class=\"alerta success\">Juego insertado con éxito</h2>";

        header("refresh:2; url=../controladores/anadir_juego.php");
    }

    include "../vistas/mostrar_anadir_juego.php";

?>