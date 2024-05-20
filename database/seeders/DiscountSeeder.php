<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Discount::create([
            'name' => 'Discount 1',
            'description' => 'Discount 1',
            'type' => 'percentage',
            'value' => 10,
            'status' => 'active',
            'expired_date' => '2024-03-13',

        ]);
        \App\Models\Discount::create([
            'name' => 'Discount 2',
            'description' => 'Discount 2',
            'type' => 'percentage',
            'value' => 30,
            'status' => 'active',
            'expired_date' => '2024-03-13',

        ]);
        \App\Models\Discount::create([
            'name' => 'Discount 3',
            'description' => 'Discount 3',
            'type' => 'percentage',
            'value' => 20,
            'status' => 'active',
            'expired_date' => '2024-03-13',

        ]);
    }
}
