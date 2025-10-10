<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{
  public function redirect()
  {
    return Socialite::driver('facebook')->redirect();
  }

  public function callback()
  {
    $facebookUser = Socialite::driver('facebook')->user();

    $user = User::firstOrCreate(
      ['email' => $facebookUser->getEmail()],
      [
        'name' => $facebookUser->getName(),
        'password' => Hash::make(Str::random(14)),
        'email_verified_at' => now(),
        'otp' => random_int(100000, 999999)
      ]
    );

    Auth::login($user);
    return redirect()->route('panel.dashboard');
  }
}
