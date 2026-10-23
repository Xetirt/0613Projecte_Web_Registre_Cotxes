<?php


function router (string $uri):array{
if($uri=='/'){
    $controller='home';
}else{


$url = explode('/', trim($uri));

$url_new=array_values(array_filter($url, function($v){
    return $v != "";
}));
$controller= $url_new[0]??'';
$action= $url_new[1]??'';
$id=$url_new[2]??null;

}
    return $controller;
}