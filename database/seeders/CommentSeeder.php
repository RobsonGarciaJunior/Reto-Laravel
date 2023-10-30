<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            'text' => 'Alguien podria aclararme una duda sobre la Incidencia 1? Como podria hacer...',
            'usedTime' => 4,
            'incidencyId' => 1,
            'userId' => 1,
            'created_at' => now(),
        ]);
        DB::table('comments')->insert([
            'text' => 'Alguien podria aclararme una duda sobre la Incidencia 3? Como podria hacer...',
            'usedTime' => 2,
            'incidencyId' => 3,
            'userId' => 2,
            'created_at' => now(),
        ]);
        DB::table('comments')->insert([
            'text' => 'En cuanto a la Incidencia 1 me gustaria saber como...',
            'usedTime' => 2,
            'incidencyId' => 1,
            'userId' => 1,
            'created_at' => now(),
        ]);
        DB::table('comments')->insert([
            'text' => 'Alguien podria aclararme una duda sobre la Incidencia 4? Como podria hacer...',
            'usedTime' => 4,
            'incidencyId' => 4,
            'userId' => 4,
            'created_at' => now(),
        ]);
        DB::table('comments')->insert([
            'text' => 'Alguien podria aclararme una duda sobre la Incidencia 2? Como podria hacer...',
            'usedTime' => 4,
            'incidencyId' => 2,
            'userId' => 2,
            'created_at' => now(),
        ]);
        DB::table('comments')->insert([
            'text' => 'Esto va en la incidencia 1, Como podria hacer...',
            'usedTime' => 1,
            'incidencyId' => 1,
            'userId' => 4,
            'created_at' => now(),
        ]);
    }
}
