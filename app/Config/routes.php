<?php

use App\Controller\HomeController;

return [
    '/' => 'HomeController@index',
    
    // Autenticació
    '/login' => 'AuthController@showLogin',
    '/login/process' => 'AuthController@login',
    '/register' => 'AuthController@showRegister',
    '/register/process' => 'AuthController@register',
    '/logout' => 'AuthController@logout',

    // CRUD Cotxes
    '/cars' => 'CarController@index',
    '/cars/show' => 'CarController@show',
    '/cars/create' => 'CarController@create',
    '/cars/store' => 'CarController@store',
    '/cars/edit' => 'CarController@edit',
    '/cars/update' => 'CarController@update',
    '/cars/delete' => 'CarController@delete',

    '/comments/store' => 'CommentController@store',
];