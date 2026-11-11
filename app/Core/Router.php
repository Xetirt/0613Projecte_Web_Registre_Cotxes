<?php

namespace App\Core;

class Router {
    protected array $routes = [];

    public function __construct() {
        $this->routes = require __DIR__ . '/../Config/routes.php';
    }

    public function dispatch(string $uri, string $method) {
        // Extrae solo la ruta limpia ignorando los parámetros GET (?id=1)
        $path = parse_url($uri, PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['path'] === $path && $route['method'] === strtoupper($method)) {
                [$controllerClass, $action] = $route['handler'];

                if (class_exists($controllerClass)) {
                    $controller = new $controllerClass();
                    if (method_exists($controller, $action)) {
                        return $controller->$action();
                    }
                }
            }
        }

        http_response_code(404);
        die("Ruta no encontrada: [{$method}] {$path}");
    }
}