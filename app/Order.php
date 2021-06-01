<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

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
        'user_id',
        'shipping',
        'price',
        'disc',
        'net',
        'tracking',
        'score_total',
        'status',
        'slip',
        'checking_at',
        'paid_at',
        'cancelled_at',
        'completed_at',
        'address',
        'consignee'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function order_products(){
        return $this->hasMany('App\OrderProduct', 'po_id');
    }



}
