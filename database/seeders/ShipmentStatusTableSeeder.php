<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['id' => 1, 'status_name' => 'Pending', 'is_that' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'status_name' => 'Processing', 'is_that' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'status_name' => 'Shipped', 'is_that' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'status_name' => 'Delivered', 'is_that' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];
        //
        DB::table('shipment_statuses')->insert([
            'status_name' => 'Đơn hàng mới',
            'is_that' => 0,
        ]);

        DB::table('shipment_statuses')->insert([
            'status_name' => 'Đang xử lý',
            'is_that' => 0,
        ]);

        DB::table('shipment_statuses')->insert($statuses);
        DB::table('shipment_statuses')->insert([
            'status_name' => 'Đang vận chuyển',
            'is_that' => 0,
        ]);

        DB::table('shipment_statuses')->insert([
            'status_name' => 'Giao thành công',
            'is_that' => 1,
        ]);

        DB::table('shipment_statuses')->insert([
            'status_name' => 'Hủy đơn',
            'is_that' => 1,
        ]);
    }
}
