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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string("firstname")->nullable();
            $table->string("lastname")->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('secondary_email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('org_name')->nullable(); // org = organization
            $table->string('org_website')->nullable();
            $table->text('org_mailing_address')->nullable();
            $table->string('org_communication_method')->nullable();
            $table->string('org_timezone')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('address')->nullable();
            $table->string('password');
            $table->string('status')->default('active');
            $table->string('role')->default('player')->enum('organizer', 'admin', 'player');
            $table->string('verify_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
