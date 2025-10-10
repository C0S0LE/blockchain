<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class CheckFirstLogin
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    // if ($request->user()) {
    //   Inertia::share('showWelcomeModal', $request->user()->first_login);
    // }

    $user = Auth::user();

    if ($user && $user->first_login) {
      if ($request->route()->getName() !== 'user.welcomeModal') {
        return redirect()->route('user.welcomeModal');
      }
    }

    return $next($request);
  }
}
