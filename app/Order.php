<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'status', 'total', 'time', 'order_date','deliver_date', 'payment', 'remarks', 'ocassion_id', 'user_id', 'delivery_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function occasion()
    {
        return $this->belongsTo(Occasion::class, 'occasion_id', 'id');
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id', 'id');
    }

    public function products(){
        return $this->belongsToMany(Product::class,'order_product','order_id','product_id')->withPivot('order_product')->withTimestamps();
    }
}
