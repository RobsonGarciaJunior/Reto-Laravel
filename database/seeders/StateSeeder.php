<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('states')->insert([
            'name' => 'Por Revisar',
            'created_at' => now(),
        ]);
        DB::table('states')->insert([
            'name' => 'En Revision',
            'created_at' => now(),
        ]);
        DB::table('states')->insert([
            'name' => 'Finalizada',
            'created_at' => now(),
        ]);
    }
}
