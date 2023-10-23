<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncidencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incidencies')->insert([
            'title' => 'Incidencia1',
            'text' => 'Han habido varios problemas con esto relacionado a la incidencia1',
            'estimatedTime' => 2,
            'categoryId' => 3,
            'departmentId' => 2,
            'userId' => 3,
            'created_at' => now(),
        ]);
        DB::table('incidencies')->insert([
            'title' => 'Incidencia2',
            'text' => 'Han habido varios problemas con esto relacionado a la incidencia2',
            'estimatedTime' => 1,
            'categoryId' => 4,
            'departmentId' => 1,
            'userId' => 2,
            'created_at' => now(),
        ]);
        DB::table('incidencies')->insert([
            'title' => 'Incidencia3',
            'text' => 'Han habido varios problemas con esto relacionado a la incidencia3',
            'estimatedTime' => 5,
            'categoryId' => 2,
            'departmentId' => 3,
            'userId' => 1,
            'created_at' => now(),
        ]);
        DB::table('incidencies')->insert([
            'title' => 'Incidencia4',
            'text' => 'Han habido varios problemas con esto relacionado a la incidencia4',
            'estimatedTime' => 4,
            'categoryId' => 2,
            'departmentId' => 4,
            'userId' => 1,
            'created_at' => now(),
        ]);
    }
}
