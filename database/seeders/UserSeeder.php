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
        DB::table('users')->insert([[
            'name' => 'aoki',
            'email' => 'test@test.com',
            'password' => Hash::make('password123'),
            'role' => 0,
            'deleted_flg' => false,
        ],[
            'name' => 'ishida',
            'email' => 'ishida@ishida.com',
            'password' => Hash::make('password123'),
            'role' => 0,
            'deleted_flg' => false,
        ],
        [
            'name' => 'tanaka',
            'email' => 'tanaka@tanaka.com',
            'password' => Hash::make('password123'),
            'role' => 0,
            'deleted_flg' => false,
        ],[
            'name' => 'yamada',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password123'),
            'role' => 5,
            'deleted_flg' => false,
        ]]);
    }
}
