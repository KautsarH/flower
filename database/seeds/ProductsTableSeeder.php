<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Product Seed');

        $sunflower = \App\Product::updateOrCreate([
            'name' => 'Sunflower',
            'description' => 'Sunflowers are one of our iconic symbols of summer',
            'price' => 85.00,
            'picture' => 'img/sunflower.jpg'
        ]);

        $rose = \App\Product::updateOrCreate([
            'name' => 'Rose',
            'description' => 'Rose has been a timeless symbol of beauty, transience and love',
            'price' => 149.00,
            'picture' => 'img/rose.jpg'
        ]);

        $tulips = \App\Product::updateOrCreate([
            'name' => 'Tulips',
            'description' => 'Tulips is generally perfect love',
            'price' => 89.00,
            'picture' => 'img/tulips.jpg'
        ]);

        $baby = \App\Product::updateOrCreate([
            'name' => 'Baby Breath',
            'description' => 'The iconic symbol of long lasting love',
            'price' => 119.00,
            'picture' => 'img/babybreath.jpg'
        ]);
    }
}
