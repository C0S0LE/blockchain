<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('uid', 12)->unique();

      $table->string('name');
      $table->string('lastName')->nullable();

      $table->string('dni')->nullable()->unique();
      $table->string('username')->nullable()->unique();

      $table->string('email')->unique();
      $table->timestamp('email_verified_at')->nullable();

      $table->string('password')->nullable();
      $table->string('avatar')->nullable()->default('default.webp');
      $table->string('terms_accepted')->default(false);
      $table->boolean('first_login')->default(false);

      $table->enum('status', ['active', 'inactive', 'suspended', 'delete'])->default('active');

      $table->string('github_id')->nullable();
      $table->string('github_token')->nullable();
      $table->string('github_refresh_token')->nullable();

      $table->string('google_id')->nullable();
      $table->string('google_token')->nullable();
      $table->string('google_refresh_token')->nullable();

      $table->rememberToken();
      $table->timestamps();
      $table->softDeletes();
    });

    Schema::create('social_providers', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique(); // 'google', 'github', etc.
      $table->timestamps();
    });

    Schema::create('user_social_accounts', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->cascadeOnDelete();
      $table->foreignId('provider_id')->constrained('social_providers')->cascadeOnDelete();
      $table->string('provider_user_id'); // id del usuario en Google/Github
      $table->string('access_token')->nullable();
      $table->string('refresh_token')->nullable();
      $table->timestamp('token_expires_at')->nullable();
      $table->timestamps();

      $table->unique(['user_id', 'provider_id']); // evitar duplicados
    });

    Schema::create('password_reset_tokens', function (Blueprint $table) {
      $table->string('email')->primary();
      $table->string('token');
      $table->timestamp('created_at')->nullable();
    });

    Schema::create('personal_access_tokens', function (Blueprint $table) {
      $table->id();
      $table->morphs('tokenable');
      $table->text('name');
      $table->string('token', 64)->unique();
      $table->text('abilities')->nullable();
      $table->timestamp('last_used_at')->nullable();
      $table->timestamp('expires_at')->nullable()->index();
      $table->timestamps();
    });

    Schema::create('sessions', function (Blueprint $table) {
      $table->string('id')->primary();
      $table->foreignId('user_id')->nullable()->index();
      $table->string('ip_address', 45)->nullable();
      $table->text('user_agent')->nullable();
      $table->longText('payload');
      $table->integer('last_activity')->index();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
    Schema::dropIfExists('social_providers');
    Schema::dropIfExists('user_social_accounts');
    Schema::dropIfExists('password_reset_tokens');
    Schema::dropIfExists('personal_access_tokens');
    Schema::dropIfExists('sessions');
  }
};
