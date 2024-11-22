<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('voucher_types')->insert([
            ['type_name' => 'Default'],
            ['type_name' => 'Percentage'],
            ['type_name' => 'Fixed Amount'],
            ['type_name' => 'Free Shipping'],
        ]);
    }
}