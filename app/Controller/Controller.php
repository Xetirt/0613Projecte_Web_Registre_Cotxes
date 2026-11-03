<?php

namespace App\Controller;

class Controller {
    protected function view($viewName, $data = []) {
    extract($data);
    
    // Añadir 'app/' antes de 'Views/' y permitir puntos para subcarpetas (ej: 'pages.home')
    $viewPath = __DIR__ . '/../Views/' . str_replace('.', '/', $viewName) . '.view.php';

    if (file_exists($viewPath)) {
        require_once $viewPath;
    } else {
        die("La vista [{$viewName}] no existe en la ruta: {$viewPath}");
    }
}
}