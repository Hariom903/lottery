<?php

use App\Http\Middleware\AuthUser;
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
        //
        // Your custom middleware here...

         $middleware->alias([
        'Authuser' => AuthUser::class,
    ]);


    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
