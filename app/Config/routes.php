<?php

use App\Controller\HomeController;
use App\Controller\CarController;
use App\Controller\AuthController;
use App\Controller\ComentController;

return [
    // --- Páginas Principales / Estáticas ---
    [
        'path' => '/',
        'method' => 'GET',
        'handler' => [HomeController::class, 'index']
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
        'handler' => [CarController::class, 'destroy']
    ],

    // --- Módulo de Autenticación (Auth) ---
    [
        'path' => '/login',
        'method' => 'GET',
        'handler' => [AuthController::class, 'login']
    ],
    [
        'path' => '/login',
        'method' => 'POST',
        'handler' => [AuthController::class, 'authenticate']
    ],
    [
        'path' => '/register',
        'method' => 'GET',
        'handler' => [AuthController::class, 'register']
    ],
    [
        'path' => '/register',
        'method' => 'POST',
        'handler' => [AuthController::class, 'store']
    ],
    [
        'path' => '/logout',
        'method' => 'GET',
        'handler' => [AuthController::class, 'logout']
    ]
];