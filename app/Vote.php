<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'votes';

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
    protected $fillable = ['user_id', 'prod_id', 'score'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function product(){
        return $this->belongsTo('App\Product', 'prod_id');
    }

}
