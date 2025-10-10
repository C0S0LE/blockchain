<?php

namespace App\Http\Controllers\Views\Wallet\Swap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SwapController extends Controller
{
  public function swap () {
    return Inertia::render('Wallet/Swap/index');
  }
}
