<?php 
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserModel extends Model{
        protected $table = 'users';

        public $fillable = [
            'u_username',
            'u_fullname',
            'u_email',
            'u_img',
            'u_password',
            'u_address',
            'u_tel',
            'u_status',
            'u_role',
            'token'
        ];
    }
?>