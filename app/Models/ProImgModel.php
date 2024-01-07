<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProImgModel extends Model
{
    protected $table = 'pro_img';
    public $timestamps = false;

    public $fillable = [
        'proid',
        'img'
    ];

}
