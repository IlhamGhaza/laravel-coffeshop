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
        // DB::table('inventories')->insert([
        //     ['item_name' => 'Item 1', 'stock' => 100, 'unit' => 'pcs', 'supplier_id' => 1],
        //     ['item_name' => 'Item 2', 'stock' => 200, 'unit' => 'pcs', 'supplier_id' => 2],
        //     // Add more inventory items as needed, ensuring supplier_id matches suppliers table
        // ]);
    }
}
