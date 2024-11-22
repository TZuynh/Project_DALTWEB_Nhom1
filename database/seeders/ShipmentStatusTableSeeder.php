<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentStatusTableSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['id' => 1, 'status_name' => 'Pending', 'is_that' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'status_name' => 'Processing', 'is_that' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'status_name' => 'Shipped', 'is_that' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'status_name' => 'Delivered', 'is_that' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('shipment_statuses')->insert($statuses);
    }
}
