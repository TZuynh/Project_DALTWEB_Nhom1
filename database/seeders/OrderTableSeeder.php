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
                'shipping_address_id' => null,
                'shipment_status_id' => null,
                'voucher_id' => null,
                'total_product_value' => 500000,
                'delivery_change' => 30000,
                'total_order_value' => 530000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'shipping_address_id' => null,
                'shipment_status_id' => null,
                'voucher_id' => null,
                'total_product_value' => 1000000,
                'delivery_change' => 50000,
                'total_order_value' => 1050000,
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ],
            [
                'user_id' => 1,
                'shipping_address_id' => null,
                'shipment_status_id' => null,
                'voucher_id' => null,
                'total_product_value' => 750000,
                'delivery_change' => 25000,
                'total_order_value' => 775000,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'user_id' => 1,
                'shipping_address_id' => null,
                'shipment_status_id' => null,
                'voucher_id' => null,
                'total_product_value' => 1200000,
                'delivery_change' => 70000,
                'total_order_value' => 1270000,
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'user_id' => 1,
                'shipping_address_id' => null,
                'shipment_status_id' => null,
                'voucher_id' => null,
                'total_product_value' => 640000,
                'delivery_change' => 20000,
                'total_order_value' => 660000,
                'created_at' => Carbon::now()->subDays(4),
                'updated_at' => Carbon::now()->subDays(4),
            ],
            // [
            //     'user_id' => 6,
            //     'shipping_address_id' => 6,
            //     'shipment_status_id' => 3,
            //     'voucher_id' => null,
            //     'total_product_value' => 890000,
            //     'delivery_change' => 45000,
            //     'total_order_value' => 935000,
            //     'created_at' => Carbon::now()->subDays(5),
            //     'updated_at' => Carbon::now()->subDays(5),
            // ],
            // [
            //     'user_id' => 7,
            //     'shipping_address_id' => 7,
            //     'shipment_status_id' => 1,
            //     'voucher_id' => 5,
            //     'total_product_value' => 1230000,
            //     'delivery_change' => 60000,
            //     'total_order_value' => 1290000,
            //     'created_at' => Carbon::now()->subDays(6),
            //     'updated_at' => Carbon::now()->subDays(6),
            // ],
            // [
            //     'user_id' => 8,
            //     'shipping_address_id' => 8,
            //     'shipment_status_id' => 2,
            //     'voucher_id' => null,
            //     'total_product_value' => 450000,
            //     'delivery_change' => 15000,
            //     'total_order_value' => 465000,
            //     'created_at' => Carbon::now()->subDays(7),
            //     'updated_at' => Carbon::now()->subDays(7),
            // ],
            // [
            //     'user_id' => 9,
            //     'shipping_address_id' => 9,
            //     'shipment_status_id' => 3,
            //     'voucher_id' => 6,
            //     'total_product_value' => 970000,
            //     'delivery_change' => 40000,
            //     'total_order_value' => 1010000,
            //     'created_at' => Carbon::now()->subDays(8),
            //     'updated_at' => Carbon::now()->subDays(8),
            // ],
            // [
            //     'user_id' => 10,
            //     'shipping_address_id' => 10,
            //     'shipment_status_id' => 1,
            //     'voucher_id' => null,
            //     'total_product_value' => 1100000,
            //     'delivery_change' => 50000,
            //     'total_order_value' => 1150000,
            //     'created_at' => Carbon::now()->subDays(9),
            //     'updated_at' => Carbon::now()->subDays(9),
            // ],
            // [
            //     'user_id' => 11,
            //     'shipping_address_id' => 11,
            //     'shipment_status_id' => 2,
            //     'voucher_id' => 7,
            //     'total_product_value' => 500000,
            //     'delivery_change' => 30000,
            //     'total_order_value' => 530000,
            //     'created_at' => Carbon::now()->subDays(10),
            //     'updated_at' => Carbon::now()->subDays(10),
            // ],
            // [
            //     'user_id' => 12,
            //     'shipping_address_id' => 12,
            //     'shipment_status_id' => 3,
            //     'voucher_id' => 8,
            //     'total_product_value' => 820000,
            //     'delivery_change' => 40000,
            //     'total_order_value' => 860000,
            //     'created_at' => Carbon::now()->subDays(11),
            //     'updated_at' => Carbon::now()->subDays(11),
            // ],
            // [
            //     'user_id' => 13,
            //     'shipping_address_id' => 13,
            //     'shipment_status_id' => 1,
            //     'voucher_id' => null,
            //     'total_product_value' => 920000,
            //     'delivery_change' => 35000,
            //     'total_order_value' => 955000,
            //     'created_at' => Carbon::now()->subDays(12),
            //     'updated_at' => Carbon::now()->subDays(12),
            // ],
            // [
            //     'user_id' => 14,
            //     'shipping_address_id' => 14,
            //     'shipment_status_id' => 2,
            //     'voucher_id' => 9,
            //     'total_product_value' => 1000000,
            //     'delivery_change' => 60000,
            //     'total_order_value' => 1060000,
            //     'created_at' => Carbon::now()->subDays(13),
            //     'updated_at' => Carbon::now()->subDays(13),
            // ],
            // [
            //     'user_id' => 15,
            //     'shipping_address_id' => 15,
            //     'shipment_status_id' => 3,
            //     'voucher_id' => 10,
            //     'total_product_value' => 650000,
            //     'delivery_change' => 25000,
            //     'total_order_value' => 675000,
            //     'created_at' => Carbon::now()->subDays(14),
            //     'updated_at' => Carbon::now()->subDays(14),
            // ],
            // [
            //     'user_id' => 16,
            //     'shipping_address_id' => 16,
            //     'shipment_status_id' => 1,
            //     'voucher_id' => null,
            //     'total_product_value' => 990000,
            //     'delivery_change' => 45000,
            //     'total_order_value' => 1035000,
            //     'created_at' => Carbon::now()->subDays(15),
            //     'updated_at' => Carbon::now()->subDays(15),
            // ],
            // [
            //     'user_id' => 17,
            //     'shipping_address_id' => 17,
            //     'shipment_status_id' => 2,
            //     'voucher_id' => 11,
            //     'total_product_value' => 470000,
            //     'delivery_change' => 20000,
            //     'total_order_value' => 490000,
            //     'created_at' => Carbon::now()->subDays(16),
            //     'updated_at' => Carbon::now()->subDays(16),
            // ],
            // [
            //     'user_id' => 18,
            //     'shipping_address_id' => 18,
            //     'shipment_status_id' => 3,
            //     'voucher_id' => 12,
            //     'total_product_value' => 780000,
            //     'delivery_change' => 30000,
            //     'total_order_value' => 810000,
            //     'created_at' => Carbon::now()->subDays(17),
            //     'updated_at' => Carbon::now()->subDays(17),
            // ],
            // [
            //     'user_id' => 19,
            //     'shipping_address_id' => 19,
            //     'shipment_status_id' => 1,
            //     'voucher_id' => null,
            //     'total_product_value' => 910000,
            //     'delivery_change' => 45000,
            //     'total_order_value' => 955000,
            //     'created_at' => Carbon::now()->subDays(18),
            //     'updated_at' => Carbon::now()->subDays(18),
            // ],
            // [
            //     'user_id' => 20,
            //     'shipping_address_id' => 20,
            //     'shipment_status_id' => 2,
            //     'voucher_id' => 13,
            //     'total_product_value' => 600000,
            //     'delivery_change' => 25000,
            //     'total_order_value' => 625000,
            //     'created_at' => Carbon::now()->subDays(19),
            //     'updated_at' => Carbon::now()->subDays(19),
            // ],
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
