<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class EnsureCookiesAccepted
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next)
  {
    if (in_array($request->method(), ['POST', 'PUT', 'PATCH', 'DELETE'])) {

      if (!$request->cookies->has('cookies_accepted')) {

        // Si es Inertia (navegador SPA)
        if ($request->header('X-Inertia')) {
          return Inertia::render('Errors/Cookies', [
            'message' => 'Debes aceptar las cookies antes de continuar.'
          ])->toResponse($request)->setStatusCode(403);
        }

        // Si es API (Axios, fetch, etc.)
        if ($request->expectsJson()) {
          return response()->json([
            'message' => 'Debes aceptar las cookies antes de continuar.'
          ], 403);
        }

        // Cualquier otro caso (redirect clásico)
        return redirect()->route('cookies.notice');
      }
    }

    return $next($request);
  }
}
