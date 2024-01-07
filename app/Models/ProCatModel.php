<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProCatModel extends Model
{
    protected $table = 'pro_cats';
    public $timestamps = false;

    public $fillable = [
        'pc_idpro',
        'pc_idcat'
    ];

}
