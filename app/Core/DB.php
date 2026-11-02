<?php

namespace App\Core;

class DB {
    private static ?\PDO $connection = null;

    public static function getConnection() {
        if (self::$connection === null) {
            // Ajusta los datos según tu entorno (config.php o variables de entorno)
            $host = '127.0.0.1';
            $dbname = 'nom_de_la_teva_bd'; // Cambia por tu base de datos
            $username = 'root';
            $password = '';

            try {
                self::$connection = new \PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                ]);
            } catch (\PDOException $e) {
                die("Error de conexión a la Base de Datos: " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}