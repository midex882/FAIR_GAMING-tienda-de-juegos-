<?php
    class usuario{

        private $id;
        private $nombre;
        private $nick;
        private $pass;
        private $activo;

        public function __construct()
        {

            $this->id = null;
            $this->nombre= "";
            $this->nick= "";
            $this->pass= "";
            $this->activo = 0;
        }

        public function nuevo_usuario($nombre,$nick,$pass,$activo)
        {
            require_once "../bd/bd.php";
            $con = conectar::conexion();
    
            $se = "insert into usuarios values(null,?,?,?,?)";
            $consulta = $con->prepare($se);
            $consulta->bind_param("sssi",$nombre,$nick,$pass,$activo);
            $consulta->execute();
            $consulta->close();
            $con->close();
        }

        public function modificar_usuario($id,$nombre,$nick,$pass,$activo)
        {
            require_once "../bd/bd.php";
            $con = conectar::conexion();
            
            if($pass == "")
            {   
                $se = "update usuarios set nombre = ?, nick = ?, activo = ? where id = ?";
                $consulta = $con->prepare($se);
                $consulta->bind_param("ssii",$nombre,$nick,$activo,$id);
            }else{
                $se = "update usuarios set nombre = ?, nick = ?, pass = ?, activo = ? where id = ?";
                $consulta = $con->prepare($se);
                $consulta->bind_param("sssii",$nombre,$nick,$pass,$activo,$id);
            }
            

            $consulta->execute();
            $consulta->close();
            $con->close();
        }

        public function get_usuarios($admin)
        {
            require_once "../bd/bd.php";
            $con = conectar::conexion();

            if($admin = "yes")
            {
                $se = "select id, nombre, nick, activo from usuarios where id > 0";
            }else{
                $se = "select id, nombre, nick, activo from usuarios where id > 0 and activo = 1";
            }

            $consulta = $con->query($se);
            $matriz = $consulta->fetch_all(MYSQLI_ASSOC);

            return $matriz;
            
        }

        public function print_usuario($array)
        {
            echo"<article class=\"usuario d-flex flex-wrap justify-content-between align-items-center\">
                        <div>
                            <span class=\"me-5\">Nombre: $array[nombre]</span>
                            <span>Nick: $array[nick]</span>
                        </div>

                        <div class=\"d-flex\">";
                        echo"<form action=\"../controladores/activacion_usu.php\" method=\"get\" class=\"d-flex me-2\">";
                                    echo"<input type=\"hidden\" name=\"id\" value=\"$array[id]\">";
                                    if($array["activo"] == 1)
                                    {
                                        echo"<button type=\"submit\" name=\"activacion\" class=\"activo noabsolute\" value=\"0\">Usario activo. Pulsa para desactivar</button>";
                                    }else{
                                        echo"<button type=\"submit\" name=\"activacion\" class=\"inactivo noabsolute\" value=\"1\">Usuario inactivo. Pulsa para activar</button>";
                                    }
                                    
                                echo"</form>";

                                echo"<form action=\"../controladores/modificar_usuario.php\" method=\"get\">";
                                    echo"<button type=\"submit\" name=\"ir_a_modificar\" class=\"activar\" value=\"$array[id]\">Modificar</button>";
                            echo"</form>";
                        echo"</div>
                    
                    </article>";
        }

        public function buscar_usuarios($termino)
        {
            require_once "../bd/bd.php";
            $con = conectar::conexion();
    
            $se ="select * from usuarios where nombre like ?";
    
            $term = trim(strtolower($termino));
            $term = "%$term%";
    
            $matriz = [];
            $i = 0;
            $consulta = $con->prepare($se);
            $consulta->bind_param("s", $term);
            $consulta->bind_result($id,$nombre,$nick,$pass,$activo);
            $consulta->execute();
            while($consulta->fetch())
            {   

                $matriz[$i]["id"] = $id;
                $matriz[$i]["nombre"] = $nombre;
                $matriz[$i]["nick"] = $nick;
                $matriz[$i]["activo"] = $activo;
                $matriz[$i]["pass"] = $pass;
                $i++;
            }
    
            return $matriz;
    
        }
        public function user_exists($nick)
        {
            require_once "../bd/bd.php";
            $con = conectar::conexion();

            $se = "select count(*) from usuarios where nick = ?";
            $consulta = $con->prepare($se);
            $consulta->bind_param("s",$nick);
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
    }

    
?>