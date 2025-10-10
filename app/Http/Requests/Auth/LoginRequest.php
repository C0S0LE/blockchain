<?php

namespace App\Http\Requests\Auth;

use App\Mail\UserBlocked;
use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'userLogin' => 'required|string|min:3',
      'password' => 'required|string|min:8',
      'remember' => 'sometimes|boolean',
      'logout_other_devices' => 'sometimes|boolean',
    ];
  }

  public function messages(): array
  {
    return [
      'userLogin.required' => 'El usuario o correo es obligatorio',
      'userLogin.min' => 'El usuario o correo debe tener al menos 3 caracteres',
      'password.required' => 'La contraseña es obligatoria',
      'password.min' => 'La contraseña debe tener al menos 3 caracteres',
    ];
  }

  public function authenticate(): void
  {
    $userLogin = $this->input('userLogin');
    $user = User::where('email', $userLogin)
      ->orWhere('username', $userLogin)
      ->orWhere('dni', $userLogin)
      ->first();

    if ($user) {
      $this->checkUserStatus($user);
    } else {
      throw ValidationException::withMessages([
        'userLogin' => 'Esta cuenta no existe',
      ]);
    }

    $this->ensureIsNotRateLimited();
    $this->attemptLogin($userLogin);
  }

  protected function checkUserStatus(User $user): void
  {
    if ($user->status === 'blocked' || $user->status === 'suspended') {
      throw ValidationException::withMessages([
        'userBlocked' => 'Tu cuenta está suspendida o bloqueada. Contacta con soporte.',
      ]);
    }
  }

  protected function attemptLogin(string $userLogin): void
  {
    $credentials = $this->only('userLogin', 'password');
    $loginFields = ['email', 'username', 'dni'];

    foreach ($loginFields as $field) {
      if (Auth::attempt([$field => $credentials['userLogin'], 'password' => $credentials['password']], $this->boolean('remember'))) {
        RateLimiter::clear($this->throttleKey());
        return;
      }
    }

    RateLimiter::hit($this->throttleKey());
    $this->handleUserLock();

    if ($this->input('userLogin') && $this->isUserBlocked) {
      throw ValidationException::withMessages([
        'userBlocked' => 'Tu cuenta ha sido bloqueada debido a múltiples intentos fallidos. Por favor, contacta con soporte.',
      ]);
    }

    throw ValidationException::withMessages(['userLogin' => trans('auth.failed')]);
  }

  public function ensureIsNotRateLimited(): void
  {
    if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
      event(new Lockout($this));

      $seconds = RateLimiter::availableIn($this->throttleKey());

      throw ValidationException::withMessages([
        'userLogin' => trans('auth.throttle', [
          'seconds' => $seconds,
          'minutes' => ceil($seconds / 60),
        ]),
      ]);
    }
  }

  public function throttleKey(): string
  {
    return Str::lower($this->input('userLogin') . '|' . $this->ip());
  }

  protected function handleUserLock(): void
  {
    $attempts = RateLimiter::attempts($this->throttleKey());

    if ($attempts >= 5) {
      $this->blockUser();
    }
  }

  protected function blockUser(): void
  {
    $userLogin = $this->input('userLogin');
    $user = User::where('email', $userLogin)
      ->orWhere('username', $userLogin)
      ->orWhere('dni', $userLogin)
      ->first();

    if ($user) {
      $user->status = 'blocked';
      $user->save();

      /* try {
        Mail::to($user->email)->send(new UserBlocked($user));
      } catch (\Exception $e) {
        Log::error("Error al enviar correo de bloqueo: " . $e->getMessage());
      } */

      $this->isUserBlocked = true;

      throw ValidationException::withMessages([
        'userBlocked' => 'Tu cuenta ha sido bloqueada debido a múltiples intentos fallidos. Por favor, contacta con soporte.',
      ]);
    }
  }

  protected $isUserBlocked = false;
}
