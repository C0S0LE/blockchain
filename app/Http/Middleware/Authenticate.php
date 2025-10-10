<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Authenticate extends Middleware
{
  /**
   * Get the path the user should be redirected to when they are not authenticated.
   */
  protected function redirectTo(Request $request): ?string
  {
    // Si la request espera JSON (ej: API o Axios), no redirige.
    if ($request->expectsJson()) {
      // Log::info('TEST 1: ', $request->all());
      return null;
    }

    // Log::info('TEST 2: ', $request->all());
    // Aquí defines la ruta personalizada para login
    return route('sign-in');
  }
}
