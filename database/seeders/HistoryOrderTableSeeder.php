<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistoryOrderTableSeeder extends Seeder
{
    public function run(): void
    {
        $historyOrders = [
            ['id' => 1, 'order_id' => 1, 'shipment_status_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'order_id' => 2, 'shipment_status_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('history_orders')->insert($historyOrders);
    }
}
