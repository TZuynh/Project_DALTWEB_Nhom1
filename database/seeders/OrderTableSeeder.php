<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate = Carbon::now()->subDays(20); // Bắt đầu từ 20 ngày trước
        // Dữ liệu mẫu cho nhiều năm khác nhau
        $reports = [
            [
                'user_id' => 1,
                'shipping_address_id' => 1, // Ensure 1 exists in shipping_addresses
                'shipment_status_id' => 1,
                'voucher_id' => 1,
                'charge' => 3000,
                'total_product_value' => 500000,
                'total_order_value' => 530000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'shipping_address_id' => 1, // Ensure 1 exists in shipping_addresses
                'shipment_status_id' => 2,
                'voucher_id' => 1,
                'charge' => 5000,
                'total_product_value' => 1000000,
                'total_order_value' => 1050000,
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ],
        ];

        // Tạo 20 đơn hàng với dữ liệu ngẫu nhiên
        // for ($i = 0; $i < 20; $i++) {
        //     $reports[] = [
        //         'user_id' => rand(1, 10), // Giả định có 10 user
        //         'shipping_address_id' => rand(1, 20), // Giả định có 20 địa chỉ giao hàng
        //         'shipment_status_id' => rand(1, 5), // Giả định có 5 trạng thái giao hàng
        //         'voucher_id' => rand(0, 1) ? rand(1, 10) : null, // 50% cơ hội có voucher
        //         'total_product_value' => rand(500000, 2000000), // Giá trị sản phẩm ngẫu nhiên
        //         'delivery_change' => rand(20000, 70000), // Phí vận chuyển ngẫu nhiên
        //         'total_order_value' => rand(520000, 2100000), // Tổng giá trị đơn hàng
        //         'created_at' => $startDate->copy()->addDays($i), // Tăng dần mỗi ngày
        //         'updated_at' => $startDate->copy()->addDays($i),
        //     ];
        // }
        // Thêm dữ liệu vào bảng 'orders'
        foreach ($reports as $report) {
            DB::table('orders')->insert($report);
        }
    }
}
