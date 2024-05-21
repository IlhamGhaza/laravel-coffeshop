<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'user_id' => 1,
                'name' => 'John Doe',
                'phone' => '1234567890', // Add this line
                'position' => 'Manager',
                'date_of_birth' => '1980-01-01',
                'date_of_joining' => '2020-01-01',
                'salary' => 5000.00,
                'address' => '123 Street, City, State, Country',
            ],
            [
                'user_id' => 2,
                'name' => 'Jane Doe',
                'phone' => '2345678901', // Add this line
                'position' => 'Staff',
                'date_of_birth' => '1985-01-01',
                'date_of_joining' => '2021-01-01',
                'salary' => 3000.00,
                'address' => '456 Street, City, State, Country',
            ],
            [
                'user_id' => 3,
                'name' => 'Alice Smith',
                'phone' => '3456789012', // Add this line
                'position' => 'User',
                'date_of_birth' => '1990-01-01',
                'date_of_joining' => '2022-01-01',
                'salary' => 2000.00,
                'address' => '789 Street, City, State, Country',
            ],
        ]);

    }
}
