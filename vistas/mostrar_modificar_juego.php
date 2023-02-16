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
    <title>FAIR GAMING | modificar juego</title>
</head>
<body>
 
    <?php
        require_once("../php/funciones.php");
        check_header(); 

        if(isset($_POST["modificar"]) or (isset($_SESSION["user"]) and $_SESSION["user"] == "admin"))
        {
            require_once "../bd/bd.php";
            $con = conectar::conexion();

            $se = "select j.id,j.nombre,j.descripcion,j.fecha_lanzamiento,
            p.nombre plataforma,j.caratula,j.activo 
            from juegos j, plataformas p 
            where j.plataforma = p.id and j.id = $_POST[modificar]";

            $consulta = $con->prepare($se);
            $consulta->bind_result($id,$nombre,$descripcion,$fecha,$plataforma,$caratula,$activo);
            $fecha = date("d-m-Y", strtotime($fecha));
            $consulta->execute();
            $consulta->fetch();
            $consulta->close();
            echo"<main>
        
                <h2 class=\"main-section-title\">Modificar juego existente</h2>
                <section class=\"container-md\">
                    <form action=\"../controladores/modificar_juego.php\" class=\"form-nuevo d-flex flex-column container-md\" method=\"post\" enctype='multipart/form-data'>";

                    echo"<div class=\"d-flex justify-content-between mt-5 flex-wrap\">
                            <label for=\"nombre\">Nombre:</label>
                            <input type=\"text\" value=\"$nombre\" required name=\"nombre\">
                        </div>
                        <div class=\"d-flex justify-content-between mt-3 flex-wrap\">
                            <label for=\"plataforma\">Plataforma:</label>
                            <select name=\"plataforma\" required>";

                                require_once "../modelos/plataformas.php";
                                $matriz = plataforma::imprimir_plats("yes");

                                foreach($matriz as $array)
                                {   
                                    echo"caca";
                                    if($array["nombre"] == $plataforma)
                                    {
                                        echo"<option selected value=\"$array[id]\">$array[nombre]</option>";
                                    }else{
                                        echo"<option value=\"$array[id]\">$array[nombre]</option>";
                                    }
                                    
                                }
                    
                        echo"</select>
                        </div>
                        <div class=\"d-flex justify-content-between mt-3\">
                            <label for=\"descripcion\">Descripcion: </label>
                            <textarea name=\"descripcion\" value=\"\" class=\"nuevo-comentario\">$descripcion</textarea>
                        </div>
                        <div class=\"d-flex justify-content-between mt-3\">
                            <label for=\"fecha\">Fecha de lanzamiento: </label>
                            <input type=\"date\" value=\"$fecha\" required name=\"fecha\">
                        </div>
                        <div class=\"d-flex justify-content-between mt-3\">
                            <label for=\"caratula\">Carátula: </label>   
                            <input type=\"text\" value=\"$caratula\" required name=\"caratula\">
                        </div>
                        <div class=\"d-flex justify-content-between mt-3\">
                            <a href=\"http://localhost/videojuegos/controladores/detalles_juego.php?id_juego=$id&details=\" class=\"activar\">Volver</a>
                            <button class=\"intro\" type=\"submit\" value=\"$id\" name=\"submit\">Modificar</button>
                        </div>
                    </form>
                </section>
                
            </main>";
        }else{
            header("location: ../vistas/fuera.php");
        }

    ?>
    
</body>
</html>