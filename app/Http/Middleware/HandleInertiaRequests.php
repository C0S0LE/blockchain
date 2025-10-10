<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;
use Tighten\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
  protected $rootView = 'app';

  public function version(Request $request): string|null
  {
    return parent::version($request);
  }

  public function share(Request $request): array
  {
    return array_merge(parent::share($request), [
      'ziggy' => fn() => array_merge((new Ziggy)->toArray(), [
        'location' => $request->url(),
      ]),

      'auth' => [
        'user' => optional(Auth::user())->loadMissing([
          'wallet',
          'wallet.transactions' => fn($q) => $q->latest()->limit(10),
        ]),
      ],

      'routeName' => $request->route()?->getName(),
      'locale' => app()->getLocale(),
      'csrf' => csrf_token(),
      'assetsPath' => '/storage',
      'baseUrl' => url('/'),

      'flash' => [
        'success' => fn() => $request->session()->get('success'),
        'error' => fn() => $request->session()->get('error'),
        'status' => fn() => $request->session()->get('status'), // 👈 aquí
      ],

      'translations' => function () {
        $langPath = resource_path('lang/' . app()->getLocale());
        $translations = [];

        if (is_dir($langPath)) {
          foreach (glob($langPath . '/*.json') as $file) {
            $data = json_decode(file_get_contents($file), true);
            if ($data) {
              $translations = array_merge($translations, $data);
            }
          }
        }

        return $translations;
      },

      // 'showWelcomeModal' => $request->user() && $request->user()->first_login,
    ]);
  }
}
