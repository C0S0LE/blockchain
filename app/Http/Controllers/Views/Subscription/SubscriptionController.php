<?php

namespace App\Http\Controllers\Views\Subscription;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
  public function showPlan () {
    return Inertia::render('Public/Suscription/showPlan');
  }
  public function subscribeToPlan () {
    return Inertia::render('Public/Suscription/subscribeToPlan');
  }
  public function cancelSubscription () {
    return Inertia::render('Public/Suscription/cancelSubscription');
  }
  public function resumeSubscription () {
    return Inertia::render('Public/Suscription/resumeSubscription');
  }
}
