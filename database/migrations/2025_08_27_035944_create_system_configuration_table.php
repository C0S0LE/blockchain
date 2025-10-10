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
    Schema::create('system_configuration', function (Blueprint $table) {
      $table->id();

      $table->string('name');
      $table->string('phone');
      $table->text('address');
      $table->string('city');
      $table->string('state');
      $table->string('email');

      $table->string('website')->nullable();
      $table->string('logo')->nullable()->default('adwrc-logo.png');

      $table->timestamp('created_at')->useCurrent();
      $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('system_configuration');
  }
};
