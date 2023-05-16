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
        Schema::create('banners', function (Blueprint $table) {
        $table->id();
        $table->string('title')->unique();
       $table->string('image')->nullable();
        $table->string('description')->nullable();
        $table->string('created_at')->nullable();
        $table->string('updated_at')->nullable();
        $table->string('deleted_at')->nullable();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
};
