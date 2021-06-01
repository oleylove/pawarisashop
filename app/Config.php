<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'configs';

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
        'title',
        'website',
        'facebook',
        'line',
        'address',
        'phone',
        'freeshipping',
        'shipping',
        'bbl',
        'bbl_logo',
        'kbsnk',
        'kbsnk_logo',
        'scb',
        'scb_logo',
        'bay',
        'bay_logo',
        'logo'
    ];


}
