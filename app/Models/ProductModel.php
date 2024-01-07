<?php 
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class ProductModel extends Model{
        protected $table = 'products';
        public $timestamps = false;
        public $fillable = [
            'pro_name',
            'pro_img',
            'del_price',
            'pro_desc',
            'pro_views',
            'pro_status'
        ];
    }
?>