<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $faker = \Faker\Factory::create('ms_MY');
            $this->command->info('User Seed');

            $admin = \App\User::updateOrCreate([
                'name' => 'Admin',
                'username' => 'admin',
                'email' =>'admin'. '@example.com',
                'email_verified_at' => now(),
                'phone_no'=> $faker->phoneNumber,
                'password' => bcrypt('secret'), // password
                'remember_token' => Str::random(10),
                'role' => 'admin'
                ]);

            for ($i = 0; $i < 10; $i++) {
                $customer = \App\User::updateOrCreate([
                'name' => $faker->name,
                'username' => $faker->userName,
                'email' =>'customer'. '_' . $i . '@example.com',
                'email_verified_at' => now(),
                'phone_no'=> $faker->phoneNumber,
                'password' => bcrypt('secret'), // password
                'remember_token' => Str::random(10),
                'role' => 'customer'
                ]);
            }
       
    }
}
