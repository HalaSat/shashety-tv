<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotePostsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('vote_posts', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('title')->nullable();
      $table->string('title_ar')->nullable();
      $table->string('home_name')->nullable();
      $table->string('away_name')->nullable();
      $table->string('draw_name')->nullable();
      $table->string('home_name_ar')->nullable();
      $table->string('away_name_ar')->nullable();
      $table->string('draw_name_ar')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('vote_posts');
  }
}
