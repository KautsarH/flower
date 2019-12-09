<?php

use Illuminate\Database\Seeder;

class OccasionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Occasion Seed');

        $birthday = \App\Occasion::updateOrCreate([
            'name' => 'Birthday',
            'description' => 'A birthday is the anniversary of the birth of a person',
        ]);

        $grad = \App\Occasion::updateOrCreate([
            'name' => 'Graduation',
            'description' => 'Graduation is the award of a diploma or academic degree',
        ]);

        $love = \App\Occasion::updateOrCreate([
            'name' => 'Relationship',
            'description' => 'Send flowers to your loved ones',
        ]);

        $baby = \App\Occasion::updateOrCreate([
            'name' => 'Baby Shower',
            'description' => 'Flowers for your favourite pregnant friend',
        ]);
    }
}
