<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ShippingAdressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('shipping_addresses')->insert([
            'user_id' => 2,
            'receiver_name' => 'Minh Huy',
            'receiver_phone' => '0815875368',
            'city' => 'TP. Hồ Chí Minh',
            'ward' => 'Phường 25',
            'district' => 'Quận bình thạnh',
            'address' => '149 Ung Văn Khiêm',
            'default' => 1,
        ]);
    }
}