<?php
    if(isset($_POST["submit"]))
    {
        require_once "../modelos/usuarios.php";
        $usuario = new usuario();

        if(empty($_POST["pass"])){
            $_POST["pass"] = "";
        }
        $usuario->modificar_usuario($_POST["submit"],$_POST["nombre"],
                            $_POST["nick"],
                            $_POST["pass"],
                            $_POST["activo"]);

        echo"<h2 class=\"alerta success\">Usuario modificado con éxito</h2>";

        header("refresh:2;url=http://localhost/videojuegos/controladores/modificar_usuario.php?ir_a_modificar=$_POST[submit]");
    }

    include "../vistas/mostrar_modificar_usuario.php";


?>