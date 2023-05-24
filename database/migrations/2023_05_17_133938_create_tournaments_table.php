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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('category_id')->nullable();
            $table->string('type')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('registration_dead_line')->nullable();
            $table->string('event_type')->nullable();
            $table->string('country_id')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('number_of_teams')->nullable();
            $table->string('format')->nullable();
            $table->string('prize_distribution')->nullable();
            $table->string('level')->nullable();
            $table->string('entry_fee')->nullable();
            $table->string('rules')->nullable();
            $table->string('code_of_conduct')->nullable();
            $table->string('age')->nullable();
            $table->string('equipment_requirements')->nullable();
            $table->string('schedule_date')->nullable();
            $table->string('schedule_time')->nullable();
            $table->string('schedule_breaks')->nullable();
            $table->string('venue_availability')->nullable();
            $table->string('second_match_date')->nullable();
            $table->string('second_match_time')->nullable();
            $table->string('second_match_breaks')->nullable();
            $table->string('second_venue_availability')->nullable();
            $table->string('third_match_date')->nullable();
            $table->string('third_match_time')->nullable();
            $table->string('third_match_breaks')->nullable();
            $table->string('third_venue_availability')->nullable();
            $table->string('fourth_match_date')->nullable();
            $table->string('fourth_match_time')->nullable();
            $table->string('fourth_match_breaks')->nullable();
            $table->string('fourth_venue_availability')->nullable();
            $table->string('contact_information')->nullable();
            $table->string('roles_and_responsibilities')->nullable();
            $table->string('sponsor_information')->nullable();
            $table->text('overview')->nullable();
            $table->string('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
