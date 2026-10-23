<?php

use App\Controller\HomeController;

return [
    [
        'path' => '/',
        'method' => 'GET',
        'handler' => [HomeController::class, 'index']
    ],
    [
        'path' => '/contact',
        'method' => 'GET',
        'handler' => [HomeController::class, 'contact']
    ]
];