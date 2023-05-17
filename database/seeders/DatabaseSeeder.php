<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create admin user
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
        
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\ProductImage::factory(10)->create();
        \App\Models\Country::factory(100)->create();
        \App\Models\Organization::factory(10)->create();
        \App\Models\Faq::factory(10)->create();
        \App\Models\Tournament::factory(10)->create();
        \App\Models\TournamentCategory::factory(10)->create();
        \App\Models\TournamentImage::factory(10)->create();


        // \App\Models\Page::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            PagesTableSeeder::class
        ]);


    }
}
