<?php 
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class BillInfoModel extends Model{
        protected $table = "bill_info";
        public $timestamps = false;
        public $fillable = [
            'bill_id',
            'proid',
            'userid',
            'pp_id',
            'pro_price',
            'pro_count'
        ];
    }
?>