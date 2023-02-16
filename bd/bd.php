<?php
    class conectar{
        public static function conexion()
        {
            $con = new mysqli("localhost","root","","videojuegos");
            $con->set_charset("utf8");
            return $con;
        }
    }
?>