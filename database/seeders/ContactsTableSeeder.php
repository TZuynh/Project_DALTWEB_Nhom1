<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ContactsTableSeeder extends Seeder
{
    public function run()
    {
        $contacts = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'phone' => '555123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('contacts')->insert($contacts);
    }
}
