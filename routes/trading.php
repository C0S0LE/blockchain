<?php

use App\Http\Controllers\Trading\TradingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('wrc/trading')->name('trading.')->group(function () {
  Route::post('transfer', [TradingController::class, 'transfer'])->name('transfer');
});