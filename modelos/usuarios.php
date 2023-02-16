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
            echo"<article class=\"usuario d-flex flex-wrap justify-content-between\">
                        <div>
                            <span class=\"me-5\">Nombre: $array[nombre]</span>
                            <span>Nick: $array[nick]</span>
                        </div>

                        <div class=\"d-flex\">";
                        echo"<form action=\"../controladores/activacion_usu.php\" method=\"get\" class=\"d-flex me-2\">";
                                    echo"<input type=\"hidden\" name=\"id\" value=\"$array[id]\">";
                                    if($array["activo"] == 1)
                                    {
                                        echo"<button type=\"submit\" name=\"activacion\" class=\"activo noabsolute\" value=\"0\">Uusario activo. Pulsa para desactivar</button>";
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
    }

    
?>