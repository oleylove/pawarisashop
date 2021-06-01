<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inc_id',
        'code',
        'name',
        'content',
        'size',
        'price',
        'color',
        'cost',
        'disc',
        'sold',
        'photo1',
        'photo2',
        'photo3',
        'qty',
        'hot',
        'likes',
        'view',
        'vote',
        'score',
        'rating',
        'status'
    ];

    public function order_products(){
        return $this->hasMany('App\OrderProduct', 'prod_id');
    }

    public function wishlists(){
        return $this->hasMany('App\Wishlist', 'prod_id');
    }

    public function votes(){
        return $this->hasMany('App\Vote', 'prod_id');
    }

    public function reviews(){
        return $this->hasMany('App\Review', 'prod_id');
    }

    public function likes(){
        return $this->hasMany('App\Likes', 'prod_id');
    }


}
