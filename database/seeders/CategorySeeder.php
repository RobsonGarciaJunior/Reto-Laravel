<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'Control de Gestión',
            'created_at' => now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Consultoria',
            'created_at' => now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Compras',
            'created_at' => now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Finanzas',
            'created_at' => now(),
        ]);
    }
}
