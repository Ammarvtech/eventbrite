<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++) {
            DB::table('products')->insert([
                'name' => 'Product ' . $i,
                'slug' => 'product-' . $i,
                'description' => 'Product ' . $i . ' description',
                'image' => 'product-' . $i . '.jpg',
                'category_id' => $i,
                'status' => 'active',
                'meta_title' => 'Product ' . $i . ' meta title',
                'meta_description' => 'Product ' . $i . ' meta description',
                'meta_keywords' => 'Product ' . $i . ' meta keywords',
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
