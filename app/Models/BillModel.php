<?php 
    namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class BillModel extends Model{
        protected $table = "bill";
        public $fillable = [
            'bill_userid',
            'bill_address',
            'bill_tel',
            'bill_username',
            'bill_fullname',
            'bill_price',
            'bill_count',
            'bill_pttt',
            'voucher_id',
            'bill_status',
        ];
    }
?>