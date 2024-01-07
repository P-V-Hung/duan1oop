<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyModel extends Model
{
    protected $table = 'pro_properties';
    public $timestamps = false;

    public $fillable = [
        'pp_proid',
        'pp_price',
        'pp_color',
        'pp_size',
        'pp_count'
    ];

}
