<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

  /**
   * The path to your application's "home" route.
   *
   * @var string
   */
  public const HOME = '/wrc/dashboard';

  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    //
  }
}
