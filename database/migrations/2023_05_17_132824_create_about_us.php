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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('heading')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('des_image')->nullable();
            $table->string('contact_image')->nullable();
            $table->string('btn_text')->nullable();
            $table->string('btn_link')->nullable();

            $table->string('support_title')->nullable();
            $table->string('support_section_one_title')->nullable();
            $table->string('support_section_one_description')->nullable();
            $table->string('support_section_one_link')->nullable();
            $table->string('support_section_one_link_text')->nullable();

            $table->string('support_section_two_title')->nullable();
            $table->string('support_section_two_description')->nullable();
            $table->string('support_section_two_link')->nullable();
            $table->string('support_section_two_link_text')->nullable();

            $table->string('support_section_three_title')->nullable();
            $table->string('support_section_three_description')->nullable();
            $table->string('support_section_three_link')->nullable();
            $table->string('support_section_three_link_text')->nullable();

            $table->string('contact_section_title')->nullable();
            $table->string('contact_section_heading')->nullable();
            $table->string('contact_section_lower_title')->nullable();
            $table->string('contact_section_lower_description')->nullable();


            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
