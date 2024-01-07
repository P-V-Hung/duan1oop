<?php 
    namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class BillStatusModel extends Model{
        protected $table = 'bill_status';
        public $timestamps = false;
    
        public $fillable = [
            'sb_name',
        ];
    }
?>