<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FootersSeeder::class);
        $this->call(VoucherTypeTableSeeder::class);
        $this->call(VoucherTableSeeder::class);
        $this->call(PaymentMethodTableSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ShipmentStatusTableSeeder::class);
        $this->call(ShippingAdressesTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(HistoryOrderTableSeeder::class);
        $this->call(ColorSeeder::class);
    }
}
