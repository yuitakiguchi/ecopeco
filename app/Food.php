<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = ['name', 'trading_time', 'discount_price', 'price', 'coupon', 'image_name', 'price_difference', 'user_id', 'public_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }
}
