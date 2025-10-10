<?php

namespace App\Http\Controllers\Trading;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TradingController extends Controller
{
  public function transfer(Request $request)
  {
    $request->validate([
      'recipient' => 'required|string',
      'amount' => 'required|numeric|min:0.01'
    ]);

    $sender = Auth::user();
    $recipient = User::findByIdentifier($request->recipient);

    if (!$recipient)
      return response()->json(['error' => 'Usuario no encontrado'], 404);
    if ($sender->id === $recipient->id)
      return response()->json(['error' => 'No puedes transferirte a ti mismo'], 400);
    if ($sender->balance < $request->amount)
      return response()->json(['error' => 'Saldo insuficiente'], 400);

    // Simulación de transferencia
    $sender->balance -= $request->amount;
    $recipient->balance += $request->amount;

    $sender->save();
    $recipient->save();

    return response()->json([
      'message' => "Transferencia de $request->amount USD realizada a $recipient->name",
      'sender_balance' => $sender->balance,
      'recipient_balance' => $recipient->balance
    ]);
  }
}
