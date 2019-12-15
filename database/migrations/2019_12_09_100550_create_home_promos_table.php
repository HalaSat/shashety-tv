<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_promos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('title')->default('Watch Now');
          $table->string('title_ar')->default('Watch Now');;
          $table->string('channel_id')->nullable();
          $table->string('channel_logo')->nullable();
          $table->string('promo_image')->nullable();
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
        Schema::dropIfExists('home_promos');
    }
}
