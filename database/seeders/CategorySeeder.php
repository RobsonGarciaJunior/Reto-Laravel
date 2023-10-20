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
            'name' => 'Categoria1',
            'created_at' => now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Categoria2',
            'created_at' => now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Categoria3',
            'created_at' => now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Categoria4',
            'created_at' => now(),
        ]);
    }
}
