<?php
    class plataforma{
        private $id;
        private $nombre;
        private $activo;
        private $logo;

        public function __construct()
        {
            $this->id = null;
            $this->nombre = "";
            $this->logo = "";
            $this->activo = false;
        }

        public function nueva_plataforma($nombre,$activo,$logo)
        {
            require_once "../bd/bd.php";
            $con = conectar::conexion();
    
            $se = "insert into plataformas values(null,?,?,?)";
            $consulta = $con->prepare($se);
            $consulta->bind_param("sis",$nombre,$activo,$logo);
            $consulta->execute();
            $consulta->close();
            $con->close();
        }

        public function modificar_plataforma($id,$nombre,$activo,$logo)
        {
            require_once "../bd/bd.php";
            $con = conectar::conexion();
    
            $se = "update plataformas set nombre = ?, activo = ?, logo = ? where id = ?";
            $consulta = $con->prepare($se);
            $consulta->bind_param("sisi",$nombre,$activo,$logo,$id);
            $consulta->execute();
            $consulta->close();
            $con->close();
        }

        public static function tiene_juegos($plataforma, $index)
        {
            if($index == "yes")
            {
                require_once "bd/bd.php";
            }else{
                require_once "../bd/bd.php";
            }


            $con = conectar::conexion();

            $se = "SELECT count(*) from juegos where plataforma = (SELECT id from plataformas where nombre = '$plataforma')";
            $consulta = $con->prepare($se);
            $consulta->bind_result($numero);
            $consulta->execute();
            $consulta->fetch();
            $consulta->close();
            $con->close();

            if($numero > 0)
            {
                return true;
            }else{
                return false;
            }

        }

        public static function imprimir_plats($admin)
        {
            require_once "../bd/bd.php";
            $con = conectar::conexion();


            if($admin == "yes")
            {
                $se = "select * from plataformas";
            }else{
                $se = "select * from plataformas where activo = 1";
            }

            $consulta = $con->query($se);

            $matriz = [];
            $i = 0;
            while($fila = $consulta->fetch_array(MYSQLI_ASSOC))
            {
                $matriz[$i]["id"] = $fila["id"];
                $matriz[$i]["nombre"] = $fila["nombre"];
                $matriz[$i]["activo"] = $fila["activo"];
                $matriz[$i]["logo"] = $fila["logo"];
                
                $i++;
            }
            return $matriz;
        }

        public function buscar_plataformas($termino)
        {
            require_once "../bd/bd.php";
            $con = conectar::conexion();
    
            $se ="select * from plataformas where nombre like ?";
    
            $term = trim(strtolower($termino));
            $term = "%$term%";
    
            $matriz = [];
            $i = 0;
            $consulta = $con->prepare($se);
            $consulta->bind_param("s", $term);
            $consulta->bind_result($id,$nombre,$activo,$logo);
            $consulta->execute();
            while($consulta->fetch())
            {   

                $matriz[$i]["id"] = $id;
                $matriz[$i]["nombre"] = $nombre;
                $matriz[$i]["activo"] = $activo;
                $matriz[$i]["logo"] = $logo;
                $i++;
            }
    
            return $matriz;
    
        }

        public function print_plataforma($plat, $break1, $break2, $break3, $index)
    {
        echo"<article class=\"product $break1 $break2 $break3 d-flex flex-column align-items-center justify-content-end\" data-id=\"$plat[id]\">
                        <div class=\"product-img-container\">
                            <img class=\"modal-trigger\" src=\"$plat[logo]\">";
                            if($plat["activo"] == 0)
                            {
                                echo"<span class=\"inactivo\">inactivo</span>";
                            }
                            echo"<div class=\"details_container plats\">
                            <form method=\"get\" class=\"details_form\" action=\"../controladores/detalles_plataforma.php\">
                                <input type=\"hidden\" name=\"nombre\" value=\"$plat[nombre]\">
                                <input type=\"hidden\" name=\"id\" value=\"$plat[id]\">
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
                                <span class=\"product-title\">$plat[nombre]</span>
                            </div>
                        </div>              
                    </article>";
    }

    

    }

?>