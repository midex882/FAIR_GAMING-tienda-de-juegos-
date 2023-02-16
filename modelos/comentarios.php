<?php
    class comentario{
        private $usuario;
        private $juego;
        private $comentario;
        private $fecha;


        public function __construct()
        {
            $this->usuario = "";
            $this->juego = "";
            $this->comentario = "";
            $this->fecha = "";
        }

        public static function get_n_comentarios($n = 0,$index, $juego)
        {
            if($index == "yes")
            {
                require_once "bd/bd.php";
            }else{
                require_once "../bd/bd.php";
            }
            $con = conectar::conexion();
            $coms = null;
            if(is_null($juego))
            {
                if($n > 0)
                {
                    $se = "SELECT j.nombre juego,j.id jid, j.caratula, u.nick usuario, c.comentario, c.fecha fech from juegos j, usuarios u, comentarios c 
                    where j.id = c.juego and u.id = c.usuario and j.activo = 1 order by c.fecha DESC limit $n";
                }else{
                    $se = "SELECT j.nombre juego,j.id jid, j.caratula, u.nick usuario, c.comentario, c.fecha fech from juegos j, usuarios u, comentarios c 
                    where j.id = c.juego and u.id = c.usuario and j.activo = 1 order by c.fecha DESC";
                }

                $datos = $con->query($se);

                $i = 0;
                while($fila = $datos->fetch_array(MYSQLI_ASSOC))
                {
                    if($index == "yes")
                    {
                        require_once "PHP/funciones.php";
                    }else{
                        require_once "../PHP/funciones.php";
                    }
                    
                    $fech = fecha_bd_esp($fila["fech"]);

                    $coms[$i]["usuario"] = $fila["usuario"];
                    $coms[$i]["juego"] = $fila["juego"];
                    $coms[$i]["jid"] = $fila["jid"];
                    $coms[$i]["comentario"] = $fila["comentario"];
                    $coms[$i]["fech"] = $fech;
                    $coms[$i]["truedate"] = $fila["fech"];
                    $coms[$i]["caratula"] = $fila["caratula"];
                    $i++;
                }
            }else{
                $se = "SELECT count(*) from comentarios where juego = $juego";
                $consulta = $con->prepare($se);
                $consulta->bind_result($numero);
                $consulta->execute();
                $consulta->fetch();
                $consulta->close();

                if($numero> 0)
                {
                    if($n > 0)
                    {
                        $se = "SELECT j.nombre juego,j.id jid, j.caratula, u.nick usuario, c.comentario, c.fecha fech  from juegos j, usuarios u, comentarios c 
                        where j.id = c.juego and u.id = c.usuario and j.id = $juego and j.activo = 1 order by c.fecha DESC limit $n";
                    }else{
                        $se = "SELECT j.nombre juego,j.id jid, j.caratula, u.nick usuario, c.comentario, c.fecha fech from juegos j, usuarios u, comentarios c 
                        where j.id = c.juego and u.id = c.usuario and j.id = $juego and j.activo = 1 order by c.fecha DESC";
                    }

                    $datos = $con->query($se);

                    $i = 0;
                    while($fila = $datos->fetch_array(MYSQLI_ASSOC))
                    {
                        require_once "../php/funciones.php";
                        $fech = fecha_bd_esp($fila["fech"]);

                        $coms[$i]["usuario"] = $fila["usuario"];
                        $coms[$i]["juego"] = $fila["juego"];
                        $coms[$i]["jid"] = $fila["jid"];
                        $coms[$i]["comentario"] = $fila["comentario"];
                        $coms[$i]["fech"] = $fech;
                        $coms[$i]["truedate"] = $fila["fech"];
                        $coms[$i]["caratula"] = $fila["caratula"];
                        $i++;
                    }
                }

            }

            

            $con->close();
            return $coms;
        }

        public function nuevo_comentario($user,$juego,$comentario,$fecha){
            require_once "../bd/bd.php";
            $con = conectar::conexion();

            $se = "insert into comentarios values(?,?,?,?)";
            $consulta = $con->prepare($se);
            $consulta->bind_param("iiss", $user, $juego, $comentario,$fecha);
            $consulta->execute();
            $consulta->close();
            $con->close();
        }



        public function print_comentario($com)
        {
            echo"<article class=\"com col col-12 col-md-4 col-lg-3\">
            <img src=\"$com[caratula]\" class=\"d-block w-100 imagen-comentario img-top\" alt=\"...\">
                <div>
                    <h4 class=\"nick-usu-comentario\">$com[usuario]</h4>
                    <p class\"contenido-comentario\">$com[comentario]</p>
                    <p class=\"fecha-comentario\">$com[fech]</p>
                </div>
                <form method=\"post\" action=\"../controladores/seccion_comentarios.php\">
                    <input type=\"hidden\" name=\"juego\" value=\"$com[jid]\"/>
                    <input type=\"hidden\" name=\"usuario\" value=\"$com[usuario]\"/>
                    <button class=\"borrar\" type=\"submit\" name=\"delete\" value=\"$com[truedate]\">Eliminar</button>
                </form>   
            </article>";
        }
    }


?>