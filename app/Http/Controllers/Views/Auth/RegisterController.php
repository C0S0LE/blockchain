<?php

namespace App\Http\Controllers\Views\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Inertia\Inertia;

class RegisterController extends Controller
{
  public function showRegistrationForm()
  {
    return Inertia::render('Auth/Register');
  }

  public function register(Request $request)
  {
    $validated = $request->validate(
      [
        'name' => 'required|string|max:50',
        'lastName' => 'nullable|string|max:50',
        'dni' => 'nullable|string|max:20|unique:users,dni',
        'username' => 'nullable|string|max:30|unique:users,username',
        'email' => 'required|string|max:50|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'avatar' => 'nullable|string|max:255',
        'terms_accepted' => 'accepted',
      ],
      [
        'name.required' => 'El nombre es obligatorio.',
        'name.string' => 'El nombre debe ser una cadena de texto.',
        'name.max' => 'El nombre no puede superar los 50 caracteres.',

        'lastName.string' => 'El apellido debe ser una cadena de texto.',
        'lastName.max' => 'El apellido no puede superar los 50 caracteres.',

        'dni.string' => 'El DNI debe ser una cadena de texto.',
        'dni.max' => 'El DNI no puede superar los 20 caracteres.',
        'dni.unique' => 'Este DNI ya está registrado.',

        'username.string' => 'El nombre de usuario debe ser una cadena de texto.',
        'username.max' => 'El nombre de usuario no puede superar los 30 caracteres.',
        'username.unique' => 'Este nombre de usuario ya está en uso.',

        'email.required' => 'El correo electrónico es obligatorio.',
        'email.string' => 'El correo electrónico debe ser una cadena de texto.',
        'email.max' => 'El correo electrónico no puede superar los 50 caracteres.',
        'email.email' => 'Debes ingresar un correo electrónico válido.',
        'email.unique' => 'Este correo electrónico ya está registrado.',

        'password.required' => 'La contraseña es obligatoria.',
        'password.string' => 'La contraseña debe ser una cadena de texto.',
        'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        'password.confirmed' => 'Las contraseñas no coinciden.',

        'avatar.string' => 'El avatar debe ser una cadena válida.',
        'avatar.max' => 'El avatar no puede superar los 255 caracteres.',

        'terms_accepted.accepted' => 'Debes aceptar los términos y condiciones.',
      ]
    );

    try {
      $username = $validated['username'] ?? null;
      if (!$username) {
        $base = Str::slug($validated['name'] . ($validated['lastName'] ?? ''), '');
        $username = $base;
        $i = 1;
        while (User::where('username', $username)->exists()) {
          $username = $base . $i;
          $i++;
        }
      }

      $user = User::create([
        'name' => $validated['name'],
        'username' => $username,
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'terms_accepted' => true,
      ]);

      // $user->wallet()->create(['balance' => 100]);

      Auth::login($user);

      if ($request->wantsJson()) {
        return response()->json([
          'success' => true,
          'message' => 'Usuario registrado correctamente.',
          'user' => $user,
        ], 201);
      }

      // return Inertia::location(route('panel.dashboard'));
      return Inertia::location(route('panel.dashboard'));

    } catch (\Throwable $e) {
      Log::error('Error en registro', [
        'msg' => $e->getMessage(),
        'trace' => $e->getTraceAsString(),
      ]);

      if ($request->wantsJson()) {
        return response()->json([
          'success' => false,
          'message' => 'No pudimos completar el registro.',
        ], 500);
      }

      return back()
        ->withErrors(['general' => 'No pudimos completar el registro. Inténtalo de nuevo.'])
        ->withInput();
    }
  }
}
