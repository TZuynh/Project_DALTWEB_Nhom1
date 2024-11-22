<?php

namespace Database\Seeders;

use App\Models\WebsiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebsiteSetting::updateOrCreate(['key' => 'site_name'], ['value' => 'Tên Website']);
        WebsiteSetting::updateOrCreate(['key' => 'site_description'], ['value' => 'Mô tả ngắn về website của bạn.']);
    }
}
