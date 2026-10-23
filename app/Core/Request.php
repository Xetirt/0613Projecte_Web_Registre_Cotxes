<?php
namespace App\Core;

class Request{
    protected string $uri;
    protected string $method;

    function __construct(){
        $this->uri=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        $this->method=$_SERVER['REQUEST_METHOD'];
        }

    function getUri():string|null{
        return $this->uri;
    }

    function getMethod():string|null{
        return $this->method;
    }

    function get(){
        return $_GET??[];
    }

    function query(string $key):string|null{
        return filter_input(INPUT_GET,$key);
    }

    function post(string $key):string|null{
        return filter_input(INPUT_POST,$key);
    }

    
}