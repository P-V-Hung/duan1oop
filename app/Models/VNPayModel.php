<?php 
    namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class VNPayModel extends Model{
        protected $table = "vnpay";
        public $timestamps = false;
        public $fillable = [
            'vnp_amount',
            'vnp_bankCode',
            'vnp_banktranno',
            'vnp_cardtype',
            'vnp_orderinfo',
            'vnp_paydate', 
            'vnp_tmncode', 
            'vnp_transactionno', 
            'id_bill', 
        ];
    }
?>