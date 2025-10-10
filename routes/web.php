<?php

use App\Http\Controllers\Views\Contact\ContactController;
use App\Http\Controllers\Views\Panel\PanelController;
use App\Http\Controllers\Views\Profile\ProfileController;
use App\Http\Controllers\Views\Public\PublicViewController;
use App\Http\Controllers\Views\Subscription\SubscriptionController;
use App\Http\Controllers\Views\Wallet\Crypto\CryptoController;
use App\Http\Controllers\Views\WelcomeModalController;
use Illuminate\Support\Facades\Route;



Route::redirect('/', 'welcome');
Route::get('/welcome', [PublicViewController::class, 'welcome'])->name('welcome');

// ==================== ROOT REDIRECCIÓN ==================== //
Route::middleware(['guest'])->group(function () {
  // // Suscripciones
  Route::prefix('subscription')->group(function () {
    Route::post('contact-send', [ContactController::class, 'send']);
    Route::post('subscribe', [SubscriptionController::class, 'send']);
    Route::post('unsubscribe', [SubscriptionController::class, 'send']);
  });

  // // Planes
  Route::prefix('plan')->group(function () {
    Route::get('{planId}', [SubscriptionController::class, 'showPlan'])->name('plan');
    Route::post('{planId}', [SubscriptionController::class, 'subscribeToPlan']);
    Route::post('{planId}/cancel', [SubscriptionController::class, 'cancelSubscription']);
    Route::post('{planId}/resume', [SubscriptionController::class, 'resumeSubscription']);
  });
});

Route::middleware(['auth', 'firstLogin', /* 'verified' */])->prefix('wrc')->group(function () {
  Route::get('user/greeting', [WelcomeModalController::class, 'welcomeModal'])->name('user.welcomeModal');
  Route::post('user/disable-welcome', [WelcomeModalController::class, 'disableWelcomeModal'])->name('user.disableWelcome');

  Route::redirect('/', 'panel.dashboard');
  Route::get('dashboard', [PanelController::class, 'dashboard'])->name('panel.dashboard');
  Route::get('analytics', [PanelController::class, 'analytics'])->name('panel.analytics');

  Route::prefix( 'wallet')->name('wallet.')->group(function () {
    Route::get('details', [CryptoController::class, 'details'])->name('details');
    Route::get('crypto', [CryptoController::class, 'crypto'])->name('crypto');
    Route::get('swap', [CryptoController::class, 'swap'])->name('swap');
  });

  Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
    Route::redirect('/', 'profile/show');
    Route::get('/me', 'index')->name('show');
    Route::patch('/{hashid}', 'update')->name('update');
    Route::delete('/{hashid}', 'destroy')->name('destroy');
  });
});