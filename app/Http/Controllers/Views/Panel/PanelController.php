<?php

namespace App\Http\Controllers\Views\Panel;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class PanelController extends Controller
{
  public function dashboard(): Response
  {
    return Inertia::render('Panel/Dashboard');
  }

  public function analytics(): Response
  {
    return Inertia::render('Panel/Analytics');
  }
}
