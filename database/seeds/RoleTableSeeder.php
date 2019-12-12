<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Role;
        $admin->name = 'admin';
        $admin->save();

        $cus = new \App\Role;
        $cus->name = 'customer';
        $cus->save();
    }
}
