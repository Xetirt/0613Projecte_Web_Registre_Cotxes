<?php

namespace App\Controller;

abstract class Controller {
    protected function view(string $viewName, array $data = []) {
        // Extrae las claves del array como variables ($title, $user, etc.)
        extract($data);

        $path = str_replace('.', '/', $viewName);
        $viewPath = __DIR__ . '/../Views/' . $path . '.view.php';

        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            die("La vista [{$viewName}] no existe en la ruta: {$viewPath}");
        }
    }
}