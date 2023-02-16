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
    <title>FAIR GAMING | Comentarios</title>
</head>
<body>
    <?php
        require_once "../php/funciones.php";
        check_header();
    ?>
    <main>
        <?php
            if(isset($resultados))
            {
                if(sizeof($resultados) > 0)
                {   
                    
                    echo'        <section class="lista-usuarios d-flex flex-column container-xl mt-4">
                                <h2 class="section-title">Resultados de la búsqueda</h2>
                                <div class="lista-usuarios d-flex flex-column">';
    
                            foreach($resultados as $resultado)
                            {
                                require_once "../modelos/usuarios.php";
                                $usuario = new usuario();
        
                                $usuario->print_usuario($resultado); 
                            }
                        echo"</div>";
                    echo"</section>";
                }else{
                    echo"<section class=\"section-container container-xl\">";
                    echo"<h3 class=\"no_results\">Lo sentimos, pero no se han obtenido resultados</h3>";
                    echo"</section>";
                }
            }
        ?>
        <section class="container-xl mt-4">
            <h2 class="section-title">Todos los comentarios</h2>
            <div class="contenedor-comentarios-juego row d-flex justify-content-center container-xxl">
                <?php
                    foreach($matriz as $array)
                    {
                        require_once "../modelos/comentarios.php";
                        $comentario = new comentario();

                        $comentario->print_comentario($array); 
                    }

                ?>

            </div>
        </section>
    </main>
</body>
</html>