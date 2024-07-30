<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Otros middlewares...

    protected $routeMiddleware = [
        // Otros middlewares
        'role' => \App\Http\Middleware\CheckRole::class,
    ];
}
