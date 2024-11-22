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
        //
        DB::table('shipment_statuses')->insert([
            'status_name' => 'Đơn hàng mới',
            'is_that' => 0,
        ]);

        DB::table('shipment_statuses')->insert([
            'status_name' => 'Đang xử lý',
            'is_that' => 0,
        ]);

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
