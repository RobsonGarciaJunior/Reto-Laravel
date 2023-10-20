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
            'name' => 'Departamento1',
            'created_at' => now(),
        ]);
        DB::table('departments')->insert([
            'name' => 'Departamento2',
            'created_at' => now(),
        ]);
        DB::table('departments')->insert([
            'name' => 'Departamento3',
            'created_at' => now(),
        ]);
        DB::table('departments')->insert([
            'name' => 'Departamento4',
            'created_at' => now(),
        ]);
    }
}
