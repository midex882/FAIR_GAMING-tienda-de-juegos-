<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:wght@500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/favicomatic/favicon-32x32.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/styles.css">
    <title>FAIR GAMING | Index</title>
</head>
<body>
    <?php
        require_once "php/funciones.php";
        check_header_index();
    ?>
    <main class="container-xl d-flex flex-column align-items-center">
        <section id="lanzamientos_plataforma" class="d-flex flex-column major-section align-items-center container-xxl">
            <h2 class="main-section-title">
                Tendencias
            </h2>
            <?php
                include "controladores/juegos_plataforma.php";
            ?>
        </section>
        <section id="ultimos_comentarios" class="major-section">
            <span class="secondary-section-title">
                Últimos comentarios
            </span>
            <?php
                include "controladores/ultimos_comentarios.php";
            ?>
        </section>
    </main>
    <footer>
        <div id="enlaces">
            <ul>
                <li><a href="">Términos</a></li>
                <li><a href="">condiciones de seguridad</a></li>
                <li><a href="">Trabaja con nosotros</a></li>
                <li><a href="">Redes sociales</a></li>
                <li><a href="">Aeronaves</a></li>
                <li><a href="">Nuestros partners</a></li>
            </ul>
            <ul>
                <li><a href="">COVID</a></li>
                <li><a href="">Ecología</a></li>
                <li><a href="">Residuos</a></li>
                <li><a href="">Estadísticas</a></li>
                <li><a href="">Servicios especiales</a></li>
                <li><a href="">Ayudas</a></li>
            </ul>
        </div>
        <div id="soc">
            <ul>
                <li><img src="assets/img/instagram.png" alt=""></li>
                <li><img src="assets/img/twitter.png" alt=""></li>
                <li><img src="assets/img/youtube.png" alt=""></li>
                <li><img src="assets/img/linkedin.png" alt=""></li>
                <li><img src="assets/img/pinterest.png" alt=""></li>
            </ul>
        </div>
        
    </footer>
</body>
</html>