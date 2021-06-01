<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_products';

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
    protected $fillable = ['user_id', 'prod_id', 'po_id', 'qty', 'price', 'disc', 'net'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function order(){
        return $this->belongsTo('App\Order', 'po_id');
    }

    public function product(){
        return $this->belongsTo('App\Product', 'prod_id');
    }

}
