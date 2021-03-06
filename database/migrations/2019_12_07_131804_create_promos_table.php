<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('promos', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('title');
      $table->string('title_ar');
      $table->string('subtitle');
      $table->string('subtitle_ar');
      $table->string('image');
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
    Schema::dropIfExists('promos');
  }
}
