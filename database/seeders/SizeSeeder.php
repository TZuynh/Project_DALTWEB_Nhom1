<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    public function run()
    {
        $sizes = [
            ['name' => 'Small'],
            ['name' => 'Medium'],
            ['name' => 'Large'],
            ['name' => 'X-Large']
        ];

        DB::table('sizes')->insert($sizes);
    }
}
