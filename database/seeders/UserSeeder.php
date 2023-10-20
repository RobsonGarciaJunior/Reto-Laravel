<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Usuario1',
            'email' => 'email@1',
            'email_verified_at' => null,
            'password' => Hash::make('password1'),
            'departmentId' => 1,
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Usuario2',
            'email' => 'email@2',
            'email_verified_at' => null,
            'password' => Hash::make('password2'),
            'departmentId' => 3,
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Usuario3',
            'email' => 'email@3',
            'email_verified_at' => null,
            'password' => Hash::make('password3'),
            'departmentId' => 2,
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Usuario4',
            'email' => 'email@4',
            'email_verified_at' => null,
            'password' => Hash::make('password4'),
            'departmentId' => 1,
            'created_at' => now(),
        ]);
    }
}
