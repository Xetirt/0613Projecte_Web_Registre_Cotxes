<?php

namespace App\Core;

use PDO;
use PDOException;

class DB {
    private static ?PDO $instance = null;

    public static function getInstance(): PDO {
        if (self::$instance === null) {
            try {
                $host = 'localhost'; // <--- Cambiado de 127.0.0.1 a localhost
                $db = 'registre_cotxes';
                $user = 'xavi';
                $pass = 'x';

                self::$instance = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $e) {
                die("Error de conexión a la Base de Datos: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}