<?php
    if(isset($_POST["submit"]))
    {
        require_once "../modelos/plataformas.php";
        $plataforma = new plataforma();

        $plataforma->nueva_plataforma($_POST["nombre"],
                            $_POST["activo"],
                            $_POST["logo"]);
        echo"<h2 class=\"alerta success\">PLataforma insertada correctamente</h2>";

        header("refresh:2; url=../controladores/anadir_plataforma.php");
    }

    include "../vistas/mostrar_anadir_plataforma.php";

?>