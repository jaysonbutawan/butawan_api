<?php

use App\Http\Middleware\AuthMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

           $middleware->alias([
            'api.auth' => AuthMiddleware::class,
        ]);
    })
    ->withExceptions(function ($exceptions) {
    })->create();
