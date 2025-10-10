<?php

namespace App\Http\Controllers\Views\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class AuthController extends Controller
{
  /**
   * Display the login view.
   */
  public function login(LoginRequest $request)
  {
    $request->authenticate();
    $request->session()->regenerate();

    /* if (!$user->email_verified_at) {
      Mail::to($user->email)->send(new VerifyAccountMail($user->otp, $user->email));
      return redirect()->route('email.verify', $user->email);
    } */

    /** @var \App\Models\User $user */
    $user = Auth::user();

    $user->load([
      'wallet',
      'wallet.transactions' => function ($query) {
        $query->latest()->limit(10);
      }
    ]);

    // Log::info('USER LOGGED IN: ', [
    //   'id' => $user->id,
    //   'uid' => $user->uid,
    //   'username' => $user->username,
    //   'email' => $user->email,
    //   'wallet' => $user->wallet?->balance,
    //   'recent_transactions' => $user->wallet?->transactions->toArray()
    // ]);

    /* if ($user->language && $user->language->locale) {
      App::setLocale($user->language->locale);
      Session::put('locale', $user->language->locale);
    } */

    // return redirect()->intended(route('panel.dashboard'));
    // return redirect()
    // ->route('panel.dashboard')
    // ->withHeaders(['X-Inertia' => 'false']);
    
    return Inertia::location(route('panel.dashboard'));
  }

  /**
   * Handle an incoming authentication request.
   */
  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('sign-in');
  }

  /**
   * Destroy an authenticated session.
   */
  public function destroy(Request $request)
  {
    Auth::guard('web')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('sign-in');
  }
}
