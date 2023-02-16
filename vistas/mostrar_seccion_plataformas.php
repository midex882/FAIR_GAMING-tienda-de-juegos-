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
    <title>FAIR GAMING | Juegos</title>
</head>
<body>
    <?php
        require_once "../php/funciones.php";
        check_header();
    ?>
    <main>
    <h2 class="main-section-title">
                Plataformas con las que contamos
            </h2>
    <?php
        if(session_status() != PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        if(isset($_SESSION["user"]) and $_SESSION["user"] == "admin")
        {
            echo"<section class=\"admin\">
                    <form method=\"get\" action=\"../controladores/seccion_plataformas.php\">
                        <input class=\"barra-busqueda\" type=\"text\" name=\"palabras\">
                        <button type=\"submit\" class=\"intro\"name=\"buscar\">Buscar</button>
                    </form>
                    <form method=\"get\" action=\"../controladores/seccion_plataformas.php\">
                        <button type=\"submit\" class=\"activar\" name=\"insertar\">Insertar nueva plataforma</button>
                    </form>
                </section>";
        }


        if(isset($resultados) and sizeof($resultados) > 0)
        {            
            echo"<section class=\"section-container container-xl\">";
                echo"<h3 class=\"section-title\">Resultados de la búsqueda</h3>";
                echo"<div class=\"lista seccion-juegos row\">";
                    foreach($resultados as $resultado)
                    {
                        require_once "../modelos/juegos.php";
                        $plataforma = new plataforma();
                        $plataforma->print_plataforma($resultado, "col-12", "col-md-6", "col-lg-3", "no");
                    }
                echo"</div>";
            echo"</section>";
        }
    ?>
        <section class="section-container container-xl">
            <div class="lista seccion-juegos row plataformas">
                <?php
                    foreach($plats as $plat)
                    {
                        require_once "../modelos/juegos.php";
                        $plataforma = new plataforma();
                        $plataforma->print_plataforma($plat, "col-12", "col-md-6", "col-lg-3", "no");
                    } 
                ?>
            </div>
        </section>
    </main>
</body>
</html>
