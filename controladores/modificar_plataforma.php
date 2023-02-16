<?php
    if(isset($_POST["submit"]))
    {
        require_once "../modelos/plataformas.php";
        $plataforma = new plataforma();

        $plataforma->modificar_plataforma($_POST["submit"],$_POST["nombre"],
                            $_POST["activo"],
                            $_POST["logo"]);

        echo"<h2 class=\"alerta success\">Plataforma modificada con éxito</h2>";

        header("refresh:2;url=http://localhost/videojuegos/controladores/modificar_plataforma.php?ir_a_modificar=$_POST[submit]");
    }

    include "../vistas/mostrar_modificar_plataforma.php";


?>