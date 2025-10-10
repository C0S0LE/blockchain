<?php

namespace App\Http\Controllers\Views\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class ProfileController extends Controller
{

  public function index(Request $request)
  {
    // $user = User::findByHashid($hashid);
    // if (!$user) abort(404);
    // return Inertia::render('Profile/Edit', ['user' => $user]);
    // Log::info('ProfileController@index ejecutado');
    // Log::info('URL actual: ' . $request->url());

    $user = Auth::user();
    return Inertia::render('Profile/Index', [
      'user' => $user
    ]);
  }

  public function edit(Request $request)
  {
    // $user = User::findByHashid($hashid);
    // if (Auth::id() !== $user->id) abort(403);
    $user = Auth::user();
    return Inertia::render('Profile/Edit', ['user' => $user]);
  }

  public function update(Request $request, $hashid)
  {
    $user = User::findByHashid($hashid);
    if (!$user) abort(404);
    if (Auth::id() !== $user->id) abort(403);

    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    ]);

    $user->update($validated);

    return redirect()->route('profile.index')->with('success', 'Perfil actualizado correctamente.');
  }

  public function destroy(Request $request, $hashid)
  {
    $user = User::findByHashid($hashid);
    if (!$user) abort(404);
    if (Auth::id() !== $user->id) abort(403);

    return redirect()->route('dashboard')->with('success', 'Perfil eliminado correctamente.');
  }

}
