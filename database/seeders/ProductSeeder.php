<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'price' => 10000,
            'description' => 'Description for product 1',
            'category_id' => 1, // Giả sử category_id 1 tồn tại
        ]);

        Product::create([
            'name' => 'Product 2',
            'price' => 20000,
            'description' => 'Description for product 2',
            'category_id' => 2, // Giả sử category_id 2 tồn tại
        ]);

        // Thêm nhiều dữ liệu hơn nếu cần
    }
}
