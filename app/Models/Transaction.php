<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  protected $fillable = [
    'wallet_id',
    'recipient_wallet_id',
    'amount',
    'type',
    'status',
    'note'
  ];

  public function wallet()
  {
    return $this->belongsTo(Wallet::class);
  }

  public function recipientWallet()
  {
    return $this->belongsTo(Wallet::class, 'recipient_wallet_id');
  }
}
