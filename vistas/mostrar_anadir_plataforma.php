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
    <title>FAIR GAMING | nueva plataforma</title>
</head>
<body>  
    <?php
        require_once("../php/funciones.php");
        check_header();
    ?>
    <main>
        <h2 class="main-section-title">Insertar plataforma nueva</h2>
        <section class="container-md">
            <form action="../controladores/anadir_plataforma.php" class="form-nuevo d-flex flex-column container-md" method="post" enctype='multipart/form-data'>
                <div class="d-flex justify-content-between mt-5 flex-wrap">
                    <label for="nombre">Nombre:</label>
                    <input type="text" required name="nombre">
                </div>
                <div class="d-flex justify-content-between mt-3 flex-wrap">
                    <label for="activo">Activa?:</label>
                    <select name="activo" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <label for="logo">Logo: </label>   
                    <input type="text" required name="logo">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <a href="../controladores/seccion_plataformas.php" class="activar">Volver</a>
                    <button class="intro" type="submit" name="submit">Insertar</button>
                </div>
            </form>
        </section>
        
    </main>
</body>
</html>