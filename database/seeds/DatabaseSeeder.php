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
        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(OccasionsTableSeeder::class);
        $this->call(DeliveriesTableSeeder::class);
        //$this->call(DeliveriesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
    }
}
