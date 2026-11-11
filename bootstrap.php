<?php

// 1. Cargar el autoloader de Composer al principio
require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Session;

// 2. Iniciar la sesión
Session::start();

// Carga sencilla del archivo .env si existe
if (file_exists(__DIR__ . '/.env')) {
    $lines = file(__DIR__ . '/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value, " '\"");
    }
}