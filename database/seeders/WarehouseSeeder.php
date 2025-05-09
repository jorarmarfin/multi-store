<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('warehouses')->insert([
            'name' => 'Almacén 1',
            'location' => 'Su dirección',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
