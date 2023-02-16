<?php

class juego{
    private $id;
    private $nombre;
    private $descripcion;
    private $plataforma;
    private $caratula;
    private $fecha_lanzamiento;
    private $activo;


    public function __construct()
    {
        $this->id = null;
        $this->nombre = "";
        $this->descripcion = "";
        $this->plataforma = "";
        $this->caratula = "";
        $this->fecha_lanzamiento = "";
        $this->activo = false;
    }

    public function get_juego($id)
    {
        require_once "../bd/bd.php";
        $con = conectar::conexion();
        $id = $_GET["id_juego"];
        $se = "select j.id,j.nombre,j.descripcion,j.fecha_lanzamiento,
        p.nombre plataforma,j.caratula 
        from juegos j, plataformas p 
        where j.plataforma = p.id and j.id = $id";

        $datos = $con->query($se);

        $fila = $datos->fetch_array(MYSQLI_ASSOC);

        require_once "../php/funciones.php";
        $fecha = fecha_bd_esp($fila["fecha_lanzamiento"]);
        $this->id = $fila["id"];
        $this->nombre= $fila["nombre"];
        $this->descripcion = $fila["descripcion"];
        $this->plataforma = $fila["plataforma"];
        $this->caratula = $fila["caratula"];
        $this->fecha_lanzamiento = $fecha;
        $this->activo = $fila["activo"];
    }

    public function buscar_juegos($termino)
    {
        require_once "../bd/bd.php";
        $con = conectar::conexion();

        $se ="select j.id,j.nombre,j.descripcion,j.fecha_lanzamiento,p.nombre plataforma,
        j.caratula, j.activo from juegos j, plataformas p where j.plataforma = p.id and j.nombre like ? order by fecha_lanzamiento";

        $term = trim(strtolower($termino));
        $term = "%$term%";

        $array = [];
        $matriz = [];
        $i = 0;
        $consulta = $con->prepare($se);
        $consulta->bind_param("s", $term);
        $consulta->bind_result($id,$nombre,$descripcion,$fecha,$plataforma,$caratula,$activo);
        $consulta->execute();
        while($consulta->fetch())
        {   
            require_once "../php/funciones.php";           
            $fech = fecha_bd_esp($fecha);
            $matriz[$i]["id"] = $id;
            $matriz[$i]["nombre"] = $nombre;
            $matriz[$i]["descripcion"] = $descripcion;
            $matriz[$i]["plataforma"] = $plataforma;
            $matriz[$i]["caratula"] = $caratula;
            $matriz[$i]["fecha_lanzamiento"] = $fech;
            $matriz[$i]["activo"] = $activo;
            $i++;
        }

        return $matriz;

    }

