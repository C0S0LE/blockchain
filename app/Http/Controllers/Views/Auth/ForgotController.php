<?php

namespace App\Http\Controllers\Views\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;

class ForgotController extends Controller
{
  public function showForgotPassword() {
    return Inertia::render('Auth/ForgotPassword', [
      'status' => session('status'),
    ]);
  }

  public function showResetPassword() {
    return Inertia::render('Auth/NewPassword', [
      'status' => session('status'),
    ]);
  }

  public function forgot(Request $request) {
    return redirect()->route('forgot-password')->with('status', 'We sent you a reset link!');
  }

  public function store() {
    return redirect()->route('password-reset')->with('status', 'Password change!');
  }
}
