<?php

namespace App\Http\Controllers\Views\Contact;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ContactController extends Controller
{
  public function send() {
    return Inertia::render('Public/Contact/Form');
  }
}
