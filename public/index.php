<?php

require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/bootstrap.php';

use App\Core\Router;

// Instanciar el enrutador correctamente
$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Si utilizas una función global o el router orientado a objetos, 
// asegúrate de capturar los valores de forma segura:
$routeData = router($uri); 
$controller = $routeData[0] ?? 'home';
$action = $routeData[1] ?? 'index';
$id = $routeData[2] ?? null;

$routes = ['home', 'contact', 'about'];

if (in_array($controller, $routes)) {
    // Espacio corregido entre require y __DIR__
    require __DIR__ . '/../app/controllers/' . $controller . '.php';
} else {
    http_response_code(404);
    echo "404 - Página no encontrada";
}