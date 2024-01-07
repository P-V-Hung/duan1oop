<?php 
    namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class VoucherModel extends Model{
        protected $table = 'vouchers';
        public $timestamps = false;

        protected $fillable = [
            'v_name',
            'v_price',
            'v_count',
            'v_used',
            'v_create',
            'v_arrtive',
        ];

    }
?>