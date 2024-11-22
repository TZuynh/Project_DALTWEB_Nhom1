<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class VoucherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('vouchers')->insert([
            [
                'voucher_type_id' => 1, // Percentage
                'content' => 'Voucher mặc định không giảm giá',
                'money_minimum' => 0,
                'money_discount' => 0,
                'quality' => 1000,
                'start_date' => '2024-11-01',
                'end_date' => '2025-11-01',
                'status' => 1
            ],
            [
                'voucher_type_id' => 2, // Percentage
                'content' => 'Giảm 10% cho đơn hàng từ 600,000 VND',
                'money_minimum' => 600000,
                'money_discount' => 10, // 10%
                'quality' => 100,
                'start_date' => '2024-11-01',
                'end_date' => '2024-12-31',
                'status' => 1
            ],
            [
                'voucher_type_id' => 3, // Fixed Amount
                'content' => 'Giảm 50,000 VND cho đơn hàng từ 800,000 VND',
                'money_minimum' => 800000,
                'money_discount' => 50000, // 50,000 VND
                'quality' => 100,
                'start_date' => '2024-11-01',
                'end_date' => '2024-12-31',
                'status' => 1
            ],
            [
                'voucher_type_id' => 4, // Free Shipping
                'content' => 'Miễn phí vận chuyển cho đơn hàng từ 600,000 VND',
                'money_minimum' => 600000,
                'money_discount' => 0, // Free Shipping (giảm phí vận chuyển)
                'quality' => 50,
                'start_date' => '2024-11-01',
                'end_date' => '2024-12-31',
                'status' => 1
            ]
        ]);
    }
}