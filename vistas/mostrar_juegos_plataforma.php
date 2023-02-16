<?php
    if(is_array($cubo_plataformas_con_juegos))
    {
        foreach($cubo_plataformas_con_juegos as $lamina)
        {
    
            echo"<section class=\"section-container d-flex flex-column align-items-center\">";
            $plat = $lamina[0]["plataforma"];
            echo"<h3 class=\"section-title\">Lanzamientos de $plat</h3>";
            echo"<div class=\"lista row container-xxl\">";
            
            foreach($lamina as $array)
            {
                require_once "modelos/juegos.php";
                $juego = new juego();
                $juego->print_juego($array, "col-12", "col-md-6", "col-lg-3", "yes");
    
    
            }
            echo "</div>";
            echo"</section>";
        } 
    }


?>