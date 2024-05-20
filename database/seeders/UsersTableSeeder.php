<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staff',
            ],
            [
                'name' => 'Alice Smith',
                'email' => 'alice@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
        
        ]);
    }
}
