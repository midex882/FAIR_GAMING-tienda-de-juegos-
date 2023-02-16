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
    <title>FAIR GAMING | modificar usuario</title>
</head>
<body>
 
    <?php
        require_once("../php/funciones.php");
        check_header(); 

        if(isset($_GET["ir_a_modificar"]))
        {
            require_once "../bd/bd.php";
            $con = conectar::conexion();

            $se = "select * from usuarios 
            where id = $_GET[ir_a_modificar]";

            $consulta = $con->prepare($se);
            $consulta->bind_result($id,$nombre,$nick,$pass,$activo);
            $consulta->execute();
            $consulta->fetch();
            $consulta->close();
            echo"<main>
        
                <h2 class=\"main-section-title\">Modificar usuario existente</h2>
                <section class=\"container-md\">
                    <form action=\"../controladores/modificar_usuario.php\" class=\"form-nuevo d-flex flex-column container-md\" method=\"post\" enctype='multipart/form-data'>";

                    echo"<div class=\"d-flex justify-content-between mt-5 flex-wrap\">
                            <label for=\"nombre\">Nombre:</label>
                            <input type=\"text\" value=\"$nombre\" required name=\"nombre\">
                        </div>
                        <div class=\"d-flex justify-content-between mt-5 flex-wrap\">
                            <label for=\"nick\">Nick:</label>
                            <input type=\"text\" value=\"$nick\" required name=\"nick\">
                        </div>
                        <div class=\"d-flex justify-content-between mt-5 flex-wrap\">
                            <label for=\"pass\">Contraseña:</label>
                            <input type=\"text\" value=\"\" name=\"pass\">
                        </div>
                        <div class=\"d-flex justify-content-between mt-3 flex-wrap\">
                            <label for=\"activo\">Activo?:</label>
                            <select name=\"activo\" required>";
                                if($activo == 1)
                                {
                                    echo"<option value=\"1\" selected>Sí</option>";
                                    echo"<option value=\"0\">No</option>";
                                }else{
                                    echo"<option value=\"1\" >Sí</option>";
                                    echo"<option value=\"0\" selected>No</option>";
                                }
                    
                        echo"</select>
                        </div>
                        <div class=\"d-flex justify-content-between mt-3\">
                            <a href=\"http://localhost/videojuegos/controladores/seccion_usuarios.php\" class=\"activar\">Volver</a>
                            <button class=\"intro\" type=\"submit\" value=\"$id\" name=\"submit\">Modificar</button>
                        </div>
                    </form>
                </section>
                
            </main>";
        }else{
            /* header("location: ../vistas/fuera.php"); */
        }

    ?>
    
</body>
</html>