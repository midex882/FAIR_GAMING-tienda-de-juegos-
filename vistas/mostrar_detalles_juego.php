<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/styles.css">
    <link rel="shortcut icon" href="../assets/favicomatic/favicon-32x32.png" type="image/x-icon">
    <title>FAIR GAMING | Detalles</title>
</head>
<body>
    <?php
        require_once "../php/funciones.php";
        check_header();
    ?>
    <main>
        <section class="detalles-juego-container d-flex flex-wrap justify-content-center">
            <article class="imagen-juego-container">
                <?php
                    echo"<img src=\"$fila[caratula]\" class=\"img-fluid\">";
                ?>
            </article>

            <article class="datos-juego-container">
                <?php
                    echo"<h2 class=\"titulo juego-detalles\">$fila[nombre]</h2>
                        <h4 class=\"plat juego-detalles\">$fila[plataforma]</h4>
                        <p class=\"desc juego-detalles\">$fila[descripcion]</p>
                        <h4 class=\"fecha juego-detalles\">$fech</h4>";
                    if(isset($_SESSION["user"]) and $_SESSION["user"] == "admin")
                    {
                        echo"<form action=\"../controladores/activacion.php\" method=\"get\">";
                            echo"<input type=\"hidden\" name=\"id\" value=\"$fila[id]\">";
                            if($fila["activo"] == 1)
                            {
                                echo"<button type=\"submit\" name=\"activacion\" class=\"activo noabsolute\" value=\"0\">Activo. Pulsa para desactivar</button>";
                            }else{
                                echo"<button type=\"submit\" name=\"activacion\" class=\"inactivo noabsolute\" value=\"1\">Inactivo. Pulsa para activar</button>";
                            }
                            
                        echo"</form>";

                        echo"<form action=\"../controladores/modificar_juego.php\" method=\"post\">";
                            echo"<button type=\"submit\" name=\"modificar\" class=\"activar\" value=\"$fila[id]\">Modificar</button>";
                    echo"</form>";
                    }

                ?>
            </article>
            

        </section>
        
        <section class="container-xxl">
            
            <?php
                if(isset($_SESSION["user"]))
                {
                    echo"
                        <h2 class=\"small-title mt-5\">Comentarios</h2>
                        <p>
                            <button class=\"btn btn-primary activar\" 
                                type=\"button\" 
                                data-bs-toggle=\"collapse\" 
                                data-bs-target=\"#collapseExample\" 
                                aria-expanded=\"false\" 
                                aria-controls=\"collapseExample\">
                                Comentar
                            </button>
                        </p>
                        <div class=\"collapse nuevocom\" id=\"collapseExample\">
                            <form class=\"card card-body\" method=\"post\" action=\"../controladores/anadir_comentario.php\">
                                <textarea type=\"text\" name=\"comentario\" class=\"nuevo-comentario\"></textarea>
                                <button
                                    data-bs-toggle=\"tooltip\" 
                                    data-bs-placement=\"top\"
                                    data-bs-custom-class=\"custom-tooltip\"
                                    data-bs-title=\"Sólo podrás poner un comentario por juego. Piénsalo bien\"
                                    type=\"submit\" 
                                    name=\"nuevocom\" class=\"intro\" value=\"$fila[id]\">
                                    Enviar
                                </button>
                           
                                
                            </form>
                        </div>";
                }
            ?>


            <?php
                if(is_array($coms))
                {
                    echo"<div class=\"contenedor-comentarios-juego row container-xxl\">";
                    foreach($coms as $com)
                    {
                        echo"<article class=\"comentario-juego col-12 col-md-6 col-lg-4\">
                                <div>
                                    <h4 class=\"nick-usu-comentario\">$com[usuario]</h4>
                                    <p class\"contenido-comentario\">$com[comentario]</p>
                                    <p class=\"fecha-comentario\">$com[fech]</p>
                                </div>   
                            </article>";
                    }
                    echo"</div>";
                }



            ?>
        <script>
                document.addEventListener("DOMContentLoaded", function(){
                    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                    var tooltipList = tooltipTriggerList.map(function(element){
                        return new bootstrap.Tooltip(element);
                    });
                });
        </script>
        </section>
    </main>
</body>
</html>