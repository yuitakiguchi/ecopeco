<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = ['name', 'trading_time', 'discount_price', 'price', 'coupon', 'image'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
