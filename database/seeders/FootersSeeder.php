<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FootersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Footer::updateOrCreate(['title' => 'site_name'], ['content' => 'Tên Website']);
        Footer::updateOrCreate(['title' => 'site_description'], ['content' => 'Mô tả ngắn về website của bạn.']);
    }
}
