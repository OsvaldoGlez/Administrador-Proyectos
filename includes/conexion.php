<?php

class Db {
    private static $conexion = NULL;
    private function __construct() {}

    public static function conectar() {
        $host     = "mysql: host=localhost; dbname=admin_proyectos";
        $user     = "root";
        $password = NULL;

        try {
            self::$conexion = new PDO($host, $user, $password);
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conexion->exec("set names utf8");
        }
        catch(conexionException $e) {
            echo "Conexión Fallida: ".$e->getMessage();
        }

        return self::$conexion;
    }
}