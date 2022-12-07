<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table ='register_user';
    protected $allowedFields = ['id','f_name','l_name','mobile','email','password','hospital','city','contry','gamer_id','transaction_id','gamer_id_used','otp','password_otp','payment_id','payement_status','verify_email','feedback_submit','valid_user','created_at'];
}
?>