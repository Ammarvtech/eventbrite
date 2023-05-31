<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_cms', function (Blueprint $table) {
            $table->id();
            $table->string('banner_img')->nullable();
            $table->string('banner_title')->nullable();
            $table->text('banner_des')->nullable();
            $table->string('gamers_title')->nullable();
            $table->string('gamers_sub_title')->nullable();
            $table->text('gamers_des')->nullable();
            $table->string('resource_title')->nullable();
            $table->string('resource_sub_title')->nullable();
            $table->text('resource_des')->nullable();
            $table->string('resource_btn_txt')->nullable();
            $table->string('resource_btn_link')->nullable();
            $table->string('resource_img')->nullable();
            $table->string('tournament_title')->nullable();
            $table->text('tournament_des')->nullable();
            $table->text('facebook')->nullable();
            $table->text('insta')->nullable();
            $table->text('twiter')->nullable();
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
        Schema::dropIfExists('home_cms');
    }
};
