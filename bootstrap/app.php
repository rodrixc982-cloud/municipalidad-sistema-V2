<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Laravel 11 ya registra 'auth' y 'guest' como alias por defecto.
        // Si necesitas alias adicionales, agrégalos aquí, por ejemplo:
        // $middleware->alias([
        //     'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
