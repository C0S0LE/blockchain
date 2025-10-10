<?php

namespace App\Http\Controllers\Views\Wallet\Crypto;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class CryptoController extends Controller
{

  public function details () {
    return Inertia::render('Wallet/Details');
  }

  public function crypto () {
    return Inertia::render('Wallet/Crypto/Index');
  }
}
