<?php

use App\Controller\HomeController;
use App\Controller\CarController;
use App\Controller\AuthController;
use App\Controller\CommentController;

return [
    // --- Pantalla Principal (Muestra el Listado de Coches directamente) ---
    [
        'path' => '/',
        'method' => 'GET',
        'handler' => [CarController::class, 'index']
    ],
    [
        'path' => '/about',
        'method' => 'GET',
        'handler' => [HomeController::class, 'about']
    ],
    [
        'path' => '/contact',
        'method' => 'GET',
        'handler' => [HomeController::class, 'contact']
    ],

    // --- Módulo de Vehículos (Cars) ---
    [
        'path' => '/cars',
        'method' => 'GET',
        'handler' => [CarController::class, 'index']
    ],
    [
        'path' => '/cars/create',
        'method' => 'GET',
        'handler' => [CarController::class, 'create']
    ],
    [
        'path' => '/cars/store',
        'method' => 'POST',
        'handler' => [CarController::class, 'store']
    ],
    [
        'path' => '/cars/show',
        'method' => 'GET',
        'handler' => [CarController::class, 'show']
    ],
    [
        'path' => '/cars/edit',
        'method' => 'GET',
        'handler' => [CarController::class, 'edit']
    ],
    [
        'path' => '/cars/update',
        'method' => 'POST',
        'handler' => [CarController::class, 'update']
    ],
    [
        'path' => '/cars/delete',
        'method' => 'POST',
        'handler' => [CarController::class, 'delete']
    ],

    // --- Módulo de Autenticación (Auth) ---
    [
        'path' => '/login',
        'method' => 'GET',
        'handler' => [AuthController::class, 'showLogin']
    ],
    [
        'path' => '/login',
        'method' => 'POST',
        'handler' => [AuthController::class, 'login']
    ],
    [
        'path' => '/register',
        'method' => 'GET',
        'handler' => [AuthController::class, 'showRegister']
    ],
    [
        'path' => '/register',
        'method' => 'POST',
        'handler' => [AuthController::class, 'register']
    ],
    [
        'path' => '/logout',
        'method' => 'GET',
        'handler' => [AuthController::class, 'logout']
    ],
    [
    'path' => '/cars/show',
    'method' => 'GET',
    'handler' => [CarController::class, 'show']
    ],
    [
    'path' => '/comments/store',
    'method' => 'POST',
    'handler' => [CommentController::class, 'store']
    ]
];