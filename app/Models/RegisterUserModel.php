<?php namespace App\Models;

use CodeIgniter\Model;

class RegisterUserModel extends Model
{
protected $table ='register_user'; 
protected $allowedFields = ['id','org_id','role_id','f_name','l_name','mobile','email','password','hospital','city',
    'contry','gamer_id','transaction_id','gamer_id_used','otp','password_otp','payment_id','payement_status','payment_amount','payment_date_added',
    'verify_email','feedback_submit','valid_user','created_at','login_count','present_login','last_login'];
} 
?>