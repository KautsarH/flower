<?php

use Illuminate\Database\Seeder;

class DeliveriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\User::where('role','customer')->get();
        //dd($users);
        $faker = \Faker\Factory::create('ms_MY');
        $this->command->info('Delivery Seed');

            foreach ($users as $user) {
                $address = \App\Delivery::updateOrCreate([
                'name' => $faker->name,
                'phone_no'=> $faker->phoneNumber,
                'latitude' => $faker->latitude(), 
                'longitude' => $faker->longitude(),
                'user_id' => $user->id,
                ]);
            }
        
    }
}
