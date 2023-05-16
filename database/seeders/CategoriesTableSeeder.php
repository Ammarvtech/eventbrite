<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // categories table seeder
        for($i = 1; $i <= 10; $i++) {
            DB::table('categories')->insert([
                'name' => 'Category ' . $i,
                'slug' => 'category-' . $i,
                'description' => 'Category ' . $i . ' description',
                'image' => 'category-' . $i . '.jpg',
                'parent_id' => null,
                'status' => 'active',
                'meta_title' => 'Category ' . $i . ' meta title',
                'meta_description' => 'Category ' . $i . ' meta description',
                'meta_keywords' => 'Category ' . $i . ' meta keywords',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
                'created_ip' => ''
            ]);
        }

    }
}
