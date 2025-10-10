<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSocialAccount extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'provider_id',
    'provider_user_id',
    'access_token',
    'refresh_token',
    'token_expires_at',
  ];

  // Relación al usuario
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  // Relación al proveedor
  public function provider()
  {
    return $this->belongsTo(SocialProvider::class, 'provider_id');
  }
}
