<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class WelcomeModalController extends Controller
{
  public function welcomeModal()
  {
    $user = Auth::user();
    return Inertia::render('GreetingModal', [
      'showWelcomeModal' => $user->first_login,
    ]);
  }

  public function disableWelcomeModal()
  {
    /** @var \App\Models\User $user */
    $user = Auth::user();

    if ($user) {
      $user->first_login = false;
      $user->save();
    }

    return back();
  }
}
