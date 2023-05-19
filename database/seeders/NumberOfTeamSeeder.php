<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NumberOfTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // types table seeder
        for ($i = 1; $i <= 10; ++$i) {
            DB::table('tournament_types')->insert([
                'number_of_team' => 'Type '.$i,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
                'created_ip' => '',
            ]);
        }
    }
}
