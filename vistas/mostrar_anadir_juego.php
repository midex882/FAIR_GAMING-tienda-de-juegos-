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
    <title>FAIR GAMING | nuevo juego</title>
</head>
<body>  
    <?php
        require_once("../php/funciones.php");
        check_header();
    ?>
    <main>
        <h2 class="main-section-title">Insertar juego nuevo</h2>
        <section class="container-md">
            <form action="../controladores/anadir_juego.php" class="form-nuevo d-flex flex-column container-md" method="post" enctype='multipart/form-data'>
                <div class="d-flex justify-content-between mt-5 flex-wrap">
                    <label for="nombre">Nombre:</label>
                    <input type="text" required name="nombre">
                </div>
                <div class="d-flex justify-content-between mt-3 flex-wrap">
                    <label for="plataforma">Plataforma:</label>
                    <select name="plataforma" required>
                    <?php
                        require_once "../modelos/plataformas.php";
                        $matriz = plataforma::imprimir_plats();

                        foreach($matriz as $array)
                        {
                            echo"<option value=\"$array[id]\">$array[nombre]</option>";
                        }
                    ?>
                    </select>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <label for="descripcion">Descripcion: </label>
                    <textarea name="descripcion" class="nuevo-comentario"></textarea>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <label for="fecha">Fecha de lanzamiento: </label>
                    <input type="date" required name="fecha">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <label for="caratula">Carátula: </label>   
                    <input type="text" required name="caratula">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <a href="../controladores/seccion_juegos.php" class="activar">Volver</a>
                    <button class="intro" type="submit" name="submit">Insertar</button>
                </div>
            </form>
        </section>
        
    </main>
</body>
</html>