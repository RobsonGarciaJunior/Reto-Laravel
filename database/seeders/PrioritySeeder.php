<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('priorities')->insert([
            'name' => 'Alta',
            'order'=> 100,
            'created_at' => now(),
        ]);
        DB::table('priorities')->insert([
            'name' => 'Normal',
            'order'=> 50,
            'created_at' => now(),
        ]);
        DB::table('priorities')->insert([
            'name' => 'Baja',
            'order'=> 0,
            'created_at' => now(),
        ]);
    }
}
