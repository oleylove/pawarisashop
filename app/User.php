<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role', 'photo', 'password', 'score_total', 'score_used', 'score_usable',
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

    public function profile(){
        return $this->hasMany('App\Profile', 'user_id');
    }

    public function orders(){
        return $this->hasMany('App\Order', 'user_id');
    }

    public function order_details(){
        return $this->hasMany('App\OrderProduct', 'user_id');
    }

    public function votes(){
        return $this->hasMany('App\Vote', 'user_id');
    }

    public function reviews(){
        return $this->hasMany('App\Review', 'user_id',);
    }

    public function likes(){
        return $this->hasMany('App\Likes', 'user_id');
    }

    public function wishlists(){
        return $this->hasMany('App\Wishlist', 'user_id');
    }

}
