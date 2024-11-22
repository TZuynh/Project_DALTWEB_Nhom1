<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['status_name' => 'Pending', 'is_that' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['status_name' => 'Processing', 'is_that' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['status_name' => 'Completed', 'is_that' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['status_name' => 'Cancelled', 'is_that' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['status_name' => 'Failed', 'is_that' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('statuses')->insert($statuses);
    }
}
