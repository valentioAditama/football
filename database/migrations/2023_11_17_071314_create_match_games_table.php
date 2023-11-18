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
    Schema::create('match_games', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('club_1');
      $table->unsignedBigInteger('club_2');
      $table->integer('score_1');
      $table->integer('score_2');
      $table->timestamps();
      $table->softDeletes();

      $table->foreign('club_1')->references('id')->on('clubs')->onDelete('cascade');
      $table->foreign('club_2')->references('id')->on('clubs')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('match_games');
  }
};
