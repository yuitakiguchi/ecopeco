<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    const AUTHORITY_COMPANY = 1;
    const AUTHORITY_USER = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address','hp_url', 'authority_id', 'introduction'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function areas()
    {
        return $this->belongsToMany('App\Area')->withTimestamps();
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

    public function history()
    {
        return $this->hasOne('App\History');
    }

    public function foods()
    {
        return $this->hasMany('App\Food');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token)); 
    }

}

