<?php
    if(isset($_POST["submit"]))
    {   

        require_once "../modelos/usuarios.php";
        $usuario = new usuario();
        if($usuario->user_exists($_POST["nick"])){
            echo"<h2 class=\"alerta danger\">Usario ya existente</h2>";
        }else{
            $usuario->nuevo_usuario($_POST["nombre"],
            $_POST["nick"],
            $_POST["pass"],
            $_POST["activo"]);
            echo"<h2 class=\"alerta success\">Usario insertado con éxito</h2>";
        }

        header("refresh:2; url=../controladores/anadir_usuario.php");
    }

    include "../vistas/mostrar_anadir_usuario.php";

?>