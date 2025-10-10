<?php

use App\Http\Middleware\EnsureCookiesAccepted;
use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))->withRouting(
  web: [
    __DIR__ . '/../routes/auth.php',
    __DIR__ . '/../routes/web.php',
    __DIR__ . '/../routes/legal.php',
    __DIR__ . '/../routes/socialite.php',
    __DIR__ . '/../routes/settings.php',
    __DIR__ . '/../routes/trading.php',
  ],
  api: __DIR__ . '/../routes/api.php',
  commands: __DIR__ . '/../routes/console.php',
  health: '/up',
  apiPrefix: '/api/v1',
)->withMiddleware(function (Middleware $middleware) {
  $middleware->alias([]);

  $middleware->alias([
    'auth' => \App\Http\Middleware\Authenticate::class,
    'firstLogin' => \App\Http\Middleware\CheckFirstLogin::class
  ]);

  // Se aplica global para todo:
  $middleware->append([
    // EnsureCookiesAccepted::class,
  ]);

  // Solo se aplica para el grupo web:
  $middleware->web(append: [
    HandleInertiaRequests::class,
    RedirectIfAuthenticated::class,
  ]);

  // Solo se aplica para API:
  // $middleware->api(append: [
  //   EnsureCookiesAccepted::class,
  // ]);

  // Solo se aplica a auth (protegidas por Sanctum/Guard):
  // $middleware->group('auth', [
  //   EnsureCookiesAccepted::class,
  // ]);

})->withExceptions(function (Exceptions $exceptions) {
  //
})->create();
