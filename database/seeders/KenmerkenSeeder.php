<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KenmerkenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kenmerken')->insert([
            'brandstof_type' => 'Benzine',
        ]);
        DB::table('kenmerken')->insert([
            'brandstof_type' => 'Diesel',
        ]);
        DB::table('kenmerken')->insert([
            'brandstof_type' => 'LPG',
        ]);
        DB::table('kenmerken')->insert([
            'brandstof_type' => 'Elektrisch',
        ]);

    }
}
