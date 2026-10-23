<?php
namespace App\Core;

use App\Core\Request;
use App\Controller\HomeController;

class Router{
    private array $routes=[];
    protected Request $req;

    function __construct(){
        $this->routes=require __DIR__.'/../Config/routes.php';
        $this->req=new Request();
        try{
        $this->dispatch();
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
    private function dispatch() {
    $uri = $this->req->getUri();
    $method = $this->req->getMethod();

    foreach ($this->routes as $route) {
        // Si coinciden la ruta y el método HTTP
        if ($route['path'] === $uri && $route['method'] === $method) {
            $this->execute($route);
            return; // Salimos de la función una vez ejecutada
        }
    }

    // Si termina el bucle y no se ha ejecutado ninguna ruta, lanzamos el error
    throw new \RuntimeException("No route found for URI: {$uri} with method {$method}");
}
    private function execute(array $route){
        $array_handler=$route['handler'];
        
        $controller= new $array_handler[0];
        //dd($controller);
        $method = $array_handler[1];
        //dd($method);
        if(!method_exists($controller,$method)){
            throw new \RunTimeException("Function $method is not called");
        }
        call_user_func_array([$controller, $method], $this->getRequest()->get());
    }

    function getRequest(){
        return $this->req;
    }

}