<?php

namespace App\Controller;

class Controller {
    protected function view($viewName, $data = []) {
        // Extraer los datos para que estén disponibles como variables en la vista
        extract($data);

        // Convertir puntos o barras (ej: 'cars.index' o 'cars/index') en la ruta del archivo
        $viewPath = __DIR__ . '/../Views/' . str_replace('.', '/', $viewName) . '.view.php';

        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            throw new \Exception("La vista [{$viewName}] no existe en la ruta: {$viewPath}");
        }
    }
}