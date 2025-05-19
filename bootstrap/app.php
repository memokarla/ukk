<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // ini untuk mengenalkan middleware dengan nama alias
        $middleware->alias([
            // 'CheckUserRoles' ini merupakan nama nya, jadi sebenarnya bebas, bisa sekadar Role, apapun
            'CheckUserRoles' => \App\Http\Middleware\CheckUserRoles::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
