<?php
    echo"<div id=\"carouselExampleIndicators\" class=\"carousel slide\">
    <div class=\"carousel-indicators\">";

    $k = 0;
    foreach($datos as $array)
    {
        if($k == 0)
        {
            echo"
            <button type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide-to=\"$k\" class=\"active\" aria-current=\"true\" aria-label=\"Slide $k\"></button>";
        }else{
            echo"
            <button type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide-to=\"$k\" aria-label=\"Slide $k\"></button>";
        }
        $k++;
        
    }

    echo"</div>
    <div class=\"carousel-inner\">";

    $k = 0;
    foreach($datos as $array)
    {   
        if($k == 0){
            echo"<div class=\"carousel-item active \">";
        }else{
            echo"<div class=\"carousel-item\">";
        }
                echo"   
                    <div class=\"carousel-item-container\">
                        <img src=\"$array[caratula]\" class=\"d-block imagen-comentario\" alt=\"...\">
                        <div>
                            <h4 class=\"nick-usu-comentario\">$array[usuario]</h4>
                            <p class\"contenido-comentario\">$array[comentario]</p>
                            <p class=\"fecha-comentario\">$array[fech]</p>
                        </div>
                    </div>         
                </div>";
        $k++;
    }
    echo"</div>
        <button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide=\"prev\">
        <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
        <span class=\"visually-hidden\">Previous</span>
        </button>
        <button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide=\"next\">
        <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
        <span class=\"visually-hidden\">Next</span>
        </button>
</div>";


?>