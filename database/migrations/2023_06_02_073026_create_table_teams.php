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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournament_id')->constrained('tournaments');
            $table->foreignId('user_id')->constrained('users');
            $table->string('team_name');
            $table->string('affiliation');
            $table->string('team_color');
            $table->string('skill');
            $table->string('logo');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('payment_method');
            $table->string('payment_prof');
            $table->string('waivers_email');
            $table->string('waivers_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_teams');
    }
};
