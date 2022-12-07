<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table ='admin_login';
    protected $allowedFields = ['id','user_id','password','organization','role','created_at'];
}
?>