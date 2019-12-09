<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    protected $table = 'occasions';

    protected $fillable = [
        'name', 'description'
    ];

    public function orders()
    {
        return $this->hasMany(Orders::class,'occasion_id','id');
    }
}
