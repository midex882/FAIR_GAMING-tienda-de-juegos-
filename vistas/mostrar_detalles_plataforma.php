<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/styles.css">
    <link rel="shortcut icon" href="../assets/favicomatic/favicon-32x32.png" type="image/x-icon">
    <?php
        echo"<title>FAIR GAMING | $plat</title>"
    ?>
</head>
<body>
    <?php
        require_once "../php/funciones.php";
        check_header();
    ?>
    <main>
        <?php
             echo"<section class=\"section-container container-xl\">";
             if(isset($_SESSION["user"]) and $_SESSION["user"] == "admin")
                    { 
                        echo"<div class=\"d-flex flex-wrap\">";
                        echo"<form action=\"../controladores/activacion_plat.php\" method=\"get\" class=\"d-flex me-2\">";
                            echo"<input type=\"hidden\" name=\"id\" value=\"$id\">";
                            echo"<input type=\"hidden\" name=\"nombre\" value=\"$nombre\">";
                            if($activo == 1)
                            {
                                echo"<button type=\"submit\" name=\"activacion\" class=\"activo noabsolute\" value=\"0\">Plataforma activa. Pulsa para desactivar</button>";
                            }else{
                                echo"<button type=\"submit\" name=\"activacion\" class=\"inactivo noabsolute\" value=\"1\">Plataforma inactiva. Pulsa para activar</button>";
                            }
                            
                        echo"</form>";

                        echo"<form action=\"../controladores/modificar_plataforma.php\" method=\"get\">";
                            echo"<button type=\"submit\" name=\"ir_a_modificar\" class=\"activar\" value=\"$id\">Modificar</button>";
                    echo"</form>";
                    echo"</div>";
                    }
             echo"<h3 class=\"main-section-title\">Lanzamientos de $nombre</h3>";
             echo"<div class=\"lista seccion-juegos row plataformas\">";
            if(is_array($matriz))
            {
                foreach($matriz as $array)
                {
                    require_once "../modelos/juegos.php";
                    $juego = new juego();
                    $juego->print_juego($array, "col-12", "col-md-6", "col-lg-3", "no");
                }
            }else{
                echo"<h3 class=\"no_results\">Lo sentimos, pero esta plataforma no posee juegos aún</h3>";
            }

            echo "</div>";
            echo"</section>";

        ?>
    </main>
</body>
</html>