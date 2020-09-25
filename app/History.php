<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';
    protected $fillable = ['this_month_saving_price', 'saving_price', 'this_month_count', 'count', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
