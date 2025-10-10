<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('wrc/settings')->group(function () {

  // Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
  // Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  // Route::get('password', [PasswordController::class, 'edit'])->name('password.edit');
  // Route::put('password', [PasswordController::class, 'update'])->name('password.update');


  // Route::get('/', 'index')->name('index');
  // Route::get('/create', 'create')->name('create');
  // Route::post('/', 'store')->name('store');
  // Route::get('/{id}', 'show')->name('show');
  // Route::get('/{id}/edit', 'edit')->name('edit');
  // Route::put('/{id}', 'update')->name('update');
  // Route::delete('/{id}', 'destroy')->name('destroy');
});