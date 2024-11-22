<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('payment_methods')->insert([
            'name' => 'VNPAY',
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'MoMo',
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'Bank Transfer',
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'COD',
        ]);
    }
}