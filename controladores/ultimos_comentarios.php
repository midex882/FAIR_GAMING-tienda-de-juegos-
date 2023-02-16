<?php
    require_once "modelos/comentarios.php";
    $datos = comentario::get_n_comentarios(5,"yes", null);

    include "vistas/mostrar_ultimos_comentarios.php"
?>