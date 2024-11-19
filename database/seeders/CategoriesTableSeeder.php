<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Quần Áo Nam', 'parent_category' => null],
            ['name' => 'Quần Áo Nữ', 'parent_category' => null],
            ['name' => 'Áo Sơ Mi Nam', 'parent_category' => 1],
            ['name' => 'Áo Sơ Mi Nữ', 'parent_category' => 2], 
            ['name' => 'Áo Thun Nam', 'parent_category' => 1], 
            ['name' => 'Áo Thun Nữ', 'parent_category' => 2], 
            ['name' => 'Quần Jean Nam', 'parent_category' => 1],
            ['name' => 'Quần Jean Nữ', 'parent_category' => 2], 
            ['name' => 'Áo Khoác Nam', 'parent_category' => 1], 
            ['name' => 'Áo Khoác Nữ', 'parent_category' => 2], 
            ['name' => 'Giày Nam', 'parent_category' => null],
            ['name' => 'Giày Nữ', 'parent_category' => null],
            ['name' => 'Phụ Kiện Nam', 'parent_category' => null],
            ['name' => 'Phụ Kiện Nữ', 'parent_category' => null],
            ['name' => 'Túi Xách Nữ', 'parent_category' => 13], 
            ['name' => 'Mũ Nữ', 'parent_category' => 13], 
            ['name' => 'Thắt Lưng Nam', 'parent_category' => 12],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'parent_categories_id' => $category['parent_category'],
            ]);
        }
    }
}
