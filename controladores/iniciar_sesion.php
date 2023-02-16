<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles.css">
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_POST["iniciar"]))
    {
        require_once "../bd/bd.php";
        $con = conectar::conexion();
        $se = "select pass from usuarios where nick = ?";
        $consulta = $con->prepare($se);
        $consulta->bind_param("s",$_POST["usu"]);
        $consulta->bind_result($pass);
        $consulta->execute();
        $consulta->fetch();
        $consulta->close();

        if($pass == md5(md5($_POST["pass"])))
        {
            session_start();
            $_SESSION["user"] = $_POST["usu"];
            $_SESSION["mode"] = "classical";
            require_once "../php/funciones.php";
            alertar("Sesión iniciada","success");
            header("refresh:2; url=../index.php");
            
        }else{
            require_once "../php/funciones.php";
            alertar("Usuario o contraseña incorrectos","danger");
            header("refresh:2; url=../vistas/iniciar.php");
        }
    }else{
        header("location: ../vistas/fuera.php");
    }

?>
</body>
</html>
