<?php

function dd(){
    foreach(func_get_args() as $arg){
        echo '<pre>';
        var_dump($arg);
        echo "</pre>";
    }
    die;
}

function view(string $view, array $data = []) {
    $template = __DIR__ . '/views/' . $view . '.view.php';
    if (!file_exists($template)) {
        throw new Exception("La vista '{$view}' no existe en la ruta: {$template}");
    }
    if (!empty($data)) {
        extract($data);
    }

    require_once $template;
}

function env(string $var){
    return filter_var($_ENV[$var]);
}