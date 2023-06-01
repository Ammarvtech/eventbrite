<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tournament_details', function (Blueprint $table) {
            $table->id();
            $table->string('team_name')->nullable();
            $table->string('affiliation')->nullable();
            $table->string('team_color')->nullable();
            $table->string('skill')->nullable();
            $table->string('logo')->nullable();
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_prof')->nullable();
            $table->string('waivers_email')->nullable();
            $table->string('waivers_file')->nullable();
            $table->string('mem_name')->nullable();
            $table->string('mem_email')->nullable();
            $table->string('mem_phone')->nullable();
            $table->string('role')->nullable();
            $table->string('emergency_name')->nullable();
            $table->string('emergency_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
