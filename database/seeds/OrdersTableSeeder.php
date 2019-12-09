<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = \App\User::where('role','customer')->get();
        $occasions = \App\Occasion::all();
        //$deliveries = \App\Delivery::all();
        //dd($occasions->count());
        $faker = \Faker\Factory::create('ms_MY');

        $payment= [
            'Online Banking',
            'Cash On Demand',
        ];

        $this->command->info('Order Seed');

            for ($i = 0; $i < 15; $i++) {
                $j = mt_rand(0,1);
                $user = mt_rand(1,$users->count());
                $delivery = \App\Delivery::where('user_id',$user)->first();
                $products = \App\Product::all();
                //dd($delivery);
                $order = \App\Order::updateOrCreate([
                'status' => 0,
                //'total'=> mt_rand(80,149),
                'time' => $faker->time(), 
                'order_date' => $faker->dateTime(),
                'deliver_date' => $faker->dateTime(),
                'payment'=> $payment[$j],
                'remarks' => $faker->text(50),
                'user_id' => $user,
                'occasion_id'=> mt_rand(1,$occasions->count()),
                'delivery_id'=> $delivery->id
                ]);

                
                $ord_prod = \App\OrderProduct::updateOrCreate([
                    'order_id' => $order->id,
                    'product_id'=> mt_rand(1,$products->count()),
                    'quantity' => mt_rand(1,5)
                    ]);
                $priceproduct = \App\Product::where('id',$ord_prod->product_id)->first()->price;
                $totalprice = $ord_prod->quantity * $priceproduct;
                
                $order->update(['total'=> $totalprice]);

            }

            
    }
}
