<?php

use App\Http\Controllers\Views\Public\PublicViewController;
use Illuminate\Support\Facades\Route;

Route::prefix('legal')->name( 'legal.')->group(function () {
  Route::get('terms', [PublicViewController::class, 'terms'])->name('terms');
  Route::get('terms-of-use', [PublicViewController::class, 'termsOfUse'])->name('terms-of-use');
  Route::get('privacy-policy', [PublicViewController::class, 'policy'])->name('policy');
  Route::get('politica-cookies', [PublicViewController::class, 'cookies'])->name('cookies');
  Route::get('cookies-notice', [PublicViewController::class, 'notice'])->name('notice');
});