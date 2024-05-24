<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('inventories')->insert([
            ['name' => 'Item 1', 'stock' => 100, 'unit' => 'pcs', 'supplier_id' => 1],
            ['name' => 'Item 2', 'stock' => 200, 'unit' => 'pcs', 'supplier_id' => 2],
        ]);
    }
}
