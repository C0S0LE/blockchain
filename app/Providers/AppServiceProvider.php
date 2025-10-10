<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Tighten\Ziggy\Ziggy;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    // Inertia::share([
    //   'ziggy' => fn() => (new Ziggy)->toArray(),
    //   'routeName' => Route::currentRouteName(),
    //   'locale' => app()->getLocale(),
    //   'csrf' => csrf_token(),
    //   'assetsPath' => fn() => '/storage',
    //   'baseUrl' => url('/'),
    //   'translations' => function () {
    //     $langPath = resource_path('lang/' . app()->getLocale());
    //     $translations = [];
    //     if (is_dir($langPath)) {
    //       foreach (glob($langPath . '/*.json') as $file) {
    //         $data = json_decode(file_get_contents($file), true);
    //         if ($data) $translations = array_merge($translations, $data);
    //       }
    //     }
    //     return $translations;
    //   },
    // ]);
  }
}
