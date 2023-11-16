<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            'name' => 'Informática',
            'created_at' => now(),
        ]);
        DB::table('departments')->insert([
            'name' => 'Ventas y Marketing',
            'created_at' => now(),
        ]);
        DB::table('departments')->insert([
            'name' => 'Logística',
            'created_at' => now(),
        ]);
        DB::table('departments')->insert([
            'name' => 'RRHH',
            'created_at' => now(),
        ]);
    }
}
