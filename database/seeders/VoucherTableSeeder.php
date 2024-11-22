<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class VoucherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $vouchers = [
    [
        'voucher_type_id' => 1,
        'status_name' => 'Active',
        'content' => '10% off on orders above 500K',
        'money_minimum' => 500000,
        'money_discount' => 50000,
        'quality' => 100,
        'start_date' => Carbon::now()->subDays(10), // Đã bắt đầu và đang hoạt động
        'end_date' => Carbon::now()->addMonths(1), // Kết thúc trong 1 tháng tới
        'status' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'voucher_type_id' => 2,
        'status_name' => 'Expired',
        'content' => '15% off for orders above 300K',
        'money_minimum' => 300000,
        'money_discount' => 45000,
        'quality' => 50,
        'start_date' => Carbon::now()->subYears(1)->subMonths(2), // Bắt đầu từ năm trước
        'end_date' => Carbon::now()->subDays(20), // Đã hết hạn 20 ngày trước
        'status' => 0,
        'created_at' => now()->subMonths(14),
        'updated_at' => now()->subMonths(14),
    ],
    [
        'voucher_type_id' => 1,
        'status_name' => 'Upcoming',
        'content' => 'Free shipping on orders above 1M',
        'money_minimum' => 1000000,
        'money_discount' => 0,
        'quality' => 200,
        'start_date' => Carbon::now()->addDays(15), // Sẽ bắt đầu trong 15 ngày tới
        'end_date' => Carbon::now()->addMonths(2), // Kết thúc sau 2 tháng kể từ khi bắt đầu
        'status' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'voucher_type_id' => 3,
        'status_name' => 'Active',
        'content' => 'Flat 50K off on all orders',
        'money_minimum' => 0, // Không yêu cầu giá trị tối thiểu
        'money_discount' => 50000,
        'quality' => 500,
        'start_date' => Carbon::now()->subDays(5), // Đã bắt đầu 5 ngày trước
        'end_date' => Carbon::now()->addMonths(1), // Kết thúc trong 1 tháng tới
        'status' => 1,
        'created_at' => now()->subDays(5),
        'updated_at' => now(),
    ],
    [
        'voucher_type_id' => 2,
        'status_name' => 'Expired',
        'content' => 'Buy 1 Get 1 Free',
        'money_minimum' => 500000,
        'money_discount' => 0, // Áp dụng giảm giá số lượng
        'quality' => 100,
        'start_date' => Carbon::now()->subYears(1), // Bắt đầu từ năm trước
        'end_date' => Carbon::now()->subMonths(6), // Hết hạn cách đây 6 tháng
        'status' => 0,
        'created_at' => now()->subYears(1),
        'updated_at' => now()->subMonths(6),
    ],
    [
        'voucher_type_id' => 1,
        'status_name' => 'Active',
        'content' => '20% off for first-time users',
        'money_minimum' => 300000,
        'money_discount' => 60000,
        'quality' => 150,
        'start_date' => Carbon::now()->subDays(2), // Đã bắt đầu 2 ngày trước
        'end_date' => Carbon::now()->addDays(20), // Kết thúc trong 20 ngày tới
        'status' => 1,
        'created_at' => now()->subDays(2),
        'updated_at' => now(),
    ],
];


        DB::table('vouchers')->insert($vouchers);
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
