<?php

use App\Models\SocialProvider;
use App\Models\User;
use App\Models\UserSocialAccount;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;


// ----------------------
// REDIRECTS
// ----------------------
Route::get('/auth/github/redirect', function () {
  return Socialite::driver('github')
    ->with(['prompt' => 'login'])->redirect();
})->name('github');

Route::get('/auth/google/redirect', function () {
  return Socialite::driver('google')
    ->with(['prompt' => 'login'])->redirect();
})->name('google');

Route::get('/auth/facebook/redirect', function () {
  return Socialite::driver('facebook')
    ->with(['prompt' => 'login'])->redirect();
})->name('facebook');


// ----------------------
// CALLBACKS
// ----------------------

Route::get('/auth/github/callback', function () {
  // $socialUser = Socialite::driver('github')->stateless()->user();
  $socialUser = Socialite::driver('github')->user();
  Log::info('Socialite user:', (array) $socialUser);

  $provider = SocialProvider::firstOrCreate(['name' => 'github']);
  Log::info('Provider:', ['id' => $provider->id, 'name' => $provider->name]);

  // Buscar usuario por email
  $user = User::where('email', $socialUser->email)->first();
  if (!$user) {
    return redirect()->route('sign-in')->with([
        'status' => 'Esta cuenta de GITHUB no está vinculada a ningún usuario.'
    ]);
  }

  // Crear o actualizar social account
  $userSocial = UserSocialAccount::updateOrCreate(
    [
      'provider_id' => $provider->id,
      'user_id' => $user->id
    ],
    [
      'provider_user_id' => $socialUser->id,
      'access_token' => $socialUser->token,
      'refresh_token' => $socialUser->refreshToken,
      'token_expires_at' => $socialUser->expiresIn ? now()->addSeconds($socialUser->expiresIn) : null,
    ]
  );

  auth()->login($user);

  return redirect()->route('panel.dashboard');
});

Route::get('/auth/google/callback', function () {
  Log::info('--- Google callback START ---');

  $socialUser = Socialite::driver('google')->user();
  Log::info('Socialite user:', (array) $socialUser);

  $provider = SocialProvider::firstOrCreate(['name' => 'google']);
  Log::info('Provider:', ['id' => $provider->id, 'name' => $provider->name]);

  $userSocial = UserSocialAccount::where('provider_id', $provider->id)->where('provider_user_id', $socialUser->id)->first();

  // Buscar usuario por email
  Log::info('Buscando usuario con email exacto', ['email' => $socialUser->email]);
  $user = User::where('email', $socialUser->email)->first();
  Log::info('Resultado búsqueda:', [$user]);

  
  if (!$user) {
    return redirect()->route('sign-in')->with([
        'status' => 'Esta cuenta de GOOGLE no está vinculada a ningún usuario.'
    ]);
  }

  Log::info('Usuario encontrado:', ['id' => $user->id, 'email' => $user->email]);

  // Crear o actualizar social account
  $userSocial = UserSocialAccount::updateOrCreate(
    [
      'provider_id' => $provider->id,
      'user_id' => $user->id
    ],
    [
      'provider_user_id' => $socialUser->id,
      'access_token' => $socialUser->token,
      'refresh_token' => $socialUser->refreshToken,
      'token_expires_at' => $socialUser->expiresIn ? now()->addSeconds($socialUser->expiresIn) : null,
    ]
  );
  Log::info('UserSocialAccount actualizado/creado:', [
    'id' => $userSocial->id,
    'provider_user_id' => $userSocial->provider_user_id,
    'access_token' => $userSocial->access_token
  ]);

  auth()->login($user);
  Log::info('Intentando login con auth()->login', ['user_id' => $user->id]);

  if (auth()->check()) {
    Log::info('Login exitoso, sesión activa', ['user_id' => auth()->id()]);
  } else {
    Log::error('Login falló, sesión NO está activa', ['user_id' => $user->id]);
  }

  Log::info('--- Google callback END ---');

  return redirect()->route('panel.dashboard');
  
})->middleware(['web']);

Route::get('/auth/facebook/callback', function () {
  $socialUser = Socialite::driver('facebook')->stateless()->user();
  $provider = SocialProvider::firstOrCreate(['name' => 'facebook']);
  $userSocial = UserSocialAccount::where('provider_id', $provider->id)->where('provider_user_id', $socialUser->id)->first();

  Log::info('DATA: ', [$socialUser]);
  if (!$userSocial) {
    return redirect()->route('sign-in')->with([
      'status' => 'Esta cuenta de Facebook no está vinculada a ningún usuario.'
    ]);
  }

  // Existe: logueamos al usuario
  $user = $userSocial->user;
  auth()->login($user);
  return redirect()->route('panel.dashboard');
});