<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Middlewares globales...
    ];

    protected $middlewareGroups = [
        'web' => [
            // Middlewares de sesión, cookies, etc.
        ],

        'api' => [
            // Middlewares de autenticación API, throttle, etc.
        ],
    ];

    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'superadmin' => \App\Http\Middleware\SuperAdminMiddleware::class,
        // Otros middlewares de ruta...
    ];
}
