<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
       DB::table('suppliers')->insert([
        [
            'name' => 'gudang a',
            'address' => 'jl merdeka',
            'phone' => '08123456789',
        ],
    ]);

    }
}
