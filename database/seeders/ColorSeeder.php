<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    public function run()
    {
        $colors = [
            ['color_name' => 'Red'],
            ['color_name' => 'Blue'],
            ['color_name' => 'Green'],
            ['color_name' => 'Yellow'],
            ['color_name' => 'Black'],
            ['color_name' => 'White']
        ];

        DB::table('colors')->insert($colors);
    }
}
