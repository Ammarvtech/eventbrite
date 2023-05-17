<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for privacy policy

        DB::table('pages')->insert([
            'title' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'content' => 'Privacy Policy Content',
            'image' => 'privacy-policy.jpg',
            'is_active' => true,
            'meta_title' => 'Privacy Policy Meta Title',
            'meta_description' => 'Privacy Policy Meta Description',
            'meta_keywords' => 'Privacy Policy Meta Keywords',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // for terms and conditions
        
        DB::table('pages')->insert([
            'title' => 'Terms and Conditions',
            'slug' => 'terms-and-conditions',
            'content' => 'Terms and Conditions Content',
            'image' => 'terms-and-conditions.jpg',
            'is_active' => true,
            'meta_title' => 'Terms and Conditions Meta Title',
            'meta_description' => 'Terms and Conditions Meta Description',
            'meta_keywords' => 'Terms and Conditions Meta Keywords',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('pages')->insert([
            'title' => 'Disclaimer',
            'slug' => 'disclaimer',
            'content' => 'disclaimer content',
            'image' => 'disclaimer.jpg',
            'is_active' => true,
            'meta_title' => 'Disclaimer Meta Title',
            'meta_description' => 'Disclaimer Meta Description',
            'meta_keywords' => 'Disclaimer Meta Keywords',
            'created_at' => now(),
            'updated_at' => now(),
            
        ]);

        DB::table('contact_us_cms')->insert([
            'title' => 'Contact Us',
            'heading' => 'Contact Us Heading',
            'description' => 'Contact Us Description',
            'image' => 'contact-us.jpg',
            'address' => 'Contact Us Address',
            'email' => 'Contact Us Email',
            'phone' => 'Contact Us Phone',
            'meta_title' => 'Contact Us Meta Title',
            'meta_description' => 'Contact Us Meta Description',
            'meta_keywords' => 'Contact Us Meta Keywords',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('about_us')->insert([
            'title' => 'About Us',
            'heading' => 'About Us Heading',
            'description' => 'About Us Description',
            'image' => 'about-us.jpg',
            'btn_text' => 'About Us Button Text',
            'btn_link' => 'About Us Button Link',
            'meta_title' => 'About Us Meta Title',
            'meta_description' => 'About Us Meta Description',
            'meta_keywords' => 'About Us Meta Keywords',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('support')->insert([
            'title' => 'Support 1',
            'description' => 'Support Description 1',
            'link' => 'www.google.com',
            'link_text' => 'Support Link Text',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('support')->insert([
            'title' => 'Support 2',
            'description' => 'Support Description 2',
            'link' => 'www.google.com',
            'link_text' => 'Support Link Text',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('support')->insert([
            'title' => 'Support 2',
            'description' => 'Support Description 2',
            'link' => 'www.google.com',
            'link_text' => 'Support Link Text',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
