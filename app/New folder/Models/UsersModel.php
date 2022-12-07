<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table ='user_login';
    protected $allowedFields = ['id','group_id','role','phone','country_code','location','image_url','status','department','name','email_id','user_name','password','created_by','created_at'];
}
?>