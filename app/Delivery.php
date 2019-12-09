<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'deliveries';

    protected $fillable = [
        'name', 'phone_no', 'latitude', 'longitude', 'user_id'
    ];

    public function order()
    {
        return $this->hasOne(Order::class, 'order_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