    public static function get_n_juegos_plat($plataforma, $n = 0, $index, $admin)
    {
        if($index == "yes")
        {
            require_once "bd/bd.php";
        }else{
            require_once "../bd/bd.php";
        }

        $con = conectar::conexion();

        $se = "SELECT count(id) from juegos where plataforma = (select id from plataformas where nombre = '$plataforma')";
        $consulta = $con->prepare($se);
        $consulta->bind_result($numero);
        $consulta->execute();
        $consulta->fetch();
        $consulta->close();

        if($numero > 0)
        {
            if($admin == "yes")
            {
                if($n <= 0)
                {
                    $se = "select j.id,j.nombre,j.descripcion,j.fecha_lanzamiento,p.nombre plataforma,
                    j.caratula, j.activo from juegos j, plataformas p where plataforma = (select id from plataformas where nombre = '$plataforma')
                    and j.plataforma = p.id order by fecha_lanzamiento DESC";
                }else{
                    $se = "select j.id,j.nombre,j.descripcion,j.fecha_lanzamiento,p.nombre plataforma,
                    j.caratula, j.activo from juegos j, plataformas p  where plataforma = (select id from plataformas where nombre = '$plataforma')
                    and j.plataforma = p.id order by fecha_lanzamiento DESC limit $n";
                }
            }else{
                if($n <= 0)
                {
                    $se = "select j.id,j.nombre,j.descripcion,j.fecha_lanzamiento,p.nombre plataforma,
                    j.caratula, j.activo from juegos j, plataformas p where plataforma = (select id from plataformas where nombre = '$plataforma')
                    and j.plataforma = p.id and j.activo = 1 order by fecha_lanzamiento DESC";
                }else{
                    $se = "select j.id,j.nombre,j.descripcion,j.fecha_lanzamiento,p.nombre plataforma,
                    j.caratula, j.activo from juegos j, plataformas p  where plataforma = (select id from plataformas where nombre = '$plataforma')
                    and j.plataforma = p.id and j.activo = 1 order by fecha_lanzamiento DESC limit $n";
                }
            }


            $datos = $con->query($se);
            $matriz_juegos_plataforma = [];

            $i = 0;
            while($fila = $datos->fetch_array(MYSQLI_ASSOC))
            {   
                if($index == "yes")
                {
                    require_once "php/funciones.php";
                }else{
                    require_once "../php/funciones.php";
                }
                
                $fech = fecha_bd_esp($fila["fecha_lanzamiento"]);

                $matriz_juegos_plataforma[$i]["id"] = $fila["id"];
                $matriz_juegos_plataforma[$i]["nombre"] = $fila["nombre"];
                $matriz_juegos_plataforma[$i]["descripcion"] = $fila["descripcion"];
                $matriz_juegos_plataforma[$i]["plataforma"] = $fila["plataforma"];
                $matriz_juegos_plataforma[$i]["caratula"] = $fila["caratula"];
                $matriz_juegos_plataforma[$i]["fecha_lanzamiento"] = $fech;
                $matriz_juegos_plataforma[$i]["activo"] = $fila["activo"];
                $i++;
            }
            $con->close();
            return $matriz_juegos_plataforma;
        }else{
            return 0;
        }
        
        
    }

    public function nuevo_juego($nombre,$descripcion,$plataforma,$caratula,$fecha,$activo)
    {
        require_once "../bd/bd.php";
        $con = conectar::conexion();

        $se = "insert into juegos values(null,?,?,?,?,?,?)";
        $consulta = $con->prepare($se);
        $consulta->bind_param("ssissi",$nombre,$descripcion,$plataforma,$caratula,$fecha,$activo);
        $consulta->execute();
        $consulta->close();
        $con->close();
    }

    public function modificar_juego($id,$nombre,$descripcion,$plataforma,$caratula,$fecha,$activo)
    {
        require_once "../bd/bd.php";
        $con = conectar::conexion();

        $se = "update juegos set nombre = ?, descripcion = ?, plataforma = ?, caratula = ?, fecha_lanzamiento = ?, activo = ? where id = ?";
        $consulta = $con->prepare($se);
        $consulta->bind_param("ssissii",$nombre,$descripcion,$plataforma,$caratula,$fecha,$activo,$id);
        $consulta->execute();
        $consulta->close();
        $con->close();
    }

    public function print_juego($resultado, $break1, $break2, $break3, $index)
    {
        echo"<article class=\"product $break1 $break2 $break3 d-flex flex-column align-items-center\" data-id=\"$resultado[id]\">
                <div class=\"product-img-container\">
                    <img class=\"modal-trigger\" src=\"$resultado[caratula]\">";
                    if($resultado["activo"] == 0)
                    {
                        echo"<span class=\"inactivo\">inactivo</span>";
                    }
                    echo"<div class=\"details_container\">";
                    if($index == "no")
                    {
                        echo"<form method=\"get\" class=\"details_form\" action=\"../controladores/detalles_juego.php\">";
                    }else{
                        echo"<form method=\"get\" class=\"details_form\" action=\"controladores/detalles_juego.php\">";
                    }
                    
                    echo"<input type=\"hidden\" name=\"id_juego\" value=\"$resultado[id]\">
                        <button type=\"submit\" name=\"details\">";
                        if($index == "no")
                        {
                            echo"<img class=\"details-btn\" src=\"../assets/img/details2.png\">";
                        }else{
                            echo"<img class=\"details-btn\" src=\"assets/img/details2.png\">";
                        }
                        
                        echo"<span>Ver más</span>
                        </button>
                    </form>
                </div>  
                </div>
                

                <div class=\"container-lower-info\">
                    <div class=\"product-title-class\">
                        <span class=\"product-title\">$resultado[nombre]</span>
                        <span class=\"product-class\">$resultado[plataforma]</span>
                    </div>
                </div>              
            </article>";
    }
}

?>