<?php

namespace App\Http\Controllers\Views\Public;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PublicViewController extends Controller
{
  public function Welcome()
  {
    if(Auth::check()) {
      redirect()->route('panel.dashboard');
    }

    return Inertia::render('Public/Welcome');
  }

  public function terms()
  {
    return Inertia::render('Public/Terms');
  }

  public function termsOfUse() {
    return Inertia::render('Public/TermsOfUse');
  }

  public function policy()
  {
    return Inertia::render('Public/Policy');
  }

  public function cookies()
  {
    return Inertia::render('Public/Cookies');
  }

  public function notice() {
    return Inertia::render('Errors/Cookies');
  }
}
