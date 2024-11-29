<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kiểm tra nếu Admin chưa tồn tại
        if (!DB::table('users')->where('username', 'admin')->exists()) {
            DB::table('users')->insert([
                'role_id' => 1,
                'fullname' => 'Admin User',
                'username' => 'admin',
                'password' => Hash::make('Admin@123'),
            ]);
        }

        // Kiểm tra nếu Khách hàng chưa tồn tại
        if (!DB::table('users')->where('username', 'customer')->exists()) {
            DB::table('users')->insert([
                'role_id' => 2,
                'fullname' => 'Minh Huy',
                'username' => 'minhie1510',
                'password' => Hash::make('Minhie@1510'),
            ]);
        }
    }
}
