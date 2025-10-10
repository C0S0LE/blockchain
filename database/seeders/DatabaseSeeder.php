<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    User::factory()->create([
      'name' => 'Test',
      'lastName' => 'User',
      'username' => 'usertest',
      'email' => 'admin@gea.com',
      'dni' => '12345678',
      'password' => Hash::make('12345678'),
      'avatar' => '66.webp'
    ]);
  }
}
