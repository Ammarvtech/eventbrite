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
            'des_image' => '/about-us.jpg',
            'contact_image' => '/about-us.jpg',
            'image' => '/about-us.jpg',
            'btn_text' => 'About Us Button Text',
            'btn_link' => 'About Us Button Link',
            'support_title' => 'About Us Support Title',
            'support_section_one_title' => 'About Us Support Section One Title',
            'support_section_one_description' => 'About Us Support Section One Description',
            'support_section_one_link' => 'About Us Support Section One Link',
            'support_section_one_link_text' => 'About Us Support Section One Link Text',
            'support_section_two_title' => 'About Us Support Section Two Title',
            'support_section_two_description' => 'About Us Support Section Two Description',
            'support_section_two_link' => 'About Us Support Section Two Link',
            'support_section_two_link_text' => 'About Us Support Section Two Link Text',
            'support_section_three_title' => 'About Us Support Section Three Title',
            'support_section_three_description' => 'About Us Support Section Three Description',
            'support_section_three_link' => 'About Us Support Section Three Link',
            'support_section_three_link_text' => 'About Us Support Section Three Link Text',
            'contact_section_title' => 'About Us Contact Section Title',
            'contact_section_heading' => 'About Us Contact Section Heading',
            'contact_section_lower_title' => 'About Us Contact Section Lower Title',
            'contact_section_lower_description' => 'About Us Contact Section Lower Description',
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

        DB::table('home_cms')->insert([
            'banner_img' => '/banner.jpg',
            'banner_title' => 'Home Banner Title',
            'banner_des' => 'Home Banner Description',
            'gamers_title' => 'Home Gamers Title',
            'gamers_sub_title' => 'Home Gamers Sub Title',
            'gamers_des' => 'Home Gamers Description',
            'resource_title' => 'Home Resource Title',
            'resource_sub_title' => 'Home Resource Sub Title',
            'resource_des' => 'Home Resource Description',
            'resource_btn_txt' => 'Home Resource Button Text',
            'resource_btn_link' => 'www.google.com',
            'resource_img' => '/resource.jpg',
            'tournament_title' => 'Home Tournament Title',
            'tournament_des' => 'Home Tournament Description',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
