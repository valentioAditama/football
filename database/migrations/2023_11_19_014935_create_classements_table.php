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
    Schema::create('classements', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('id_club');
      $table->tinyInteger('play')->default(0);
      $table->tinyInteger('win')->default(0);
      $table->tinyInteger('draw')->default(0);
      $table->tinyInteger('lose')->default(0);
      $table->tinyInteger('goal_win')->default(0);
      $table->tinyInteger('goal_lose')->default(0);
      $table->tinyInteger('point')->default(0);
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
    Schema::dropIfExists('classements');
  }
};
