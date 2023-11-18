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
    Schema::create('scores', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('id_club');
      $table->tinyInteger('play');
      $table->tinyInteger('win');
      $table->tinyInteger('draw');
      $table->tinyInteger('lose');
      $table->tinyInteger('goal_win');
      $table->tinyInteger('goal_lose');
      $table->tinyInteger('point');
      $table->timestamps();
      $table->softDeletes();

      $table->foreign('id_club')->references('id')->on('clubs')->onDelete('cascade');
    });

  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('scores');
  }
};
