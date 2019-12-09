<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\User as UserResource;
use App\Delivery;
use App\Http\Resources\Delivery as DeliveryResource;
use App\Product;
use App\Http\Resources\Product as ProductResource;
use App\Order;
use App\Http\Resources\Order as OrderResource;
use App\OrderProduct;
use App\Http\Resources\OrderProduct as OrderProductResource;
use App\Occasion;
use App\Http\Resources\Occasion as OccasionResource;

class ApiController extends Controller
{
    public function users()
    {
        $users = User::paginate(15);
        return UserResource::collection($users);
    }

    public function deliveries()
    {
        $deliveries = Delivery::paginate(15);
        return DeliveryResource::collection($deliveries);
    }

    public function products()
    {
        $products = Product::paginate(15);
        return ProductResource::collection($products);
    }

    public function orders()
    {
        $orders = Order::paginate(15);
        return OrderResource::collection($orders);
    }
    public function history()
    {
        $ordprod = OrderProduct::paginate(15);
        return OrderProductResource::collection($ordprod);
    }
    public function occasions()
    {
        $occasions = Occasion::paginate(15);
        return OccasionResource::collection($occasions);
    }

}
