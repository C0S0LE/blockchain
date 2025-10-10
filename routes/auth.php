<?php

use App\Http\Controllers\Views\Auth\AuthController;
use App\Http\Controllers\Views\Auth\ForgotController;
use App\Http\Controllers\Views\Auth\LoginController;
use App\Http\Controllers\Views\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

// ==================== ROOT REDIRECCIÓN ==================== //
// Route::get('login', function () {
//   return Auth::check()
//     ? redirect()->route('panel.dashboard')
//     : Inertia::render('Auth/Login');
// })->name('login');
Route::get('login', function () {
  return Auth::check()
    ? redirect()->route('panel.dashboard')
    : redirect()->route('sign-in');
})->name('login');

Route::middleware(['guest'])->prefix('auth')->group(function () {
  Route::get('sign-in', [LoginController::class, 'showLoginForm'])->name('sign-in');
  Route::post('login', [AuthController::class, 'login'])->name('send-login');

  Route::get('sign-up', [RegisterController::class, 'showRegistrationForm'])->name('sign-up');
  Route::post('register', [RegisterController::class, 'register'])->name('send-register');

  Route::get('forgot-password', [ForgotController::class, 'showForgotPassword'])->name('forgot-password');
  Route::post('forgot-password', [ForgotController::class, 'forgot'])->name('send-forgot');

  Route::get('reset-password/{token}', [ForgotController::class, 'showResetPassword'])->name('reset-password');
  Route::post('reset-password', [ForgotController::class, 'store'])->name('send-password');
});

Route::middleware(['auth'])->prefix('auth')->group(function() {
  // Route::middleware('auth')->group(function () {
  //   Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
  //   Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
  //   Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');

  //   Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
  //   Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
  //   Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
  // });

  Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});