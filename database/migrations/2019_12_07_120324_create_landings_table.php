<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('landings', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('title')->default('A Unique Way to Enjoy');
      $table->string('title_ar')->default('A Unique Way to Enjoy');
      $table->string('subtitle')->default('More Than 200 Live Channels');
      $table->string('subtitle_ar')->default('More Than 200 Live Channels');
      $table->string('promo_image');
      $table->string('apps_title')->default('Download the Application On all devices');
      $table->string('apps_title_ar')->default('Download the Application On all devices');
      $table->string('apps_subtitle')->default('1001Nights is available on iOS and Android');
      $table->string('apps_subtitle_ar')->default('1001Nights is available on iOS and Android');
      $table->string('apps_image');
      $table->string('android_link')->default('https://play.google.com/store/apps/details?id=fun.OneThousandnights.cinema&hl=en');
      $table->string('ios_link')->default('https://apps.apple.com/us/app/1001-night/id1486071340');
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
    Schema::dropIfExists('landings');
  }
}
