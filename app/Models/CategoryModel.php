<?php 
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class CategoryModel extends Model{

        protected $table = 'categories';
        protected $fillable = [
            'cat_name', 'cat_idparent'
        ];
        public $timestamps = false;


        public function remove($id){
            return $this->destroy($id);
        }

    }
?>