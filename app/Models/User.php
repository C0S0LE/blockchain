<?php

namespace App\Models;

use App\Models\UserSocialAccount;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use O21\LaravelWallet\Contracts\Payable;
use O21\LaravelWallet\Models\Concerns\HasBalance;
use Vinkla\Hashids\Facades\Hashids;

// class User extends Authenticatable implements MustVerifyEmail, Payable
class User extends Authenticatable implements MustVerifyEmail, Payable
{
  use HasFactory, Notifiable, HasBalance;

  protected $appends = [
    'hashid',
    'avatar_url',
    'wallet_balance'
  ];

  protected $fillable = [
    'uid',
    'name',
    'lastName',
    'dni',
    'username',
    'email',
    'password',
    'avatar',
    'terms_accepted'
  ];

  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
    'terms_accepted' => 'boolean',
  ];

  protected static function booted()
  {
    static::creating(function ($user) {
      if (!$user->uid) $user->uid = self::generateUID();
    });

    static::created(function ($user) {
      $user->wallet()->create(['balance' => 0]);
    });
  }

  public static function generateUID($length = 12)
  {
    do {
      $uid = strtoupper(Str::random($length));
    } while (self::where('uid', $uid)->exists());
    return $uid;
  }

  public function scopeFindByIdentifier($query, $identifier)
  {
    return $query->where('uid', $identifier)
      ->orWhere('email', $identifier)
      ->first();
  }

  /**
   * Accessor: URL del avatar.
   */
  public function getAvatarUrlAttribute(): ?string
  {
    return $this->avatar
      ? asset('storage/assets/img/pic/' . $this->avatar)
      : asset('storage/assets/img/pic/default.png');
  }

  public function getHashidAttribute()
  {
    return Hashids::encode($this->id);
  }

  public function getWalletBalanceAttribute()
  {
    return $this->wallet?->balance ?? 0;
  }

  public static function findByHashid($hashid)
  {
    $decoded = Hashids::decode($hashid);
    if (count($decoded) === 0)
      return null;
    return static::find($decoded[0]);
  }

  // Relation
  public function wallet()
  {
    return $this->hasOne(Wallet::class);
  }

  // SOCIALITE - PROVIDERS
  // Relación con social accounts
  public function socialAccounts()
  {
    return $this->hasMany(UserSocialAccount::class);
  }

  // Buscar por provider específico
  public function socialAccount($providerName)
  {
    return $this->socialAccounts()->whereHas('provider', function ($q) use ($providerName) {
      $q->where('name', $providerName);
    })->first();
  }
}
