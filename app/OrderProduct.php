<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';

    protected $fillable = [
        'order_id', 'product_id', 'quantity'
    ];

    public function product(){
        return $this->belongsTo(Product::class); //,'order_id','product_id')->withPivot('order_product')->withTimestamps();
    }

    public function order(){
        return $this->belongsTo(Order::class); //'order_product','product_id','order_id')->withTimestamps();
    }
}
