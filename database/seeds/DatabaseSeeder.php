<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MaterialTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SupplierTableSeeder::class);
        $this->call(PurchaseOrderTableSeeder::class);
        $this->call(PembayaranTableSeeder::class);
    }
}
