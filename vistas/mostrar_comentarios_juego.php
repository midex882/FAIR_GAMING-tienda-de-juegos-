<?php
    foreach($coms as $com)
    {
        echo"<article class=\"comentario-juego\">
                <div>
                    <h4 class=\"nick-usu-comentario\">$com[usuario]</h4>
                    <p class\"contenido-comentario\">$com[comentario]</p>
                    <p class=\"fecha-comentario\">$com[fecha]</p>
                </div>   
            </article>"
    }
?>