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
    }
}
